@extends('layouts.admin.app')

@section('content')
<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="{{ route('admin.jenisLokasi.index') }}">Jenis Lokasi</a>
      </li>
      <li class="breadcrumb-item active">Lihat Detail</li>
    </ol>
    <!-- Icon Cards-->
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header bg-default">
            Pelanggan Detail : {{ $jenisLokasi->jenis_lokasi }}
          </div>
          <div class="card-body">
              <table class="table table-striped table-bordered table-hover">
                  <tr>
                      <th>ID</th>
                      <td><span class="badge badge-xs badge-primary">{{ $jenisLokasi->id }}</span></td>
                  </tr>
                  <tr>
                      <th>Alamat</th>
                      <td>{{ $jenisLokasi->jenis_lokasi }}</td>
                  </tr>
              </table>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection