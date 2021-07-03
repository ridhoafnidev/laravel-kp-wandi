@extends('layouts.admin.app')

@section('content')
<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="{{ Route('admin.reklame.index') }}">Reklame</a>
      </li> 
      <li class="breadcrumb-item active">Ubah Status </li>
    </ol>
    <!-- Icon Cards-->
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header bg-default">
            Edit User
          </div>
          {!! Form::model($reklame, ['route' => ['admin.reklame.update', $reklame->id], 'method' => 'PUT']) !!}
            @include('admin.reklame._formEditAdmin')
          {!! Form::close() !!}
        </div>
      </div>
    </div>
</div>
@endsection