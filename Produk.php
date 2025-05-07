<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    // TODO: definisikan model produk anda disini

    protected $table = 'products'; // sesuaikan jika nama tabel berbeda

    protected $fillable = [
        'nama',
        'harga',
        'stok',
        'deskripsi',
        'status',
        'kategori',
    ];

    protected $casts = [
        'status' => 'boolean',
        'harga' => 'decimal:2',
        'stok' => 'integer',
    ];
}
