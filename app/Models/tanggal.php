<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tanggal extends Model
{
    use HasFactory;
    protected $fillable = [
    'id',
    'tanggal',
    'id_tahun',

    ];

    protected $table = 'tanggal';
    protected $primaryKey = 'id';


}
