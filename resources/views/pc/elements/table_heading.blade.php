<tr role="row">
    @if(isset($checkall)  && $checkall == true)
        <th class="text-center" style="width: 30px"><input type="checkbox" class="checkall"/></th>
    @endif
    @foreach($heading as $name=>$attr)
        <th class="text-center">
            {{$attr['label']}}&nbsp;
            @if(isset($attr['sort']))
                @if($attr['sort'] == 'numeric')
                    <a class="sorting {{ getSort($name) ? 'active' : '' }}" data-target="{{ getSort($name) ? getSort($name) : 'asc' }}" data-type="{{ $name }}" href="javascript:;"><i class="fa fa-sort-numeric-{{ getSort($name) ? getSort($name) : 'asc' }}"></i> </a>
                 @endif
                @if($attr['sort'] == 'alpha')
                    <a class="sorting {{ getSort($name) ? 'active' : '' }}" data-target="{{ getSort($name) ? getSort($name) : 'asc' }}" data-type="{{ $name }}" href="javascript:;"><i class="fa fa-sort-alpha-{{ getSort($name) ? getSort($name) : 'asc' }}"></i></a>
                @endif
            @endif
        </th>
    @endforeach
    <th style="width: 180px;text-align: center" aria-controls="datatable-responsive" rowspan="1" colspan="1" >Action</th>
</tr>
<tr role="row" class="table-heading form-action">
    @if(isset($checkall)  && $checkall == true)
        <th></th>
    @endif
    @foreach($heading as $name => $attr)
        @if(isset($attr['search']))
            @if($attr['search']['type'] == 'text')
                <td><input class="form-control" value="{{ request()->query($name) }}" type="text" name="{{ $name }}" placeholder="{{ $attr['search']['placeholder'] or ''  }}"></td>
            @elseif($attr['search']['type'] == 'selectbox')
                <td>
                    @include("components.form.selectbox", ['name' => $name, 'data' => $attr['search']['data'], 'placeholder' => '---'])
                </td>
            @elseif($attr['search']['type'] == 'date')
                <td><input readonly class="form-control date" value="{{ request()->query($name) }}" type="text" name="{{ $name }}" placeholder="{{ $attr['search']['placeholder'] or ''  }}"></td>
            @elseif($attr['search']['type'] == 'number')
                <td><input  class="form-control " value="{{ request()->query($name) }}" type="number" name="{{ $name }}" placeholder="{{ $attr['search']['placeholder'] or ''  }}"></td>
            @else
                <td></td>
            @endif
        @endif
    @endforeach
    <td class="text-center">
        <a class="btn-default btn btn-reset" href="javascript:;"> <i class="fa fa-repeat"></i></a>
        <a class="btn-default btn btn-search" href="javascript:;"> <i class="fa fa-search"></i></a>
    </td>
</tr>
