@php
    $inputs = Form::getValueAttribute($name);
    $inputs = json_decode($inputs);
@endphp
@foreach($value as $val=>$title)
    <p><input type="checkbox" {{ $inputs ? (in_array($val, $inputs) ? 'checked' : '') : '' }} name="{{$name}}[]" value="{{ $val }}" class="flat" /> {{$title}}</p>
@endforeach