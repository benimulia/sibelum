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
                <li class="breadcrumb-item">Transaksi</a></li>
                <li class="breadcrumb-item">Add Transaksi</a></li>
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
        <form action="/pegawai/transaksi/create" class="needs-validation" novalidate method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" id="id">
            @csrf
            <div class="form-group">
                <label for="tanggaltransaksi"> tanggal transaksi  :</label>
                <input type="date" class="form-control" id="tanggaltransaksi" placeholder="Masukkan  Tanggal Transaksi .." name="tanggaltransaksi" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
      
            <div class="form-group">
                <label for="kodebarang">kode barang  :</label>
                <input type="text" class="form-control" id="kodebarang" placeholder="Masukkan Kode Barang.." name="kodebarang" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="form-group">
                <label for="namabarang">nama barang  :</label>
                <input type="text" class="form-control" id="namabarang" placeholder="Masukkan Nama barang.." name="namabarang" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="form-group">
                <label for="totalharga">total harga   :</label>
                <input type="text" class="form-control" id="totalharga" placeholder="Masukkan Total Harga  .." name="totalharga" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 ">
                <button type="submit" id="btn-save" name="btnsave" class="btn btn-primary">Submit</button>
                <a href="/pegawai/transaksi" class="btn btn-danger">Cancel</a>
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