<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kasir;
use App\Models\Pembelian;

class KasirController extends Controller
{
    public function index()
    {
        return view('Kasir.index');
    }

    public function store(Request $request)
    {
        \Log::info('Store method called');
        \Log::info('Request data: ', $request->all());

        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'kategori' => 'nullable|string|max:255',
        ]);

        \Log::info('Validation passed');

        Kasir::create($request->all());

        \Log::info('Item created successfully');

        return redirect('/kasir')->with('success', 'Barang berhasil disimpan');
    }

    public function show()
    {
        $items = Kasir::all();
        return view('Kasir.items', compact('items'));
    }

    public function edit($id)
    {
        $item = Kasir::findOrFail($id);
        return view('Kasir.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'kategori' => 'nullable|string|max:255',
        ]);

        $item = Kasir::findOrFail($id);
        $item->update($request->all());

        return redirect('/kasir/items')->with('success', 'Barang berhasil diupdate');
    }

    public function destroy($id)
    {
        $item = Kasir::findOrFail($id);
        $item->delete();

        return redirect('/kasir/items')->with('success', 'Barang berhasil dihapus');
    }

    public function report()
    {
        $items = Kasir::all();
        return view('Kasir.report', compact('items'));
    }

    public function purchaseIndex()
    {
        $items = Kasir::all();
        return view('Pembelian.index', compact('items'));
    }

    public function purchaseStore(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'jumlah' => 'required|integer|min:1',
        ]);

        $kasir = Kasir::where('nama_barang', $request->nama_barang)->first();
        $harga_total = $kasir->harga * $request->jumlah;

        if ($kasir->stok < $request->jumlah) {
            return redirect('/pembelian')->with('error', 'Stok tidak mencukupi.');
        }

        $kasir->stok -= $request->jumlah;
        $kasir->save();

        Pembelian::create([
            'nama_barang' => $kasir->nama_barang,
            'jumlah' => $request->jumlah,
            'harga_total' => $harga_total,
        ]);

        return redirect('/pembelian')->with('success', 'Pembelian berhasil ditambahkan.');
    }

    public function purchaseReport(Request $request)
    {
        $query = Pembelian::query();

        if ($request->filled('start_date') && $request->filled('end_date')) {
            $query->whereBetween('created_at', [$request->start_date, $request->end_date]);
        }

        if ($request->filled('kategori')) {
            $query->whereIn('nama_barang', function ($q) use ($request) {
                $q->select('nama_barang')
                  ->from('kasir')
                  ->where('kategori', $request->kategori);
            });
        }

        $purchases = $query->get();
        $totalRevenue = $purchases->sum('harga_total');
        $categories = Kasir::getCategories();

        return view('Pembelian.report', compact('purchases', 'totalRevenue', 'categories'));
    }
}
