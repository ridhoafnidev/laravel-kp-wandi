@extends('layouts.admin.app')

@section('content')
<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="{{ route('admin.nsrNonProduk.index') }}">Nilai Sewa Reklame (NSR) Non Produk</a>
      </li>
      <li class="breadcrumb-item active">Lihat Detail</li>
    </ol>
    <!-- Icon Cards-->
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header bg-default">
            (Nilai Sewa Reklame) NSR Detail :
          </div>
          <div class="card-body">
              <table class="table table-striped table-bordered table-hover">
                  <tr>
                      <th>Lokasi</th>
                      <td><span class="badge badge-xs badge-primary">{{ $nsrNonProduk->lokasi->jenis_lokasi }}</span></td>
                  </tr>
                  <tr>
                      <th>Ukuran</th>
                      <td>{{ $nsrNonProduk->ukuran }} Meter</td>
                  </tr>
                  <tr>
                      <th>Jangka Waktu</th>
                      <td>{{ $nsrNonProduk->jangka_waktu }} Hari</td>
                  </tr>
                  <tr>
                      <th>Ketinggian Reklame</th>
                      <td>s.d {{ $nsrNonProduk->ketinggian }} Meter</td>
                  </tr>
                  <tr>
                      <th>NSR(Rp.)</th>
                      <td>Rp. {{ $nsrNonProduk->nsr }}</td>
                  </tr>
              </table>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection