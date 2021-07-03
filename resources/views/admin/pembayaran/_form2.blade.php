
<div class="card-body">
<div class="form-group">
        <label for="ketinggian">ID Reklame</label>
        {!! Form::text('reklame_id', null, ['class' => $errors->has('reklame_id') ? 'form-control is-invalid' : 'form-control', 'required']) !!}
        @if ($errors->has('reklame_id'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('reklame_id') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group">
        <label for="avatar">Bukti Pembayaran</label>
        <div class="input-group">
            <span class="input-group-btn">
                <a id="lfm" data-input="bukti_pembayaran" data-preview="holder" class="btn btn-primary text-white">
                    <i class="fa fa-cloud-upload"></i> Choose
                </a>
            </span>
            {!! Form::text('bukti_pembayaran', null, ['id' => 'bukti_pembayaran', 'class' => $errors->has('bukti_pembayaran') ? 'form-control is-invalid' : 'form-control', 'readonly']) !!}
            @if ($errors->has('bukti_pembayaran'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('bukti_pembayaran') }}</strong>
                </span>
            @endif
        </div>
        <!-- if -->
            <!-- <img src="#" id="holder" style="margin-top:15px;max-height:254px;max-width: 152px;"> -->
        <!-- endif -->
        <img id="holder" style="margin-top:15px;max-height:254px;max-width: 152px;">
    </div>
<div class="card-body">
    <div class="card-footer bg-transparent">
    <button class="btn btn-primary" type="submit">
        Submit
    </button>
</div>
</div>

@section('assets-bottom')
    <script src="{{ asset('vendor/laravel-filemanager/js/lfm.js') }}"></script>
    <script>
        $(document).ready( function () {
            $('#lfm').filemanager('image');
        });
    </script>
@endsection

