<!DOCTYPE html>
<html lang="zxx">

<head>

    <?php if ($this->session->userdata('logado'))
        redirect(base_url()); ?>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <!-- External CSS libraries -->
    <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>assets/fonts/font-awesome/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>assets/fonts/flaticon/font/flaticon.css">

    <!-- Favicon icon -->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>/assets/images/favicon.ico">



    <!-- Custom Stylesheet -->
    <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
    <link rel="stylesheet" type="text/css" id="style_sheet" href="<?php echo base_url() ?>assets/css/skins/default.css">

</head>

<body id="top">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TAGCODE" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <div class="page_loader"></div>

    <!-- Login 3 start -->



    <div class="login-3 tab-box">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-7 col-md-12 col-pad-0 form-section">
                    <div class="login-inner-form">
                        <div class="details">
                            <a href="#">
                                <img class="logo" src="<?php echo base_url() ?>assets/images/StockCode-Logo.png" alt="logo">
                            </a>
                            <h3>Acesse com sua Conta</h3>
                            <form action="" method="POST">
                                <div class="form-group">
                                    <input type="email" name="email" class="input-text" placeholder="E-mail" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="input-text" placeholder="Senha" required>
                                </div>
                                <?php if ($this->session->flashdata('warning') == 'wrongpass') { ?>
                                    <p style="font-weight: bold; font-size: 16px; color: red;">A senha que você inseriu está incorreta!</p>
                                <?php } else if ($this->session->flashdata('warning') == 'unregistered') { ?>
                                    <p style="font-weight: bold; font-size: 16px; color: red;">E-mail não cadastrado!</p>
                                <?php } ?>
                                <div class=" clearfix">

                                    <!--<a href="forgot-password-3.html" style="color: black; ">Esqueci minha senha</a>-->
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn-md btn-theme btn-block">Entrar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-12 col-pad-0 bg-img none-992">
                </div>
            </div>
        </div>
    </div>
    <!-- Login 3 end -->

    <!-- External JS libraries -->
    <script src="assets/js/jquery-2.2.0.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Custom JS Script -->

</body>

<!-- Mirrored from storage.googleapis.com/themevessel-products/logdy/main/login-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 06 Dec 2019 03:26:23 GMT -->

</html>