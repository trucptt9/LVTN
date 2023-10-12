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

            <div class="table">
                <table id="responsive-datatable" class="table table-bordered table-bordered dt-responsive nowrap"
                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead style="text-align: center; color:#000000bf;background-color:rgb(130 187 233 / 20%)">
                        <tr>
                            <th style="width:12pc">Tên cửa hàng</th>
                            <th style="width:8pc">Số điện thoại</th>
                            <th>Địa chỉ</th>

                            <th>Mô tả</th>
                            <th style="width:90px">Trạng thái</th>
                            <th style="width:90px">#</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td class="text-center">Tiger Nixon</td>

                            <td class="text-center">Edinburgh</td>
                            <td class="text-center">61</td>
                            <td>2011/04/25</td>
                            <td class="text-center">
                                <input type="checkbox">
                            </td>
                            <td>
                                <button class="btn btn-edit btn-success btn-sm "><i
                                        class="fa-regular fa-pen-to-square"></i></button>
                                <button class="btn btn-delete btn-danger btn-sm "><i class="fa-solid fa-xmark"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>


    </div>
@endsection
