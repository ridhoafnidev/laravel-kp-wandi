@extends('layouts.admin.app')

@section('content')
<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="#">Bukti Pembayaran Reklame</a>
      </li>
      <li class="breadcrumb-item active">Lihat Detail</li>
    </ol>
    <!-- Icon Cards-->
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header bg-default">
            Bukti Pembayaran
          </div>
          <div class="card-body">
              <table class="table table-striped table-bordered table-hover">
                  <tr>
                      <th>ID Reklame</th>
                      <td>{{ $pembayaran->reklame_id }}</td>
                  </tr>
                  <tr>
                      <th>Deskripsi</th>
                      <td>{!! $pembayaran->deskripsi !!}</td>
                  </tr>
                  <tr>
                      <th>Bukti Pembayaran</th>
                      <td><img src="{{ asset($pembayaran->bukti_pembayaran) }}" alt="Featured Image" height="150" width="150"></td>
                  </tr>
              </table>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection