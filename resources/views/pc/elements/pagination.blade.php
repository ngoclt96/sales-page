<div class="col-sm-5">
    <div class="dataTables_info" id="datatable_info" role="status" aria-live="polite">@lang('lang.showing') {{ $pages->firstItem() }} @lang('lang.to') {{ $pages->lastItem()  }} @lang('lang.of') {{ $pages->total()  }} @lang('lang.entries')</div>
</div>
<div class="col-sm-7 text-right">
    {{ $pages->appends($_GET)->links() }}
</div>