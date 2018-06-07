<h3 class="sub-header">Reporte de Reservas Totales</h3>

<form class="form-horizontal" method="post" action="<?php echo base_url().'admin/gen_report'?>">
    <fieldset>



        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="fechai">Fecha de Inicio</label>
            <div class="col-md-4">
                <input id="fechai" name="fechai" type="text" placeholder="" class="form-control input-md" required="">

            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="fechaf">Fecha final </label>
            <div class="col-md-4">
                <input id="fechaf" name="fechaf" type="text" placeholder="" class="form-control input-md" required="">

            </div>
        </div>

        <!-- Button -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="Generar"></label>
            <div class="col-md-4">
                <button id="Generar" name="Generar" class="btn btn-success"><span class="glyphicon glyphicon-download-alt"></span> Generar</button>
            </div>
        </div>



    </fieldset>
</form>

<h3 class="sub-header">Reporte de Reservas Canceladas</h3>

<form class="form-horizontal" method="post" action="<?php echo base_url().'admin/gen_report_canceladas'?>">
    <fieldset>



        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="fechai">Fecha de Inicio</label>
            <div class="col-md-4">
                <input id="fechaic" name="fechai" type="text" placeholder="" class="form-control input-md" required="">

            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="fechaf">Fecha final </label>
            <div class="col-md-4">
                <input id="fechafc" name="fechaf" type="text" placeholder="" class="form-control input-md" required="">

            </div>
        </div>

        <!-- Button -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="Generar"></label>
            <div class="col-md-4">
                <button id="Generar" name="Generar" class="btn btn-success"><span class="glyphicon glyphicon-download-alt"></span> Generar</button>
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

		<br> <B>REPORTE DE RESERVAS TOTALES:</B> NOS MUESTA LA PANTALLA PRINCIPAL DONDE PODEMOS VER LAS RESERVAS DE  LOS EQUIPOS DESDE LA FECHA INICIO AL FINAL. <br/>
		

		<br> <B> REPORTE RESERVAS CANCELADAS:</B> NOS MUESTA LA PANTALLA PRINCIPAL DONDE PODEMOS VER LAS RESERVAS CANCELADAS  DE  LOS EQUIPOS DESDE LA FECHA INICIO AL FINAL. <br/>




          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>
