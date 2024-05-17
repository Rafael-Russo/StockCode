    <?php $usuario = $this->Usuario_model->get_usuario($this->session->userdata('id')); ?>

    <body>
        <header id="topnav">
            <!-- Topbar Start -->
            <div class="navbar-custom">
                <div class="container-fluid">
                    <ul class="list-unstyled topnav-menu float-right mb-0">
                        <li class="dropdown notification-list">
                            <!-- Mobile menu toggle-->
                            <a class="navbar-toggle nav-link">
                                <div class="lines">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </a>
                            <!-- End mobile menu toggle-->
                        </li>

                        <li class="dropdown notification-list">
                            <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <i class="fas fa-user"></i>
                                <span class="pro-user-name ml-1 font-weight-bold">
                                    <?php echo $this->session->userdata('usuario') ?> 
                                    <i class="mdi mdi-chevron-down"></i>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                <!-- item-->


                                <!-- item-->
                                <a href="<?php echo base_url('usuario/sair'); ?>" class="dropdown-item notify-item">
                                    <i class="fe-log-out"></i>
                                    <span>Sair do Sistema</span>
                                </a>

                            </div>
                        </li>
                    </ul>

                    <!-- LOGO -->
                    <div class="logo-box">
                        <a href="<?php echo base_url(); ?>" class="logo text-center">
                            <span class="logo-lg">
                                <img src="<?php echo base_url('assets/images/StockCode-Logo.png'); ?>" alt="" height="80">
                                <!-- <span class="logo-lg-text-light">UBold</span> -->
                            </span>
                            <span class="logo-sm">
                                <!-- <span class="logo-sm-text-dark">U</span> -->
                                <img src="<?php echo base_url('assets/images/StockCode-Logo.png'); ?>" alt="" height="80">
                            </span>
                        </a>
                    </div>
                </div> <!-- end container-fluid-->
            </div>
            <!-- end Topbar -->