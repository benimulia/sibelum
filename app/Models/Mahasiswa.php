<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'nama_mhs',
        'nim',
        'ipk',
        

        'user_id',
    ];

    protected $table = 'ijazah';
    protected $primaryKey = 'id_ijazah';
}
