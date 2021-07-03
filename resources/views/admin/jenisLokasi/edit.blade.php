@extends('layouts.admin.app')

@section('content')
<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="{{ Route('admin.jenisLokasi.index') }}">Jenis Lokasi</a>
      </li> 
      <li class="breadcrumb-item active">Edit</li>
    </ol>
    <!-- Icon Cards-->
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header bg-default">
            Edit Jenis Lokasi
          </div>
          {!! Form::model($jenisLokasi, ['route' => ['admin.jenisLokasi.update', $jenisLokasi->id], 'method' => 'PUT']) !!}
            @include('admin.jenisLokasi._form')
          {!! Form::close() !!}
        </div>
      </div>
    </div>
</div>
@endsection