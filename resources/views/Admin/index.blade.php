@extends('layouts.layout')
@section('style')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<style>
.modal-confirm {
    color: #636363;
    width: 400px;
}

.modal-confirm .modal-content {
    padding: 20px;
    border-radius: 5px;
    border: none;
    text-align: center;
    font-size: 14px;
}

.modal-confirm .modal-header {
    border-bottom: none;
    position: relative;
}

.modal-confirm h7 {
    text-align: center;
    font-size: 26px;
    margin: 30px 0 -10px;
}

.modal-confirm .close {
    position: absolute;
    top: -5px;
    right: -2px;
}

.modal-confirm .modal-body {
    color: #999;
}

.modal-confirm .modal-footer {
    border: none;
    text-align: center;
    border-radius: 5px;
    font-size: 13px;
    padding: 10px 15px 25px;
}

.modal-confirm .modal-footer a {
    color: #999;
}

.modal-confirm .icon-box {
    width: 80px;
    height: 80px;
    margin: 0 auto;
    border-radius: 50%;
    z-index: 9;
    text-align: center;
    border: 3px solid #f15e5e;
}

.modal-confirm .icon-box i {
    color: #f15e5e;
    font-size: 46px;
    display: inline-block;
    margin-top: 13px;
}

.modal-confirm .btn,
.modal-confirm .btn:active {
    color: #fff;
    border-radius: 4px;
    background: #60c7c1;
    text-decoration: none;
    transition: all 0.4s;
    line-height: normal;
    min-width: 120px;
    border: none;
    min-height: 40px;
    border-radius: 3px;
    margin: 0 5px;
}

.modal-confirm .btn-secondary {
    background: #c1c1c1;
}

.modal-confirm .btn-secondary:hover,
.modal-confirm .btn-secondary:focus {
    background: #a8a8a8;
}

.modal-confirm .btn-danger {
    background: #f15e5e;
}

.modal-confirm .btn-danger:hover,
.modal-confirm .btn-danger:focus {
    background: #ee3535;
}
</style>
@endsection

@section('content')
@if ($message = Session::get('success'))
<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    </div>
</div>
@endif
@if ($message = Session::get('fail'))
<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    </div>
</div>
@endif

<div class="row mb-4 ml-2">
    <div class="col-lg-3 border rounded p-2 mr-4">
        <div class="row ml-2">
            <h3>JENIS KELAMIN</h3>
        </div>
        <div class="card card-stats bg-danger">
            <div class="card-body">
                <div class="row">
                    <div class="col-5 col-md-4">
                        <div class="icon-big text-center icon-warning">
                            <i class="fa fa-venus" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="col-7 col-md-8">

                        <div class="numbers">
                            <h7> {{$perempuan }} Orang</h7>
                        </div>
                    </div>

                </div>
            </div>
            <div class="card-footer">
                <hr>
                <div class="stats">
                    <p><b>Jumlah Alumni Perempuan</b></p>
                </div>
            </div>
        </div>
        <div class="card card-stats bg-primary">
            <div class="card-body">
                <div class="row">
                    <div class="col-5 col-md-4">
                        <div class="icon-big text-center icon-warning">
                            <i class="fa fa-mars" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="col-7 col-md-8">
                        <div class="numbers">
                            <h7>{{$laki_laki }} Orang</h7>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <hr>
                <div class="stats">
                    <p><b>Jumlah Alumni Laki-Laki</b></p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-7 border rounded p-2">
        <div class="row ml-2">
            <h3>PREDIKAT</h3>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card card-stats bg-warning">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-warning">
                                </div>
                            </div>
                            <div class="col-7 col-md-8">

                                <div class="numbers">
                                    <h7> {{$baik }} Orang</h7>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="card-footer">
                        <hr>
                        <div class="stats">
                            <p><b>Jumlah Alumni Predikat Baik</b></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-stats bg-info">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-warning">
                                </div>
                            </div>
                            <div class="col-7 col-md-8">

                                <div class="numbers">
                                    <h7> {{$memuaskan }} Orang</h7>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="card-footer">
                        <hr>
                        <div class="stats">
                            <p><b>Jumlah Alumni Predikat memuaskan</b></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card card-stats bg-secondary">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-warning">
                                </div>
                            </div>
                            <div class="col-7 col-md-8">

                                <div class="numbers">
                                    <h7> {{$sangatmemuaskan }} Orang</h7>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="card-footer">
                        <hr>
                        <div class="stats">
                            <p><b>Jumlah Alumni Predikat Sangat Memuaskan</b></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-stats bg-success">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-warning">

                                </div>
                            </div>
                            <div class="col-7 col-md-8">

                                <div class="numbers">
                                    <h7> {{$denganpujian }} Orang</h7>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="card-footer">
                        <hr>
                        <div class="stats">
                            <p><b>Jumlah Alumni Predikat Dengan Pujian</b></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>


<div class="row">
    <div class="col-sm-12 col-md-12">
        <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Admin</a></li>
                <li class="breadcrumb-item">Ijazah </a></li>
            </ol>
        </nav>
    </div>
</div>

<div class="row">
    <div class="col-sm-12 col-md-16">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <h7>Daftar Berkas Alumni UKDW</h7>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-4" style="margin-bottom:10px">
                        <a href="/admin/tambahijazah" class="btn btn-primary btn-md active" role="button"
                            aria-pressed="true"> <i class="fa fa-plus"></i>Tambah data</a>
                        <a href="/admin/fakultasprodi" class="btn btn-primary btn-md active" role="button"> <i
                                class="fa fa-plus"></i> Tambah Fakultas</a>
                        <a href="/admin/prodi" class="btn btn-primary btn-md active" role="button"> <i
                                class="fa fa-plus"></i> Tambah Prodi</a>
                        <a href="/admin/tahun" class="btn btn-primary btn-md active" role="button"> <i
                                class="fa fa-plus"></i> Tambah Tahun </a>
                        <a href="/admin/tanggal" class="btn btn-primary btn-md active" role="button"> <i
                                class="fa fa-plus"></i> Tambah Tanggal </a>
                       
                        <!-- <a href="/admin/grafikangkatan" class="btn btn-primary btn-md active" role="button"> <i class="fa fa-plus"></i>  Lihat grafik Angkatan</a> -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <form action="/biro" method="GET">
                            <div class="form-row align-items-center">
                                <div class="col-auto">
                                    <label for="filterprodi">Prodi</label>
                                    <select name="filterprodi" id="filterprodi" class="custom-select custom-select-sm">
                                        <option value="">Pilih Prodi</option>
                                        @foreach($list_prodi as $prodi)
                                        <option value="{{$prodi->nama_prodi}}" >{{$prodi->nama_prodi}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-auto">
                                    <label for="filterpredikat">Predikat</label>
                                    <select name="filterpredikat" id="filterpredikat" class="custom-select custom-select-sm">
                                        <option value="">Pilih Predikat</option>
                                        @foreach ($predikat as $kt)
                                        <option value="{{ $kt->keterangan }}">{{ $kt->keterangan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-auto">
                                    <label for="filterperiode">Periode</label>
                                    <select name="filterperiode" id="filterperiode" class="custom-select custom-select-sm">
                                        <option value="">Pilih Periode</option>
                                        @foreach ($tanggal as $tg)
                                        <option value="{{ $tg->tanggal }}">{{ $tg->tanggal }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-auto">
                                    <label for="filterangkatan">Angkatan :</label>
                                    <input type="number" class="form-control" id="filterangkatan"
                                        placeholder="Masukkan Angkatan" name="filterangkatan">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Search</button>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table id="table" class="table table-striped table-bordered" style="width:100%"
                                cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No </th>
                                        <th>No Ijazah</th>
                                        <th>NIM</th>
                                        <th>Nama Mahasiswa</th>
                                        <th>Jenis Kelamin</th>
                                        <th>IPK</th>
                                        <th>Periode</th>
                                        <th>Angkatan</th>
                                        <th>Prodi</th>
                                        <th>Fakultas</th>
                                        <th>Tahun Lulus</th>
                                        <th>Predikat</th>
                                        <th>Ijazah</th>
                                        <th>Transkrip</th>
                                        <th data-orderable="false"></th>
                                        <th data-orderable="false"></th>
                                        <br>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ijazah as $index => $result)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{$result->no_ijazah}}</td>
                                        <td>{{$result->nim}}</td>
                                        <td>{{$result->namaMhs}}</td>
                                        <td>{{$result->jeniskelamin}}</td>
                                        <td>{{$result->ipk}}</td>
                                        <td>{{$result->periode}}</td>
                                        <td>{{$result->angkatan}}</td>
                                        <td>{{$result->prodi}}</td>
                                        <td>{{$result->fakultas}}</td>
                                        <td>{{$result->tahunlulus}}</td>
                                        <td>{{$result->predikat}}</td>


                                        <td>
                                            <a href="/admin/openijazah/{{$result->ijazah}}" target="_blank"
                                                class="btn btn-warning">
                                                <i class="fa fa-folder-open-o"></i></a> <span
                                                class="glyphicon glyphicon-eye-open">
                                                </a>
                                        </td>
                                        <td>
                                            <a href="/admin/opentranskrip/{{$result->transkrip}}" target="_blank"
                                                class="btn btn-warning">
                                                <i class="fa fa-folder-open-o"></i></a> <span
                                                class="glyphicon glyphicon-eye-open">
                                                </a>
                                        </td>
                                        <td><a href="/admin/ijazah/edit/{{ $result->id_ijazah }}"
                                                class="btn btn-success"> <i class="fa fa-pencil"></i></a>
                                        </td>
                                        </td>
                                        <td><a href="/admin/ijazah/delete/{{ $result->id_ijazah }}"
                                                class="btn btn-danger"> <i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" language="javascript"
    src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js" defer></script>
<script type="text/javascript" language="javascript"
    src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js" defer></script>
@endsection



@section('footer-script')
<script>
$(document).ready(function() {
    $('#table').DataTable();
});
</script>
@endsection