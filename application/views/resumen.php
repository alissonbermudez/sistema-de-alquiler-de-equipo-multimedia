

<h3 class="sub-header">Resumen De La Reserva</h3>

<div class="alert alert-success" role="alert">Se Ha Reservado Con Exito¡¡</div>

<h3>Datos:</h3>
<h4>Reserva #: <?php echo $id; ?></h4>
<h4>Carnet Alumno: <?php echo $usuario; ?></h4>
<h4>Equipo: <?php echo $equipo; ?></h4>
<h4>Horario: <?php echo $hora; ?></h4>
<h4>Estado: Sin Pagar </h4>
<h4>Fecha Reservada: <?php echo $fecha; ?></h4>

<a  href="<?php echo base_url().'admin/gen_report_alumno/'.$id?>" class="btn btn-primary">
    <span class="glyphicon glyphicon-print"></span>Imprimir Comprobante</a>


