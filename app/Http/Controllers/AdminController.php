<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ijazah;
use App\Models\predikat;
use App\Models\fakultas;
use App\Models\prodi;
use App\Models\tahun;
use App\Models\tanggal;



class AdminController extends Controller
{
    //======================ijazah==============//
    
    public function index(Request $request)
    {
        if(count($request->all()) > 0) {
            if ($request->filled('filterprodi')) {
                $ijazah = ijazah::where('prodi', '=', $request->filterprodi)->get();
            }
    
            if ($request->filled('filterpredikat')) {
                $ijazah = ijazah::where('predikat', '=', $request->filterpredikat)->get();
            }
    
            if ($request->filled('filterperiode')) {
                $ijazah = ijazah::where('periode', '=', $request->filterperiode)->get();
            }
    
            if ($request->filled('filterangkatan')) {
                $ijazah = ijazah::where('angkatan', '=', $request->filterangkatan)->get();
            }


            //----------
            if($request->filled('filterprodi')&&$request->filled('filterpredikat')&&$request->filled('filterperiode')&&$request->filled('filterangkatan')){
                $ijazah = ijazah::where('prodi', '=', $request->filterprodi)
                ->where('predikat', '=', $request->filterpredikat)
                ->where('periode', '=', $request->filterperiode)->get();
            }

            //----------------
            if($request->filled('filterprodi')&&$request->filled('filterpredikat')&&$request->filled('filterperiode')){
                $ijazah = ijazah::where('prodi', '=', $request->filterprodi)
                ->where('predikat', '=', $request->filterpredikat)
                ->where('periode', '=', $request->filterperiode)
                ->where('angkatan', '=', $request->filterangkatan)->get();
            }

            if($request->filled('filterprodi')&&$request->filled('filterpredikat')&&$request->filled('filterangkatan')){
                $ijazah = ijazah::where('prodi', '=', $request->filterprodi)
                ->where('predikat', '=', $request->filterpredikat)
                ->where('angkatan', '=', $request->filterangkatan)->get();
            }

            if($request->filled('filterpredikat')&&$request->filled('filterperiode')&&$request->filled('filterangkatan')){
                $ijazah = ijazah::where('predikat', '=', $request->filterpredikat)
                ->where('periode', '=', $request->filterperiode)
                ->where('angkatan', '=', $request->filterangkatan)->get();
            }

            //------------------
            if($request->filled('filterprodi') && $request->filled('filterpredikat') ){
                $ijazah = ijazah::where('prodi', '=', $request->filterprodi)
                ->where('predikat', '=', $request->filterpredikat)->get();
            }

            if($request->filled('filterprodi') && $request->filled('filterperiode') ){
                $ijazah = ijazah::where('prodi', '=', $request->filterprodi)
                ->where('periode', '=', $request->filterperiode)->get();
            }

            if($request->filled('filterprodi') && $request->filled('filterangkatan') ){
                $ijazah = ijazah::where('prodi', '=', $request->filterprodi)
                ->where('angkatan', '=', $request->filterangkatan)->get();
            }
            //--

            if($request->filled('filterperiode') && $request->filled('filterpredikat') ){
                $ijazah = ijazah::where('periode', '=', $request->filterperiode)
                ->where('predikat', '=', $request->filterpredikat)->get();
            }

            if($request->filled('filterangkatan') && $request->filled('filterpredikat') ){
                $ijazah = ijazah::where('angkatan', '=', $request->filterangkatan)
                ->where('predikat', '=', $request->filterpredikat)->get();
            }

            //---

            if($request->filled('filterperiode') && $request->filled('filterangkatan') ){
                $ijazah = ijazah::where('periode', '=', $request->filterperiode)
                ->where('angkatan', '=', $request->filterangkatan)->get();
            }


        } else {
            $ijazah = ijazah::all();
        }

       
        $no = 0;
        $no++;
        $list_prodi = prodi::orderBy('nama_prodi','asc')->get();
        $predikat = predikat::orderBy('keterangan','asc')->get();
        $tanggal = DB::table('tanggal')
        ->join('tahun', 'tahun.id', '=', 'tanggal.id_tahun') 
        ->select('tahun.id','tanggal.tanggal' , 'tanggal.id_tahun')
        ->get();

        

        // $jumlah = DB::table('ijazah')
        // ->get('id_ijazah')
        // -count();

        $perempuan = DB::table('ijazah')
        ->get('jeniskelamin')
        ->where('jeniskelamin', '=', 'Perempuan')
        ->count();

        $laki_laki = DB::table('ijazah')
        ->get('jeniskelamin')
        ->where('jeniskelamin', '=', 'Laki-Laki')
        ->count();

        $baik = DB::table('ijazah')
        ->get('predikat')
        ->where('predikat', '=', 'Baik')
        ->count();

        $memuaskan = DB::table('ijazah')
        ->get('predikat')
        ->where('predikat', '=', 'Memuaskan')
        ->count();

        $sangatmemuaskan = DB::table('ijazah')
        ->get('predikat')
        ->where('predikat', '=', 'Sangat Memuaskan')
        ->count();

        $denganpujian = DB::table('ijazah')
        ->get('predikat')
        ->where('predikat', '=', 'Dengan Pujian')
        ->count();
        
        return view('Admin.index', compact('ijazah','list_prodi','predikat','tanggal', 'no', 'perempuan', 'laki_laki', 'baik', 'memuaskan', 'sangatmemuaskan', 'denganpujian'));
    }

    public function getProdi(Request $request)
    {
        $prodi = DB::table('prodi')->where('fakultas_id', $request->fakultas_selected)->get();
        return response()->json($prodi);
        
    }
    

    public function tambahIjazah(Request $request)
    {
        $a = $request -> fakultas;

        $fakultas = DB::table('fakultas')
        ->get();

        $prodi = DB::table('prodi')
        ->join('fakultas', 'fakultas.id_fakultas', '=', 'prodi.id_fakultas') 
        ->select('prodi.id_prodi','prodi.nama_prodi' , 'fakultas.id_fakultas')
        ->get();

        $tahun = DB::table('tahun')
        ->get();

        $tanggal = DB::table('tanggal')
        ->join('tahun', 'tahun.id', '=', 'tanggal.id_tahun') 
        ->select('tahun.id','tanggal.tanggal' , 'tanggal.id_tahun')
        ->get();

        $keterangan = DB::table('predikat')
        ->get();

        $gender = DB::table('jeniskelamin')
        ->get();

        // $p = DB::table('coba')
        // ->get();


        return view('Admin.create', ['fakultas' => $fakultas, 'prodi' => $prodi, 'tahun' => $tahun, 'tanggal' => $tanggal, 'predikat' => $keterangan, 'jeniskelamin' => $gender,]);
        // return view('Admin.create', ['f' => $f, 'p' => $p]);


 
    }

    public function tambahfakultasprodi()
    {
        return view('admin.tambahfakultasprodi');
    }

    public function tambahprodi()
    {
        $fakultas = DB::table('fakultas')
        ->get();

        return view('admin.tambahprodi', ['fakultas' => $fakultas]);
    }

    public function tambahtahun()
    {
        return view('admin.tambahtahun');
    }

    public function tambahtanggal()
    {
        $tahun = DB::table('tahun')
        ->get();

        return view('admin.tambahtanggal', ['tahun' => $tahun]);
    }

    public function tambahpredikat()
    {
        return view('admin.tambahpredikat');
    }

    public function tambahjeniskelamin()
    {
        return view('admin.tambahjeniskelamin');
    }

    public function lihatgrafikipk()
    {
        return view('admin.lihatgrafikipk');
    }

    public function lihatgrafikprodi()
    {
        return view('admin.lihatgrafikprodi');
    }

    public function grafikipk()
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

        return view('admin.grafikipk', compact('ipksatu','ipkdua','ipktiga','ipkempat','ipklima'));
    }

    public function grafikprodi()
    {
        $users = DB::table('ijazah')
        ->select(DB::raw('count(*) as ijazah'))->groupBy('prodi')->get();
        //dd($users);

        $prodimanajemen = DB::table('ijazah')
        ->get('prodi')
        ->where('prodi', '<=', 'Manajemen')
        ->count();

        $prodiakutansi = DB::table('ijazah')
        ->get('prodi')
        ->where('prodi', '<=', 'Akutansi')
        ->count();

        $prodisisteminformasi = DB::table('ijazah')
        ->get('prodi')
        ->where('prodi', '<=', 'Sistem Informasi')
        ->count();

        $proditeknikinformatika = DB::table('ijazah')
        ->get('prodi')
        ->where('prodi', '<=', 'Teknik Informatika')
        ->count();

        
        $prodidesainproduk = DB::table('ijazah')
        ->get('prodi')
        ->where('prodi', '<=', 'Desain Produk')
        ->count();

        $prodiarsitektur = DB::table('ijazah')
        ->get('prodi')
        ->where('prodi', '<=', 'Arsitektur')
        ->count();

        $prodibioteknologi = DB::table('ijazah')
        ->get('prodi')
        ->where('prodi', '<=', 'Bioteknologi')
        ->count();

        $prodikedokteran = DB::table('ijazah')
        ->get('prodi')
        ->where('prodi', '<=', 'Kedokteran')
        ->count();

        $proditeologi = DB::table('ijazah')
        ->get('prodi')
        ->where('prodi', '<=', 'Teologi')
        ->count();

        $prodipendidikanbahasainggris = DB::table('ijazah')
        ->get('prodi')
        ->where('prodi', '<=', 'Pendidikan Bahasa Inggris')
        ->count();

        return view('admin.grafikprodi', compact('prodimanajemen','prodiakutansi','prodisisteminformasi','proditeknikinformatika','prodidesainproduk','prodiarsitektur','prodibioteknologi','prodikedokteran','proditeologi','prodipendidikanbahasainggris'));
    }


    public function lihatIjazah($id)
    {
        $ijazah = ijazah::find($id);

        $fakultas = DB::table('fakultas')
        ->get();

        $prodi = DB::table('prodi')
        ->join('fakultas', 'fakultas.id_fakultas', '=', 'prodi.id_fakultas') 
        ->select('prodi.id_prodi','prodi.nama_prodi' , 'fakultas.id_fakultas')
        ->get();

        $tahun = DB::table('tahun')
        ->get();

        $tanggal = DB::table('tanggal')
        ->join('tahun', 'tahun.id', '=', 'tanggal.id_tahun') 
        ->select('tahun.id','tanggal.tanggal' , 'tanggal.id_tahun')
        ->get();

        $keterangan = DB::table('predikat')
        ->get();

        $jeniskelamin = DB::table('jeniskelamin')
        ->select('gender')
        ->get();


        return view('admin.edit', compact('ijazah', 'fakultas', 'prodi', 'tahun', 'tanggal', 'keterangan', 'jeniskelamin'));
    }

    
    public function createijazah(Request $request)
    {
    
        $n = $request->namaMhs;
        
        $data = new ijazah;
        if ($request->file('ijazah')) {
                $file = $request->file('ijazah');
                // $namauser = $namauser;
                $ext = $file->getClientOriginalExtension();
                // $nama_file = $namauser . "." . $file->getClientOriginalExtension();
                // $nama_file = time() . rand(100, 999) . "." . $file->getClientOriginalExtension();
                // $nama_file = date('YmdHis') . "." . $file->getClientOriginalExtension();
                $nama_file = $n . "." . $file->getClientOriginalExtension();
                $path = 'ijazah';
                $file->getMimeType();
                $file->move($path, $nama_file);
                $data->file = $nama_file;
        }

        $dataa = new ijazah;
        if ($request->file('transkrip')) {
                $file = $request->file('transkrip');
                // $namauser = $namauser;
                $ext = $file->getClientOriginalExtension();
                // $nama_file = $namauser . "." . $file->getClientOriginalExtension();
                // $nama_file = time() . rand(100, 999) . "." . $file->getClientOriginalExtension();
                // $nama_file = date('YmdHis') . "." . $file->getClientOriginalExtension();
                $nama_file = $n . "." . $file->getClientOriginalExtension();
                $path = 'transkrip';
                $file->getMimeType();
                $file->move($path, $nama_file);
                $dataa->file = $nama_file;
        }

        ijazah::create([
            
            'no_ijazah' => $request->no_ijazah,
            'nim' => $request->nim,
            'namaMhs' => $request->namaMhs,
            'jeniskelamin' => $request->jeniskelamin,
            'ipk' => $request->ipk,
            'periode' => $request->periode,
            'angkatan' => $request->angkatan,
            'prodi' => $request->prodi,
            'fakultas' => $request->fakultas,
            'tahunlulus' => $request->tahunlulus,
            'predikat' => $request->predikat,
            'ijazah' => $data->file,
            'transkrip' => $data->file,
        ]);

        return redirect('/admin/dataalumni')->with('success', 'Berhasil menambahkan data');
    }

    public function createfakultasprodi(Request $request)
    {
        fakultas::create([
            'nama_fakultas' => $request->fakultas,
        ]);

        return redirect('/admin/dataalumni')->with('success', 'Berhasil menambahkan data');
    }

    public function createprodi(Request $request)
    {
        prodi::create([
            'id_fakultas' => $request->idfakultas,
            'nama_prodi' => $request->prodi,
        ]);

        return redirect('/admin/dataalumni')->with('success', 'Berhasil menambahkan data');
    }

    public function createtahun(Request $request)
    {
        tahun::create([
            'tahun' => $request->tahun,
        ]);

        return redirect('/admin/dataalumni')->with('success', 'Berhasil menambahkan data');
    }

    public function createtanggal(Request $request)
    {
        tanggal::create([
            'id_tahun' => $request->idtahun,
            'tanggal' => $request->tanggal,
        ]);

        return redirect('/admin/dataalumni')->with('success', 'Berhasil menambahkan data');
    }


    public function createpredikat(Request $request)
    {
        predikat::create([
            'id_predikat' => $request->idpredikat,
            'keterangan' => $request->predikat,
        ]);


    return redirect('/admin/dataalumni')->with('success', 'Berhasil menambahkan data');
}

public function createjeniskelamin(Request $request)
{
    jeniskelamin::create([
        'id_jeniskelamin' => $request->idjeniskelamin,
        'gender' => $request->jeniskelamin,
    ]);


return redirect('/admin/dataalumni')->with('success', 'Berhasil menambahkan data');
}


    public function editIjazah($id, Request $request)
    {
        $n = $request->namaMhs;

        $data = new ijazah;
        if ($request->file('ijazah')) {
                $file = $request->file('ijazah');
                // $namauser = $namauser;
                $ext = $file->getClientOriginalExtension();
                // $nama_file = $namauser . "." . $file->getClientOriginalExtension();
                // $nama_file = time() . rand(100, 999) . "." . $file->getClientOriginalExtension();
                // $nama_file = date('YmdHis') . "." . $file->getClientOriginalExtension();
                $nama_file = $n . "." . $file->getClientOriginalExtension();
                $path = 'ijazah';
                $file->getMimeType();
                $file->move($path, $nama_file);
                $data->file = $nama_file;
        }

        $ijazah = ijazah::find($id);
        $ijazah->no_ijazah = $request->no_ijazah;
        $ijazah->nim = $request->nim;
        $ijazah->ipk = $request->ipk;
        $ijazah->namaMhs = $request->namaMhs;
        $ijazah->jeniskelamin = $request->jeniskelaminn;
        $ijazah->periode = $request->periode; 
        $ijazah->angkatan = $request->angkatan;
        $ijazah->prodi = $request->prodi;
        $ijazah->fakultas = $request->fakultas;
        $ijazah->tahunlulus = $request->tahunlulus;
        $ijazah->predikat = $request->predikatt;
        $ijazah->ijazah = $data->file;
        $ijazah->transkrip = $data->file;
        $ijazah->save();
            

        return redirect('/admin/dataalumni')->with('success', 'Berhasil mengubah data');
    }

    public function deleteIjazah($id)
    {
        $ijazah = ijazah::find($id);
        $ijazah->delete();
        return redirect('/admin/dataalumni')->with('success', 'Berhasil menghapus data');
    }
    public function deleteTranskrip($id)
    {
        $ijazah = transkrip::find($id);
        $ijazah->delete();
        return redirect('/admin/dataalumni')->with('success', 'Berhasil menghapus data');
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
    