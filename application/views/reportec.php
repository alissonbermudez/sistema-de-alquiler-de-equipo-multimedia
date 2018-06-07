

<form class="form-horizontal" method="post" action="<?php echo base_url().'colecturia/gen_report'?>">
    <fieldset>

        <!-- Form Name -->
        <legend>Generar Reporte</legend>

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
                <button id="Generar" name="Generar" class="btn btn-success">Generar</button>
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
