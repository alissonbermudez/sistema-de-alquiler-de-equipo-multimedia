<h2 class="sub-header">Reservas Pendiendes de Pago </h2>

<?php

if($alert == 1){
    ?>
    <div class="alert alert-success" role="alert">Reserva ha sido Pagada</div>


    <?php


}elseif($alert==2){

    ?>
    <div class="alert alert-danger" role="alert">ERROR No se pudo Pagar</div>
    <?php

}
?>


<div class="table-responsive">
    <table class="table table-hover  dia " id="dia">
        <thead>
        <tr>
            <th>ID</th>
            <th>Carnet</th>
            <th>Equipo</th>
            <th>Horario</th>
            <th>Estado</th>

            <th>Fecha</th>
            <th>fecha de Reservación</th>

            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>

        <?php foreach ($res as $item):


            ?>
            <tr >
                <td> <?php echo $item->id ?> </td>
                <td> <?php echo $item->usuario ?> </td>
                <td> <?php echo $item->equipo ?> </td>
                <td> <?php echo $item->horario ?> </td>
                <td> <?php echo $item->estado ?> </td>

                <td> <?php echo $item->fecha ?> </td>
                <td> <?php echo $item->fecha_reserva ?></td>



                <td >


                        <a class="btn btn-success btn-xs" data-toggle="tooltip" title="Realizar Pago" onclick="return confirm('¡Esta seguro de realizar el pago')" href="<?php echo base_url() . 'colecturia/pagar/' . $item->id; ?>"><span class="glyphicon glyphicon-ok"></span></a>
                        <a data-toggle="tooltip" title="Imprimir" href="<?php echo base_url().'admin/gen_report_alumno/'.$item->id?>" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-print"></span></a>


                </td>
            </tr>
        <?php endforeach; ?>

        </tbody>
    </table>
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
