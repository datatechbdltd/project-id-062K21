<!--begin::Container-->
<div class="container-fluid d-flex align-items-stretch justify-content-between">
    <!--begin::Header Menu Wrapper-->
    <div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
        <!--begin::Header Menu-->
        <div id="kt_header_menu" class="header-menu header-menu-mobile header-menu-layout-default">
            <!--begin::Header Nav-->
            <ul class="menu-nav">
                @include('layouts.admin.partials._pages')
                @include('layouts.admin.partials._features')
                @include('layouts.admin.partials._apps')
            </ul>
            <!--end::Header Nav-->
        </div>
        <!--end::Header Menu-->
    </div>
    <!--end::Header Menu Wrapper-->
    <!--begin::Topbar-->
    <div class="topbar">
        <!--begin::Search-->
        @include('layouts.admin.partials._search')
        <!--end::Search-->
        <!--begin::Notifications-->
        @include('layouts.admin.partials._notifications')
        <!--end::Notifications-->
        <!--begin::Quick Actions-->
        @include('layouts.admin.partials._quickActions')
        <!--end::Quick Actions-->
        <!--begin::Cart-->
        @include('layouts.admin.partials._card')
        <!--end::Cart-->
        <!--begin::Quick panel-->
        @include('layouts.admin.partials._quickPanel')
        <!--end::Quick panel-->
        <!--begin::Chat-->
        @include('layouts.admin.partials._chat')
        <!--end::Chat-->
        <!--begin::Languages-->
        @include('layouts.admin.partials._language')
        <!--end::Languages-->
        <!--begin::User-->
        @include('layouts.admin.partials._user')
        <!--end::User-->
    </div>
    <!--end::Topbar-->
</div>
<!--end::Container-->
