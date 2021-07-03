@section('assets-top')

<link href="{{ asset('assets/blog-admin/vendor/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
<script src="{{ asset('assets/blog-admin/vendor/tinymce/tinymce.min.js') }}"></script>

@endsection
<div class="card-body">
    <div class="form-group">
        <label for="lokasi">Lokasi</label>
        {!! Form::select('lokasi_id', [' '=>' --Pilih Lokasi--']+App\JenisLokasi::pluck('jenis_lokasi', 'id')->all(), null, ['class' => $errors->has('lokasi') ? 'form-control is-invalid' : 'form-control', 'required', 'autofocus']) !!}
        @if ($errors->has('lokasi_id'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('lokasi_id') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group">
        <label for="alamat">Alamat</label>
        {!! Form::textarea('alamat', null, ['class' => $errors->has('alamat') ? 'form-control is-invalid' : 'form-control', 'required']) !!}
        @if ($errors->has('alamat'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('alamat') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group">
        <label for="jenis">Jenis Reklame</label>
        {!! Form::select('jenis',['produk' => 'Produk', 'non produk' => 'Non Produk'], null, ['class' => $errors->has('jenis') ? 'form-control is-invalid' : 'form-control', 'required']) !!}
        @if ($errors->has('jenis'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('jenis') }}</strong>
            </span>
        @endif
    </div>
	<div class="form-group">
        <label for="des_jenis">Pajak & Retribusi Daerah</label>
        {!! Form::textarea('des_jenis', null, ['class' => $errors->has('des_jenis') ? 'form-control is-invalid' : 'form-control', 'required']) !!}
        @if ($errors->has('des_jenis'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('des_jenis') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group">
        <label for="jangka_waktu">Jangka Waktu/Hari </label>
        {!! Form::text('jangka_waktu', null, ['class' => $errors->has('jangka_waktu') ? 'form-control is-invalid' : 'form-control', 'required']) !!}
        @if ($errors->has('jangka_waktu'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('jangka_waktu') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group">
        <label for="ketinggian">Lebar (Meter)</label>
        {!! Form::text('lebar', null, ['class' => $errors->has('lebar') ? 'form-control is-invalid' : 'form-control', 'required']) !!}
        @if ($errors->has('lebar'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('lebar') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group">
        <label for="ketinggian">Tinggi (Meter)</label>
        {!! Form::text('panjang', null, ['class' => $errors->has('panjang') ? 'form-control is-invalid' : 'form-control', 'required']) !!}
        @if ($errors->has('panjang'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('panjang') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group">
        <label for="ketinggian">Quantitas(Jumlah)</label>
        {!! Form::text('qty', null, ['class' => $errors->has('qty') ? 'form-control is-invalid' : 'form-control', 'required']) !!}
        @if ($errors->has('qty'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('qty') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group">
        <label for="nsr">Nilai Sewa Reklame(NSR) (Rp.)</label>
        {!! Form::text('nsr', null, ['class' => $errors->has('nsr') ? 'form-control is-invalid' : 'form-control', 'required']) !!}
        @if ($errors->has('nsr'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('nsr') }}</strong>
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

@endsection
