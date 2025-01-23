<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kasir extends Model
{
    use HasFactory;

    protected $table = 'kasir';

    protected $fillable = [
        'nama_barang',
        'harga',
        'stok',
        'kategori',
    ];

    public function pembelian()
    {
        return $this->hasMany(Pembelian::class);
    }

    public static function getCategories()
    {
        return self::select('kategori')->distinct()->pluck('kategori');
    }
}
