@php
    $module = request()->segment(1);
    $delete = route($module . '.delete');
@endphp
<button type="button" class="btn btn-danger pull-right btn-sm btn-bulk" data-toggle="modal" data-target=".bs-example-modal-sm-all">@lang('lang.delete')</button>
<div class="modal fade bs-example-modal-sm-all" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel2">@lang('lang.delete_confirm')?</h4>
            </div>
            <div class="modal-body">
                <h4>@lang('lang.are_you_sure_want_to_delete_this_record_all_your_data_will_be_lost')?</h4>
            </div>
            <div class="modal-footer">
                {!! Form::model(null, ['url' => $delete, 'method' => 'POST', 'class' => 'bulk-action']) !!}
                <input type="hidden" name="id">
                <button type="button" class="btn btn-default" data-dismiss="modal">@lang('lang.close')</button>
                <button type="submit" class="btn btn-danger">@lang('lang.ok')</button>
                {!! Form::close() !!}
            </div>

        </div>
    </div>
</div>