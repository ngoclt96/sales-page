<select name="{{ $name }}" class="{{ $class or '' }}" {{ $extra or '' }}>
    <option value="">--Choose parent department--</option>
    @foreach($data as $key => $val)
        @php
            $disabled = (isset($val['disabled']) && $val['disabled'] == true) ? true : false;
            if( $selected == $key) { $disabled = false; }
        @endphp
        <option {{ strval($selected) === strval($key) ? 'selected="selected"' : '' }} value="{{ $key }}" @if($disabled) disabled @endif >{{ $val['name'] or $val }}</option>
    @endforeach
</select>