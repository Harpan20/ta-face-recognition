<!doctype html>
<html lang="en"
    class="light-theme">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1">

    <!-- loader-->
    <link href="{{ asset('assets/css/pace.min.css') }} "
        rel="stylesheet" />
    <script src="{{ asset('assets/js/pace.min.js') }}"></script>

    <!--plugins-->
    <link href="{{ asset('assets/plugins/simplebar/css/simplebar.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('assets/plugins/metismenu/css/metisMenu.min.css') }}"
        rel="stylesheet" />
    <link rel="icon"
        type="image/png"
        href="{{ asset('assets/images/favicon-32.png') }}"
        sizes="32x32">
    <link rel="icon"
        type="image/png"
        href="{{ asset('assets/images/favicon-48.png') }}"
        sizes="48x48">
    <link rel="icon"
        type="image/png"
        href="{{ asset('assets/images/favicon-96.png') }}"
        sizes="96x96">
    <link rel="icon"
        type="image/png"
        href="{{ asset('assets/images/favicon-144.png') }}"
        sizes="144x144">

    <!-- CSS Files -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}"
        rel="stylesheet">
    <link href="{{ asset('assets/css/bootstrap-extended.css') }}"
        rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}"
        rel="stylesheet">
    <link href="{{ asset('assets/css/icons.css') }}"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap"
        rel="stylesheet">
    <script src="https://cdn.ckeditor.com/ckeditor5/35.0.1/classic/ckeditor.js"></script>

    <!--Theme Styles-->
    <link href="{{ asset('assets/css/dark-theme.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('assets/css/semi-dark.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('assets/css/header-colors.css') }}"
        rel="stylesheet" />

    <title>Admin LKM Pandeglang || {{ $tittle }}</title>
</head>

<body>

    <!--start wrapper-->
    <div class="wrapper">

        <!--start sidebar -->
        <aside class="sidebar-wrapper"
            data-simplebar="true">
            <div class="sidebar-header">
                <div>
                    {{-- <img src="{{ asset('assets/images/logo.png') }}"
                        class="logo-icon"
                        alt="logo icon"> --}}
                </div>
                <div>
                    <h4 class="logo-text">Admin</h4>
                </div>
                <div class="toggle-icon ms-auto">
                    <ion-icon name="menu-sharp"></ion-icon>
                </div>
            </div>
            <!--navigation-->
            <ul class="metismenu"
                id="menu">

                <li>
                    <a href="{{ route('admin.dashboard') }}">
                        <div class="parent-icon">
                            <ion-icon name="home-sharp"></ion-icon>
                        </div>
                        <div class="menu-title">Dashboard</div>
                    </a>
                </li>

                <li>
                    <a class="has-arrow"
                        href="javascript:;">
                        <div class="parent-icon">
                            <ion-icon name="cube-sharp"></ion-icon>
                        </div>
                        <div class="menu-title">Produk & Layanan</div>
                    </a>
                    <ul>
                        <li> <a href="{{ route('produk.index') }}">
                                <ion-icon name="ellipse-outline"></ion-icon>Produk
                            </a>
                        </li>
                        <li> <a href="{{ route('layanan.index') }}">
                                <ion-icon name="ellipse-outline"></ion-icon>Layanan
                            </a>
                        </li>
                        <li> <a href="{{ route('birates.index') }}">
                                <ion-icon name="ellipse-outline"></ion-icon>BI Rate & LPS
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a class="has-arrow"
                        href="javascript:;">
                        <div class="parent-icon">
                            <ion-icon name="newspaper-sharp"></ion-icon>
                        </div>
                        <div class="menu-title">Artikel & Berita</div>
                    </a>
                    <ul>
                        <li> <a href="{{ route('berita.index') }}">
                                <ion-icon name="ellipse-outline"></ion-icon>Berita
                            </a>
                        </li>
                        <li> <a href="{{ route('promo.index') }}">
                                <ion-icon name="ellipse-outline"></ion-icon>Promo
                            </a>
                        </li>
                        <li> <a href="{{ route('karir.index') }}">
                                <ion-icon name="ellipse-outline"></ion-icon>Karir
                            </a>
                        </li>
                        <li> <a href="{{ route('mitra.index') }}">
                                <ion-icon name="ellipse-outline"></ion-icon>Mitra Asuransi
                            </a>
                        </li>
                        <li> <a href="{{ route('artikel.index') }}">
                                <ion-icon name="ellipse-outline"></ion-icon>Artikel
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a class="has-arrow"
                        href="javascript:;">
                        <div class="parent-icon">
                            <ion-icon name="business-sharp"></ion-icon>
                        </div>
                        <div class="menu-title">Profil LKM</div>
                    </a>
                    <ul>
                        <li> <a href="{{ route('tentang.index') }}">
                                <ion-icon name="ellipse-outline"></ion-icon>Tentang Kami
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.visi.index') }}">
                                <ion-icon name="ellipse-outline"></ion-icon>Visi
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.misi.index') }}">
                                <ion-icon name="ellipse-outline"></ion-icon>Misi
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.nilai.index') }}">
                                <ion-icon name="ellipse-outline"></ion-icon>Nilai
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.tata-kelola-perusahaan.index') }}">
                                <ion-icon name="ellipse-outline"></ion-icon>Tata Kelola Perusahaan
                            </a>
                        </li>
                        <li> <a href="{{ route('sejarah.index') }}">
                                <ion-icon name="ellipse-outline"></ion-icon>Sejarah Perusahaan
                            </a>
                        </li>
                        <li> <a href="{{ route('struktur.index') }}">
                                <ion-icon name="ellipse-outline"></ion-icon>Struktur Organisasi
                            </a>
                        </li>
                        <li> <a href="{{ route('penghargaan.index') }}">
                                <ion-icon name="ellipse-outline"></ion-icon>Penghargaan
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="{{ route('faq.index') }}">
                        <div class="parent-icon">
                            <ion-icon name="people-sharp"></ion-icon>
                        </div>
                        <div class="menu-title">Faq</div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('pesan.index') }}">
                        <div class="parent-icon">
                            <ion-icon name="document-text-outline"></ion-icon>
                        </div>
                        <div class="menu-title">Pesan</div>
                    </a>
                </li>

                <li>
                    <a class="has-arrow"
                        href="javascript:;">
                        <div class="parent-icon">
                            <ion-icon name="help-circle-sharp"></ion-icon>
                        </div>
                        <div class="menu-title">Permintaan E-Form</div>
                    </a>
                    <ul>
                        <li> <a href="{{ route('tabungan.index') }}">
                                <ion-icon name="ellipse-outline"></ion-icon>Tabungan
                            </a>
                        </li>
                        <li> <a href="{{ route('deposito.index') }}">
                                <ion-icon name="ellipse-outline"></ion-icon>Deposito
                            </a>
                        </li>
                        <li> <a href="{{ route('kredit.index') }}">
                                <ion-icon name="ellipse-outline"></ion-icon>Kredit
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('informasi.index') }}">
                        <div class="parent-icon">
                            <ion-icon name="information-circle-sharp"></ion-icon>
                        </div>
                        <div class="menu-title">Set up Informasi</div>
                    </a>
                </li>

                {{-- <li>
                    <a class="has-arrow"
                        href="javascript:;">
                        <div class="parent-icon">
                            <ion-icon name="document-sharp"></ion-icon>
                        </div>
                        <div class="menu-title">Laporan</div>
                    </a>
                    <ul>
                        <li> <a href="{{ route('publikasi.index') }}">
                                <ion-icon name="ellipse-outline"></ion-icon>Laporan Publikasi
                            </a>
                        </li>
                        <li> <a href="{{ route('tahunan.index') }}">
                                <ion-icon name="ellipse-outline"></ion-icon>Laporan Tahunan
                            </a>
                        </li>
                        <li> <a href="{{ route('kelola.index') }}">
                                <ion-icon name="ellipse-outline"></ion-icon>Laporan Tata Kelola
                            </a>
                        </li>
                    </ul>
                </li> --}}

                <li>
                    <a href="{{ route('admin.laporans.index') }}">
                        <div class="parent-icon">
                            <ion-icon name="document-sharp"></ion-icon>
                        </div>
                        <div class="menu-title">Laporan</div>
                    </a>
                    {{-- <ul>
                        <li> <a href="{{ route('publikasi.index') }}">
                                <ion-icon name="ellipse-outline"></ion-icon>Laporan Publikasi
                            </a>
                        </li>
                        <li> <a href="{{ route('tahunan.index') }}">
                                <ion-icon name="ellipse-outline"></ion-icon>Laporan Tahunan
                            </a>
                        </li>
                        <li> <a href="{{ route('kelola.index') }}">
                                <ion-icon name="ellipse-outline"></ion-icon>Laporan Tata Kelola
                            </a>
                        </li>
                    </ul> --}}
                </li>
            </ul>
            <!--end navigation-->
        </aside>
        <!--end sidebar -->
        <!--start top header-->
        <header class="top-header">
            <nav class="navbar navbar-expand gap-3">
                <div class="mobile-menu-button">
                    <ion-icon name="menu-sharp"></ion-icon>
                </div>
                <div class="top-navbar-right ms-auto">

                    <ul class="navbar-nav align-items-center">

                        <li class="nav-item dropdown dropdown-large">
                            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret"
                                href="javascript:;"
                                data-bs-toggle="dropdown">
                                <div class="position-relative">
                                    <span class="notify-badge">8</span>
                                    <ion-icon name="notifications-sharp"></ion-icon>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="javascript:;">
                                    <div class="msg-header">
                                        <p class="msg-header-title">Notifications</p>
                                        <p class="msg-header-clear ms-auto">Marks all as read</p>
                                    </div>
                                </a>
                                <div class="header-notifications-list">
                                    <a class="dropdown-item"
                                        href="javascript:;">
                                        <div class="d-flex align-items-center">
                                            <div class="notify text-primary">
                                                <ion-icon name="cart-outline"></ion-icon>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="msg-name">New Orders <span class="msg-time float-end">2 min
                                                        ago</span></h6>
                                                <p class="msg-info">You have recived new orders</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item"
                                        href="javascript:;">
                                        <div class="d-flex align-items-center">
                                            <div class="notify text-danger">
                                                <ion-icon name="person-outline"></ion-icon>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="msg-name">New Customers<span class="msg-time float-end">14
                                                        Sec
                                                        ago</span></h6>
                                                <p class="msg-info">5 new user registered</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item"
                                        href="javascript:;">
                                        <div class="d-flex align-items-center">
                                            <div class="notify text-success">
                                                <ion-icon name="document-outline"></ion-icon>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="msg-name">24 PDF File<span class="msg-time float-end">19
                                                        min
                                                        ago</span></h6>
                                                <p class="msg-info">The pdf files generated</p>
                                            </div>
                                        </div>
                                    </a>

                                    <a class="dropdown-item"
                                        href="javascript:;">
                                        <div class="d-flex align-items-center">
                                            <div class="notify text-info">
                                                <ion-icon name="checkmark-done-outline"></ion-icon>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="msg-name">New Product Approved <span
                                                        class="msg-time float-end">2 hrs ago</span></h6>
                                                <p class="msg-info">Your new product has approved</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item"
                                        href="javascript:;">
                                        <div class="d-flex align-items-center">
                                            <div class="notify text-warning">
                                                <ion-icon name="send-outline"></ion-icon>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="msg-name">Time Response <span class="msg-time float-end">28
                                                        min
                                                        ago</span></h6>
                                                <p class="msg-info">5.1 min avarage time response</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item"
                                        href="javascript:;">
                                        <div class="d-flex align-items-center">
                                            <div class="notify text-danger">
                                                <ion-icon name="chatbox-ellipses-outline"></ion-icon>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="msg-name">New Comments <span class="msg-time float-end">4
                                                        hrs
                                                        ago</span></h6>
                                                <p class="msg-info">New customer comments recived</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item"
                                        href="javascript:;">
                                        <div class="d-flex align-items-center">
                                            <div class="notify text-primary">
                                                <ion-icon name="albums-outline"></ion-icon>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="msg-name">New 24 authors<span class="msg-time float-end">1
                                                        day
                                                        ago</span></h6>
                                                <p class="msg-info">24 new authors joined last week</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item"
                                        href="javascript:;">
                                        <div class="d-flex align-items-center">
                                            <div class="notify text-success">
                                                <ion-icon name="shield-outline"></ion-icon>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="msg-name">Your item is shipped <span
                                                        class="msg-time float-end">5 hrs
                                                        ago</span></h6>
                                                <p class="msg-info">Successfully shipped your item</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item"
                                        href="javascript:;">
                                        <div class="d-flex align-items-center">
                                            <div class="notify text-warning">
                                                <ion-icon name="cafe-outline"></ion-icon>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="msg-name">Defense Alerts <span class="msg-time float-end">2
                                                        weeks
                                                        ago</span></h6>
                                                <p class="msg-info">45% less alerts last 4 weeks</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <a href="javascript:;">
                                    <div class="text-center msg-footer">View All Notifications</div>
                                </a>
                            </div>
                        </li>
                        <li class="nav-item dropdown dropdown-user-setting">
                            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret"
                                href="javascript:;"
                                data-bs-toggle="dropdown">
                                <div class="user-setting mb-0">
                                    <h6 class="mb-0">Admin</h6>
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <form action="{{ route('admin.logout') }}"
                                        method="POST">
                                        @csrf
                                        <div class="d-flex align-items-center">
                                            <button class="ti-power-off dropdown-item">
                                                <ion-icon name="log-out-outline"></ion-icon>&nbsp;&nbsp;Logout
                                            </button>
                                        </div>
                                    </form>
                                </li>
                            </ul>
                        </li>

                    </ul>

                </div>
            </nav>
        </header>
        <!--end top header-->

        @yield('content')

        <!--start switcher-->
        <div class="switcher-body">
            <button class="btn btn-primary btn-switcher shadow-sm"
                type="button"
                data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasScrolling"
                aria-controls="offcanvasScrolling">
                <ion-icon name="color-palette-sharp"
                    class="me-0"
                    style="color: #fff;"></ion-icon>
            </button>
            <div class="offcanvas offcanvas-end shadow border-start-0 p-2"
                data-bs-scroll="true"
                data-bs-backdrop="false"
                tabindex="-1"
                id="offcanvasScrolling">
                <div class="offcanvas-header border-bottom">
                    <h5 class="offcanvas-title"
                        id="offcanvasScrollingLabel">Theme Customizer</h5>
                    <button type="button"
                        class="btn-close text-reset"
                        data-bs-dismiss="offcanvas"></button>
                </div>
                <div class="offcanvas-body">
                    <h6 class="mb-0">Theme Variation</h6>
                    <hr>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input"
                            type="radio"
                            name="inlineRadioOptions"
                            id="LightTheme"
                            value="option1"
                            checked>
                        <label class="form-check-label"
                            for="LightTheme">Light</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input"
                            type="radio"
                            name="inlineRadioOptions"
                            id="DarkTheme"
                            value="option2">
                        <label class="form-check-label"
                            for="DarkTheme">Dark</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input"
                            type="radio"
                            name="inlineRadioOptions"
                            id="SemiDark"
                            value="option3">
                        <label class="form-check-label"
                            for="SemiDark">Semi Dark</label>
                    </div>
                    <hr />
                    <h6 class="mb-0">Header Colors</h6>
                    <hr />
                    <div class="header-colors-indigators">
                        <div class="row row-cols-auto g-3">
                            <div class="col">
                                <div class="indigator headercolor1"
                                    id="headercolor1"></div>
                            </div>
                            <div class="col">
                                <div class="indigator headercolor2"
                                    id="headercolor2"></div>
                            </div>
                            <div class="col">
                                <div class="indigator headercolor3"
                                    id="headercolor3"></div>
                            </div>
                            <div class="col">
                                <div class="indigator headercolor4"
                                    id="headercolor4"></div>
                            </div>
                            <div class="col">
                                <div class="indigator headercolor5"
                                    id="headercolor5"></div>
                            </div>
                            <div class="col">
                                <div class="indigator headercolor6"
                                    id="headercolor6"></div>
                            </div>
                            <div class="col">
                                <div class="indigator headercolor7"
                                    id="headercolor7"></div>
                            </div>
                            <div class="col">
                                <div class="indigator headercolor8"
                                    id="headercolor8"></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!--end switcher-->

        <!--start overlay-->
        <div class="overlay nav-toggle-icon"></div>
        <!--end overlay-->

    </div>
    <!--end wrapper-->

    <!-- JS Files-->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <!--plugins-->
    <script src="{{ asset('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/plugins/chartjs/chart.min.js') }}"></script>
    <script src="{{ asset('assets/js/index.js') }}"></script>
    <!-- Main JS-->
    <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>
