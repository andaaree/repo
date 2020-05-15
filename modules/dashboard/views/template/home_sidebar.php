        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="<?php echo base_url('dashboard')?>" class="brand-link">
                <img src="<?php echo base_url('assets/img/thumbs/sneakers2.png')?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3 rotate-15" style="opacity: .8">
                <span class="brand-text font-weight-light">Admin</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?php echo base_url('assets/img/thumbs/user-default.jpg')?>" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="<?php echo base_url()?>profile" class="d-block"><?php echo ucfirst($this->session->userdata('username')) ?></a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item has-treeview">
                            <a href="<?php echo base_url('dashboard')?>" class="nav-link <?php if($this->uri->uri_string() == 'dashboard') { echo 'active'; } ?>">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-header">Management</li>
                        <li class="nav-item has-treeview <?php if(strpos($this->uri->uri_string(), 'products') !== false){echo 'menu-open';} else{echo '';}?>">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-shopping-bag"></i>
                                <p>
                                    Products
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                <a href="<?php echo base_url('')?>products" class="nav-link">
                                    <i class="nav-icon far fa-<?php if($this->uri->uri_string() == 'products') { echo 'dot-circle'; }else{ echo'circle';} ?>"></i>
                                    <p>Overview</p>
                                </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url('')?>products/add" class="nav-link">
                                        <i class="far fa-<?php if($this->uri->uri_string() == 'products/add') { echo 'dot-circle'; }else{ echo'circle';} ?> nav-icon"></i>
                                        <p>Add Product</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview <?php if(strpos($this->uri->uri_string(), 'category') !== false){echo 'menu-open';} else{echo '';}?>">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-tags"></i>
                                <p>
                                    Category
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                <a href="<?php echo base_url('')?>category" class="nav-link">
                                    <i class="nav-icon far fa-<?php if($this->uri->uri_string() == 'category') { echo 'dot-circle'; }else{ echo'circle';} ?>"></i>
                                    <p>Overview</p>
                                </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url('')?>category/add" class="nav-link">
                                        <i class="far nav-icon fa-<?php if($this->uri->uri_string() == 'category/add') { echo 'dot-circle'; }else{ echo'circle';} ?>"></i>
                                        <p>Add Category</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url('')?>category/prod" class="nav-link">
                                        <i class="far nav-icon fa-<?php if($this->uri->uri_string() == 'category/prod') { echo 'dot-circle'; }else{ echo'circle';} ?>"></i>
                                        <p>Categorized Products</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview <?php if(strpos($this->uri->uri_string(), 'vendor') !== false){echo 'menu-open';} else{echo '';}?>">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-industry"></i>
                                <p>
                                    Vendor
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                <a href="<?php echo base_url('')?>vendor" class="nav-link">
                                    <i class="nav-icon far fa-<?php if($this->uri->uri_string() == 'vendor') { echo 'dot-circle'; }else{ echo'circle';} ?>"></i>
                                    <p>Overview</p>
                                </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url('')?>vendor/add" class="nav-link">
                                        <i class="far nav-icon fa-<?php if($this->uri->uri_string() == 'vendor/add') { echo 'dot-circle'; }else{ echo'circle';} ?>"></i>
                                        <p>Add Vendor</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url('')?>vendor/prod" class="nav-link">
                                        <i class="far nav-icon fa-<?php if($this->uri->uri_string() == 'vendor/prod') { echo 'dot-circle'; }else{ echo'circle';} ?>"></i>
                                        <p>Vendorized Products</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-header">MISCELLANEOUS</li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('')?>profile" class="nav-link <?php if($this->uri->uri_string() == 'profile') { echo 'active'; } ?>">
                                <i class="nav-icon fas fa-user"></i>
                                <p>Profile</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('')?>login/logout" class="nav-link <?php if($this->session->userdata('username') != null) { echo 'active'; } ?>">
                                <i class="nav-icon fas fa-lock"></i>
                                <p>Logout</p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>