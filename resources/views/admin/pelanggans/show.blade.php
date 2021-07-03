@extends('layouts.admin.app')

@section('content')
<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="{{ route('admin.pelanggans.index') }}">Pelanggan</a>
      </li>
      <li class="breadcrumb-item active">Lihat Detail</li>
    </ol>
    <!-- Icon Cards-->
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header bg-default">
            Pelanggan Detail : {{ $pelanggan->nama }}
          </div>
          <div class="card-body">
              <table class="table table-striped table-bordered table-hover">
                  <tr>
                      <th>Nama</th>
                      <td><span class="badge badge-xs badge-primary">{{ $pelanggan->nama }}</span></td>
                  </tr>
                  <tr>
                      <th>Alamat</th>
                      <td>{{ $pelanggan->alamat }}</td>
                  </tr>
                  <tr>
                      <th>Tanggal Pemesanan</th>
                      <td>{{ $pelanggan->tgl_pemesanan }}</td>
                  </tr>
                  <tr>
                      <th>Jenis Kelamin</th>
                      <td>{{ $pelanggan->jk }}</td>
                  </tr>
                  <tr>
                      <th>Merek Perusahaan</th>
                      <td>{{ $pelanggan->perusahaan }}</td>
                  </tr>
                  <tr>
                      <th>Alamat Usaha</th>
                      <td>{{ $pelanggan->alamat_usaha }}</td>
                  </tr>
              </table>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection