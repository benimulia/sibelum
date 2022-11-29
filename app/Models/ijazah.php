<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ijazah extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_ijazah',
        'no_ijazah',
        'nim',
        'ipk',
        'namaMhs',
        'jeniskelamin',
        'periode',
        'angkatan',
        'prodi',
        'fakultas',
        'tahunlulus',
        'predikat',
        'ijazah',
        'transkrip',
    ];

    protected $table = 'ijazah';
    protected $primaryKey = 'id_ijazah';
}
