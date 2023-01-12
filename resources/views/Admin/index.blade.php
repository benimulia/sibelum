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
<div class="row mb-4">
    <div class="col-md-12">
        <form action="/biro" method="GET">
            <div class="form-row align-items-center">
                <div class="col-auto">
                    <label for="filterprodi">Prodi</label>
                    <select name="filterprodi" id="filterprodi" class="custom-select custom-select-sm">
                        <option value="">Pilih Prodi</option>
                        @foreach($list_prodi as $prodi)
                        <option value="{{$prodi->nama_prodi}}">{{$prodi->nama_prodi}}</option>
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
                    <input type="number" class="form-control" id="filterangkatan" placeholder="Masukkan Angkatan"
                        name="filterangkatan">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
            <a href="/biro" class="btn btn-danger">Clear</a>
        </form>
    </div>
</div>
<div class="row mb-4 ml-2">
    
    <div class="col-sm-6 col-md-4 rounded p-2 mr-4" style="border: 1px solid">
        <div class="row ml-2">
            <h3>JENIS KELAMIN</h3>
        </div>
        <div class="card card-stats" style="background-color: #FF66CC !important;">
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
                <div class="stats text-center">
                    <p><b>Jumlah Alumni Perempuan</b></p>
                </div>
            </div>
        </div>
        <div class="card card-stats" style="background-color: #0066CC !important;">
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
                <div class="stats text-center">
                    <p><b>Jumlah Alumni Laki-Laki</b></p> <br>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-7 rounded p-2" style="border: 1px solid">
        <div class="row ml-2">
            <h3>PREDIKAT</h3>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card card-stats" style="background-color: #FFCC00 !important;">
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
                        <div class="stats text-center">
                            <p><b>Jumlah Alumni Predikat Baik</b></p> <br>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-stats" style="background-color: #C8A2C8 !important;">
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
                        <div class="stats text-center">
                            <p><b>Jumlah Alumni Predikat memuaskan</b></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card card-stats" style="background-color: #C4A484 !important;">
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
                        <div class="stats text-center">
                            <p><b>Jumlah Alumni Predikat Sangat Memuaskan</b></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-stats" style="background-color: #83D021 !important;">
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
                        <div class="stats text-center">
                            <p><b>Jumlah Alumni Predikat Dengan Pujian</b></p>
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