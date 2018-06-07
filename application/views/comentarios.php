



<h2 class="sub-header">Comentarios</h2><button class="btn btn-success" data-toggle="modal" data-target="#myModal">Nuevo</button>

<?php

if($alert == 1){
?>
    <div class="alert alert-success" role="alert">Guardado Con Exito</div>


<?php


}elseif($alert==2){

    ?>
    <div class="alert alert-danger" role="alert">ERROR No se pudo Guardar</div>
<?php

}

?>
<div class="table-responsive">
    <table class="table table-hover dia" id="dia">
        <thead>
        <tr>
            <th>#</th>
            <th>Fecha</th>
            <th>Titulo</th>
            <th>Comentario</th>


        </tr>
        </thead>
        <tbody>

        <?php foreach($coment as $item): ?>
            <tr>
                <td> <?php echo $item->idcoment ?> </td>
                <td> <?php echo $item->fecha ?> </td>

                <td> <?php echo $item->titulo ?> </td>
                <td> <?php echo $item->comentar ?> </td>


        <?php endforeach; ?>

        </tbody>
    </table>
</div>



<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Nuevo Comentario</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/guardar_comentario/'.$idequipo?>">
                    <fieldset>

                        <!-- Form Name -->


                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="titulo">Titulo</label>
                            <div class="col-md-4">
                                <input id="titulo" name="titulo" type="text" placeholder="" class="form-control input-md" required="">

                            </div>
                        </div>

                        <!-- Textarea -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="comentario">Comentario</label>
                            <div class="col-md-4">
                                <textarea class="form-control" id="comentario" name="comentario"></textarea>
                            </div>
                        </div>



                    </fieldset>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button id="guardar" name="guardar" class="btn btn-success">Guardar</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal -->
  <div class="modal fade" id="ayuda" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">AYUDA</h4>
        </div>
        <div class="modal-body">
          <p>




          AQUI VA LA INFORMACION DE AYUDA







          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>
