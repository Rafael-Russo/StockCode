<link href="<?php echo base_url(); ?>assets/libs/dropzone/dropzone.min.css" rel="stylesheet" type="text/css" />

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">

                    <li class="breadcrumb-item"><a href="javascript: void(0);">Ferramentas</a></li>
                    <li class="breadcrumb-item active">Visualizar</li>
                </ol>
            </div>
            <p class="page-title font-weight-bold text-uppercase">Visualizar Ferramenta</p>
        </div>
    </div>
</div>
<!-- end page title -->
<div class="row">
    <div class="col-lg-3"></div>
    <div class="col-lg-6">
        <div class="card-box">
            <p class="text-uppercase bg-light p-2 mt-0 mb-3 font-weight-bold">Informações da Ferramenta</p>

            <div class="form-group mb-3">
                <img src="<?= ($ferramenta['img']) ? base_url($ferramenta['img']) : base_url('/assets/images/ferramentas/1.png'); ?>" class="img-fluid d-block mx-auto mb-3" style="max-width: 50%;" />
            </div>

            <div class="form-group mb-3">
                <h3 id="nome" class="text-center text-uppercase"><?= $ferramenta['nome']; ?></h3>
            </div>

            <div class="row">
                <div class="col-lg-12 text-center"> <!-- Alinhar ao centro e ocupar toda a largura da linha -->
                    <!-- Botão de Calibragem -->
                    <?php if ($ferramenta['calibragem'] == 1) : ?>
                        <button class="btn btn-success mx-2">Calibrado</button>
                    <?php else : ?>
                        <button class="btn btn-danger mx-2">Descalibrado</button>
                    <?php endif; ?>

                    <!-- Botão ou Select de Armazenamento -->
                    <?php if ($ferramenta['armazenamento']) : ?>
                        <button class="btn btn-danger mx-2" onclick="retirarFerramenta();">Retirar Ferramenta</button>
                    <?php else : ?>
                        <select class="form-control select2 mx-2" style="width: auto;" id="armazenamento" name="armazenamento">
                            <option value="0">Nenhum</option>
                            <?php foreach ($armazenamentos as $armazem) : ?>
                                <option value="<?= $armazem['id']; ?>"><?= $armazem['nome']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    <?php endif; ?>
                </div>
            </div>
        </div> <!-- end card-box -->
    </div> <!-- end col -->
</div> <!-- end row -->

<div class="row">
    <div class="col-lg-3"></div>
    <div class="col-lg-6">
        <div class="card-box">
            <p class="text-uppercase bg-light p-2 mt-0 mb-3 font-weight-bold">Histórico de Atividades</p>
            <?php
            if (!$logs) {
            ?>
                <p class="text-uppercase p-2 mt-0 mb-3">Nenhum Histórico Disponível</p>
            <?php
            } else {
            ?>
                <div class="table-responsive">
                    <table id="demo-foo-filtering" class="table table-bordered toggle-circle mb-0" data-page-size="7">
                        <thead>
                            <tr>
                                <th>Data</th>
                                <th>Usuário</th>
                                <th>Calibragem</th>
                                <th>Armazém</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($logs as $log) : ?>
                                <tr>
                                    <td><?= date('d/m/Y H:i:s', strtotime($log['timestamp'])); ?></td>
                                    <td><?= $log['usuario_nome']; ?></td> <!-- Usando o nome do usuário -->
                                    <td><?= $log['calibragem'] ? 'Calibrado' : 'Descalibrado'; ?></td>
                                    <td><?= $log['armazem_nome'] ? $log['armazem_nome'] : 'Nenhum'; ?></td> <!-- Usando o nome do armazém -->
                                    <td><?= $log['acao']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div> <!-- end table-responsive -->
            <?php
            }
            ?>
        </div> <!-- end card-box -->
    </div> <!-- end col -->
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    var isRequestPending = false;

    $(document).ready(function() {
        $('.btn-success').click(function() {
            atualizarCalibragem(0); // Define como descalibrado
        });

        $('.btn-danger').click(function() {
            if ($(this).text() === 'Descalibrado') {
                atualizarCalibragem(1); // Define como calibrado
            } else {
                retirarFerramenta(); // Limpa o armazenamento
            }
        });

        $('#armazenamento').change(function() {
            var armazemId = $(this).val();
            atualizarArmazenamento(armazemId); // Atualiza o armazenamento com o novo valor
        });
    });

    function atualizarCalibragem(valor) {
        $.post('<?= site_url('ferramenta/atualizar_calibragem') ?>', {
            ferramenta_id: '<?= $ferramenta['id']; ?>',
            calibragem: valor
        }, function(data) {
            location.reload(); // Recarrega a página para refletir a mudança
        });
    }

    function retirarFerramenta() {
        if (isRequestPending) return;
        isRequestPending = true;
        console.log("Chamada para retirar ferramenta"); // Adicionar log para diagnosticar

        $.post('<?= site_url('ferramenta/atualizar_armazenamento') ?>', {
            ferramenta_id: '<?= $ferramenta['id']; ?>',
            armazenamento: 0
        }, function(data) {
            location.reload();
        }).always(function() {
            isRequestPending = false; // Resetar flag após a requisição
        });
    }

    function atualizarArmazenamento(armazemId) {
        $.post('<?= site_url('ferramenta/atualizar_armazenamento') ?>', {
            ferramenta_id: '<?= $ferramenta['id']; ?>',
            armazenamento: armazemId
        }, function(data) {
            location.reload();
        });
    }
</script>