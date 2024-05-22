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

<form method="POST" action="" enctype="multipart/form-data" id="formulario">
    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-6">
            <div class="card-box">
                <p class="text-uppercase bg-light p-2 mt-0 mb-3 font-weight-bold">Informações</p>
                <div class="form-group mb-3">
                    <label>Nome <span class="text-danger">*</span></label>
                    <input type="text" name="nome" value="<?php echo $ferramenta['nome']; ?>" class="form-control" id="nome" />
                </div>
                <div class="form-inline mb-3">
                    <input type="checkbox" name="calibragem" value="1" class="form-control" id="calibragem" <?php echo ($ferramenta['calibragem'] == 1) ? 'checked' : ''; ?> />
                    <label class="ml-2">Calibrado <span class="text-danger">*</span></label>
                </div>
                <div class="form-group mb-3">
                    <label>Imagem <span class="text-danger">*</span></label>
                    <img id="imgPreview" src="<?= ($ferramenta['img']) ? base_url($ferramenta['img']) : ''; ?>" class="img-fluid d-block mx-auto mb-3" style="max-width: 50%; display: none;" />
                    <label class="btn btn-primary d-block mx-auto" style="max-width: 20%;">
                        Selecionar Imagem
                        <input type="file" name="img" id="img" accept="image/*" onchange="previewImage(event, 'imgPreview')" style="display: none;" />
                    </label>
                </div>
                <div class="form-group mb-3">
                    <label>QR Code <span class="text-danger">*</span></label>
                    <input type="hidden" name="qrcode" id="qrcode" value="" />
                    <img id="qrcodePreview" src="<?= ($ferramenta['qr_code']) ? base_url($ferramenta['qr_code']) : ''; ?>" class="img-fluid d-block mx-auto" style="max-width: 50%; display: none;" />
                </div>
                <div class="form-group mb-3">
                    <label>Armazém:</label>
                    <select class="form-control select2" id="armazenamento" name="armazenamento">
                        <option value="0" <?= ($ferramenta['armazenamento'] == null || $ferramenta['armazenamento'] == 0) ? 'selected' : '' ?>>
                            Nenhum
                        </option>
                        <?php foreach ($armazenamentos as $armazem) : ?>
                            <option value="<?= $armazem['id'] ?>" <?= ($ferramenta['armazenamento'] == $armazem['id']) ? 'selected' : '' ?>>
                                <?= $armazem['nome'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
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
<script>
    function previewImage(event, previewId) {
        const input = event.target;
        const preview = document.getElementById(previewId);
        const reader = new FileReader();

        reader.onload = function() {
            preview.src = reader.result;
            preview.style.display = 'block';
        }

        if (input.files && input.files[0]) {
            reader.readAsDataURL(input.files[0]);
        }
    }

    // Supondo que você tenha um mecanismo para obter a URL do QR Code gerado
    function updateQRCodePreview(qrCodeUrl) {
        const qrcodeInput = document.getElementById('qrcode');
        const qrcodePreview = document.getElementById('qrcodePreview');

        qrcodeInput.value = qrCodeUrl;
        qrcodePreview.src = qrCodeUrl;
        qrcodePreview.style.display = 'block';
    }

    // Exemplo de chamada da função de atualização do QR Code
    // updateQRCodePreview('URL_GERADA_PELO_SEU_BACKEND');
</script>