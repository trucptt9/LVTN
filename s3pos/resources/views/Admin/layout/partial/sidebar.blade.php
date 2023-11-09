<!-- BEGIN #sidebar -->
<div id="sidebar" class="app-sidebar">
    <!-- BEGIN scrollbar -->
    <div class="app-sidebar-content" data-scrollbar="true" data-height="100%">
        <!-- BEGIN menu -->
        <div class="menu">
            @php
                $currentUrl = url()->current();
            @endphp
            {{ renderAdminMenu($currentUrl) }}
            <div class="p-3 px-4 mt-auto hide-on-minified">
                <a href="{{ route('admin.guide') }}" class="btn btn-secondary d-block w-100 fw-600 rounded-pill">
                    <i class="fas fa-book me-1 ms-n1 opacity-5"></i> Hướng dẫn
                </a>
            </div>
        </div>
        <!-- END menu -->
    </div>
    <!-- END scrollbar -->
    <!-- BEGIN mobile-sidebar-backdrop -->
    <button class="app-sidebar-mobile-backdrop" data-dismiss="sidebar-mobile"></button>
    <!-- END mobile-sidebar-backdrop -->
</div>
<!-- END #sidebar -->
