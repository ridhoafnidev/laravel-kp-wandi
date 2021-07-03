@extends('layouts.admin.app')

@section('content')
<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="{{ Route('admin.nsrProduk.index') }}">Nilai Sewa Reklame(NSR) Produk</a>
      </li> 
      <li class="breadcrumb-item active">Edit</li>
    </ol>
    <!-- Icon Cards-->
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header bg-default">
            Edit (NSR) Produk
          </div>
          {!! Form::model($nsr, ['route' => ['admin.nsrProduk.update', $nsr->id], 'method' => 'PUT']) !!}
            @include('admin.nsrProduk._form')
          {!! Form::close() !!}
        </div>
      </div>
    </div>
</div>
@endsection