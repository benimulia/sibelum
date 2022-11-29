<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ijazah;
use App\Models\fakultas;
use App\Models\prodi;
use App\Models\tahun;
use App\Models\tanggal;
use App\Models\dashboard;


class DashboardController extends Controller
{
    //======================IPK==============//
    
    public function index()
    {
        $users = DB::table('ijazah')
        ->select(DB::raw('count(*) as ijazah'))->groupBy('ipk')->get();
        //dd($users);

        $ipksatu = DB::table('ijazah')
        ->get('ipk')
        ->where('ipk', '<=', 2.0)
        ->count();

        $ipkdua = DB::table('ijazah')
        ->get('ipk')
        ->where('ipk', '>', 2.0)
        ->where('ipk', '<=', 2.5)
        ->count();

        $ipktiga = DB::table('ijazah')
        ->get('ipk')
        ->where('ipk', '>', 2.5)
        ->where('ipk', '<=', 3.0)
        ->count();

        $ipkempat = DB::table('ijazah')
        ->get('ipk')
        ->where('ipk', '>', 3.0)
        ->where('ipk', '<=', 3.5)
        ->count();

        $ipklima = DB::table('ijazah')
        ->get('ipk')
        ->where('ipk', '>', 3.5)
        ->where('ipk', '<=', 4.0)
        ->count();

        //dd($ipklima);



        return view ('grafik', compact('ipksatu','ipkdua','ipktiga','ipkempat','ipklima'));       
        
 


}
        
}



























































































































































































    