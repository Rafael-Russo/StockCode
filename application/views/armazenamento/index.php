<link href="<?php echo base_url(); ?>assets/libs/footable/footable.core.min.css" rel="stylesheet" type="text/css" />

<div class="row mt-3">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-8">
                        <p class="header-title font-weight-bold">Armazenamentos</p>

                    </div>
                    <div class="col-lg-4">
                        <div class="text-lg-right">
                            <a href="<?php echo base_url('armazenamento/add'); ?>" class="btn btn-primary waves-effect waves-light mb-2 mr-2"><i class="fa fa-plus"></i> Novo Armazém</a>
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
                                <th>QR Code</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($armazenamentos as $a) { ?>
                                <tr>
                                    <td style="text-transform: uppercase"><?php echo $a['nome']; ?></td>
                                    <td><img src="<?php echo base_url($a['qr_code']); ?>" alt="" height="40"></td>
                                    <td>
                                        <a href="<?php echo site_url('armazenamento/editar/' . $a['id']); ?>" class="btn btn-info btn-xs"><i class="fa fa-pen"></i></a>
                                        <a href="<?php echo site_url('armazenamento/remove/' . $a['id']); ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
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