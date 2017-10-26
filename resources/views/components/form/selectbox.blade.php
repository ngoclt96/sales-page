<select name="{{ $name }}" class="form-control {{ $class or '' }}" style=" {{ $style or '' }}" {{ $extra or '' }}>
    @if($placeholder)
        <option value="">{{ $placeholder }}</option>
    @endif
    @foreach($data as $key=>$label)
        <option {{ request()->query($name) === strval($key) ? 'selected' : '' }} value="{{ $key }}">{{ $label }}</option>
    @endforeach
</select>