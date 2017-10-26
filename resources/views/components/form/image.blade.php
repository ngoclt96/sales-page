<div id="{{ $name }}-preview" class="preview-img">
    @if(Form::getValueAttribute($name))
        <img src="{{ Form::getValueAttribute($name) }}" title="Click to remove"/>
    @endif
</div>
{{ Form::hidden($name, $value, $attributes) }}
<button type="button" class="btn btn-default" onclick="browseImage('{{ $name }}')">Browse <i class="fa fa-file-image-o"></i></button>