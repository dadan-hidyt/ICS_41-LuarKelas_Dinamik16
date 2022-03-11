<body id="page-top">
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
            <a style="background-color: #00fa9a;" class="sidebar-brand d-flex align-items-center justify-content-center" href="#">

                <div class="sidebar-brand-text mx-3"><img width="50px" src="<?= base_url() ?>assets/img/logo.png" alt=""></div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <a class="nav-link" href="<?= base_url() ?>admin">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Menu Navigation
            </div>


            <li class="nav-item">
                <a class="nav-link" href="<?= base_url() ?>admin/roadmap">
                    <i class="fa fa-map-signs" aria-hidden="true"></i>


                    <span>Roadmap manager</span>
                </a>
            </li>


            <li class="nav-item">
                <a class="nav-link" href="<?= base_url() ?>admin/fedback_roadmap">
                    <i class="fa fa-comments" aria-hidden="true"></i>


                    <span>Fedback Roadmap</span>
                </a>
            </li>
            <hr class="sidebar-divider">
        </ul>
        <!-- Sidebar -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- TopBar -->
                <nav style='background:orange;' class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
                    <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" onclick="return confirm('Apakah anda yakin?') " href="<?= base_url() ?>admin/logout">
                                <span class="ml-2 d-none d-lg-inline text-white small">Keluar</span>
                            </a>

                        </li>
                    </ul>
                </nav>
                <!-- Topbar -->
                <!-- Container Fluid-->
                <div class="container-fluid" id="container-wrapper">