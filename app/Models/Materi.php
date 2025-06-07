<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;

    protected $table = 'materi';

    // Masukkan semua kolom yang akan diisi massal
    protected $fillable = [
        'user_id',
        'judul',
        'tanggal',
        'waktu',
        'isi',
        'kategori',
        'file',
        'tipe',
        'status',
    ];
}
