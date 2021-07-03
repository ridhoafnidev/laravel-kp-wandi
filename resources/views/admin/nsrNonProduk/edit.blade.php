@extends('layouts.admin.app')

@section('content')
<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="{{ Route('admin.pelanggans.index') }}">Nilai Sewa Reklame(NSR) Non Produk</a>
      </li> 
      <li class="breadcrumb-item active">Edit</li>
    </ol>
    <!-- Icon Cards-->
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header bg-default">
            Edit (NSR) Non Produk
          </div>
          {!! Form::model($nsrN, ['route' => ['admin.nsrNonProduk.update', $nsrN->id], 'method' => 'PUT']) !!}
            @include('admin.nsrNonProduk._form')
          {!! Form::close() !!}
        </div>
      </div>
    </div>
</div>
@endsection