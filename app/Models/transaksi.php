<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;
    protected $fillable = [
    'id',
    'tanggaltransaksi',
    'namabarang' ,
    'kodebarang' ,
    'totalharga' ,

    ];

    protected $table = 'transaksis';
    protected $primaryKey = 'id';


}
