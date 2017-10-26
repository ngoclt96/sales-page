<button type="button" class="btn btn-info pull-right btn-sm btn-bulk" data-toggle="modal" data-target="#point-ajust">One-click point ajust</button>
<div id="point-ajust" class="modal fade in" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close"
                        data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-center">{{$title}}</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['url' => route("students.ajustpoint"), 'id' => 'frm-adjust-point', 'class' => 'bulk-action form-horizontal', 'method' => "post"]) !!}
                <span class="error all"></span>
                <span class="success"></span>
                    <div class="form-group">
                        <label for="Point" class="col-sm-2 control-label">Point</label>
                        <div class="col-sm-10">
                            {!! Form::text('point', null, ['class' => 'form-control', 'required' => true]) !!}
                            <span class="error point"></span>
                        </div>
                    </div>
                     <input type="hidden" name="id">
                    <div class="form-group">
                        <label for="type" class="col-sm-2 control-label">How to ajust</label>
                        <div class="col-sm-10">
                            {!! Form::select('type', ['add' => 'Add', 'sub' => 'Subtract'], null, ['class' => 'form-control',  'placeholder' => '-- Choose type --']) !!}
                            <span class="error type"></span>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" id="save_value" class="btn btn-success pull-right" >Save</button>
                        <button type="button" class="btn btn-close-modal btn-default pull-right" data-dismiss="modal">Close</button>
                    </div>
                {!! Form::close() !!}
            </div>
            <div class="modal-footer">

            </div>
        </div>

    </div>
</div>
@section("script")
    <script>
        $(function () {
            $('#point-ajust .btn-close-modal').on("click", function () {
                location.reload();
            });
            $('#point-ajust').on("hidden.bs.modal", function(){
                location.reload();
            });
            $('#frm-adjust-point').submit(function (e) {
                e.preventDefault();
                var  check = confirm('Are you sure to make this change');
                if (!check) {
                    return false;
                }
                $.post('{{ route("students.ajustpoint") }}', $(this).serializeArray(), function (rs) {

                    if($.isEmptyObject(rs.error))
                    {
                        $('.success').text(rs.success);
                        $('.error').text('');
                    } else {
                        $('.success').text('');
                        if (typeof rs.error.point != 'undefined')
                        {
                            $('.error.point').text(rs.error.point['0']);
                        } else {
                            $('.error.point').text('');
                        }
                        if (typeof rs.error.type != 'undefined') {
                            $('.error.type').text(rs.error.type['0']);
                        } else {
                            $('.error.type').text('');
                        }
                        if (typeof rs.error == 'string') {
                            $('.error.all').text(rs.error);
                        } else {
                            $('.error.all').text('');
                        }

                    }
                }, 'json');
            })
        })
    </script>
@endsection