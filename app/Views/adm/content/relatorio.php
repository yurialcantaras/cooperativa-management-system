<?php echo $banner; ?>

<div class="d-flex justify-content-center col-12" style="margin-top: 50px;">
    <h1>Relatório de Colportagem</h1>
</div>

<div class="d-flex justify-content-center col-12">

    <div id="new-title" class="card title-description col-7">
        <form method="post" action="">
            <div class="card-body">
                <div class="form-group">
                    <label for="colportor">Colportor</label>
                    <input name="colportor" type="text" class="form-control"  value="" placeholder="Informe seu nome" require>
                </div>
                <div class="form-group">
                    <label for="kit">Kits:</label>
                    <input name="kit" type="number" class="form-control" value="0" placeholder="Apenas o número" require>
                </div>
                <div class="form-group">
                    <label for="livros">Livros:</label>
                    <input name="kit" type="number" class="form-control" value="0" placeholder="Apenas o número" require>
                </div>
                <div class="form-group">
                    <label for="javs">JAVs:</label>
                    <input name="kit" type="number" class="form-control" value="0" placeholder="Apenas o número" require>
                </div>
                <div class="form-group">
                    <label>Data da Colportagem</label>
                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input id="data" name="colportagem_date" type="text" class="form-control datetimepicker-input" value="" data-target="#reservationdate" require/>
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
                <hr style="margin-top: 40px; margin-bottom: 30px; border-width: 2px;">
                <div class="d-flex justify-content-center form-group">
                    <h4>Financeiro</h4>
                </div>
                <div class="form-group">
                    <label for="cash">Em dinheiro:</label>
                    <input name="kit" type="number" class="form-control" value="0" placeholder="Apenas o valor" step="0.01" require>
                </div>
                <div class="form-group">
                    <label for="pix">PIX:</label>
                    <input name="kit" type="number" class="form-control" value="0" placeholder="Apenas o valor" step="0.01" require>
                </div>
                <div class="form-group">
                    <label for="card">Cartão:</label>
                    <input name="kit" type="number" class="form-control" value="0" placeholder="Apenas o valor" step="0.01" require>
                </div>
                <div class="form-group">
                    <label>Observação</label>
                    <div class="input-group">
                        <input name="observation" type="text" class="form-control" value="" placeholder="Pequena observação (Não obrigatório)"/>
                    </div>
                </div>
                <div class="form-group d-flex justify-content-center">
                    <button class="btn btn-primary" type="submit" style="width: 150px">Enviar</button>
                </div>
            </div>
            <!-- /.card-body -->
        </form>
    </div>

</div>

<?php echo $footer; ?>