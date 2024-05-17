<link href="<?php echo base_url(); ?>assets/libs/footable/footable.core.min.css" rel="stylesheet" type="text/css" />

<div class="row mt-3">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-8">
                        <p class="header-title font-weight-bold">USUÁRIOS</p>

                    </div>
                    <div class="col-lg-4">
                        <div class="text-lg-right">
                            <a href="<?php echo base_url('usuario/add'); ?>" class="btn btn-primary waves-effect waves-light mb-2 mr-2"><i class="fa fa-plus"></i> Novo Usuário</a>
                        </div>
                    </div><!-- end col-->
                </div>
                <div class="mb-2">
                    <div class="row">
                        <div class="col-12 text-sm-center form-inline">
                            <div class="form-group">
                                <input id="demo-foo-search" type="text" placeholder="Pesquisar..." class=" form-control" autocomplete="on">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="demo-foo-filtering" class="table table-bordered toggle-circle mb-0" data-page-size="7">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>E-mail</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($usuarios as $u) { ?>
                                <tr>
                                    <td style="text-transform: uppercase"><?php echo $u['nome']; ?></td>
                                    <td><?php echo $u['email']; ?></td><td>
                                        <a href="<?php echo site_url('usuario/editar/' . $u['id']); ?>" class="btn btn-info btn-xs"><i class="fa fa-pen"></i></a>
                                        <a href="<?php echo site_url('usuario/remove/' . $u['id']); ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                                    </td>

                                </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr class="active">
                                <td colspan="6">
                                    <div class="text-right">
                                        <ul class="pagination pagination-rounded justify-content-end footable-pagination m-t-10 mb-0"></ul>
                                    </div>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div> <!-- end .table-responsive-->
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<!-- end row-->