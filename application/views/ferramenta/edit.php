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

                    <li class="breadcrumb-item"><a href="javascript: void(0);">Clientes</a></li>
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
        <div class="col-lg-6">
            <div class="card-box">
                <p class="text-uppercase bg-light p-2 mt-0 mb-3 font-weight-bold">Informações</p>

                <div class="form-group mb-3">
                    <label>Nome <span class="text-danger">*</span></label>
                    <input type="text" name="nome" value="<?php echo $user['nome']; ?>" class="form-control" id="nome" />
                </div>



                <div class="form-group mb-3">
                    <label>Telefone <span class="text-danger">*</span></label>
                    <input type="text" name="telefone" value="<?php echo $user['telefone']; ?>" class="form-control" id="telefone" />
                </div>

                <div class="form-group mb-3">
                    <label>E-mail <span class="text-danger">*</span></label>
                    <input type="text" name="email" value="<?php echo $user['email']; ?>" class="form-control" id="celular" />
                </div>


                <div class="form-group mb-3">
                    <label>Nascimento <span class="text-danger">*</span></label>
                    <input type="date" name="nascimento" value="<?php echo $user['nascimento']; ?>" class="form-control" id="nascimento" />
                </div>

                <div class="form-inline mb-2">
                    <input type="checkbox" name="portal" value="1" class="form-control" id="portal" <?php echo ($user['portal'] == 1) ? 'checked' : ''; ?> />
                    <label class="ml-2" for="portal">Portal de Pedidos</label>
                </div>

                <div class="form-inline mb-2">
                    <input type="checkbox" name="representante" value="1" class="form-control" id="representante" <?php echo ($user['representante'] == 1) ? 'checked' : ''; ?> />
                    <label class="ml-2" for="representante">Portal de Representantes</label>
                </div>

                <div class="form-inline mb-2">
                    <input type="checkbox" name="rh" value="1" class="form-control" id="rh" <?php echo ($user['rh'] == 1) ? 'checked' : ''; ?> />
                    <label class="ml-2" for="rh">Portal de RH</label>
                </div>

                <div class="form-inline mb-2">
                    <input type="checkbox" name="ac" value="1" class="form-control" id="ac" <?php echo ($user['ac'] == 1) ? 'checked' : ''; ?> />
                    <label class="ml-2" for="ac">Portal Academy</label>
                </div>

                <div class="form-inline mb-2">
                    <input type="checkbox" name="qr" value="1" class="form-control" id="qr" <?php echo ($user['qr'] == 1) ? 'checked' : ''; ?> />
                    <label class="ml-2" for="qr">Portal QR Code</label>
                </div>

                <div class="form-inline mb-2">
                    <input type="checkbox" name="ed" value="1" class="form-control" id="ed" <?php echo ($user['ed'] == 1) ? 'checked' : ''; ?> />
                    <label class="ml-2" for="ed">Encontre um Distribuidor</label>
                </div>

                <div class="form-inline mb-2">
                    <input type="checkbox" name="edita_painel" value="1" class="form-control" id="edita_painel" <?php echo ($user['edita_painel'] == 1) ? 'checked' : ''; ?> />
                    <label class="ml-2" for="qr">Editar Painel</label>
                </div>

                <div class="form-inline mb-2">
                    <input type="checkbox" name="acesso_mapa" value="1" class="form-control" id="acesso_mapa" <?php echo ($user['acesso_mapa'] == 1) ? 'checked' : ''; ?> />
                    <label class="ml-2" for="qr">Acessar Mapa</label>
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

        <div class="col-lg-6">
            <div class="card-box">

                <div class="form-group mb-3">
                    <p class="text-uppercase mt-0 mb-3 bg-light p-2 font-weight-bold">Imagem de perfil</p>

                    <div style=" border:2px dashed #666; border-radius:10px; width:150px; height:150px; margin:0 auto; " id="photos">
                        <img src="<?php echo base_url('assets/uploads/') . $user['perfil']; ?>" style="width:100%" />
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

                </div>

                <p class="text-uppercase mt-0 mb-3 bg-light p-2 font-weight-bold">ENDEREÇOS</p>

                <div class="form-group mb-3">
                    <label for="product-meta-keywords">CEP</label>
                    <input type="text" name="cep" value="<?php echo $user['cep']; ?>" class="form-control" id="cep" onblur="pesquisacep(this.value); show_pass();" />
                </div>


                <div class="form-group mb-3">
                    <label for="product-meta-title">Endereço</label>
                    <input type="text" name="endereco" value="<?php echo $user['endereco']; ?>" class="form-control" id="rua" />
                </div>

                <div class="row">
                    <div class="form-group mb-3 col-md-6">
                        <label for="product-meta-keywords">Número</label>
                        <input type="text" name="numero" value="<?php echo $user['numero']; ?>" class="form-control" id="numero" />
                    </div>

                    <div class="form-group mb-3 col-md-6">
                        <label for="product-meta-keywords">Bairro</label>
                        <input type="text" name="bairro" value="<?php echo $user['bairro']; ?>" class="form-control" id="bairro" />
                    </div>
                </div>
                <div class="row">

                    <div class="form-group mb-3 col-md-10">
                        <label for="product-meta-keywords">Cidade</label>
                        <input type="text" name="cidade" value="<?php echo $user['cidade']; ?>" class="form-control" id="cidade" />
                    </div>

                    <div class="form-group mb-3 col-md-2">
                        <label for="product-meta-keywords">Estado</label>
                        <input type="text" name="estado" value="<?php echo $user['uf']; ?>" class="form-control" id="uf" />
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label for="product-meta-keywords">Complemento</label>
                    <input type="text" name="complemento" value="<?php echo $user['complemento']; ?>" class="form-control" id="complemento" />
                </div>



            </div> <!-- end card-box -->



        </div> <!-- end col-->
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









<!-- Botão para acionar modal -->
<button type="button" class="btn btn-primary hidden" data-toggle="modal" data-target="#modalExemplo" id="successModal" style="display: none !important">
    Abrir modal de demonstraçãoaadsfad
</button>

<!-- Modal -->
<div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 style="text-align: center; text-transform: uppercase;">Usuário <?php $nome = explode(" ", $this->session->flashdata('nome'));
                                                                                    echo $nome[0];  ?> adicionado com sucesso!</h2>

            </div>
            <div class="modal-body">
                <div class="text-center">
                    <img src="https://img.pngio.com/check-complete-done-green-success-valid-icon-valid-png-512_512.png" width="200">

                </div>

            </div>
        </div>
    </div>



    <?php if ($this->input->get('warning') == 'success') {
        echo "<script>window.onload = function() {
$('#successModal').click();
}</script>";
    } ?>



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



        function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('rua').value = ("");
            document.getElementById('bairro').value = ("");
            document.getElementById('cidade').value = ("");
            document.getElementById('uf').value = ("");

        }

        function meu_callback(conteudo) {
            if (!("erro" in conteudo)) {
                //Atualiza os campos com os valores.
                document.getElementById('rua').value = (conteudo.logradouro);
                document.getElementById('bairro').value = (conteudo.bairro);
                document.getElementById('cidade').value = (conteudo.localidade);
                document.getElementById('uf').value = (conteudo.uf);

            } //end if.
            else {
                //CEP não Encontrado.
                limpa_formulário_cep();
                alert("CEP inválido");
            }
        }

        function pesquisacep(valor) {

            //Nova variável "cep" somente com dígitos.
            var cep = valor.replace(/\D/g, '');

            //Verifica se campo cep possui valor informado.
            if (cep != "") {

                //Expressão regular para validar o CEP.
                var validacep = /^[0-9]{8}$/;

                //Valida o formato do CEP.
                if (validacep.test(cep)) {

                    //Preenche os campos com "..." enquanto consulta webservice.
                    document.getElementById('rua').value = "...";
                    document.getElementById('bairro').value = "...";
                    document.getElementById('cidade').value = "...";
                    document.getElementById('uf').value = "...";


                    //Cria um elemento javascript.
                    var script = document.createElement('script');

                    //Sincroniza com o callback.
                    script.src = 'https://viacep.com.br/ws/' + cep + '/json/?callback=meu_callback';

                    //Insere script no documento e carrega o conteúdo.
                    document.body.appendChild(script);

                } //end if.
                else {
                    //cep é inválido.
                    limpa_formulário_cep();
                    alert("Formato de CEP inválido.");
                }
            } //end if.
            else {
                //cep sem valor, limpa formulário.
                limpa_formulário_cep();
            }
        };
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