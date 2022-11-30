<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\ijazah;
use App\Models\User;


class AlumniController extends Controller
{
    public function index()
    {
        $nama = auth()->user()->name;
        $uid = auth()->user()->id;
        $nim = auth()->user()->nim;
        $user = User::find($uid);
       
        
        $ijazah = ijazah::where('nim', $nim)->first();

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
        

        return view('alumni.index', compact('ijazah','user', 'ipktinggi', 'ipkrendah', 'perempuan', 'laki_laki'));
    

    }

    public function updateAlumni($id, Request $request){
        $user = User::find($id);

        $user->email = $request->email;
        $user->no_hp = $request->no_telp;
        $user->alamat = $request->alamat;
        $user->save();

        return redirect('alumni')->with('success', 'Berhasil mengubah data');

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
    