<h3 class="sub-header">Equipo Disponible</h3>
<h4><?php echo $nombre?></h4>
<div class="table-responsive">
    <table class="table table-hover dia" id="dia">
        <thead>
        <tr>
            <th>Nombre</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Serie</th>
            <th>Tipo</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>

        <?php foreach($equipo as $item): ?>
            <tr>
                <td> <?php echo $item->idequipo ?> </td>
                <td> <?php echo $item->marca ?> </td>
                <td> <?php echo $item->modelo ?> </td>
                <td> <?php echo $item->serie ?> </td>
                <td> <?php echo $item->nombre ?> </td>

                <td>

                    <a class="btn btn-primary btn-xs" href="<?php echo base_url().'admin/guardar_reserva/'.$carnet.'/'.$item->idequipo.'/'.$horario.'/'.$fecha.'/'.$perfil ?>" >Reservar</a>


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
