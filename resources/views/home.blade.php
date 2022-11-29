<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <title>Alumni | SiBelum UKDW</title>
        <style>
            body{
                background-image: url("image/alumni.jpg");
                background-color: #8B0000;
                background-repeat: no-repeat;
                background-size:cover
            }
            #font{
                color: #8B0000;
                font-size: 50px;
                font-style : normal;
            }
            #h{
                color: #8B0000;
                font-size: 20px;
                font-style : normal;
            }
        </style>
    </head>

    <body class="antialiased">

    <nav class="navbar navbar-expand-lg navbar-light shadow-sm" style="background-color: #FFA500" >
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ Auth::user()->level }}">
                            {{ Auth::user()->name }}
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"> Log Out
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <section class="jumbotron text-center"><br>
    <img src="{{ asset('admin/img/UKDW1.png') }}" style="width:200px;height:200px;">
    <br><br>
        <div class="container">
        <div class="row justify-content-center">
                    <div class="card-header"><font id="font">SISTEM INFORMASI BERKAS ALUMNI <BR> (SIBELUM)</font></div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <font id="h">You are logged in!</font>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </section>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    </body>

</html>