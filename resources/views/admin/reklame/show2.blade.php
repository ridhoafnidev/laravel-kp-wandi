@extends('layouts.admin.app')

@section('content')
<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="{{ route('admin.reklame.index') }}">Nilai Sewa Reklame</a>
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
                    <th>Pelanggan</th>
                    <td>{{ $reklame->user->name }}</td>
                  </tr>
                  <tr>
                      <th>Lokasi</th>
                      <td>{{ $reklame->lokasi->jenis_lokasi }}</td>
                  </tr>
                  <tr>
                      <th>Alamat Lokasi</th>
                      <td>{{ $reklame->alamat }}</td>
                  </tr>
                  <tr>
                      <th>Jenis Reklame</th>
                      <td>{{ $reklame->jenis }}</td>
                  </tr>
				  <tr>
                      <th>Pajak & Retribusi Daerah</th>
                      <td>{{ $reklame->des_jenis }}</td>
                  </tr>
                  <tr>
                      <th>Panjang Reklame</th>
                      <td>{{ $reklame->panjang }} Meter</td>
                  </tr>
                  <tr>
                      <th>Lebar Reklame</th>
                      <td>{{ $reklame->lebar }} Meter</td>
                  </tr>
                  <tr>
                      <th>Qty(Jumlah)</th>
                      <td>{{ $reklame->qty }} Buah</td>
                  </tr>
                  <tr>
                      <th>Jangka Waktu</th>
                      <td>{{ $reklame->jangka_waktu }} Hari</td>
                  </tr>
                  <tr>
                      <th>Nilai Sewa Reklame (NSR) (Rp.)</th>
                      <td>Rp. {{ $reklame->nsr }}</td>
                  </tr>
                  <?php 
                    $a = $reklame['lebar'];
                    $b = $reklame['panjang'];
                    $c = $reklame['qty'];
                    $d = $reklame['nsr'];
					$e = $reklame['jangka_waktu'];

                    $luas = $a * $b;
                    $pajak = 10/100;
            
                    $hasil = $luas *$c*$d * $e *$pajak;
                    ?>
                  <tr>
                      <th>Total Pajak Reklame(Rp.)</th>
                      <td><span class="badge badge-xs badge-primary"> Rp. {{ $hasil }} ,- </span></td>
                  </tr>
                  <tr>
                      <th>Status Reklame</th>
                      <td><i>{{ $reklame->status }}</i></td>
                  </tr> 
                  <tr>
                      <th><i><span class="badge badge-xs badge-danger"> NB:</span></i></th>
                      <?php 
                      $status = $reklame['status'];
                      
                      if($status == "Sedang diproses"){ ?>
                        <th>
                        <i>
                        " Silahkan selesaikan pemesanan reklame anda dengan transfer ke rekening kami: "<br>
                        Total : Rp. {{ $hasil }}, - <br>
                        Bank          : BRI Syariah<br>
                        A/N           : Bapeda Rohil<br>
                        No. Rekening  : 7010-01-018531-53-0<br>
                        </i>
                        </th>
                      <?php 
                      }
                      ?>
                      <?php 
                      if($status == "Berhasil diterima"){
                      ?>
                      <th>
                        <i>
                            Selamat Pemesanan anda sudah selesai, silahkan datang ke kantor Bapenda Rohil<br>
                        </i>
                     </th>
                      <?php
                      }
                      ?>
                      
                  </tr> 
              </table>
             
          </div>
        </div>
      </div>
    </div>
</div>
@endsection