@php
    $module = request()->segment(1);
@endphp
<button type="button" class="btn btn-info pull-right btn-sm" data-toggle="modal" data-target="#setting-table">View Setting</button>
<div id="setting-table" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close"
                        data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-center">{{$title}}</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['url' => route($module. ".setting"), 'class' => 'form-horizontal', 'method' => "post"]) !!}
                <div class="row">
                    @foreach($columns as $key => $value)
                    <div class="col-md-6">
                        {{ Form::checkbox($key, 1, (isset($current[$key]) && $current[$key]) ? true : false, null, ['class' => 'field']) }}
                        {{ $value['label'] }}
                    </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" id="save_value" class="btn btn-success pull-right" >Save</button>
                        <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
            <div class="modal-footer">

            </div>
        </div>

    </div>
</div>