@extends('User.user_layouts')
@section('content')

<div>
    <div class="title">

    </div>
    <div class="table">
        <table id="responsive-datatable" class="table table-bordered table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
            <thead>
                <tr>
                    <th>Tên cửa hàng</th>
                    <th>Khu vực</th>
                    <th>Địa chỉ</th>
                    <th>Số điện thoại</th>
                    <th>Mô tả</th>
                    <th>Trạng thái</th>
                    <th>#</th>
                </tr>
            </thead>
        
            <tbody>
                <tr>
                    <td>Tiger Nixon</td>
                    <td>System Architect</td>
                    <td>Edinburgh</td>
                    <td>61</td>
                    <td>2011/04/25</td>
                    <td>$320,800</td>
                    <td>$320,800</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>


@endsection