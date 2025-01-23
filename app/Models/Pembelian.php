<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    use HasFactory;

    protected $table = 'pembelian';

    protected $fillable = [
        'nama_barang',
        'jumlah',
        'harga_total',
    ];

    public function getTanggalPembelianAttribute()
    {
        return $this->created_at->toDateString();
    }

    public function getJamPembelianAttribute()
    {
        return $this->created_at->toTimeString();
    }
}
