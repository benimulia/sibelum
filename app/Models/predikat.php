<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class predikat extends Model
{
    use HasFactory;
    protected $fillable = [
    'id',
    'idpredikat',
    'predikat',
    'keterangan',


    ];

    protected $table = 'predikat';
    protected $primaryKey = 'id';


}
