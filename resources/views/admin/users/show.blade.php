@extends('layouts.admin.app')

@section('content')
<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="{{ route('admin.users.index') }}">Users</a>
      </li>
      <li class="breadcrumb-item active">Lihat Detail</li>
    </ol>
    <!-- Icon Cards-->
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header bg-default">
            User Detail : {{ $user->name }}
          </div>
          <div class="card-body">
              <table class="table table-striped table-bordered table-hover">
                  <tr>
                      <th>ID</th>
                      <td><span class="badge badge-xs badge-primary">{{ $user->id }}</span></td>
                  </tr>
                  <tr>
                      <th>Nama</th>
                      <td>{{ $user->name }}</td>
                  </tr>
                  <tr>
                      <th>E-Mail</th>
                      <td>{{ $user->email }}</td>
                  </tr>
                  <tr>
                      <th>NPWP</th>
                      <td>{{ $user->npwp }}</td>
                  </tr>
                  <tr>
                      <th>Alamat</th>
                      <td>{{ $user->alamat }}</td>
                  </tr>
                  <tr>
                      <th>Role</th>
                      <td>{{ $user->role }}</td>
                  </tr>
                  <tr>
                      <th>Avatar</th>
                      <td><img src="{{ asset($user->avatar) }}" alt="Avatar" height="150" width="150"></td>
                  </tr>
              </table>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection