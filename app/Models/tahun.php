<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tahun extends Model
{
    use HasFactory;
    protected $fillable = [
    'id',
    'tahun',

    ];

    protected $table = 'tahun';
    protected $primaryKey = 'id';


}
