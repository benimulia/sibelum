<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class prodi extends Model
{
    use HasFactory;
    protected $fillable = [
    'id_prodi',
    'nama_prodi',
    'id_fakultas',

    ];

    protected $table = 'prodi';
    protected $primaryKey = 'id_prodi';


}
