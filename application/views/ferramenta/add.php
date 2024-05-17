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

                    <li class="breadcrumb-item"><a href="javascript: void(0);">ferramentas</a></li>
                    <li class="breadcrumb-item active">Adicionar Ferramenta</li>
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
                    <input type="text" name="nome" value="<?php echo $this->input->post('nome'); ?>" class="form-control" id="nome" />
                </div>
                <div class="form-inline mb-3">
                    <input type="checkbox" name="portal" value="1" class="form-control" id="portal" checked />
                    <label class="ml-2" for="portal">Portal de Pedidos</label>
                </div>
                <div class="form-group mb-3">
                    <label for="estados">Estados:</label>
                    <select class="form-control select2" id="estados" name="estados[]" multiple="multiple">
                        <!-- Os estados serão preenchidos aqui -->
                        <?php foreach ($estados as $estado) : ?>
                            <option value="<?= $estado['id'] ?>" <?php echo in_array($estado['id'], $estados_selecionados) ? 'selected' : ''; ?>>
                                <?= $estado['_id'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div> <!-- end card-box -->
            <div class="card-box">
                <div class="form-group mb-3">

                    <p class="text-uppercase mt-0 mb-3 bg-light p-2 font-weight-bold">QR Code</p>
                    <div style=" border:2px dashed #666; border-radius:10px; width:150px; height:150px; margin:0 auto; " id="photos">
                        <img src="https://www.pickeringtest.com/themes/shared/common/images/placeholder.png" style="width:100%" />
                    </div>
                    <div class=" mt-4">
                        <div class="form-group mb-3">
                            <div class="browse-wrap">
                                <div class="title"><i class="fa fa-upload mr-1"></i>UPLOAD DA IMAGEM</div>
                                <input type="file" class="upload" name="perfil" id="photo" accept=".png, .jpg, .jpeg" onchange="readFile(this);">
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <span class="upload-path"></span>
                    <div class="clearfix"></div>
                </div><!--fim form group-->
            </div> <!-- end card-box -->
        </div> <!-- end col -->
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-12">
            <div class="text-right mb-3">
                <button type="button" onclick="validar()" class="btn  w-sm btn-success waves-effect waves-light">PROSSEGUIR</button>
            </div>
        </div> <!-- end col -->
    </div>
    <!-- end row -->

</form>
<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                document.getElementById('blah').style.display = 'block'
                $('#blah').attr('src', e.target.result);

            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    window.onload = function() {
        $("#photo").change(function() {
            readURL(this);
        });
    }
</script>


<script>
    function readFile(input) {
        $("#status").html('Processing...');
        counter = input.files.length;
        for (x = 0; x < counter; x++) {
            if (input.files && input.files[x]) {

                var reader = new FileReader();

                reader.onload = function(e) {
                    document.getElementById('photos').innerHTML = '<img src="' + e.target.result + '" style="width:100%; height:100%; border-radius:10px;">';

                    axios.post('<?php echo base_url("produto/update_imagem/" . $this->uri->segment(3)); ?>', {
                        imagem: e.target.result
                    }).then(function(response) {
                        console.log('Foto principal alterada!');
                    });
                    document.getElementById('imgatual').style.display = 'none';
                };
                reader.readAsDataURL(input.files[x]);
            }
        }
        if (counter == x) {
            $("#status").html('');
        }
    }


    // Span
    var span = document.getElementsByClassName('upload-path');
    // Button
    var uploader = document.getElementsByName('upload');
    // On change
    for (item in uploader) {
        // Detect changes
        uploader[item].onchange = function() {
            // Echo filename in span
            span[0].innerHTML = this.files[0].name;
        }
    }
</script>