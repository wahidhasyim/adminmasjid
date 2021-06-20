<!-- Sidebar -->
<ul class="navbar-nav  bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <div class="sidebar-brand d-flex align-items-center justify-content-center bg-primary">
        <div class="sidebar-brand-icon">
            <i class="fas fa-mosque"></i>
        </div>
        <div class="sidebar-brand-text mx-3">WEKAMA TEAM</div>
</div>

    <!-- Divider -->
    <hr class="sidebar-divider position-fixed">
    <!-- Heading -->

    <?php
    $role_id = $this->session->userdata('role_id');
    $queryMenu = "select a.id,menu from user_menu a join user_access_menu b 
        on a.id = b.menu_id
        where b.role_id = $role_id  
        order by a.sort asc";
    $menu = $this->db->query($queryMenu)->result_array();
    ?>

    <?php foreach ($menu as $m) : ?>
        <div class="sidebar-heading">
            <?= $m['menu'] ?>
        </div>

        <!-- sub menu -->

        <?php
        $menu_id = $m['id'];
        $querysubmenu = "select * from user_sub_menu a join user_menu b 
            on a.menu_id = b.id
            where a.menu_id = $menu_id
            and a.is_active = 1";
        $submenu = $this->db->query($querysubmenu)->result_array();
        ?>
        <?php foreach ($submenu as $sm) : ?>
            <?php if ($title == $sm['title']) : ?>
                <li class="nav-item active">
                <?php else : ?>
                <li class="nav-item">
                <?php endif; ?>
                <a class="nav-link" href="<?= base_url($sm['url']) ?>">
                    <i class="<?= $sm['icon'] ?>"></i>
                    <span><?= $sm['title'] ?></span></a>
                </li>
                <!-- Divider -->
            <?php endforeach ?>
            <hr class="sidebar-divider">
        <?php endforeach ?>



      
        <!-- Divider -->
        
        <!-- Sidebar Toggler (Sidebar) -->
        <!-- <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div> -->

</ul>
<!-- End of Sidebar -->