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


<!-- <div class="row">
<div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats">
         <div class="card-body">
            <div class="row">
               <div class="col-5 col-md-4">
                  <div class="icon-big text-center icon-warning">
                     <i class="fa fa-venus" aria-hidden="true"></i>
                  </div>
               </div>
               <div class="col-7 col-md-8">
               
                  <div class="numbers">
                     <h5> {{$perempuan}} orang </h5>
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
   </div>
    -->

<!-- 
   
<div class="col-lg-3 col-md-6 col-sm-6" style="left: 7px;">
      <div class="card card-stats">
         <div class="card-body">
            <div class="row">
               <div class="col-5 col-md-4">
                  <div class="icon-big text-center icon-warning">
                     <i class="fa fa-mars" aria-hidden="true"></i>
                  </div>
               </div>
               <div class="col-7 col-md-8">
                  <div class="numbers">
                     <h5>{{$laki_laki }} Orang</h5>
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
   <div class="col-lg-3 col-md-6 col-sm-6" style="left: 5px;">  <!-- rata kiri dashboard -->

   

      <!-- <div class="card card-stats">
         <div class="card-body">
            <div class="row">
               <div class="col-5 col-md-4">
                  <div class="icon-big text-center icon-warning">
                     <i class="fa fa-smile-o text-warning" aria-hidden="true"></i>
                  </div>
               </div>
               <div class="col-7 col-md-8">
                  <div class="numbers">
                     <h5>{{$ipktinggi }} Orang</h5>
                  </div>
               </div>
            </div>
         </div>
         <div class="card-footer">
            <hr>
            <div class="stats">
               <p><b>Jumlah IPK Tertinggi</b></p>
            </div>
         </div>
      </div>
   </div> --> 

<!--    
<div class="col-lg-3 col-md-6 col-sm-6" style="left: 7px;">
      <div class="card card-stats">
         <div class="card-body">
            <div class="row">
               <div class="col-5 col-md-4">
                  <div class="icon-big text-center icon-warning">
                     <i class="fa fa-smile-o text-warning" aria-hidden="true"></i>
                  </div>
               </div>
               <div class="col-7 col-md-8">
                  <div class="numbers">
                     <h5>{{$ipkrendah }} Orang</h5>
                  </div>
               </div>
            </div>
         </div>
         <div class="card-footer">
            <hr>
            <div class="stats">
               <p><b>Jumlah IPK Terendah</b></p>
            </div>
         </div>
      </div>
   </div>
</div> -->


   



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
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <h4>Berkas Alumni UKDW</h4>
                    </div>
                </div>
                <div class="row">
                    <!-- <div class="col-md-12 col-sm-4" style="margin-bottom:10px">
                        <td><a href="#myModal" data-toggle="modal" class="btn btn-secondary btn-md active">Print </a></td>
                        <a href="/alumni" class="btn btn-secondary btn-md active" role="button" onclick="refresh(this)"> <i class="fa fa-refresh"></i> Refresh Data </a>
                    </div> -->
                </div>
                
             
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table id="table" class="table table-striped table-bordered" style="width:100%" cellspacing="0">
                                <thead>
                                    <tr>
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
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ijazah as $index => $result)
                                    <tr>
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
                                            <a href="/alumni/openijazah/{{$result->namaMhs}}" target="_blank" class="btn btn-primary">
                                            <i class="fa fa-folder-open-o"></i></a>  <span class="glyphicon glyphicon-eye-open">
                                            </a>
                                        </td>
                                        <td>
                                            <a href="/alumni/opentranskrip/{{$result->namaMhs}}" target="_blank" class="btn btn-primary">
                                            <i class="fa fa-folder-open-o"></i></a>  <span class="glyphicon glyphicon-eye-open">
                                            </a>
                                        </td>
                                        
                                       

                                        
                                        <!-- Modal HTML -->
                                        <div id="myModal" class="modal fade">
                                            <div class="modal-dialog modal-confirm">
                                                <div class="modal-content">
                                                    <div class="modal-header flex-column">
                                                        <div class="icon-box">
                                                            <i class="material-icons">done</i>
                                                        </div>
                                                        <h4 class="modal-title w-100">Are you sure?</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Do you really want to print out these records?</p>
                                                    </div>
                                                    <div class="modal-footer justify-content-center">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js" defer></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js" defer></script>
@endsection



@section('footer-script')
<script>
    $(document).ready(function() {
        $('#table').DataTable();
    });
</script>
@endsection

