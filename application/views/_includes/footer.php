        <!-- Vendor js -->
        <script src="<?php echo base_url(); ?>assets/js/vendor.min.js"></script>

        <!-- Plugins js-->
        <script src="<?php echo base_url(); ?>assets/libs/flatpickr/flatpickr.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/jquery-knob/jquery.knob.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/jquery-sparkline/jquery.sparkline.min.js"></script>

        <script src="<?php echo base_url(); ?>assets/libs/footable/footable.all.min.js"></script>

        <script src="<?php echo base_url(); ?>assets/js/pages/foo-tables.init.js"></script>

        <?php if ($this->uri->segment(1) == 'config' and $this->uri->segment(2) == 'menu') { ?>

            <script src="<?php echo base_url(); ?>assets/libs/nestable2/jquery.nestable.min.js"></script>
            <script src="<?php echo base_url(); ?>assets/js/pages/nestable.init.js"></script>

        <?php } ?>

        <script src="<?php echo base_url(); ?>assets/libs/custombox/custombox.min.js"></script>


        <!-- Tippy js-->
        <script src="<?php echo base_url(); ?>assets/libs/tippy-js/tippy.all.min.js"></script>


        <!-- Plugins js -->
        <script src="<?php echo base_url(); ?>assets/libs/jquery-mask-plugin/jquery.mask.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/autonumeric/autoNumeric-min.js"></script>

        <!-- Init js-->
        <script src="<?php echo base_url(); ?>assets/js/pages/form-masks.init.js"></script>

        <!-- Select2 js -->
        <script src="<?php echo base_url(); ?>assets/js/select2.min.js"></script>



        <script src="<?php echo base_url(); ?>assets/libs/switchery/switchery.min.js"></script>

        <script src="<?php echo base_url(); ?>assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>


        <script src="<?php echo base_url(); ?>assets/js/pages/form-pickers.init.js"></script>




        <script>
            function divPopup(valor, modal = false) {
                if (modal == false) {
                    if (valor == 4) {
                        $("#btnAddOpcao").show();
                        $("#divOptions").html(`
                            <div class="input_fields_wrap opcoes">
                                <label>Nome da opção:</label>
                                <input type="text" name="opcao[1]" class="form-control" required />
                            </div>
                        `);
                    } else {
                        $("#btnAddOpcao").hide();
                        $("#divOptions").empty();
                    }
                } else {
                    if (valor == 4) {
                        $("#btnAddOpcaoEdit").show();
                        $("#divOptionsEdit").html(`
                            <div class="input_fields_wrap_edit">
                                <label>Nome da opção:</label>
                                <input type="text" name="opcao[1]" class="form-control" required />
                            </div>
                        `);
                        $("#alert_option").show();
                    } else {
                        $("#btnAddOpcaoEdit").hide();
                        $("#divOptionsEdit").empty();
                        $(".opcoes").empty();
                        $("#alert_option").hide();
                    }
                }
            }

            var max_fields = 15; //maximum input boxes allowed
            var wrapper = $("#divOptions"); //Fields wrapper
            var wrapper_edit = $("#divOptionsEdit"); //Fields wrapper

            var x = 1; //initlal text box count
            function botao(modal = false) { //on add input button click
                if (x < max_fields) { //max input box allowed
                    x++; //text box increment
                    var conteudo =
                        '<div style="margin-top:1rem;">' +
                        '<label>Nome da opção:</label>' +
                        '<input style="margin-bottom: .35rem;" type="text" name="opcao[' + x + ']" class="form-control" required />' +
                        '<a href="#" style="float:right;" class="remove_field">Apagar</a>' +
                        '</div>';
                    if (modal == false) {
                        $(wrapper).append(conteudo);
                    } else {
                        $(wrapper_edit).append(conteudo);
                    }
                }
            }

            $(wrapper).on("click", ".remove_field", function(e) { //user click on remove text
                e.preventDefault();
                $(this).parent('div').remove();
                x--;
            });
            $(wrapper_edit).on("click", ".remove_field", function(e) { //user click on remove text
                e.preventDefault();
                $(this).parent('div').remove();
                x--;
            });

            function apagarOpcao(option_id = null) {
                var base_url = '<?php echo base_url(); ?>';
                if (option_id) {
                    $.ajax({
                        url: base_url + 'popup/delOption',
                        type: "POST",
                        async: true,
                        dataType: 'json',
                        data: {
                            id: option_id
                        },
                        success: function(data) {
                            console.log('sucesso');
                        },
                        error: function() {
                            console.log('erro na requisicao');
                        }
                    });
                }
            }
            $(document).ready(function() {
                <?php if (!empty($this->input->get('tipo')) || !empty($this->input->get('publicacao')) || !empty($this->input->get('visualizacao')) || !empty($this->input->get('tema')) || !empty($this->input->get('localizacao'))) {
                    echo '$("#formFiltros").show(); $("#seta-cima").hide(); $("#seta-baixo").show();';
                } else {
                    echo '$("#formFiltros").hide(); $("#seta-cima").show(); $("#seta-baixo").hide();';
                } ?>
                $(".slide-toggle").click(function() {
                    $("#formFiltros").animate({
                        height: "toggle"
                    });
                    $("#seta-cima").toggle();
                    $("#seta-baixo").toggle();
                });
            });
        </script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('.select2').select2();
            });
        </script>

        <script type="text/javascript">
            $(document).ready(function() {
                // Máscaras para CEP, CNPJ e WhatsApp
                $('#cep').mask('00000-000');
                $('#cnpj').mask('00.000.000/0000-00');
                $('#whatsapp').mask('(00) 00000-0000');

                // Função para buscar o CEP
                $('#cep').on('blur', function() {
                    var cep = $(this).val().replace(/\D/g, '');

                    if (cep != "") {
                        var validacep = /^[0-9]{8}$/;

                        // Valida o formato do CEP.
                        if (validacep.test(cep)) {
                            // Preenche os campos com "..." enquanto a consulta está sendo feita
                            $("#endereco").val("...");
                            $("#bairro").val("...");
                            $("#cidade").val("...");
                            $("#estado").val("...");

                            // Consulta o webservice viacep.com.br/
                            $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function(dados) {
                                if (!("erro" in dados)) {
                                    // Atualiza os campos com os valores da consulta.
                                    $("#endereco").val(dados.logradouro);
                                    $("#bairro").val(dados.bairro);
                                    $("#cidade").val(dados.localidade);
                                    $("#estado").val(dados.uf);
                                } //end if.
                                else {
                                    // CEP pesquisado não foi encontrado.
                                    limpa_formulario_cep();
                                    alert("CEP não encontrado.");
                                }
                            });
                        } //end if.
                        else {
                            // cep é inválido.
                            limpa_formulario_cep();
                            alert("Formato de CEP inválido.");
                        }
                    } //end if.
                    else {
                        // cep sem valor, limpa formulário.
                        limpa_formulario_cep();
                    }
                });
            });

            function limpa_formulario_cep() {
                // Limpa valores do formulário de cep.
                $("#endereco").val("");
                $("#bairro").val("");
                $("#cidade").val("");
                $("#estado").val("");
            }
        </script>



        <!-- App js-->
        <script src="<?php echo base_url(); ?>/assets/js/app.min.js"></script>
        </body>

        </html>