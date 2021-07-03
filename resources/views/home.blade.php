@extends('layouts.admin.app')

<?php
$role='admin';
if (Auth::user()->role == $role) {
?>
@section('content')
<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">My Dashboard</li>
    </ol>
    <!-- Icon Cards-->
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
                <div class="card-body">
                    <div class="mr-5">{{ $hitunguser}} Pengguna</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="{{route('admin.users.index')}}">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                        <i class="fa fa-angle-right"></i>
                    </span>
                </a>
            </div>           
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
             <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                    <div class="mr-5">{{$hitungreklame}} Izin Reklame</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="{{route('admin.reklame.index')}}">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                        <i class="fa fa-angle-right"></i>
                    </span>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
             <div class="card text-white bg-danger o-hidden h-100">
                <div class="card-body">
                    <div class="mr-5">{{$hitungreklame2}} Izin Reklame</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                        <i class="fa fa-angle-right"></i>
                    </span>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
             <div class="card text-white bg-warning o-hidden h-100">
                <div class="card-body">
                    <div class="mr-5">26 Izin Reklame</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                        <i class="fa fa-angle-right"></i>
                    </span>
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                Dashboard
                </div>
                <div class="card-body">
                    <h5 class="card-title">Selamat Datang<b> {{ Auth::user()->name }}<b></h5>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
<?php
}
?>

<?php
$role='author';
if (Auth::user()->role == $role) {
?>
@section('content')
<div class="container-fluid">
    
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                Dashboard
                </div>
                <div class="card-body">
                    <h5 class="card-title">Selamat Datang<b> {{ Auth::user()->name }}<b></h5>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
<?php
}
?>
