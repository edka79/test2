<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>{{ config('app.name', 'Laravel') }}</title>        
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    </head>
    <body>
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <!-- <a class="navbar-brand ps-3" href="index.html">Start Bootstrap</a> -->
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!">
                <i class="bi bi-list"></i>
            </button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="/img/noavatar.png" alt="Avatar" class="avatar">
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">                        
                        <li><a class="dropdown-item" href="#">Выйти</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">                            
                            <a class="nav-link {{ request()->routeIs('/profile/tasks') ? 'active' : '' }}" href="/profile/tasks/">
                                <div class="sb-nav-link-icon"><i class="bi bi-layout-text-sidebar-reverse"></i></div>
                                <span>Список задач</span>
                            </a>
                            <a class="nav-link {{ request()->routeIs('/profile/edit') ? 'active' : '' }}" href="/profile/edit">
                                <div class="sb-nav-link-icon">
                                    <i class="bi bi-person-circle"></i>
                                </div>
                                <span>Личные данные</span>
                            </a>
                            <a class="nav-link" href="/profile/setting">
                                <div class="sb-nav-link-icon">
                                    <i class="bi bi-gear"></i>
                                </div>
                                <span>Настройки</span>
                            </a>
                            <a class="nav-link" href="{{ route('logout') }}"  onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                <div class="sb-nav-link-icon">
                                <i class="bi bi-box-arrow-right"></i>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>  
                                </div>
                                <span>Выйти</span>
                            </a>
                        </div>
                    </div>                    
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Static Navigation</h1>                        
                        
                        <div class="card">
                            <div class="card-body">                                
                                   @yield('content')
                            </div>
                        </div>
                                               
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-center small">
                            <div class="text-muted">&copy; 2022</div>                            
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <!-- Scripts -->
        <script src="{{ asset('js/menu.js') }}" defer></script>
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </body>
</html>
