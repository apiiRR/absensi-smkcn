{{-- <!doctype html>
<html lang="en">

<head> --}}
<!-- Required meta tags -->
{{-- <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> --}}

<!-- Bootstrap CSS -->
{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

    <link rel="shortcut icon" href="{{ asset('img/DED.ico') }}" />

<link rel="stylesheet" href="{{ asset('user/style.css') }}">

<title>Jarvis - Portal Absen</title>
@livewireStyles
</head>

<body>
    <nav class="p-0 navbar navbar-expand narbar-dark bg-white text-secondary fixed-bottom border-top border-2">
        <ul class="navbar-nav nav-justified mx-auto" style="width: 600px;">
            <li class="nav-item">
                <a href="{{ route('siswa') }}" class="nav-link fw-bold text text-secondary">
                    <svg class="{{ Request::routeIs('siswa') ? 'active' : '' }}" xmlns="http://www.w3.org/2000/svg"
                        width="1.5em" height="1.5em" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                        <path fill-rule="evenodd"
                            d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
                    </svg>
                    <span class="small d-block {{ Request::routeIs('siswa') ? 'active' : '' }}">Beranda</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('absen') }}" class="nav-link fw-bold text-secondary">
                    <svg class="{{ Request::routeIs('absen') ? 'active' : '' }}" xmlns="http://www.w3.org/2000/svg"
                        width="1.5em" height="1.5em" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                        <path
                            d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                        <path
                            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                    </svg>
                    <span class="small d-block {{ Request::routeIs('absen') ? 'active' : '' }}">Absen</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('riwayat') }}" class="nav-link fw-bold text-secondary">
                    <svg class="{{ Request::routeIs('riwayat') ? 'active' : '' }}" xmlns="http://www.w3.org/2000/svg"
                        width="1.5em" height="1.5em" fill="currentColor" class="bi bi-journals" viewBox="0 0 16 16">
                        <path
                            d="M5 0h8a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2 2 2 0 0 1-2 2H3a2 2 0 0 1-2-2h1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1H1a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v9a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1H3a2 2 0 0 1 2-2z" />
                        <path
                            d="M1 6v-.5a.5.5 0 0 1 1 0V6h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V9h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 2.5v.5H.5a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1H2v-.5a.5.5 0 0 0-1 0z" />
                    </svg>
                    <span class="small d-block {{ Request::routeIs('riwayat') ? 'active' : '' }}">Riwayat</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('profil') }}" class="nav-link fw-bold text-secondary">
                    <svg class="{{ Request::routeIs('profil') ? 'active' : '' }}" xmlns="http://www.w3.org/2000/svg"
                        width="1.5em" height="1.5em" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                        <path
                            d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                    </svg>
                    <span class="small d-block {{ Request::routeIs('profil') ? 'active' : '' }}">Akun</span>
                </a>
            </li>
        </ul>
    </nav> --}}

    <!-- <nav class="navbar navbar-light" style="background-color: #91bcee;"> -->
    <!-- <div class="container mx-auto"> -->
    <!-- <a class="navbar-brand" href="#"> -->
    <!-- <img src="cropped-logo-jarvis-samping.png" alt="" width="150"> -->
    <!-- </a> -->
    <!-- </div> -->
    <!-- </nav> -->

    {{-- <div class="container mt-4">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script> --}}


    {{-- @stack('javascript')
    @livewireScripts --}}
    {{-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top',
            showConfirmButton: false,
            showCloseButton: true,
            timer: 5000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });

        window.addEventListener('alert', ({
            detail: {
                type,
                message
            }
        }) => {
            Toast.fire({
                icon: type,
                title: message
            })
        })
    </script>
    @include('sweetalert::alert') --}}
</body>

</html>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover">
    <title>Jarvis - Portal Absen</title>
    <!-- <meta name="theme-color" content="#6236ff"> -->
    <!-- <meta name="msapplication-navbutton-color" content="#6236ff"> -->
    <!-- <meta name="apple-mobile-web-app-status-bar-style" content="#6236ff"> -->

    <!-- Favicons -->
    <!-- <link rel="shortcut icon" href="https://absen.s-widodo.com/sw-content/favicon.png"> -->

    <link rel="stylesheet" href="{{ asset('user/style.css') }}">
    <link rel="stylesheet" href="{{ asset('user/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('datatables/DataTables-1.11.2/css/dataTables.bootstrap4.min.css') }}">
    {{-- <link rel="stylesheet"
        href="https://absen.s-widodo.com//sw-mod/sw-assets/js/plugins/datatables/dataTables.bootstrap.css"> --}}
    <link
        href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900&display=swap"
        rel="stylesheet">
</head>

<body>
    <!-- * loader -->
    <!-- App Header -->
    <div class="appHeader bg-primary text-light">
        <div class="left">
            <a href="#" class="headerButton" data-toggle="modal" data-target="#sidebarPanel">
                <ion-icon name="menu-outline"></ion-icon>
            </a>
        </div>
        <div class="right">
            <div class="headerButton" data-toggle="dropdown" id="dropdownMenuLink" aria-haspopup="true">
                @if (Auth::user()->photo)
                <img src="{{ asset('img/'. Auth::user()->photo) }}" alt="image" class="imaged w32">
                @else
                <img src="{{ asset('img/undraw_profile.svg') }}" alt="image" class="imaged w32">
                @endif
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="{{ route('profil.index') }}">
                        <ion-icon size="small" name="person-outline"></ion-icon>Profil
                    </a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <ion-icon size="small" name="log-out-outline"></ion-icon>Keluar
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- App Sidebar -->
    <div class="modal fade panelbox panelbox-left" id="sidebarPanel" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <!-- profile box -->
                    <div class="profileBox pt-2 pb-2">
                        <div class="image-wrapper">
                            @if (Auth::user()->photo)
                            <img src="{{ asset('img/'. Auth::user()->photo) }}" alt="image" class="imaged  w36">
                            @else
                            <img src="{{ asset('img/undraw_profile.svg') }}" alt="image"
                                class="imaged  w36">
                            @endif
                        </div>
                        <div class="in">
                            <strong>{{ Auth::user()->name }}</strong>
                            <div class="text-muted">{{ Auth::user()->email }}</div>
                        </div>
                        <a href="#" class="btn btn-link btn-icon sidebar-close" data-dismiss="modal">
                            <ion-icon name="close-outline"></ion-icon>
                        </a>
                    </div>
                    <!-- * profile box -->

                    <!-- menu -->
                    <div class="listview-title mt-1">Absen</div>
                    <ul class="listview flush transparent no-line image-listview">
                        <li>
                            <a href="/" class="item">
                                <div class="icon-box bg-primary">
                                    <ion-icon name="home-outline"></ion-icon>
                                </div> Home
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('absen.index') }}" class="item">
                                <div class="icon-box bg-primary">
                                    <ion-icon name="scan-outline"></ion-icon>
                                </div>
                                Absen
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('riwayat.index') }}" class="item">
                                <div class="icon-box bg-primary">
                                    <ion-icon name="document-text-outline"></ion-icon>
                                </div>
                                History
                            </a>
                        </li>
                        <li>
                            <a href="./id-card" class="item">
                                <div class="icon-box bg-primary">
                                    <ion-icon name="id-card-outline"></ion-icon>
                                </div>
                                ID Card
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('profil.index') }}" class="item">
                                <div class="icon-box bg-primary">
                                    <ion-icon name="person-outline"></ion-icon>
                                </div>
                                Profil
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('logout') }}" class="item"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <div class="icon-box bg-primary">
                                    <ion-icon name="log-out-outline"></ion-icon>
                                </div>
                                Keluar
                            </a>
                        </li>

                    </ul>
                    <!-- * menu -->
                </div>
            </div>
        </div>
    </div>
    <!-- * App Sidebar -->
    <!-- App Capsule -->
    <div id="appCapsule">
        @yield('content')
    </div>
    <!-- * App Capsule -->
    <div class="appBottomMenu">
        <a href="/" class="item">
            <div class="col">
                <ion-icon name="home-outline"></ion-icon>
                <strong>Home</strong>
            </div>
        </a>

        <a href="{{ route('absen.index') }}" class="item">
            <div class="col">
                <ion-icon name="camera-outline"></ion-icon>
                <strong>Absen</strong>
            </div>
        </a>

        <a href="{{ route('riwayat.index') }}" class="item">
            <div class="col">
                <ion-icon name="document-text-outline"></ion-icon>
                <strong>History</strong>
            </div>
        </a>

        <a href="{{ route('profil.index') }}" class="item">
            <div class="col">
                <ion-icon name="person-outline"></ion-icon>
                <strong>Profil</strong>
            </div>
        </a>
    </div>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
    <!-- * App Bottom Menu -->
    <!-- ///////////// Js Files ////////////////////  -->
    <script src="https://code.jquery.com/jquery-3.5.1.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    {{-- <script src="https://cdn.datatables.net/1.11.2/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.2/js/jquery.dataTables.min.js"></script> --}}
    {{-- <script src="{{ asset('datatables/DataTables-1.11.2/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('datatables/DataTables-1.11.2/js/dataTables.bootstrap4.min.js') }}"></script> --}}
    <script src="https://absen.s-widodo.com/sw-mod/sw-assets/js/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="https://absen.s-widodo.com/sw-mod/sw-assets/js/plugins/datatables/dataTables.bootstrap.min.js">
    </script>
    <!-- Ionicons -->
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
    <script src="https://kit.fontawesome.com/0ccb04165b.js" crossorigin="anonymous"></script>
    @stack('javascript')
</body>

</html>