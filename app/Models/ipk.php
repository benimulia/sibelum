<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ipk extends Model
{
    use HasFactory;
    protected $fillable = [
    'id',
    'ipk',

    ];

    protected $table = 'ipk';
    protected $primaryKey = 'id';


}
