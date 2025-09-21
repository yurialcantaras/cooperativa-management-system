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
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="text-align: end;" class="col-3">Nome do Título</th>
                                    <th><?php echo $titleDetails['name']; ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="text-align: end;">Tipo</td>
                                    <td><?php echo $titleDetails['type']; ?></td>
                                </tr>
                                <tr>
                                    <td style="text-align: end;">Quantidade</td>
                                    <td><?php echo $titleDetails['quantity']; ?></td>
                                </tr>
                                <tr>
                                    <td style="text-align: end;">Data de Chegada</td>
                                    <td><?php echo $titleDetails['arrived_date']; ?></td>
                                </tr>
                                <tr>
                                    <td style="text-align: end;">Observação</td>
                                    <td><?php echo $titleDetails['observations']; ?></td>
                                </tr>
                            </tbody>
                        </table>
                        <div style="margin-top: 15px;" class="form-group d-flex justify-content-center">
                            <button class="btn btn-warning btn-sm" onclick="newTitle()">Editar</button>
                            <a class="btn btn-danger btn-sm" href="<?php echo base_url('/BookStockController/titleDelete?id=' . $titleDetails['id']); ?>" style="margin-left: 2px;">Excluir</a>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div id="new-title" class="card title-description col-7" style="display: none;">
                    <div class="card-header">
                        <h3 class="card-title"><?php echo $titleDetails['name']; ?></h3>
                        <button onclick="closeNewTitle()" type="button" class="btn btn-tool float-right pt-2" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <form method="post" action="<?php echo base_url('/BookStockController/titleEdit?id=' . $titleDetails['id']); ?>">
                        <div class="form-check d-flex justify-content-center">
                            <div class="justify-content-center form-check form-check-inline col-sm-3 bg-olive p-2">
                                <input <?php echo ($titleDetails['type'] == 'Kit') ? "checked" : ""; ?> value="1" type="radio" name="type" class="form-check-input" id="kit-type" style="width: 15px; height: 15px;" require>
                                <label for="kit-type" class="form-check-label">Kit</label>
                            </div>
                            <div class="justify-content-center form-check form-check-inline col-sm-3 bg-info p-2">
                                <input <?php echo ($titleDetails['type'] == 'Livro') ? "checked" : ""; ?> value="0" type="radio" name="type" class="form-check-input" id="book-type" style="width: 15px; height: 15px;" require>
                                <label for="book-type" class="form-check-label">Livro</label>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="book-name">Título</label>
                                <input name="book_name" type="text" class="form-control" id="book-name" value="<?php echo $titleDetails['name']; ?>" placeholder="Informe o nome do título" require>
                            </div>
                            <div class="form-group">
                                <label for="quantity">Quantidade</label>
                                <input name="quantity" type="number" class="form-control" id="quantity" value="<?php echo $titleDetails['quantity']; ?>" placeholder="Apenas o número" require>
                            </div>
                            <!-- Date -->
                            <div class="form-group">
                                <label>Date de Chegada</label>
                                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                    <input id="date" name="arrived_date" type="text" class="form-control datetimepicker-input" value="<?php echo $titleDetails['arrived_date']; ?>" data-target="#reservationdate" require />
                                    <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Observação</label>
                                <div class="input-group">
                                    <input name="observations" type="text" class="form-control" value="<?php echo $titleDetails['observations']; ?>" placeholder="Pequena observação (Não obrigatório)" />
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

<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<?php echo $footer; ?>