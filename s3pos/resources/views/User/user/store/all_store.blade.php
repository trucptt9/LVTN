@extends('User.user_layouts')
@section('content')
    <div>
        <div class="row">
            <div class="col col-total">
                ff
            </div>
            <div class="col col-total">
                ff
            </div>
            <div class="col col-total">
                ff
            </div>
            <div class="col col-total">
                ff
            </div>
        </div>
        <div>
            <div style="float: right; margin-bottom:10px;margin-top:10px">
                <button class="btn btn-sm btn-primary"><i class="fa-solid fa-plus"></i> Thêm</button>
                <button class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i> Xóa</button>
            </div>

            <div class="table-content">

            </div>
        </div>


    </div>

    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            //load table
            function loadData(){
                $.get("{{ route('store.table') }}",)
            }

        })
    </script>
@endsection
