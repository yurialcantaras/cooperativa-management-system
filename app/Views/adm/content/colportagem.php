<?php echo $banner; ?>

<div id="overlay"></div>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Bem vindo, Rivelino!</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                <div class="inner">
                    <h3>150</h3>

                    <p>New Orders</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                <div class="inner">
                    <h3>53<sup style="font-size: 20px">%</sup></h3>

                    <p>Bounce Rate</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                <div class="inner">
                    <h3>44</h3>

                    <p>User Registrations</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                <div class="inner">
                    <h3>65</h3>

                    <p>Unique Visitors</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex">
                            <h3 class="card-title">Todos os Relatórios</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped" style="overflow: hidden;">
                                <thead>
                                    <tr>
                                        <th>Nome do Título</th>
                                        <th>Tipo</th>
                                        <th>Quantidade</th>
                                        <th>Data de Chegada</th>
                                        <th class="col-5">Observação</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php 
                                    
                                    // foreach ($stocklist as $title) {
                                        
                                    //     $formatDate = new DateTime($title['arrived_date']);
                                    //     $title['arrived_date'] = $formatDate->format('d-m-Y');

                                    //     echo "
                                        
                                    //     <tr>
                                    //         <td><a href=".base_url('/pages/bookTitle?id='.$title['id'])." >". $title['book_name'] ."</a></td>
                                    //         <td><a href=".base_url('/pages/bookTitle?id='.$title['id'])." >". $title['book_type'] ."</td>
                                    //         <td><a href=".base_url('/pages/bookTitle?id='.$title['id'])." >". $title['quantity'] ."</td>
                                    //         <td><a href=".base_url('/pages/bookTitle?id='.$title['id'])." >". $title['arrived_date'] ."</td>
                                    //         <td class='obs-in-table'>". $title['observations'] ."</td>
                                    //     </tr>
                                        
                                    //     ";

                                    // }

                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->

        <div id="new-title" style="display: none;" class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Novo Título</h3>
                <button onclick="closeNewTitle()" id="close-new-title" type="button" class="btn btn-tool float-right pt-2" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="post" action="<?= base_url('/bookstockcontroller/newtitle') ?>">
                <div class="card-body">
                    <div class="form-check d-flex justify-content-center">
                        <div class="col-sm-3"></div>
                        <div class="justify-content-center form-check form-check-inline col-sm-3 bg-olive p-2">
                            <input value="1" type="radio" name="book_type" class="form-check-input" id="kit-type" style="width: 15px; height: 15px;" require>
                            <label for="kit-type" class="form-check-label">Kit</label>
                        </div>
                        <div class="justify-content-center form-check form-check-inline col-sm-3 bg-info p-2">
                            <input value="0" type="radio" name="book_type" class="form-check-input" id="book-type" style="width: 15px; height: 15px;" require>
                            <label for="book-type" class="form-check-label">Livro</label>
                        </div>
                        <div class="col-sm-3"></div>
                    </div>
                    <div class="form-group">
                        <label for="book-name">Título</label>
                        <input name="book_name" type="text" class="form-control" id="book-name" placeholder="Informe o nome do título" require>
                    </div>
                    <div class="form-group">
                        <label for="quantity">Quantidade</label>
                        <input name="quantity" type="number" class="form-control" id="quantity" placeholder="Apenas o número" require>
                    </div>
                    <!-- Date -->
                    <div class="form-group">
                        <label>Data de Chegada</label>
                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                            <input name="arrived_date" type="date" class="form-control datetimepicker-input" data-target="#reservationdate" require/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Observação</label>
                        <div class="input-group">
                            <input name="observations" type="text" class="form-control" placeholder="Pequena observação (Não obrigatório)"/>
                        </div>
                    </div>
                    <div class="form-group d-flex justify-content-center">
                        <button class="btn btn-primary" type="submit" style="width: 150px">Enviar</button>
                    </div>
                </div>
                <!-- /.card-body -->
            </form>
        </div>
        <!-- <div class="container-fluid">

        </div> -->
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