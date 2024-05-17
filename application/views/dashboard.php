<div style="width:100%; height:300px; background:#222;">


    <div class="wrapper">
        <div class="container-fluid">

            <div class="row" style="margin-top:-70px;">
                <div class="col-lg-4">
                    <div class="card-box" style="background:#333;" dir="ltr">
                        <p class="header-title mb-3" style="font-size:16px; color:fff; text-align:center; margin:0px;">TOTAL DO DIA</p>
                        <div class="text-center">

                            <p class="font-weight-bold" style="font-size:40px; color:#fff; margin-top:-20px;">R$ <span><?php echo number_format($total_dia['total'], 2, ",", "."); ?></span></p>
                            <p><span data-plugin="counterup"><?php echo $qtd_dia['total']; ?></span> pedidos</p>

                        </div>
                    </div> <!-- end card-box-->
                </div> <!-- end col-->

                <div class="col-lg-4">
                    <div class="card-box" style="background:#333;" dir="ltr">
                        <p class="header-title mb-3" style="font-size:16px; color:fff; text-align:center; margin:0px;">TOTAL DO MÊS</p>
                        <div class="text-center">

                            <p class="font-weight-bold" style="font-size:40px; color:#fff; margin-top:-20px;">R$ <span> <?php echo number_format($total_mes['total'], 2, ",", "."); ?><span></p>
                            <p><span data-plugin="counterup"><?php echo $qtd_mes['total']; ?></span> pedidos</p>
                        </div>

                    </div> <!-- end card-box-->
                </div> <!-- end col-->

                <div class="col-lg-4">
                    <div class="card-box" style="background:#333;" dir="ltr">
                        <p class="header-title mb-3" style="font-size:16px; color:fff; text-align:center; margin:0px;">TOTAL DO ANO</p>
                        <div class="text-center">

                            <p class="font-weight-bold" style="font-size:40px; color:#fff; margin-top:-20px; margin-left:-20px; white-space: nowrap;">R$ <span><?php echo number_format($total_ano['total'], 2, ",", "."); ?></span></p>
                            <p><span data-plugin="counterup"><?php echo $qtd_ano['total']; ?></span> pedidos</p>
                        </div>

                    </div> <!-- end card-box-->
                </div> <!-- end col-->
            </div>
            <!-- end row -->
        </div> <!-- end container -->
    </div>
    <!-- end wrapper -->



</div>

<!-- Plugins js -->
<script src="<?php echo base_url(); ?>assets/libs/morris-js/morris.min.js"></script>
<script src="<?php echo base_url(); ?>assets/libs/raphael/raphael.min.js"></script>


<!-- Dashboard init-->
<script src="<?php echo base_url(); ?>assets/js/pages/dashboard-4.init.js"></script>