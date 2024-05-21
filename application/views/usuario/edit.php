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

                    <li class="breadcrumb-item"><a href="javascript: void(0);">Usuários</a></li>
                    <li class="breadcrumb-item active">Adicionar Novo</li>
                </ol>
            </div>
            <p class="page-title font-weight-bold text-uppercase">Adicionar Novo Usuário</p>
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
                    <input type="text" name="nome" value="<?php echo $user['nome']; ?>" class="form-control" id="nome" />
                </div>
                <div class="form-group mb-3">
                    <label>E-mail <span class="text-danger">*</span></label>
                    <input type="text" name="email" value="<?php echo $user['email']; ?>" class="form-control" id="celular" />
                </div>
                <div class="row">
                    <div class="form-group mb-3 col-6">
                        <label for="product-meta-keywords">Senha</label>
                        <input type="password" name="password" value="" class="form-control" id="password" />
                    </div>
                    <div class="form-group mb-3 col-6">
                        <label for="product-meta-keywords">Confirmar Senha</label>
                        <input type="password" name="conf_password" value="" class="form-control" id="conf_password" />
                    </div>
                </div>
            </div> <!-- end card-box -->
        </div> <!-- end col -->
    </div>
    <!-- end row -->
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <div class="text-right mb-3">
                <button type="button" onclick="validar()" class="btn  w-sm btn-success waves-effect waves-light">PROSSEGUIR</button>
            </div>
        </div> <!-- end col -->
    </div>
    <!-- end row -->

</form>
<script type="text/javascript">
    function validar() {
        var pass = document.getElementById('password').value;
        var cpass = document.getElementById('conf_password').value;
        if (pass == "" && cpass == "") {
            document.getElementById('formulario').submit();
        } else if (pass == cpass) {
            document.getElementById('formulario').submit();
        } else {
            document.getElementById('password').value = "";
            document.getElementById('conf_password').value = "";
            document.getElementById('password').focus();
            alert('As senhas não coincidem!');
        }
    }
</script>