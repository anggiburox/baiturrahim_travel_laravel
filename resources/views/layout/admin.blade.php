<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>Baiturrahim Travel</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon" />
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon" />

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect" />
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet" />

    <!-- Vendor CSS Files -->
    <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet" />
    <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet" />
    <link href="{{asset('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet" />
    <!-- <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet" /> -->
    <!-- <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet" /> -->
    <link href="{{asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet" />

    <!-- Template Main CSS File -->
    <link href="{{asset('assets/css/style.css') }}" rel="stylesheet" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
    <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Mar 09 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center" style='background:#0b381a;'>
        <div class="d-flex align-items-center justify-content-between">
            <a href="/admin/dashboard" class="logo d-flex align-items-center">
                <img src="assets/img/logo.png" alt="" />
                <span class="d-none d-lg-block" style="color:white;">Baiturrahim Travel</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn" style='color:white;'></i>
        </div>
        <!-- End Logo -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">
                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle" href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li>
                <!-- End Search Icon-->

                <li class="nav-item dropdown pe-3">
                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-person-fill" style="color:white; font-size:30px"></i> </a>
                    <!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>Kevin Anderson</h6>
                        </li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="/admin/profile">
                                <i class="bi bi-person"></i>
                                <span>My Profile</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="/logout">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sign Out</span>
                            </a>
                        </li>
                    </ul>
                    <!-- End Profile Dropdown Items -->
                </li>
                <!-- End Profile Nav -->
            </ul>
        </nav>
        <!-- End Icons Navigation -->
    </header>
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">
        <ul class="sidebar-nav" id="sidebar-nav">
            <li class="nav-item">
                <a class="nav-link collapsed" href="/admin/dashboard">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <!-- End Dashboard Nav -->


            <li class="nav-item">
                <a class="nav-link collapsed" href="/admin/paket_umrah">
                    <i class="bi bi-menu-button-wide"></i>
                    <span>Paket Umrah</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="/admin/jamaah">
                    <i class="bi bi-person"></i>
                    <span>Jamaah</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="/admin/keberangkatan">
                    <i class="ri-plane-fill"></i>
                    <span>Keberangkatan</span>
                </a>
            </li>
        </ul>
    </aside>
    <!-- End Sidebar-->

    <main id="main" class="main">
        @yield('content')
    </main>
    <!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <!-- <script src="assets/vendor/apexcharts/apexcharts.min.js"></script> -->
    <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- <script src="assets/vendor/chart.js/chart.umd.js"></script> -->
    <script src="{{asset('assets/vendor/echarts/echarts.min.js') }}"></script>
    <!-- <script src="assets/vendor/quill/quill.min.js"></script>-->
    <script src="{{asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <!-- <script src="assets/vendor/php-email-form/validate.js"></script> -->

    <!-- Template Main JS File -->
    <script src="{{asset('assets/js/main.js') }}"></script>

</body>

</html>