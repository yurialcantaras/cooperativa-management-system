<?php echo $banner; ?>

<div id="overlay"></div>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <button class="btn btn-primary float-right" onclick="history.back()">Voltar</button>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-10 title-table">
                    <div class="card card-body p-0">

                        <?php var_dump($titleDetails); ?>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="text-align: end;" class="col-3">Nome do Título</th>
                                    <th>A volta dos que não foram e para lá nunca voltaram</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="text-align: end;">Tipo</td>
                                    <td>Kit</td>
                                </tr>
                                <tr>
                                    <td style="text-align: end;">Quantidade</td>
                                    <td>23</td>
                                </tr>
                                <tr>
                                    <td style="text-align: end;">Data de Chegada</td>
                                    <td>25/05/2024</td>
                                </tr>
                                <tr>
                                    <td style="text-align: end;">Observação</td>
                                    <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</td>
                                </tr>
                            </tbody>
                        </table>
                        <div style="margin-top: 15px;" class="form-group d-flex justify-content-center">
                            <button class="btn btn-warning btn-sm" href="<?php echo base_url('') ?>" onclick="newTitle()">Editar</button>
                            <button class="btn btn-danger btn-sm" href="<?php echo base_url('') ?>" style="margin-left: 2px;">Excluir</button>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div id="new-title" class="card title-description col-7" style="display: none;">
                    <div class="card-header">
                        <h3 class="card-title">Nome do Título</h3>
                        <button onclick="closeNewTitle()" type="button" class="btn btn-tool float-right pt-2" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <form method="post" action="">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="book-name">Título</label>
                                <input type="text" class="form-control" id="book-name" placeholder="Informe o nome do título">
                            </div>
                            <div class="form-group">
                                <label for="quantity">Quantidade</label>
                                <input type="number" class="form-control" id="quantity" placeholder="Apenas o número">
                            </div>
                            <!-- Date -->
                            <div class="form-group">
                                <label>Date:</label>
                                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" placeholder="dd/mm/aaaa" />
                                    <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group d-flex justify-content-center">
                                <button class="btn btn-primary" type="submit" style="width: 150px">Enviar</button>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </form>
                </div>
                <!-- /.card -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>

</div>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Add Content Here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<?php echo $footer; ?>