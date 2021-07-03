@extends('layouts.admin.app')

@section('content')
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="{{ Route('admin.reklame.index') }}">Sewa Reklame</a>
          </li>
          <li class="breadcrumb-item active">Tambah Baru</li>
        </ol>
        <!-- Icon Cards-->
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header text-bold bg-default">
                Tambah Sewa Reklame Baru
              </div>
              {!! Form::open(['route' => 'admin.reklame.store', 'method' => 'POST']) !!}
                @include('admin.reklame._form2')
              {!! Form::close() !!}
            </div>
          </div>
        </div>
    </div>
@endsection
