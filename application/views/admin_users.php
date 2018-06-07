



<h2 class="sub-header">Usuarios</h2>
<a href="<?php echo base_url().'admin/nuevo_usuario'?> " class="btn btn-success">Nuevo</a>

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
            <th>ID</th>
            <th>Nombre</th>
            <th>Usuario</th>
            <th>Perfil</th>

            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>

        <?php foreach($usuarios as $item): ?>
            <tr>
                <td> <?php echo $item->id ?> </td>
                <td> <?php echo $item->nombre ?> </td>
                <td> <?php echo $item->username ?> </td>
                <td> <?php echo $item->perfil ?> </td>


                <td>

                    <a class="btn btn-primary btn-xs" data-toggle="tooltip" title="Editar" href="<?php echo base_url().'admin/edit_usuario/'.$item->id; ?>" ><span class="glyphicon glyphicon-edit"></span></a>


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


			<br> <B>USUARIO:</B> NOS MUESTA LA PANTALLA PRINCIPAL DONDE OBSERVAMOS TODOS LOS USUARIOS REGISTADOS DENTRO DEL SISTEMA. <br/> 
			  
			<br> <B>NUEVO:</B> ESTA OPCION ES PARA REGISTRAR UN NUEVO USUARIO. <br/> 
			
			<br> <B>BUSCAR:</B> PODEMOS SELECCIONAR UN REGISTRO DE ALGUN USUARIO EN ESPECIFICO. <br/> 
			
			<br> <B>MOSTRAR:</B> PODEMOS SELECCIONAR UN NÚMERO DE  LOS REGISTROS DE USUARIOS EXISTENTES EN EL SISTEMA. <br/> 





          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>
