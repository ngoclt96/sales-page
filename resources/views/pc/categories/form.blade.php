@section('title', 'Form categories')
@extends('pc.layouts.default')
@section('content')
    <div class="">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <a href="/">@lang('lang.home')</a> > <a href="{{ route('categories.index') }}" class="current"> Categories</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        {!! Form::model($category, ['url' => route('categories.confirm'), 'class' => 'form-horizontal']) !!}
                        {!! Form::hidden('id', $category->id) !!}
                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Name<span class="textred">(*)</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! Form::text('name', null, ['class' => 'form-control col-md-7 col-xs-12', 'required' => false, 'value' => old('name')]) !!}
                                <span class="error"> {{ $errors->first('name') ?? '' }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12"> Parent_id <span class="textred">(*)</span> </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        {!! Form::select('parent_id', $parentOrg, null, ['class' => 'form-control', 'placeholder' => '___Choose parent_id___']) !!}
                        <span class="error"> {{ $errors->first('parent_id') ?? '' }}</span>
                        </div>
                        </div>
                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12"> Status <span class="textred">(*)</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! Form::select('status', \App\AppConst\Constants::STATUS, null, ['class' => 'form-control', 'placeholder' => '___Choose Status   ___']) !!}
                                <span class="error"> {{ $errors->first('status') ?? '' }}</span>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group text-center">
                            <a href="{{ route('categories.index') }}" class="buttonFinish  btn btn-default">@lang('lang.back')</a>
                            <button type="submit" class="buttonPrevious  btn btn-primary">@lang('lang.submit')</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection