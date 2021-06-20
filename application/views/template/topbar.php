<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Sidebar Toggle (Topbar) -->
            <!-- <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button> -->

            <h6><?php date_default_timezone_set('Asia/Jakarta');
                echo date('l, j F Y') ?> </h6>

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">

            
            <?php
                $role_id = $this->session->userdata('role_id');
                if($role_id == 2) {
            ?>      
                    <a class="dropdown-item navbar" href="<?= base_url('anggota/index') ?>" style="font-size: small;">
                     Anggota</a>


                    <a class="dropdown-item navbar" href="<?= base_url('admin/datamasjid') ?>" style="font-size: small;">
                    Data Masjid</a>

                    <?php
                } else if ($role_id == 1) {
                    ?>

                    <a class="dropdown-item navbar" href="<?= base_url('admin/datamasjid') ?>" style="font-size: small;">
                    Data Masjid</a>

                    <?php
                } else {
                ?>

                <?php
                }
                ?>

                <div class="topbar-divider d-none d-sm-block"></div>

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>    
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php
                $role_id = $this->session->userdata('role_id');
                if($role_id == 2) {
            ?>      
                    <?php echo("Selamat Datang, Pengurus ") . $user['name'] ?>
                    <?php
                } else if ($role_id == 1) {
                    ?>
                    <?php echo("Selamat Datang, Admin ") . $user['name'] ?>

                    <?php
                } else {
                ?>
                    <?php echo("Selamat Datang, Berdahara ") . $user['name'] ?>
                <?php
                }
                ?></span>
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

                       
                        <a class="dropdown-item" href="<?= base_url('auth/logout') ?>" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    
                </li>

            </ul>

        </nav>
        <!-- End of Topbar -->