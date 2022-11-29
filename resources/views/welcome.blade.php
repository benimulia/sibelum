<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <title>Welcome | SiBelum UKDW</title>
        <style>
            body{
                background-image: url("admin/img/hq720.jpg"); /* <-- ini ganti background */
                background-color: #8B0000;
                background-repeat: no-repeat;
                background-size:cover
            }
            #font{
                color: #8B0000;
                font-size: 20px;
                font-style : normal; }
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
                        <a class="nav-link active" aria-current="page" href="{{url('')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('register') }}">Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="jumbotron text-center"><br><br><br><br><br>
       <!-- <p> <h1 class="display-4"><b>SiBelum UKDW</b></h1> -->
       <br><br><br><br><br><br><br><br><br><p>
        <hr class="my-4">
        <!-- <p><font id="font">Telp. +62274563929 | Fax: +62274513235</font></p>
        <p><font id="font">Jl. dr. Wahidin Sudirohusodo no. 5-25 Yogyakarta, Indonesia – 55224</font></p> -->
        <!-- <p class="lead"><font id="font">Jl. dr. Wahidin Sudirohusodo no. 5-25 Yogyakarta, Indonesia – 55224</font></p> -->
        </section>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    </body>
</html>



