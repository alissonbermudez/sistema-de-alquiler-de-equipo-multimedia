<form class="form-horizontal" method="post" action="<?php echo base_url().'admin/update_equipo/'.$idequipo?>">
    <fieldset>

        <!-- Form Name -->
        <legend>Nuevo Equipo</legend>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="textinput">Marca</label>
            <div class="col-md-4">
                <input id="textinput" name="marca" type="text" value="<?php echo $marca;?>" placeholder="" class="form-control input-md" required="">

            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="modelo">Modelo</label>
            <div class="col-md-4">
                <input id="modelo" name="modelo" value="<?php echo $modelo?>" type="text" placeholder="" class="form-control input-md" required="">

            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="Serie">Serie</label>
            <div class="col-md-4">
                <input id="Serie" name="serie" value="<?php echo $serie ?>" type="text" placeholder="" class="form-control input-md" required="">

            </div>
        </div>

        <!-- Select Basic -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="tipo">Tipo Equipo</label>
            <div class="col-md-4">
                <select id="tipo" name="tipo" class="form-control">
                    <option value="1">Proyector</option>
                </select>
            </div>
        </div>

        <!-- Textarea -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="descripcion">Descripción</label>
            <div class="col-md-4">
                <textarea class="form-control" id="descripcion" name="descripcion"><?php echo $descripcion ?></textarea>
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="adquisicion">Adquisición</label>
            <div class="col-md-4">
                <input id="adquisicion" name="adquisicion" value="<?php echo $fechaadq ?>" type="date" placeholder="Fecha" class="form-control input-md" required="">

            </div>
        </div>

        <!-- Select Basic -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="tipo">Estado</label>
            <div class="col-md-4">
                <select id="estado" name="estado" class="form-control">
                    <option value="1">Bueno</option>
                    <option value="2">Dañado</option>
                    <option value="3">Reparación</option>
                </select>
            </div>
        </div>


        <!-- Button -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="guardar"></label>
            <div class="col-md-4">
                <button id="guardar" name="guardar" class="btn btn-success">Guardar</button>
            </div>
        </div>

    </fieldset>
</form>

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

		<br> <B> EDITAR NUEVO EQUIPO:</B> NOS MUESTA LA PANTALLA PRINCIPAL DONDE PODEMOS EDITAR LOS EQUIPOS YA EXISTENTES DEL SISTEMA. <br/>







          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>
