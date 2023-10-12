@extends('User.user_layouts')
@section('content')
    <div>

        <div class="">
            <ul class="nav nav-tabs tabs-bordered">
                <li class="nav-item">
                    <a href="#home-b1" data-toggle="tab" aria-expanded="false" class="nav-link active">
                        Thông tin nhãn hàng
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#profile-b1" data-toggle="tab" aria-expanded="true" class="nav-link">
                        Danh sách hóa đơn
                    </a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="home-b1">
                    <div class="row">
                        <div class="col-lg-4">
                            <!-- Personal-Information -->
                            <div class="panel card panel-fill">
                                <div class="card-header">
                                    <h5 class="font-16 m-1">Thông tin liên hệ</h5>
                                </div>
                                <div class="card-body" style="padding:0 0 0 1.5rem">
                                    <div class="mb-2">
                                        <strong>Email</strong>
                                        <br>
                                        <p class="text-muted">abx@gmail.com</p>
                                    </div>
                                    <div class="mb-2">
                                        <strong>Số điện thoại</strong>
                                        <br>
                                        <p class="text-muted">0123 456 789</p>
                                    </div>
                                    <div class="mb-2">
                                        <strong>Địa chỉ</strong>
                                        <br>
                                        <p class="text-muted">Hồ Chí Minh</p>
                                    </div>

                                </div>
                            </div>
                            <!-- Personal-Information -->

                            <!-- Social -->
                            {{-- <div class="panel card panel-fill">
                                <div class="card-header">
                                    <h5 class="font-16 m-1">Social</h5>
                                </div>
                                <div class="card-body">
                                    <ul class="social-links list-inline mb-0">
                                        <li class="list-inline-item">
                                            <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Facebook"><i class="fab fa-facebook-f"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Twitter"><i class="fab fa-twitter"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Skype"><i class="fab fa-skype"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div> --}}
                            <!-- Social -->
                        </div>

                        <div class="col-lg-8">
                            <!-- Personal-Information -->
                            <div class="panel card panel-fill">
                                <div class="card-header">
                                    <h5 class="font-16 m-1">Nhãn hàng</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-3">
                                            <p class="font-16 title align-center">Logo</p>
                                            <img src="https://i.pinimg.com/236x/68/44/29/68442904567ff590704322eb314a23b8.jpg"
                                                alt="" height="100" width="100" style="border-radius:50px">
                                            {{-- <input class="form-control" type="file" id="formFile"> --}}
                                        </div>
                                        <div class="col-9">
                                            <div class="from-group row">
                                                <p class="font-16 mb-3 title">Tên nhãn hàng: </p>
                                                <p class="font-14 col">Nuyht Caffe</p>
                                            </div>

                                            <div class="from-group row">
                                                <p class="font-16 mb-3 title">Chủ nhãn hàng: </p>
                                                <p class="font-14 col">Nuyht Alle</p>
                                            </div>
                                            <div class="from-group row">
                                                <p class="font-16 mb-3 title">Gói dịch đang sử dụng: </p>
                                                <p class="font-14 col">Prenium (12/10/2023 - 6/10/2024)</p>
                                            </div>
                                        </div>

                                    </div>









                                </div>
                            </div>
                            <!-- Personal-Information -->

                        </div>

                    </div>
                </div>
                <div class="tab-pane" id="profile-b1">
                    <!-- Personal-Information -->
                    <div class="panel card panel-fill">
                        <div class="table">
                            <table id="responsive-datatable" class="table table-bordered table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead style="text-align: center; color:#000000bf;background-color:rgb(130 187 233 / 20%)">
                                    <tr>
                                        <th style="width:12pc">Mã hóa đơn</th>
                                        <th style="width:12pc">Tổng tiền</th>
                                        <th>Gói dịch vụ</th>
                                        <th>Thời gian sử dụng</th>
                                        <th style="width:200px">Trạng thái thanh toán</th>
                                      
                                    </tr>
                                </thead>
            
                                <tbody>
                                    <tr>
                                        <td class="text-center">Tiger Nixon</td>
            
                                        <td class="text-center">Edinburgh</td>
                                        <td class="text-center">61</td>
                                  
                                        <td class="text-center">Edinburgh</td>
                                        <td class="text-center">61</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- Personal-Information -->
                </div>
            </div>
        </div>

    </div>
@endsection
