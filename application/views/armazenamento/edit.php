<link href="<?php echo base_url(); ?>assets/libs/dropzone/dropzone.min.css" rel="stylesheet" type="text/css" />


<style id="compiled-css" type="text/css">
    .img-thumbnail {
        width: 100%;
        height: 40px;
        object-fit: cover;
        object-position: center;
        margin: 0px;
        float: left
    }

    @media(max-width: 480px) {
        .img-thumbnail {
            height: 50px;
        }
    }

    div.browse-wrap {
        width: 250px;
        margin: 0 auto;
        cursor: pointer;
        overflow: hidden;
        padding: 10px 20px 10px 20px;
        text-align: center;
        position: relative;
        background-color: #f6f7f8;
        border: solid 1px #d2d2d7;
    }

    div.browse-wrap2 {
        top: 0;
        left: 0;
        width: 60px;
        height: 60px;
        float: left;
        margin-top: -10px;
        cursor: pointer;
        overflow: hidden;
        padding: 10px 10px;
        text-align: center;
        position: relative;
        background-color: #3fb2c8;
        color: #fff;
        border-radius: 10px;
    }

    div.title {
        color: #3b5998;
        font-size: 14px;
        font-weight: bold;
        font-family: tahoma, arial, sans-serif;
    }

    input.upload {
        right: 0;
        margin: 0;
        bottom: 0;
        padding: 0;
        opacity: 0;
        height: 300px;
        outline: none;
        cursor: inherit;
        position: absolute;
        font-size: 1000px !important;
    }

    input.upload2 {
        right: 0;
        margin: 0;
        bottom: 0;
        padding: 0;
        opacity: 0;
        height: 300px;
        outline: none;
        cursor: inherit;
        position: absolute;
        font-size: 1000px !important;
    }

    span.upload-path {
        text-align: center;
        margin: 0px;
        display: block;
        font-size: 80%;
        color: #3b5998;
        font-weight: bold;
        font-family: tahoma, arial, sans-serif;
    }
</style>
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">

                    <li class="breadcrumb-item"><a href="javascript: void(0);">Ferramentas</a></li>
                    <li class="breadcrumb-item active">Atualizar</li>
                </ol>
            </div>
            <p class="page-title font-weight-bold text-uppercase">Atualizar Ferramenta</p>
        </div>
    </div>
</div>
<!-- end page title -->

<form method="POST" action="" enctype="multipart/form-data" id="formulario">
    <div class="row">
        <div class="col-lg-6">
            <div class="card-box">
                <p class="text-uppercase bg-light p-2 mt-0 mb-3 font-weight-bold">Informações</p>
                <div class="form-group mb-3">
                    <label>Nome <span class="text-danger">*</span></label>
                    <input type="text" name="nome" value="<?php echo $armazenamento['nome']; ?>" class="form-control" id="nome" />
                </div>
                <div class="form-group mb-3">
                    <label>QR Code <span class="text-danger">*</span></label>
                    <input type="text" name="qrcode" value="<?php echo $armazenamento['qr_code']; ?>" class="form-control" id="qrcode" />
                </div>
            </div> <!-- end card-box -->
        </div> <!-- end col -->
        <div class="col-lg-6">
            <div class="card-box">
                <p class="text-uppercase bg-light p-2 mt-0 mb-3 font-weight-bold">Ferramentas</p>
                <?php
                if (!$ferramentas) {
                ?>
                    <p class="text-uppercase p-2 mt-0 mb-3">Nenhuma Ferramenta Disponível</p>
                <?php
                } else {
                ?>
                    <div class="table-responsive">
                        <table id="demo-foo-filtering" class="table table-bordered toggle-circle mb-0" data-page-size="7">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Calibragem</th>
                                    <th>QR Code</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($ferramentas as $f) { ?>
                                    <tr class="clickable-row" data-href="<?php echo site_url('ferramenta/editar/' . $f['id']); ?>">
                                        <td style="text-transform: uppercase"><?php echo $f['nome']; ?></td>
                                        <td>
                                            <?php echo ($f['calibragem'] == 1) ? "<span class='badge label-table badge-success'  style='padding-top:5px;'>CALIBRADO</span>" : "<span class='badge label-table badge-danger' style='padding-top:5px;'>DESCALIBRADO</span>"; ?>
                                        </td>
                                        <td><img src="<?php echo base_url($f['qr_code']); ?>" alt="" height="40"></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div> <!-- end table-responsive -->
                <?php
                }
                ?>
            </div> <!-- end card-box -->
        </div> <!-- end col -->
    </div>
    <!-- end row -->
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <div class="text-right mb-3">
                <input type="submit" class="btn  w-sm btn-success waves-effect waves-light" value="PROSSEGUIR" />
            </div>
        </div> <!-- end col -->
    </div>
    <!-- end row -->

</form>
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', (event) => {
        const rows = document.querySelectorAll('.clickable-row');
        rows.forEach(row => {
            row.addEventListener('click', () => {
                window.location.href = row.getAttribute('data-href');
            });
        });
    });
</script>