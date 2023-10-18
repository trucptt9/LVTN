 <div class="card">

    @include('user.staff.staff_report')
     <!--begin::Card header-->
     <div class="card-header border-0 pt-6">
        <!--begin::Card title-->
        <div class="card-title">
            <!--begin::Search-->
            <div class="d-flex align-items-center position-relative my-1">
                <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5">
                    <span class="path1"></span>
                    <span class="path2"></span>
                </i>
                <input type="text" data-kt-user-table-filter="search"
                    class="form-control form-control-solid w-250px ps-13"
                    placeholder="Tìm kiếm " />
            </div>
            <!--end::Search-->
        </div>
        <!--begin::Card title-->
        <!--begin::Card toolbar-->
        <div class="card-toolbar">
            <!--begin::Toolbar-->
            <div class="d-flex justify-content-end"
                data-kt-user-table-toolbar="base">
                <!--begin::Filter-->
                <button type="button" class="btn btn-light-primary me-3"
                    data-kt-menu-trigger="click"
                    data-kt-menu-placement="bottom-end">
                    <i class="ki-duotone ki-filter fs-2">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>Lọc</button>
    
                <!--end::Filter-->
   
                <!--begin::Add user-->
                <button type="button" class="btn btn-primary add_staff">
                    <i class="ki-duotone ki-plus fs-2"></i>Thêm</button>
                <!--end::Add user-->
            </div>
            <!--end::Toolbar-->
            <!--begin::Group actions-->
            <div class="d-flex justify-content-end align-items-center d-none"
                data-kt-user-table-toolbar="selected">
                <div class="fw-bold me-5">
                    <span class="me-2"
                        data-kt-user-table-select="selected_count"></span> Đã chọn
                </div>
                <button type="button" class="btn btn-danger"
                    data-kt-user-table-select="delete_selected">Xóa</button>
            </div>
            <!--end::Group actions-->
    
          
        </div>
        <!--end::Card toolbar-->
    </div>
     <!--end::Card header-->

     <!--begin::Card body-->
     <div class="staff_list_content py-4">

     </div>
     <!--end::Card body-->

     {{-- add modal --}}
     @include('user.staff.staff_modal')
 </div>


 <script>
     $(document).ready(function(e) {
         loadStaffTable();

         function loadStaffTable() {
             $.get("{{ route('staffs.table') }}", function(res) {
                 $('.staff_list_content').html(res);
             })
         }

         $('.add_staff').on('click', function(e) {
             e.preventDefault();
             
             $('#modal_add_staff').trigger('reset')
             $('#modal_add_staff').modal('show')
         })

         $('.try').click(function(e){
            e.preventDefault();
            console.log(1)
         })

     })
 </script>
