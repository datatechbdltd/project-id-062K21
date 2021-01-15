<base href="">
<meta charset="utf-8" />
<title>@stack('title') | {{ config('app.name') }}</title>
<meta name="author" content="{{ get_content_by_language('application_seo')['author'] ?? 'No author' }}">
<meta name="description" content="{{ get_content_by_language('application_seo')['description'] ?? 'No description' }}"/>
<meta property="og:image" content="{{ asset(get_static_option('meta_image')) }}" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<!--begin::CSRF-->
<meta name="csrf-token" content="{{ csrf_token() }}">
<!--end::CSRF-->
<!--begin::Fonts-->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
<!--end::Fonts-->
<!--begin::Page Vendors Styles(used by this page)-->
<link href="{{asset('assets/admin/plugins/custom/fullcalendar/fullcalendar.bundle.css')}}" rel="stylesheet" type="text/css" />
<!--end::Page Vendors Styles-->
<!--begin::Global Theme Styles(used by all pages)-->
<link href="{{asset('assets/admin/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/admin/plugins/custom/prismjs/prismjs.bundle.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/admin/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
<!--end::Global Theme Styles-->
<!--begin::Layout Themes(used by all pages)-->
<link href="{{asset('assets/admin/css/themes/layout/header/base/light.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/admin/css/themes/layout/header/menu/light.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/admin/css/themes/layout/brand/dark.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/admin/css/themes/layout/aside/dark.css')}}" rel="stylesheet" type="text/css" />
<!--end::Layout Themes-->
<link rel="shortcut icon" href="{{asset('assets/admin/media/logos/favicon.ico')}}" />
<!--====== AJAX ======-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
