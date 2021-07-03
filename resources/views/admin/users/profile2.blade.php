@extends('layouts.admin.app')

<?php
$role='author';
if (Auth::user()->role == $role) {
?>
@section('content')
<div class="container-fluid">
    
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                Profile Anda
                </div>
                <div class="card-body">
              <table class="table table-striped table-bordered table-hover">
                  <tr>
                      <th>ID</th>
                      <td><span class="badge badge-xs badge-primary">{{ Auth::user()->id }}</span></td>
                  </tr>
                  <tr>
                      <th>Nama</th>
                      <td>{{ Auth::user()->name }}</td>
                  </tr>
                  <tr>
                      <th>E-Mail</th>
                      <td>{{ Auth::user()->email }}</td>
                  </tr>
                  <tr>
                      <th>NPWP</th>
                      <td>{{ Auth::user()->npwp }}</td>
                  </tr>
                  <tr>
                      <th>Alamat</th>
                      <td>{{ Auth::user()->alamat }}</td>
                  </tr>
              </table>
          </div>
            </div>
        </div>
    </div>
    </div>
@endsection
<?php
}
?>

