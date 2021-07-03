@extends('layouts.admin.app')

<?php
$role='author';
if (Auth::user()->role == $role) {
?>
@section('content')
<div class="container-fluid">

    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ Route('profile') }}">Profil</a>
        </li>
        <li class="breadcrumb-item active">Edit</li>
    </ol>
<form action="{{ route('update2', $profile->id) }}" method="POST">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="PUT">
    <div class="card-body">
    <div class="form-group">
        <label for="name">Nama Lengkap</label>
		<input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name', $profile->name) }}" autofocus>
        <!-- {!! Form::text('name', null, ['class' => $errors->has('name') ? 'form-control is-invalid' : 'form-control', 'required', 'autofocus']) !!} -->
        @if ($errors->has('name'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group">
        <label for="email">Email</label>
		<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email', $profile->email) }}">
        <!-- {!! Form::email('email', null, ['class' => $errors->has('email') ? 'form-control is-invalid' : 'form-control', 'required']) !!} -->
        @if ($errors->has('email'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group">
        <label for="npwp">NPWP</label>
        <input type="text"  name="npwp" value="{{ old('npwp', $profile->npwp) }}" class="form-control">

        <!-- {!! Form::text('npwp', null, ['class' => $errors->has('npwp') ? 'form-control is-invalid' : 'form-control',  'autofocus']) !!} -->
        @if ($errors->has('npwp'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('npwp') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group">
        <label for="alamat">Alamat</label>
        <input type="text" name="alamat" value="{{ old('alamat', $profile->alamat) }}" class="form-control">

        <!-- {!! Form::text('alamat', null, ['class' => $errors->has('alamat') ? 'form-control is-invalid' : 'form-control',  'autofocus']) !!} -->
        @if ($errors->has('alamat'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('alamat') }}</strong>
            </span>
        @endif
    </div>
  
    <div class="form-group">
        <label for="role">Role</label>
        <!-- {!! Form::select('role', ['admin' => 'Admin', 'author' => 'Author'], null, ['class' => $errors->has('role') ? 'form-control is-invalid' : 'form-control', 'required']) !!} -->
        <input type="text" name="role" value="{{ $profile->role }}" class="form-control" readonly>
        
        @if ($errors->has('role'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('role') }}</strong>
            </span>
        @endif
    </div>
    </div>
    <div class="card-footer bg-transparent">
    <button class="btn btn-primary" type="submit">
        Submit
    </button>
</div>
</form>

@section('assets-bottom')
    <script src="{{ asset('vendor/unisharp/laravel-filemanager/public/js/lfm.js') }}"></script>
    <script>
        $(document).ready( function () {
            $('#lfm').filemanager('image');
        });
    </script>
@endsection


</div>
@endsection
<?php
}
?>

