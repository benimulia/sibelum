@extends('layouts.layout')

@section('head-script')
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
@endsection

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
        border: 3px solid #60d84b;
    }

    .modal-confirm .icon-box i {
        color: #60d84b;
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
        background: #60d84b;
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
                <li class="breadcrumb-item">Home</a></li>
                <li class="breadcrumb-item">Ijazah</a></li>
                <li class="breadcrumb-item">Lihat Ijazah</a></li>
            </ol>
        </nav>
    </div>
</div>
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
<div class="row" style="margin-bottom: 30px;">
    <div class="col-sm-12 col-md-12">
        <button class="btn btn-info" onclick="enableInput();">Edit Data</button>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 col-md-12">
        <form action="/admin/ijazah/edit/{{$ijazah->id_ijazah}}" class="needs-validation" novalidate method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="no_ijazah">No Ijazah :</label>
                <input type="text" class="form-control" id="no_ijazah" placeholder="Masukkan No Ijazah" name="no_ijazah" required value="{{$ijazah->no_ijazah}}" disabled=true>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="form-group">
                <label for="nim">NIM :</label>
                <input type="int" class="form-control" id="nim" placeholder="Masukkan NIM" name="nim" required value="{{$ijazah->nim}}" disabled=true>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="form-group">
                <label for="namaMhs"> Nama Mahasiswa   :</label>
                <input type="text" class="form-control" id="namaMhs" placeholder="Masukkan Nama Mahasiswa" name="namaMhs" required value="{{$ijazah->namaMhs}}" disabled=true>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>

                
            <div class="form-group">
                <label for="jeniskelamin">Jenis Kelamin :</label>
                <input type="text" class="form-control" id="jeniskelamin" placeholder="Masukkan jeniskelamin" name="jeniskelamin" required value="{{$ijazah->jeniskelamin}}" disabled=true>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
                <br>
                <select name="jeniskelaminn" id="jeniskelaminn" class="form-select form-select-sm" aria-label=".form-select-sm example" required value="{{$ijazah->jeniskelamin}}" disabled=true>
                        <option selected>-- Pilih jeniskelamin --</option>
                        @foreach ($jeniskelamin as $jeniskelamin)
                        <option value="{{ $jeniskelamin->gender }}">{{ $jeniskelamin->gender }}</option>
                        @endforeach

                </select>
            </div>
        

            <div class="form-group">
                <label for="ipk"> IPK   :</label>
                <input type="text" class="form-control" id="ipk" placeholder="Masukkan ipk Mahasiswa" name="ipk" required value="{{$ijazah->ipk}}" disabled=true>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
                
            </div>

            <div class="form-group">
            <label for="angkatan"> Angkatan   :</label>
                <input type="text" class="form-control" id="angkatan" placeholder="Masukkan angkatan Mahasiswa" name="angkatan" required value="{{$ijazah->angkatan}}" disabled=true>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
           
            <div class="form-group">
                <label for="prodi">Prodi :</label>
                <input type="text" class="form-control" id="prodi1" placeholder="Masukkan Prodi" name="prodi" required value="{{$ijazah->prodi}}" disabled=true>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
                <br>
                <select name="prodi" id="prodi" class="form-select form-select-sm" aria-label=".form-select-sm example" required value="{{$ijazah->prodi}}" disabled=true>
                        <option selected>-- Pilih Prodi --</option>
                        @foreach ($prodi as $p)
                        <option value="{{ $p->nama_prodi }}">{{ $p->nama_prodi }}</option>
                        @endforeach

                </select>
            </div>
        
            <div class="form-group">
                <label for="fakultas">Fakultas :</label>
                <input type="int" class="form-control" id="fakultas1" placeholder="Masukkan Fakultas" name="fakultas" required value="{{$ijazah->fakultas}}" disabled=true>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
                <br>
                <select name="fakultas" id="fakultas" class="form-select form-select-sm" aria-label=".form-select-sm example" required  value="{{$ijazah->fakultas}}" disabled=true>
                        <option selected>-- Pilih Fakultas --</option>
                        @foreach ($fakultas as $f)
                        <option value="{{ $f->nama_fakultas }}">{{ $f->nama_fakultas }}</option>
                        @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="tahunlulus">Tahun Lulus  :</label>
                <input type="text" class="form-control" id="tahunlulus1" placeholder="Masukkan Tahun Lulus" name="tahunlulus" required value="{{$ijazah->tahunlulus}}" disabled=true>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
                <br>
                <select name="tahunlulus" id="tahunlulus" class="form-select form-select-sm" aria-label=".form-select-sm example" required value="{{$ijazah->tahunlulus}}" disabled=true>   
                        <option selected>-- Pilih Tahun Lulus --</option>
                        @foreach ($tahun as $th)
                        <option value="{{ $th->tahun }}">{{ $th->tahun }}</option>
                        @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="periode"> Periode   :</label>
                <input type="text" class="form-control" id="periode1" placeholder="Masukkan Periode Lulus Mahasiswa" name="periode" required value="{{$ijazah->periode}}" disabled=true>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
                <br>
                <select name="periode" id="periode" class="form-select form-select-sm" aria-label=".form-select-sm example" required value="{{$ijazah->periode}}" disabled=true>
                        <option selected>-- Pilih Periode --</option>
                        @foreach ($tanggal as $tg)
                        <option value="{{ $tg->tanggal }}">{{ $tg->tanggal }}</option>
                        @endforeach
                        
                </select>
            </div>

            <div class="form-group">
                <label for="predikat">Predikat :</label>
                <input type="text" class="form-control" id="predikat" placeholder="Masukkan predikat" name="predikat" required value="{{$ijazah->predikat}}" disabled=true>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
                <br>
                <select name="predikatt" id="predikatt" class="form-select form-select-sm" aria-label=".form-select-sm example" required value="{{$ijazah->predikat}}" disabled=true>
                        <option selected>-- Pilih predikat --</option>
                        @foreach ($keterangan as $keterangan)
                        <option value="{{ $keterangan->keterangan }}">{{ $keterangan->keterangan }}</option>
                        @endforeach

                </select>
            </div>

            <div class="form-group">
                <label for="ijazah">Ijazah :</label>
                <input type="int" class="form-control" id="ijazah1" placeholder="Masukkan ijazah" name="ijazah" required value="{{$ijazah->ijazah}}" disabled=true>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="col">
                <label for="ijazah"><h6>Ijazah  :</h6></label>
                <br>
                <input type="file" class="form-control-file" id="ijazah" name="ijazah" required="required" disabled=true>
            </div>
            <br>
            <!-- <div class="col-xs-12 col-sm-12 col-md-12 ">
                <button type="submit" id="btn-save" name="btnsave" class="btn btn-primary">Submit</button>
                <a href="/admin/dataalumni" class="btn btn-danger">Cancel</a>
            </div>   -->
            <div class="form-group">
                <label for="transkrip">Transkrip :</label>
                <input type="int" class="form-control" id="transkrip1" placeholder="Masukkan transkrip" name="ijazah" required value="{{$ijazah->transkrip}}" disabled=true>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="col">
                <label for="transkrip"><h6>Transkrip  :</h6></label>
                <br>
                <input type="file" class="form-control-file" id="transkrip" name="transkrip" required="required" disabled=true>
            </div>
            <br>
            <div class="col-xs-12 col-sm-12 col-md-12 ">
                <button type="submit" id="btn-save" name="btnsave" class="btn btn-primary">Submit</button>
                <a href="/admin/dataalumni" class="btn btn-danger">Cancel</a>
            </div>  

           
            <!-- Modal HTML -->
            <div id="myModal" class="modal fade">
                <div class="modal-dialog modal-confirm">
                    <div class="modal-content">
                        <div class="modal-header flex-column">
                            <div class="icon-box">
                                <i class="material-icons">done</i>
                            </div>
                            <h4 class="modal-title w-100">Mengedit?</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">
                            <p>Apakah kamu yakin ingin mengedit data ini?</p>
                        </div>
                        <div class="modal-footer justify-content-center">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">TIDAK</button>
                            <button type="submit" class="btn btn-success">YA</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection

@section('footer-script')
<script type="text/javascript">
    function enableInput() {
        document.getElementById("no_ijazah").disabled = false;
        document.getElementById("nim").disabled = false;
        document.getElementById("jeniskelaminn").disabled = false;
        document.getElementById("ipk").disabled = false;
        document.getElementById("namaMhs").disabled = false;
        document.getElementById("periode").disabled = false;
        document.getElementById("angkatan").disabled = false;
        document.getElementById("prodi").disabled = false;
        document.getElementById("fakultas").disabled = false;
        document.getElementById("tahunlulus").disabled = false;
        document.getElementById("predikatt").disabled = false;
        document.getElementById("ijazah").disabled = false;
        document.getElementById("transkrip").disabled = false;

        $("#btnUpdate").css("display", "");
    }

    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                        $('#myModal').modal('hide');
                        $("html, body").animate({
                            scrollTop: 0
                        }, "slow");
                        form.classList.add('was-validated');
                        return false;
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();

</script>
@endsection