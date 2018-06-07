<h2 class="sub-header" xmlns="http://www.w3.org/1999/html">Reservas </h2>
<button class="btn btn-success" data-toggle="modal" data-target="#myModal">
    <span class="glyphicon glyphicon-plus"></span>
    Nueva Reserva
</button>


<?php

if($alert == 1){
    ?>
    <div class="alert alert-success" role="alert">Reserva de Equipo Exitosa</div>


    <?php


}elseif($alert==2){

    ?>
    <div class="alert alert-danger" role="alert">ERROR No se pudo Guardar</div>
    <?php

}elseif($alert==3){

    ?>
    <div  class="alert alert-danger" role="alert">Reserva Cancelada con exito¡¡</div>
    <?php
}elseif($alert==4) {

    ?>
    <div class="alert alert-danger" role="alert">ERROR No se pudo cancelar la reserva</div>
    <?php
}
elseif($alert==5) {

    ?>
    <div class="alert alert-danger" role="alert">NO EXISTE UN USUARIO CON ESE CARNET</div>
    <?php
}
?>

<div class="table-responsive">
    <table class="table table-hover dia" id="dia">
        <thead>
        <tr>
            <th>ID</th>
            <th>Carnet</th>
            <th>Equipo</th>
            <th>Horario</th>
            <th>Estado</th>
            <th>Fecha </th>
            <th>fecha de Reservación</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>

        <?php foreach($res as $item): ?>
            <tr>
                <td> <?php echo $item->id ?> </td>
                <td> <?php echo $item->usuario ?> </td>
                <td> <?php echo $item->equipo ?> </td>
                <td> <?php echo $item->horario ?> </td>
                <td> <?php echo $item->estado  ?> </td>
                <td> <?php echo $item->fecha ?> </td>
                <td> <?php echo $item->fecha_reserva ?></td>


                <td>

                    <a class="btn btn-primary btn-xs" data-toggle="tooltip" title="Ver"  href="<?php echo base_url() . 'admin/ver_reserva/' . $item->id; ?>">
                        <span class="glyphicon glyphicon-eye-open"></span></a>

                    <?php
                    if ($item->estado == "Reservado") {
                        ?>
                        <a class="btn btn-danger btn-xs" data-toggle="tooltip" title="Eliminar" onclick="return confirm('¡Esta seguro de Cancelar la Reserva')"
                           href="<?php echo base_url() . 'admin/cancelar_reserva/' . $item->id; ?>">
                            <span class="glyphicon glyphicon-remove"></span></span></a>

                        <?php
                    }
                    ?>


                </td>
            </tr>
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
                <h4 class="modal-title" id="myModalLabel">Nueva Reserva</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/nueva_reserva/'?>">
                    <fieldset>

                        <!-- Form Name -->

                        <div class="form-group">
                            <label class="col-md-4 control-label" for="fecha"># Carnet</label>
                            <div class="col-md-4">
                                <input id="carnet" name="carnet" type="text" placeholder="" class="form-control input-md" required="">

                            </div>
                        </div>


                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="fecha">Fecha Reservación</label>
                            <div class="col-md-4  " id="">
                                <input id="fech" name="fecha" type="text" placeholder="" class="form-control input-md " required="">

                            </div>
                        </div>

                        <!-- Select Basic -->
                        <div class="form-group">
                            <!--<label class="col-md-4 control-label" for="horario">horario</label>
                            <div class="col-md-4">
                                <select id="horario" name="horario" class="form-control">
                                    <option value="1">7:00 am - 9:30 am</option>
                                    <option value="2">9:30 am - 12:00 md</option>
                                    <option value="3">1:00 pm - 3:30 pm</option>
                                </select>
                            </div>-->
                            <?php
                            echo $horario
                            ?>
                        </div>



                    </fieldset>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button id="guardar" name="guardar" class="btn btn-success">Reservar</button>
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

<br> <B> RESERVAS DE EQUIPO:</B> NOS MUESTA LA PANTALLA PRINCIPAL DONDE PODEMOS VER LAS RESERVAS DE  LOS EQUIPOS. <br/>







          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>
