<link href="<?php echo base_url(); ?>assets/libs/dropzone/dropzone.min.css" rel="stylesheet" type="text/css" />

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
                    <input type="text" name="nome" value="" class="form-control" id="nome" />
                </div>
                <div class="form-group mb-3">
                    <label>E-mail <span class="text-danger">*</span></label>
                    <input type="text" name="email" value="" class="form-control" id="celular" />
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
            <div class="text-right">
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