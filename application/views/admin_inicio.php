<ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#reservado" aria-controls="home" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-export"></span>Reservas</a>
    </li>
    <li role="presentation"><a href="#entregado" aria-controls="profile" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-import"></span>Entregados</a>
    </li>

</ul>


<div class="tab-content">
    <div role="tabpanel" class="tab-pane fade in active" id="reservado">

        <h4 class="sub-header">Reservas del dia <?php echo date('d/m/y') ?></h4>


        <?php

        if ($alert == 1) {
            ?>
            <div class="alert alert-success" role="alert">Entrega de Equipo Exitosa</div>


            <?php


        } elseif ($alert == 2) {

            ?>
            <div class="alert alert-danger" role="alert">ERROR No se pudo Guardar la Entrega</div>
            <?php

        } elseif ($alert == 3) {

            ?>
            <div class="alert alert-success" role="alert">Equipo Recibido</div>
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
                    <th>Pagado</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>

                <?php foreach ($reservashoy as $item):
                    $color = '';
                    $perfil;

                    if ($item->perfil == 'Docente') {
                        $perfil = "------";
                    } elseif ($item->perfil == 'Alumno') {
                        if ($item->pagado == 't') {
                            $color = "active";
                            $perfil = "Pagado";
                        } else {
                            $color = "info";
                            $perfil = "Sin pagar";
                        }
                    }

                    ?>
                    <tr>
                        <td> <?php echo $item->id ?> </td>
                        <td> <?php echo $item->usuario ?> </td>
                        <td> <?php echo $item->equipo ?> </td>
                        <td> <?php echo $item->horario ?> </td>
                        <td> <?php echo $item->estado ?> </td>

                        <td> <?php echo $item->fecha ?> </td>
                        <td> <?php echo $item->fecha_reserva ?></td>
                        <td class="<?php echo $color ?>">
                            <?php echo $perfil; ?>
                        </td>


                        <td class="<?php echo $color ?>">

                            <?php
                            if ($item->perfil == 'Docente') { ?>
                                <a data-toggle="tooltip" title="Entregar Equipo" class="btn btn-success btn-xs" href="<?php echo base_url() . 'admin/entregar_equipo/' . $item->id; ?>"><span class="glyphicon glyphicon-ok"></span></a>
                                <?php
                            } elseif ($item->perfil == 'Alumno') {
                                if ($item->pagado == 't') { ?>
                                    <a data-toggle="tooltip" title="Entregar Equipo" class="btn btn-success btn-xs" href="<?php echo base_url() . 'admin/entregar_equipo/' . $item->id; ?>"><span class="glyphicon glyphicon-ok"></span></a>
                                    <?php
                                } else { ?>
                                    Cancelar en colecturia
                                    <?php
                                }
                            }
                            ?>


                        </td>
                    </tr>
                <?php endforeach; ?>

                </tbody>
            </table>
        </div>

    </div>

    <div role="tabpanel" class="tab-pane fade" id="entregado">

        <h4 class="sub-header">Equipo Entregado <?php echo date('d/m/y') ?></h4>


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
                    <th>Pagado</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>

                <?php foreach ($reservasent as $item): ?>
                    <tr>
                        <td> <?php echo $item->id ?> </td>
                        <td> <?php echo $item->usuario ?> </td>
                        <td> <?php echo $item->equipo ?> </td>
                        <td> <?php echo $item->horario ?> </td>
                        <td> <?php echo $item->estado ?> </td>

                        <td> <?php echo $item->fecha ?> </td>
                        <td> <?php echo $item->fecha_reserva ?></td>
                        <td>
                            <?php
                            if ($item->perfil == 'Docente') {
                                echo "------";
                            } elseif ($item->perfil == 'Alumno') {
                                if ($item->pagado == 't') {
                                    echo "Pagado";
                                } else {
                                    echo "Sin pagar";
                                }
                            }
                            ?>
                        </td>


                        <td>


                            <a data-toggle="tooltip" title="Recibir Equipo" class="btn btn-primary btn-xs"  href="<?php echo base_url() . 'admin/recibir_equipo/' . $item->id; ?>"><span class="glyphicon glyphicon-ok"></span></a>


                        </td>
                    </tr>
                <?php endforeach; ?>

                </tbody>
            </table>
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

			<I><br> <B>RESERVAS:</B></I> NOS MUESTA LA PANTALLA PRINCIPAL DONDE OBSERVAMOS LAS RESERVAS REGISTRADAS DENTRO DEL SISTEMA. <br/> 
			
			<br> <B>BUSCAR:</B> PODEMOS SELECCIONAR UNA RESERVA  DE QUIPO EN ESPECIFICO. <br/> 
			
			<br> <B>MOSTRAR:</B> PODEMOS SELECCIONAR UN NÚMERO DE  LOS REGISTROS DE RESERVAS  EXISTENTES EN EL SISTEMA. <br/> 

			<I><br> <B>ENTREGADOS:</B></I> NOS MUESTA LA PANTALLA PRINCIPAL DONDE OBSERVAMOS LAS RESERVAS REGISTRADAS DE ENTREGA DENTRO DEL SISTEMA. <br/> 
			
			<br> <B>BUSCAR:</B> PODEMOS SELECCIONAR UN REGISTRO DE EQUIPO ENTREGADO EN ESPECIFICO. <br/> 
			
			<br> <B>MOSTRAR:</B> PODEMOS SELECCIONAR UN NÚMERO DE  LOS REGISTROS DE EQUIPO ENTREGADOS. <br/> 





          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>
