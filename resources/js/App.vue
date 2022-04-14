<template>
    <div>
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <!-- <a class="navbar-brand ps-3" href="index.html">Start Bootstrap</a> -->
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!">
                <i class="bi bi-list"></i>
            </button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <!-- <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button">
                        <i class="bi bi-search"></i>
                    </button>
                </div> -->
            </form>

            <div class="logo">
                LOGO
            </div>    

            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <span class="userinfo">
                        <b>{{ userinfo.name }}</b>
                        <b>{{ userinfo.fullname }}</b>
                    </span>
                    
                    <!-- <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img :src="userinfo.avatar" alt="Avatar" class="avatar">
                    </a> -->

                    <router-link id="navbarDropdown" :to="{ name: 'ProfileAvatar' }">
                        <img :src="userinfo.avatar" alt="Avatar" class="avatar">
                    </router-link>

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
                            <router-link :to="{ name: 'DisplayItem' }" class="nav-link">
                                <div class="sb-nav-link-icon"><i class="bi bi-layout-text-sidebar-reverse"></i></div>
                                <span>Список задач</span>
                            </router-link>
                            <router-link :to="{ name: 'ProfileEdit' }" class="nav-link">
                                <div class="sb-nav-link-icon">                                    
                                    <i class="bi bi-clipboard-data-fill"></i>
                                </div>
                                <span>Личные данные</span>
                            </router-link>
                            <router-link :to="{ name: 'ProfileAvatar' }" class="nav-link">
                                <div class="sb-nav-link-icon">
                                    <i class="bi bi-person-circle"></i>
                                </div>
                                <span>Аватар</span>
                            </router-link>                            
                            
                            <a class="nav-link" href="logout"  onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                <div class="sb-nav-link-icon">
                                <i class="bi bi-box-arrow-right"></i>
                                <!-- <form id="logout-form" action="/logout" method="POST" class="d-none">
                                    
                                </form>   -->
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
                        <h2 class="mt-4">{{ pageTitle }}</h2>
                        
                        <div class="card">
                            <div class="card-body">                                
                                   <div class="container">
                                        <div>
                                            <transition name="fade777">
                                                <router-view></router-view>
                                            </transition>
                                        </div>
                                    </div>
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
    </div>
</template>

<style>
    .fade-enter-active, .fade-leave-active {
      transition: opacity .5s
    }
    .fade-enter, .fade-leave-active {
      opacity: 0
    }
</style>

<script>
    export default{

        data: {
            userinfo: {
                name: '',
                fullname: '',
                avatar: '/img/noavatar.png'
            }
        },

        created: function(){
            this.getUserInfo();
        },
        methods: {
            getUserInfo()
            {
              let uri = `/profile/userinfo`;
                this.axios.get(uri).then((response) => {
                    this.userinfo = response.data[0];
                });
            }
        },

        computed: {
            pageTitle: function() {
                document.title = this.$route.meta.title;
                return this.$route.meta.title;
            }
        }

    }
</script>