@extends("pc.layouts.error")
@section("content")
    <h1 class="error-number">500</h1>
    <h2>Internal Server Error</h2>
    <p>We track these errors automatically, but if the problem persists feel free to contact us. In the meantime, try refreshing. <a href="#">Report this?</a>
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