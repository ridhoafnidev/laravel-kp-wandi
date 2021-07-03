@extends('layouts.admin.app')

@section('assets-top')
    <!-- Page level plugin CSS-->
    <link href="{{ asset('assets/blog-admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <!-- Responsive datatable examples -->
    <link href="{{ asset('assets/blog-admin/vendor/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Data Master</a>
          </li>
          <li class="breadcrumb-item active">Tabel Bukti Pembayaran</li>
        </ol>
        @if(Session::has('success'))
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{ Session::get('success') }}
            </div>
        @endif
        <!-- Example DataTables Card-->
    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-list"></i> Bukti Pembayaran
        <a href="{{ route('admin.pembayaran.create')}}" class="btn btn-sm btn-primary">Tambah</a>
      </div>
      <div class="card-body table-responsive">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>ID Pembayaran</th>
                <th>ID Reklame</th>
                <th>Pemesan</th>
                <th>Deskripsi</th>
                <th>Bukti Pembayaran</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tfoot>
                <tr>
                <th>ID Pembayaran</th>
                <th>ID Reklame</th>
                <th>Pemesan</th>
                <th>Deskripsi</th>
                <th>Bukti Pembayaran</th>
                <th>Aksi</th>
              </tr>
            </tfoot>
            <tbody>
            
            </tbody>
          </table>
        </div>
      </div>
    </div>
    </div>
@endsection

@section('assets-bottom')
    <!-- Page level plugin JavaScript-->
    <script src="{{ asset('assets/blog-admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/blog-admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <!-- Responsive examples -->
    <script src="{{ asset('assets/blog-admin/vendor/datatables/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/blog-admin/vendor/datatables/responsive.bootstrap4.min.js') }}"></script>
    <script>
        $(document).ready(function(){
            $("#dataTable").DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('api.datatable.pembayaran') }}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'reklame_id', name: 'reklame_id'},
                    {data: 'user', name: 'user' },
                    {data: 'deskripsi', name: 'deskripsi' },
                    {data: 'bukti_pembayaran', name: 'bukti_pembayaran'}, 
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            })
        });
    </script>
@endsection