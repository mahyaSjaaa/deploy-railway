<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Verification_rents extends Model
{
    use HasFactory;
    protected $fillable = [
        'owner_id',
        'penyewa_id',
        'prod_id',
        'alasan',
        'durasi',
        'bukti_bayar',
        'status',
        'waktu_mulai'
    ];
}
