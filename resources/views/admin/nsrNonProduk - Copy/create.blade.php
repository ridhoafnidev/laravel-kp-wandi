@extends('layouts.admin.app')

@section('content')
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="{{ Route('admin.nsrNonProduk.index') }}">Nilai Sewa Reklame (NSR) Non Produk</a>
          </li>
          <li class="breadcrumb-item active">Tambah Baru</li>
        </ol>
        <!-- Icon Cards-->
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header text-bold bg-default">
                Tambah (NSR) Non Produk Baru
              </div>
              {!! Form::open(['route' => 'admin.nsrNonProduk.store', 'method' => 'POST']) !!}
                @include('admin.nsrNonProduk._form')
              {!! Form::close() !!}
            </div>
          </div>
        </div>
    </div>
@endsection
