@extends('layouts.layout')

@section('head-script')
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
@endsection

@section('content')

<div class="row">
    <div class="col-sm-12 col-md-12">
        <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</a></li>
                <li class="breadcrumb-item">Admin</a></li>
                <li class="breadcrumb-item">Tambah Berkas Alumni</a></li>
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

<div class="row">
    <div class="col-sm-12 col-md-12">
        <form action="/admin/ijazah/create" class="needs-validation" novalidate method="POST" enctype="multipart/form-data">
            <input type="hidden" name="idIjazah" id="idIjazah">
            @csrf
            <div class="form-group">
                <label for="no_ijazah">No Ijazah  :</label>
                <input type="text" class="form-control" id="no_ijazah" placeholder="Masukkan No Ijazah" name="no_ijazah" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>

            <div class="form-group">
                <label for="nim">NIM  :</label>
                <input type="text" class="form-control" id="nim" placeholder="Masukkan NIM mahasiswa" name="nim" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>

            <div class="form-group">
                <label for="namaMhs">Nama  :</label>
                <input type="text" class="form-control" id="namaMhs" placeholder="Masukkan Nama Mahasiswa" name="namaMhs" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div> 

            
            <div class="form-group">
                <label for="jeniskelamin">Jenis Kelamin  :</label>
                <select name="jeniskelamin" id="jeniskelamin" class="form-select form-select-sm" aria-label=".form-select-sm example" required>
                        <option selected>-- Pilih Jenis Kelamin --</option>
                        @foreach ($jeniskelamin as $jk)
                        <option value="{{ $jk->gender }}">{{ $jk->gender }}</option>
                        @endforeach
                </select>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
                </div>
     
            <div class="form-group">
                <label for="ipk">IPK  :</label>
                <input type="text" class="form-control" id="ipk" placeholder="Masukkan ipk" name="ipk" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>

            <div class="form-group">
                <label for="angkatan">Angkatan  :</label>
                <input type="text" class="form-control" id="angkatan" placeholder="Masukkan Angkatan" name="angkatan" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>

            <div class="form-group">
                <label for="fakultas">Fakultas  :</label>
                <select name="fakultas" id="fakultas" class="form-select form-select-sm" aria-label=".form-select-sm example" required>
                        <option selected>-- Pilih Fakultas --</option>
                        @foreach ($fakultas as $f)
                        <option value="{{ $f->nama_fakultas }}">{{ $f->nama_fakultas }}</option>
                        @endforeach
                </select>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
                </div>

            <div class="form-group">
                <label for="prodi">Prodi  :</label>
                <select name="prodi" id="prodi" class="form-select form-select-sm" aria-label=".form-select-sm example" required>
                        <option selected>-- Pilih Prodi --</option>
                        @foreach ($prodi as $p)
                        <option value="{{ $p->nama_prodi }}">{{ $p->nama_prodi }}</option>
                        @endforeach

                </select>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
                </div>

            <div class="form-group">
                <label for="tahunlulus">Tahun Lulus  :</label>
                <select name="tahunlulus" id="tahunlulus" class="form-select form-select-sm" aria-label=".form-select-sm example" required>
                        <option selected>-- Pilih Tahun Lulus --</option>
                        @foreach ($tahun as $th)
                        <option value="{{ $th->tahun }}">{{ $th->tahun }}</option>
                        @endforeach
                </select>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>

            <div class="form-group">
                <label for="periode"> Periode  :</label>
                <select name="periode" id="periode" class="form-select form-select-sm" aria-label=".form-select-sm example" required>
                        <option selected>-- Pilih Periode --</option>
                        @foreach ($tanggal as $tg)
                        <option value="{{ $tg->tanggal }}">{{ $tg->tanggal }}</option>
                        @endforeach
                        
                </select>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>

            <div class="form-group">
                <label for="predikat"> Predikat  :</label>
                <select name="predikat" id="predikat" class="form-select form-select-sm" aria-label=".form-select-sm example" required>
                        <option selected>-- Pilih Predikat --</option>
                        @foreach ($predikat as $kt) 
                        <option value="{{ $kt->keterangan }}">{{ $kt->keterangan }}</option>
                        @endforeach
                </select>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>

            <div class="col">
                <label for="ijazah"><h6>Ijazah  :</h6></label>
                <br>
                <input type="file" class="form-control-file" id="ijazah" name="ijazah" required="required">
            </div>
            <br>
            <div class="col">
                <label for="transkrip"><h6>transkrip  :</h6></label>
                <br>
                <input type="file" class="form-control-file" id="transkrip" name="transkrip" required="required">
            </div>
            <br>
            <div class="col-xs-12 col-sm-12 col-md-12 ">
                <button type="submit" id="btn-save" name="btnsave" class="btn btn-primary">Submit</button>
                <a href="/admin/dataalumni" class="btn btn-danger">Cancel</a>
            </div>

        

        </form>
    </div>
</div>

@endsection

@section('footer-script')
<script type="text/javascript">

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