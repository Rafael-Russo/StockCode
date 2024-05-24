<link href="<?php echo base_url(); ?>assets/libs/dropzone/dropzone.min.css" rel="stylesheet" type="text/css" />

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">

                    <li class="breadcrumb-item"><a href="javascript: void(0);">Armazenamentos</a></li>
                    <li class="breadcrumb-item active">Adicionar Novo</li>
                </ol>
            </div>
            <p class="page-title font-weight-bold text-uppercase">Adicionar Novo Armazém</p>
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