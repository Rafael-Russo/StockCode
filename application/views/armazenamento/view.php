<link href="<?php echo base_url(); ?>assets/libs/dropzone/dropzone.min.css" rel="stylesheet" type="text/css" />

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
<div class="row">
    <div class="col-lg-6">
        <div class="card-box">
            <p class="text-uppercase bg-light p-2 mt-0 mb-3 font-weight-bold">Informações</p>
            <div class="form-group mb-3">
                <h3 id="nome" class="text-center text-uppercase"><?= $armazenamento['nome']; ?></h3>
            </div>
            <div class="form-group mb-3">
                <a href="<?php echo base_url($armazenamento['qr_code']); ?>" download>
                    <img id="qrcodePreview" src="<?= ($armazenamento['qr_code']) ? base_url($armazenamento['qr_code']) : ''; ?>" class="img-fluid d-block mx-auto" style="max-width: 50%; display: none;" />
                </a>
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
                                <tr class="clickable-row" data-href="<?php echo site_url('ferramenta/view/' . $f['id']); ?>">
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