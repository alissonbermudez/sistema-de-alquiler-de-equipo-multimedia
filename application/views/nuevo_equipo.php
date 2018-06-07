

<form class="form-horizontal" method="post" action="<?php echo base_url().'admin/guardar_equipo'?>">
    <fieldset>

        <!-- Form Name -->
        <legend>Nuevo Equipo</legend>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="idequipo">ID - Nombre</label>
            <div class="col-md-4">
                <input id="idequipo" name="idequipo" type="text" placeholder="" class="form-control input-md" required="">

            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="textinput">Marca</label>
            <div class="col-md-4">
                <input id="textinput" name="marca" type="text" placeholder="" class="form-control input-md" required="">

            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="modelo">Modelo</label>
            <div class="col-md-4">
                <input id="modelo" name="modelo" type="text" placeholder="" class="form-control input-md" required="">

            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="Serie">Serie</label>
            <div class="col-md-4">
                <input id="Serie" name="serie" type="text" placeholder="" class="form-control input-md" required="">

            </div>
        </div>

        <!-- Select Basic -->
        <!--
            <label class="col-md-4 control-label" for="tipo">Tipo Equipo</label>
            <div class="col-md-4">
                <select id="tipo" name="tipo" class="form-control">
                    <option value="1">Proyector</option>
                </select>
            </div>
        </div>-->
        <div class="form-group">
        <?php
        echo $tipo;
        ?>
            </div>

        <!-- Textarea -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="descripcion">Descripción</label>
            <div class="col-md-4">
                <textarea class="form-control" id="descripcion" name="descripcion"></textarea>
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="adquisicion">Adquisición</label>
            <div class="col-md-4">
                <input id="adquisicion" name="adquisicion" type="date" placeholder="Fecha" class="form-control input-md" required="">

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

		<br> <B>NUEVO EQUIPO:</B> NOS MUESTA LA PANTALLA PRINCIPAL DONDE REGISTRAMOS LOS NUEVOS EQUIPOS DEL SISTEMA. <br/>


          







          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>
