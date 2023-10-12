<div class="table">
    <table id="responsive-datatable" class="table table-bordered table-bordered dt-responsive nowrap"
        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
        <thead style="text-align: center; color:#000000bf;background-color:rgb(130 187 233 / 20%)">
            <tr>
                <th style="width:12pc">Tên cửa hàng</th>
                <th style="width:8pc">Số điện thoại</th>
                <th>Địa chỉ</th>
                <th style="width:15em">Trạng thái</th>
                <th style="width:40px" class="align-item">#</th>
                <th style="width:90px">#</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td class="text-center">Tiger Nixon</td>
                <td class="text-center">Edinburgh</td>
                <td class="text-center">61</td>
                <td class="text-center">
                    <span class="btn-status">Đang hoạt động</span>
                </td>
                <td>
                    <a href="{{ route('user.detail') }}"><i class="fa-solid fa-circle-info fa-xl"></i></a>
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
