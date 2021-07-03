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
        <label for="ukuran">Ukuran</label>
        {!! Form::text('ukuran', null, ['class' => $errors->has('ukuran') ? 'form-control is-invalid' : 'form-control', 'required']) !!}
        @if ($errors->has('ukuran'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('ukuran') }}</strong>
            </span>
        @endif
    </div>
    
    <div class="form-group">
        <label for="jangka_waktu">Jangka Waktu</label>
        {!! Form::text('jangka_waktu', null, ['class' => $errors->has('jangka_waktu') ? 'form-control is-invalid' : 'form-control', 'required']) !!}
        @if ($errors->has('jangka_waktu'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('jangka_waktu') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group">
        <label for="ketinggian">Ketinggian Reklame</label>
        {!! Form::text('ketinggian', null, ['class' => $errors->has('ketinggian') ? 'form-control is-invalid' : 'form-control', 'required']) !!}
        @if ($errors->has('ketinggian'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('ketinggian') }}</strong>
            </span>
        @endif
    </div>
    
    <div class="form-group">
        <label for="nsr">nsr</label>
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
