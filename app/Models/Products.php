<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $fillable = [
        'produk',
        'harga',
        'jum_durasi',
        'satuan_durasi',
        'detail',
        'owner_id',
        'penyewa_id',
        'status',
        'plat',
        'minus',
        'deskripsi'
    ];
}
