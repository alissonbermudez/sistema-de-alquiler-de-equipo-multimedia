



<h2 class="sub-header">Bienvenido <?php echo $this->session->userdata('nombre') ?>
<h3 class="sub-header">Reservas Realizadas</h3>

</h2><button class="btn btn-success" data-toggle="modal" data-target="#myModal">Nueva Reserva</button>


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


                    <a data-toggle="tooltip" title="Eliminar" class="btn btn-danger btn-xs" onclick="return confirm('¡Esta seguro de Cancelar la Reserva')" href="<?php echo base_url().'alumno/cancelar_reserva/'.$item->id; ?>" >
                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                    <a data-toggle="tooltip" title="Imprimir" href="<?php echo base_url().'admin/gen_report_alumno/'.$item->id?>" class="btn btn-primary btn-xs">
                        <span class="glyphicon glyphicon-print" aria-hidden="true"></span>
                    </a>


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
                <form class="form-horizontal" method="post" action="<?php echo base_url().'docente/nueva_reserva/'?>">
                    <fieldset>



                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="fecha">Fecha Reservación</label>
                            <div class="col-md-4">
                                <input id="fech" name="fecha" type="text" placeholder="" class="form-control input-md" required="">

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
                            echo $horario;
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
