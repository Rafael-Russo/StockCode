<link href="<?php echo base_url(); ?>assets/libs/dropzone/dropzone.min.css" rel="stylesheet" type="text/css" />

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">

                    <li class="breadcrumb-item"><a href="javascript: void(0);">Ferramentas</a></li>
                    <li class="breadcrumb-item active">Adicionar Nova</li>
                </ol>
            </div>
            <p class="page-title font-weight-bold text-uppercase">Adicionar Nova Ferramenta</p>
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
                    <input type="text" name="nome" value="" class="form-control" id="nome" />
                </div>
                <div class="form-inline mb-3">
                    <input type="checkbox" name="calibragem" value="1" class="form-control" id="calibragem" />
                    <label class="ml-2">Calibrado <span class="text-danger">*</span></label>
                </div>
                <div class="form-group mb-3">
                    <label>Imagem <span class="text-danger">*</span></label>
                    <img id="imgPreview" src="" class="img-fluid d-block mx-auto mb-3" style="max-width: 50%; display: none;" />
                    <label class="btn btn-primary d-block mx-auto" style="max-width: 20%;">
                        Selecionar Imagem
                        <input type="file" name="img" id="img" accept="image/*" onchange="previewImage(event, 'imgPreview')" style="display: none;" />
                    </label>
                </div>
                <div class="form-group mb-3">
                    <label>Armazém:</label>
                    <select class="form-control select2" id="armazenamento" name="armazenamento">
                        <option value="0" selected>
                            Nenhum
                        </option>
                        <?php foreach ($armazenamentos as $armazem) : ?>
                            <option value="<?= $armazem['id'] ?>">
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
</script>