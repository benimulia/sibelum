@extends('layouts.layoutalumni')
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

.modal-confirm h4 {
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


<div class="row">
    <div class="col-sm-12 col-md-12">
        <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Alumni</a></li>
                <li class="breadcrumb-item">Profil</a></li>
            </ol>
        </nav>
    </div>
</div>
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
<div class="row">
    <div class="col-sm-12 col-md-12">

        @if(is_null($ijazah))
        <p>Belum Ada Ijazah. Hubungi Administrator</p>
        @else
        <a href="/alumni/openijazah/{{$ijazah->ijazah}}" class="btn btn-info">Lihat Ijazah</a>
        <a href="/alumni/opentranskrip/{{$ijazah->transkrip}}" class="btn btn-info">Lihat Transkrip</a>
        <hr>
        <form action="/alumni/edit/{{$user->id}}" class="needs-validation" novalidate method="POST"
            enctype="multipart/form-data" onsubmit="return confirm('Apakah anda yakin untuk mengubah data?');">
            @csrf
            <div class="form-group">
                <label for="no_ijazah">No Ijazah :</label>
                <input type="text" class="form-control" id="no_ijazah" name="no_ijazah" value="{{$ijazah->no_ijazah}}"
                    disabled>
            </div>
            <div class="form-group">
                <label for="nim">NIM :</label>
                <input type="text" class="form-control" id="nim" name="nim" value="{{$ijazah->nim}}" disabled>
            </div>
            <div class="form-group">
                <label for="nama">Nama :</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{$ijazah->namaMhs}}" disabled>
            </div>
            <div class="form-group">
                <label for="ipk">IPK :</label>
                <input type="text" class="form-control" id="ipk" name="ipk" value="{{$ijazah->ipk}}" disabled>
            </div>
            <div class="form-group">
                <label for="periode">Periode :</label>
                <input type="text" class="form-control" id="periode" name="periode" value="{{$ijazah->periode}}"
                    disabled>
            </div>
            <div class="form-group">
                <label for="angkatan">Angkatan :</label>
                <input type="text" class="form-control" id="angkatan" name="angkatan" value="{{$ijazah->angkatan}}"
                    disabled>
            </div>
            <div class="form-group">
                <label for="prodi">Prodi :</label>
                <input type="text" class="form-control" id="prodi" name="prodi" value="{{$ijazah->prodi}}" disabled>
            </div>
            <div class="form-group">
                <label for="fakultas">Fakultas :</label>
                <input type="text" class="form-control" id="fakultas" name="fakultas" value="{{$ijazah->fakultas}}"
                    disabled>
            </div>
            <div class="form-group">
                <label for="tahunlulus">Th Lulus :</label>
                <input type="text" class="form-control" id="tahunlulus" name="tahunlulus"
                    value="{{$ijazah->tahunlulus}}" disabled>
            </div>
            <div class="form-group">
                <label for="predikat">Predikat :</label>
                <input type="text" class="form-control" id="predikat" name="predikat" value="{{$ijazah->predikat}}"
                    disabled>
            </div>
            <div class="form-group">
                <label for="no_telp">No Telp :</label>
                <input type="text" class="form-control" id="no_telp" placeholder="Masukkan nomor handphone"
                    name="no_telp" value="{{$user->no_hp}}">
            </div>
            <div class="form-group">
                <label for="email">Email :</label>
                <input type="email" class="form-control" id="email" placeholder="Masukkan email" name="email"
                    value="{{$user->email}}">
            </div>
            <div class="form-group">
                <label for="alamat">Alamat :</label>
                <input type="text" class="form-control" id="alamat" placeholder="Masukkan alamat" name="alamat"
                    value="{{$user->alamat}}">
            </div>
            <br>
            <button type="submit" id="btn-save" name="btnsave" class="btn btn-primary">Ubah Data</button>

        </form>
        <hr>

        @endif
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