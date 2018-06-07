<h3 class="sub-header">DATOS DE LA RESERVA <?php echo $id; ?></h3>

<br>

<br>

<h4>Usuario: <small><?php echo $usuario?></small></h4>
<h4>Equipo Reservado:
    <small><?php echo $equipo?></small>
</h4>
<h4>Horario Reservado:
    <small><?php echo $horario?></small>
</h4>
<h4>Estado:
    <small><?php echo $estado ?></small>
</h4>
<h4>Fecha en que se realizo:
    <small><?php echo $fecha?></small>
</h4>
<h4>Fecha Reservada:
    <small><?php echo $fecha_reserva?></small>
</h4>
<br>
<a class="btn btn-success" href="<?php echo base_url().'admin/reservas'?>">Regresar</a>
<a href="<?php echo base_url().'admin/gen_report_alumno/'.$id?>" class="btn btn-primary">Imprimir Comprobante</a>
