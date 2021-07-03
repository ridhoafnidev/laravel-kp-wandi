@extends('layouts.admin.app')

@section('content')
<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="{{ Route('admin.pembayaran.index') }}">Buki pembayaran</a>
      </li> 
      <li class="breadcrumb-item active">Edit</li>
    </ol>
    <!-- Icon Cards-->
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header bg-default">
            Edit User
          </div>
          {!! Form::model($pembayaran, ['route' => ['admin.pembayaran.update', $pembayaran->id], 'method' => 'PUT']) !!}
            @include('admin.pembayaran._form2')
          {!! Form::close() !!}
        </div>
      </div>
    </div>
</div>
@endsection