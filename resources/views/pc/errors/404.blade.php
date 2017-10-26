@extends("pc.layouts.default")
@section("content")
    <h1 class="text-center error-number">404</h1>
    <h2 class="text-center">Sorry this page is under construction</h2>
    <p class="text-center">Please return later
    </p>
    <div class="mid_center">
        <form>
            <div class="col-xs-12 form-group pull-right top_search">
                <div class="input">
                    <a href="{{ URL::previous() }}" class="btn col-xs-12 btn-round btn-default">Go back</a>
                </div>
            </div>
        </form>
    </div>
@endsection
            