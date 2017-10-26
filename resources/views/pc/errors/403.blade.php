@extends("pc.layouts.default")
@section("content")
    <h1 class="error-number">403</h1>
    <h2>Access denied</h2>
    <p>Full authentication is required to access this resource. <a href="#">Report this?</a>
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
            