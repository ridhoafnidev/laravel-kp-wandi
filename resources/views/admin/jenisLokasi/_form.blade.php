@section('assets-top')

<link href="{{ asset('assets/blog-admin/vendor/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
<script src="{{ asset('assets/blog-admin/vendor/tinymce/tinymce.min.js') }}"></script>

@endsection
<div class="card-body">
    <div class="form-group">
        <label for="nama">Jenis Lokasi</label>
        {!! Form::text('jenis_lokasi', null, ['class' => $errors->has('jenis_lokasi') ? 'form-control is-invalid' : 'form-control', 'required', 'autofocus']) !!}
        @if ($errors->has('jenis_lokasi'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('jenis_lokasi') }}</strong>
            </span>
        @endif
    </div>
    
</div>
    <div class="card-footer bg-transparent">
    <button class="btn btn-primary" type="submit">
        Submit
    </button>
</div>

