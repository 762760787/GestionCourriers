<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('../assets/img/favicon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('../assets/img/favicon.png') }}">
    <title>
        Gestion de Courrier MNG
    </title>
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,900" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{ asset('../assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <link href="{{ asset('../assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link id="pagestyle" href="{{ asset('../assets/css/material-dashboard.css?v=3.2.0') }}" rel="stylesheet" />
    <style>
        @media (max-width: 991.98px) {
            .sidenav {
                transform: translateX(-100%);
                transition: transform 0.3s ease-in-out;
                position: fixed;
                z-index: 1000;
                height: 100vh;
                overflow-y: auto;
            }

            .sidenav.show {
                transform: translateX(0);
            }

            .navbar-toggler {
                display: block;
            }
        }

        @media (min-width: 992px) {
            .navbar-toggler {
                display: none;
            }
        }
    </style>
</head>

<body class="g-sidenav-show bg-gray-100">
    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-radius-lg fixed-start ms-2 bg-white my-2" id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-dark opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand px-4 py-3 m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
                <img src="{{ asset('../assets/img/logo-ct-dark.png') }}" class="navbar-brand-img" width="26" height="26" alt="main_logo">
                <span class="ms-1 text-sm text-dark">NG Courrier</span>
            </a>
        </div>
        <hr class="horizontal dark mt-0 mb-2">
        <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('accueil') ? 'active bg-gradient-dark text-white' : 'text-dark' }}" href="/accueil">
                        <i class="material-symbols-rounded opacity-5">dashboard</i>
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('courrier-entrants*') ? 'active bg-gradient-dark text-white' : 'text-dark' }}" href="{{ route('courrier-entrants.index') }}">
                        <i class="material-symbols-rounded opacity-5">table_view</i>
                        <span class="nav-link-text ms-1">Courrier Arrivée</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('courrier-sortants*') ? 'active bg-gradient-dark text-white' : 'text-dark' }}" href="{{ route('courrier-sortants.index') }}">
                        <i class="material-symbols-rounded opacity-5">table_view</i>
                        <span class="nav-link-text ms-1">Courrier de Départ</span>
                    </a>
                </li>
                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs text-dark font-weight-bolder opacity-5">Account pages</h6>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('register') ? 'active bg-gradient-dark text-white' : 'text-dark' }}" href="{{ route('login.create') }}">
                        <i class="material-symbols-rounded opacity-5">assignment</i>
                        <span class="nav-link-text ms-1">Créer un Compte</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('logout') ? 'active bg-gradient-dark text-white' : 'text-dark' }}" href="{{ route('logout') }}">
                        <i class="material-symbols-rounded opacity-5">login</i>
                        <span class="nav-link-text ms-1">Deconnexion</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-3 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
            <div class="container-fluid py-1 px-3">
                <!-- Bouton de menu -->
                <button class="navbar-toggler d-lg-none d-xl-none" type="button" id="sidebarToggle">
                    <i class="material-symbols-rounded">menu</i>
                </button>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
                    </ol>
                </nav>
            </div>
        </nav>
        @yield('page-content')
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const sidebarToggle = document.getElementById('sidebarToggle');
            const sidenav = document.getElementById('sidenav-main');

            if (sidebarToggle && sidenav) {
                sidebarToggle.addEventListener('click', function () {
                    sidenav.classList.toggle('show');
                });
            }
        });
    </script>

    <script src="{{ asset('../assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('../assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('../assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('../assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script src="{{ asset('../assets/js/plugins/chartjs.min.js') }}"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="{{ asset('../assets/js/material-dashboard.min.js?v=3.2.0') }}"></script>
</body>

</html>