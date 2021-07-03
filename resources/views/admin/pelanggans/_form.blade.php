@section('assets-top')

<link href="{{ asset('assets/blog-admin/vendor/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
<script src="{{ asset('assets/blog-admin/vendor/tinymce/tinymce.min.js') }}"></script>

@endsection
<div class="card-body">
    <div class="form-group">
        <label for="nama">Nama Lengkap</label>
        {!! Form::text('nama', null, ['class' => $errors->has('nama') ? 'form-control is-invalid' : 'form-control', 'required', 'autofocus']) !!}
        @if ($errors->has('nama'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('nama') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group">
        <label for="alamat">Alamat</label>
        {!! Form::textarea('alamat', null, ['id' => 'textarea', 'class' => $errors->has('alamat') ? 'form-control is-invalid' : 'form-control', 'required']) !!}
        @if ($errors->has('alamat'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('alamat') }}</strong>
            </span>
        @endif
    </div>
    
    <div class="form-group">
        <label for="tgl_pemesanan">Tanggal Pemesanan</label>
        {!! Form::text('tgl_pemesanan', date("Y-m-d H:i:s"), ['id' => 'datetime', 'class' => $errors->has('tgl_pemesanan') ? 'form-control is-invalid' : 'form-control']) !!}
                    @if ($errors->has('tgl_pemesanan'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('tgl_pemesanan') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group">
        <label for="jk">Jenis Kelamin</label>
        {!! Form::select('jk',['LK' => 'Laki-Laki', 'PR' => 'Perempuan'], null, ['class' => $errors->has('jk') ? 'form-control is-invalid' : 'form-control']) !!}
        @if ($errors->has('jk'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('jk') }}</strong>
            </span>
        @endif
    </div>
    
    <div class="form-group">
        <label for="perusahaan">Merek Perusahaan</label>
        {!! Form::text('perusahaan', null, ['class' => $errors->has('perusahaan') ? 'form-control is-invalid' : 'form-control', 'required']) !!}
        @if ($errors->has('perusahaan'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('perusahaan') }}</strong>
            </span>
        @endif
    </div>
    
    <div class="form-group">
        <label for="alamat_usaha">Alamat Usaha</label>
        {!! Form::textarea('alamat_usaha', null, ['id' => 'textarea', 'class' => $errors->has('alamat_usaha') ? 'form-control is-invalid' : 'form-control', 'required']) !!}
        @if ($errors->has('alamat_usaha'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('alamat_usaha') }}</strong>
            </span>
        @endif
    </div>
</div>
    <div class="card-footer bg-transparent">
    <button class="btn btn-primary" type="submit">
        Submit
    </button>
</div>

@section('assets-bottom')
<script src="{{ asset('assets/blog-admin/vendor/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
<script src="{{ asset('vendor/laravel-filemanager/js/lfm.js') }}"></script>
<script>
    $(document).ready( function () {
        $("#datetime").datetimepicker({
            format: 'yyyy-mm-dd hh:ii:00',
            autoclose: true
        });
    });
</script>
@endsection
