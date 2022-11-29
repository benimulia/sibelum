<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fakultas extends Model
{
    use HasFactory;
    protected $fillable = [
    'id_fakultas',
    'nama_fakultas',

    ];

    protected $table = 'fakultas';
    protected $primaryKey = 'id_fakultas';


}
