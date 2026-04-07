<head>
    <!-- Meta Tags -->
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Duralux Dashboard" />
    <meta name="keywords" content="admin, dashboard, bootstrap, laravel" />
    <meta name="author" content="flexilecode" />

    <!-- Title -->
    <title>@yield('title', 'Duralux Dashboard')</title>

    <!-- Favicon -->
  <img src="{{ asset('assets/images/avatar.png') }}" class="rounded-circle" width="40">

    <!-- =========================
        CSS START
    ========================== -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/daterangepicker.min.css') }}">

    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/select2-theme.min.css') }}">

    <!-- FontAwesome (icons) -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/fontawesome/all.min.css') }}">

    <!-- Theme / Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/theme.min.css') }}">

    <!-- Optional: Your Custom Overrides -->
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">

    <!-- =========================
        CSS END
    ========================== -->

    <!-- IE Support (Optional) -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>