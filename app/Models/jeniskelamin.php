<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jeniskelamin extends Model
{
    use HasFactory;
    protected $fillable = [
    'id',
    'idjeniskelamin',
    'jeniskelamin',
    'gender',


    ];

    protected $table = 'jeniskelamin';
    protected $primaryKey = 'id';


}
