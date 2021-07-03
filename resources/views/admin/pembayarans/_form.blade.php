@section('assets-top')

<script src="{{ asset('assets/blog-admin/vendor/tinymce/tinymce.min.js') }}"></script>
<script>
    var editor_config = {
      path_absolute : "/",
      selector: '#textarea',
      height: 500,
      theme: 'modern',
      plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "insertdatetime media nonbreaking save table contextmenu directionality",
        "emoticons template paste textcolor colorpicker textpattern"
      ],
      toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
      fontsize_formats: '8pt 10pt 12pt 14pt 18pt 24pt 36pt',
      image_advtab: true,
      content_css: [
        '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
        '//www.tinymce.com/css/codepen.min.css'
      ],
      relative_urls: false,
      file_browser_callback : function(field_name, url, type, win) {
        var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
        var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;
        var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
          if (type == 'image') {
            cmsURL = cmsURL + "&type=Images";
          } else {
            cmsURL = cmsURL + "&type=Files";
          }
      
          tinyMCE.activeEditor.windowManager.open({
            file : cmsURL,
            title : 'Filemanager',
            width : x * 0.8,
            height : y * 0.8,
            resizable : "yes",
            close_previous : "no"
          });
      }
    };
    tinymce.init(editor_config);
</script>
@endsection
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
    <div class="form-group">
                    <label>Deskripsi</label>
                    {!! Form::textarea('deskripsi', null, ['id' => 'textarea', 'class' => $errors->has('deskripsi') ? 'form-control is-invalid' : 'form-control']) !!}
                    @if ($errors->has('deskripsi'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('deskripsi') }}</strong>
                        </span>
                    @endif
                </div>
                </div>
                <!-- <div class="form-group">
        <label for="jangka_waktu">ID relame</label>
        {!! Form::text('reklame_id', null, ['class' => $errors->has('reklame_id') ? 'form-control is-invalid' : 'form-control', 'required']) !!}
        @if ($errors->has('reklame_id'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('reklame_id') }}</strong>
            </span>
        @endif
    </div> -->
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

