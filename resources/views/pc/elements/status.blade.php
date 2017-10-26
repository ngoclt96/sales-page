@if($status  == 1)
    <button type="button" class="btn btn-primary btn-xs">@lang('lang.active')</button>
@endif
@if($status == 0)
    <button type="button" class="btn btn-disabled btn-xs">@lang('lang.inactive')</button>
@endif

