

@extends('layouts.admin.app')

@section('content')
<div class="container-fluid">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
        <a href="{{ url('/admin')}}">dasboard</a>
        </li>
        <li class="breadcrumb-item active">error</li>
    </ol>
    <div class="row">
        <div class="col-md-12">
        <h1>Error!</h1>
        @yield('error')
        <a href="{{ url()->previous()}}" class="btn btn-primary">Back</a>
</div>
@endsection

