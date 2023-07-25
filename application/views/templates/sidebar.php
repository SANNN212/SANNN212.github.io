<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon ">
                <?php if($this->session->userdata('username')){ ?>
        <li>
            <div class="navbar-text">SELAMAT DATANG <?php echo $this->session->userdata('username'); ?></div>
        </li>
                </div>
                <div class="sidebar-brand-text mx-3">
                    
                </sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url('dashboard') ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Kategori
            </div>

            
            <!-- Nav Item - Tables -->
    

            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('kategori/agama/') ?>">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Sumbangan Keagamaan</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('kategori/manusia/') ?>">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Sumbangan Kemanusiaan</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('kategori/pendidikan/') ?>">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Sumbangan Pendidikan</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('kategori/sehat/') ?>">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Sumbangan Sehat</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('kategori/bencana/') ?>">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Sumbangan Bencana</span></a>
            </li>
           
           
           


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
<br>
            <li>
            <form action="<?php echo site_url('auth/logout'); ?>" method="post" class="text-center">
                <button type="submit" class="btn btn-primary ">LOG OUT</button>
            </form>
        </li>
    <?php } else { ?>
        <li><?php echo anchor('auth/login', 'LOGIN'); ?></li>
    <?php } ?>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

             
                <div class="navbar-form">
                        <?php echo form_open('dashboard/search');?>
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" method="post" ">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." name="keyword" autocomplete="off" autofocus>
                            <div class="input-group-append">
                                <input class="btn btn-primary" type="submit" name="submit" value="cari">
                            </div>
                        </div>
                    </form>
                    <?php echo form_close()?>
                </div>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <div class="navbar">
                            <ul class="nav navbar-nav navbar-right">
                                <li>
                                  
                                <?php echo anchor('dashboard/riwayat_transaksi/','<div class="btn btn-sm btn-danger">Transaksi</div>')?>      
                                   
                                </li>
                            </ul>
                        </div> 
                       

                        <div class="topbar-divider d-none d-sm-block"></div>


                    </ul>
                </nav>
            </div>

           