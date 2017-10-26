@section('title', trans('lang.add_new_category_confirm'))
@extends('pc.layouts.default')
@section('content')
    <div class="">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <a href="/">@lang('lang.home')</a> / <a href="{{ route('categories.index') }}" class="current">Categories</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="form-group col-md-8 col-md-offset-2">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Name</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{ $category->name }}
                            </div>
                        </div>
                        <div class="form-group col-md-8 col-md-offset-2">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Parent_id</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{ $category->parent_id }}
                            </div>
                        </div>
                        <div class="form-group col-md-8 col-md-offset-2">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Status
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{ \App\AppConst\Constants::STATUS[$category->status]  }}
                            </div>
                        </div>
                        <div class="ln_solid col-md-12"></div>
                        <div class="form-group col-md-12 text-center">
                            @if($category->id)
                                <a href="{{ route('categories.edit', ['id' => $category->id, 'back' => 'true']) }}" class="buttonFinish  btn btn-default">Back</a>
                            @else
                                <a href="{{ route('categories.form', ['back' => 'true']) }}" class="buttonFinish  btn btn-default">Back</a>
                            @endif
                            <a href="{{ route('categories.complete') }}" class="buttonPrevious  btn btn-primary">@lang('lang.submit')</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection