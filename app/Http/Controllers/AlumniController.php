<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\ijazah;


class AlumniController extends Controller
{
    public function index()
    {
        $nama = auth()->user()->name;
        $uid = auth()->user()->id;
        $nim = auth()->user()->nim;
       
        
        $ijazah = ijazah::all()
        ->where('nim', $nim);

        $perempuan = DB::table('ijazah')
        ->get('jeniskelamin')
        ->where('jeniskelamin', '=', 'Perempuan')
        ->count();

        $laki_laki = DB::table('ijazah')
        ->get('jeniskelamin')
        ->where('jeniskelamin', '=', 'Laki-Laki')
        ->count();

        $ipktinggi = DB::table('ijazah')
        ->get('ipk')
        ->where('ipk', '>', 2 > 4)
        ->count();

        $ipkrendah = DB::table('ijazah')
        ->get('ipk')
        ->where('ipk', '<', 2)
        ->count();
        

        return view('alumni.index', compact('ijazah', 'ipktinggi', 'ipkrendah', 'perempuan', 'laki_laki'));
    

    }
    
    public function dataalumni()
    {
        $nama = auth()->user()->name;
        $uid = auth()->user()->id;

        $ijazah = ijazah::all();
        return view('alumni.dataalumni', compact('ijazah'));
        
    }

    public function openijazah($id)
    {
        $path = public_path('ijazah/' . $id . '.pdf');
        header("Content-type: application/pdf");
        header("Content-Length: " . filesize($path));
        readfile($path);
    }

    public function opentranskrip($id)
    {
        $path = public_path('transkrip/' . $id . '.pdf');
        header("Content-type: application/pdf");
        header("Content-Length: " . filesize($path));
        readfile($path);
    }

}
    