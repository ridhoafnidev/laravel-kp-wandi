

{!! Form::model($model, ['url' => $delete_url, 'method' => 'DELETE']) !!}


<a href="{{ $show_url }}" 
    class="btn btn-outline btn-primary" 
    style="padding-bottom: 0px; padding-top:0px;">Show
    <span class="btn-label btn-label-right"><i class="fa fa-eye"></i></span> 
</a> / 
<a href="{{ $edit_url }}" 
    class="btn btn-outline btn-success" 
    style="padding-bottom: 0px; padding-top:0px;">Edit
    <span class="btn-label btn-label-right"><i class="fa fa-edit"></i></span> 
</a> / 
<button
    type="submit" class="btn btn-outline btn-danger"
    style="padding-bottom: 0px; padding-top:0px;"
    onclick="return confirm('Are you sure want to delete this item?');"
    >Delete
    <span class="btn-label btn-label-right"><i class="fa fa-trash"></i></span>
</button>

{!! Form::close() !!}