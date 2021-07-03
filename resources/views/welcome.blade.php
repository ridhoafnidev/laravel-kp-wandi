<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                /* background-image: url("coba.jpg"); */
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <img src="{{ asset('images/a.png') }}" height="100" width="70">
                <!-- <img src="../../../public/assets/images/a.png" height="100" width="70"> -->
                <h1>
                   Selamat Datang </h1>
                   <h2>
                   Di Sistem Informasi Pengolahan Data Surat Ketetapan Pajak Daerah (SKPD) Pajak Reklame 
                   </h2>
                </h1>
                <h3>Bapenda Kabupaten Rokan Hilir</h3>
				
				<div class="row">
                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <b>VISI</b>
                        </div>
                        <div class="panel-body">
                            <p>Visi Badan Pendapatan Daerah Kabupaten Rokan Hilir adalah "Menjadi Pengelola Pendapatan yang Amanah Dan Profesional <br> dalam Mewujudkan tatakelola Pemerintahan yang baik dan bersih serta Pelayanan Publik yang Handal</p>
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            MISI
                        </div>
                        <div class="panel-body">
                            <p>Misi yang dirumuskan untuk mencapai Visi Badan Pendapatan Daerah Kabupaten Rokan Hilir adalah:<br>
1. Mengoptimalkan Pengelolaan sumber-sumber Pendapatan Daerah.<br>
2. Terwujudnya pelayanan yang baik dan prima.</p>
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
            </div>
			
        </div>
    </body>
</html>
