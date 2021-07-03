<div class="card-body">
    <div class="form-group">
        <label for="name">Nama Lengkap</label>
        {!! Form::text('name', null, ['class' => $errors->has('name') ? 'form-control is-invalid' : 'form-control', 'required', 'autofocus']) !!}
        @if ($errors->has('name'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        {!! Form::email('email', null, ['class' => $errors->has('email') ? 'form-control is-invalid' : 'form-control', 'required']) !!}
        @if ($errors->has('email'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group">
        <label for="npwp">NPWP</label>
        {!! Form::text('npwp', null, ['class' => $errors->has('npwp') ? 'form-control is-invalid' : 'form-control',  'autofocus']) !!}
        @if ($errors->has('npwp'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('npwp') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group">
        <label for="alamat">Alamat</label>
        {!! Form::text('alamat', null, ['class' => $errors->has('alamat') ? 'form-control is-invalid' : 'form-control',  'autofocus']) !!}
        @if ($errors->has('alamat'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('alamat') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        {!! Form::password('password', ['class' => $errors->has('password') ? 'form-control is-invalid' : 'form-control']) !!}
        @if ($errors->has('password'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group">
        <label for="role">Role</label>
        {!! Form::select('role', ['admin' => 'Admin', 'author' => 'Author'], null, ['class' => $errors->has('role') ? 'form-control is-invalid' : 'form-control', 'required']) !!}
        @if ($errors->has('role'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('role') }}</strong>
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
    <script src="{{ asset('vendor/unisharp/laravel-filemanager/public/js/lfm.js') }}"></script>
    <script>
        $(document).ready( function () {
            $('#lfm').filemanager('image');
        });
    </script>
@endsection
