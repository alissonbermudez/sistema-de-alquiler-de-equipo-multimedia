



<h4 class="sub-header">Reservas no Procesadas</h4>
<a href="<?php echo base_url().'admin/limpiar'; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span>Limpiar Todas</a>

<?php

if($alert == 1){
    ?>
    <div class="alert alert-success" role="alert">Limpieza Exitosa</div>


    <?php


}elseif($alert==2){

    ?>
    <div class="alert alert-danger" role="alert">ERROR No se pudo ejecutar la limpieza </div>
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
                <td class="danger"> <?php echo $item->fecha_reserva ?></td>


            </tr>
        <?php endforeach; ?>

        </tbody>
    </table>
</div>



