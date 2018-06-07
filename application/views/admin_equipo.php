



<h2 class="sub-header">Equipo</h2>
<a href="<?php echo base_url().'admin/nuevo_equipo'?> " class="btn btn-success">Nuevo</a>
<a href="<?php echo base_url().'admin/gen_report_equipo'?> " class="btn btn-default"><span class="glyphicon glyphicon-print"></span> Imprimir</a>

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
    <table class="table  table-hover dia" id="dia">
        <thead>
        <tr>
            <th>#</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Serie</th>
            <th>Tipo</th>
            <th>Descripción</th>
            <th>Adquisición</th>
            <th>Estado</th>
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
                <td> <?php echo $item->tipo ?> </td>
                <td> <?php echo $item->descripcion ?> </td>
                <td> <?php echo $item->fechaadq ?></td>
                <td> <?php  if ($item->estado == 1){
                        echo "Bueno";
                    }elseif($item->estado == 2){
                        echo "Dañado";
                    }elseif($item->estado == 3){
                        echo "En Reparación";
                    }

                    ?>

                </td>

                <td>

                    <a class="btn btn-primary btn-xs" data-toggle="tooltip" title="Editar" href="<?php echo base_url().'admin/edit_equipo/'.$item->idequipo; ?>" ><span class="glyphicon glyphicon-edit"></span></a>
                    <a class="btn btn-success btn-xs" data-toggle="tooltip" title="Comentar" href="<?php echo base_url().'admin/comentarios/'.$item->idequipo; ?>" ><span class="glyphicon glyphicon-comment"></span></a>


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
			  
			<br> <B>EQUIPO:</B> NOS MUESTA LA PANTALLA PRINCIPAL DONDE OBSERVAMOS LOS EQUIPOS REGISTADOS DENTRO DEL SISTEMA. <br/> 
			  
			<br> <B>NUEVO:</B> ESTA OPCION ES PARA REGISTRAR UN NUEVO EQUIPO. <br/> 
			
			<br> <B>IMPRIMIR:</B> IMPRIME UN REPORTE DEL REGISTRO DE LOS EQUIPOS QUE EXISTEN DENTRO DEL SISTEMA. <br/> 
			
			<br> <B>BUSCAR:</B> PODEMOS SELECCIONAR UN REGISTRO DE EQUIPO EN ESPECIFICO. <br/> 
			
			<br> <B>MOSTRAR:</B> PODEMOS SELECCIONAR UN NÚMERO DE  LOS REGISTROS DE LOS EQUIPOS EXISTENTES EN EL SISTEMA. <br/> 




          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>
