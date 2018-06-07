<form class="form-horizontal" method="post" action="<?php echo base_url().'admin/update_usuario/'.$id?>">
    <fieldset>

        <!-- Form Name -->
        <legend>Editar Datos de Usuario</legend>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="id">ID-Carnet</label>
          <div class="col-md-4">
          <input id="id" name="id" readonly value="<?php echo $id ?>" placeholder="" class="form-control input-md" required="" type="text">

          </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="Apellido">Nombre</label>
          <div class="col-md-4">
          <input id="nombre" name="nombre" value="<?php echo $nombre ?>"  placeholder="Nombre completo" class="form-control input-md" type="text">

          </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="Usuario">Usuario</label>
          <div class="col-md-4">
          <input id="usuario" name="usuario" value="<?php echo $username ?>"  placeholder="" class="form-control input-md" type="text">

          </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="Usuario">Escribe un Nuevo password o  mantener para conservar</label>

        </div>


        <!-- Password input-->
        <div class="form-group" id="parentpass">
          <label class="col-md-4 control-label" for="Password">Password</label>
          <div class="col-md-4">
            <input id="password" name="password" default="" value="<?php echo $password ?>" pattern="[a-zA-Z0-9_]{5,}" oninvalid="setCustomValidity('Debe tener minimo 5 caracteres')" title="El password debe tener 5 caracteres minimos"   placeholder="" class="form-control input-md"  type="password">

          </div>
        </div>

        <!-- Password input-->
        <div class="form-group " id="confir">
          <label class="col-md-4 control-label" for="confirmar">Confirmar Password</label>
          <div class="col-md-4">
            <input id="confirmar" value="<?php echo $password ?>" name="confirmar" pattern="[a-zA-Z0-9_]{5,}" placeholder="" class="form-control input-md " type="password">

          </div>
        </div>






        <!-- Select Basic -->
        <div class="form-group">
          <label class="col-md-4 control-label" for="Rol">Rol</label>
          <div class="col-md-4">
            <select id="rol" name="rol" class="form-control" required>
              <option value="">Roles</option>
              <option value="Alumno">Alumno</option>
              <option value="Docente">Docente</option>
              <option value="Admin">Administrador</option>
              <option value="Colecturia">Colecturia</option>
            </select>
          </div>
        </div>

        <!-- Button (Double) -->
        <div class="form-group">
          <label class="col-md-4 control-label" for="button1id"></label>
          <div class="col-md-8">
            <button id="button1id" name="button1id" class="btn btn-success">Guardar</button>
            <button id="button2id" name="button2id" class="btn btn-danger">Cancelar</button>
          </div>
        </div>

        </fieldset>
  </form>

  <script type="text/javascript">

  var password = document.getElementById("password"), confirm_password = document.getElementById("confirmar");
  var parentconfirm = document.getElementById("confir");
  var parentpass = document.getElementById("parentpass");


  function validatePassword(){
    if(password.value != confirm_password.value) {

      parentconfirm.className += " has-error";
    } else {

      parentconfirm.className -= " has-error";
      parentconfirm.className = " form-group has-success";
    }

    if (password.value.length<5){
      parentpass.className += " has-error";

    }
    else {
      parentpass.className -= " has-error";
      parentpass.className = " form-group has-success";
    }
  }




  password.onchange = validatePassword;
  confirm_password.onkeyup = validatePassword;

  </script>


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

	<br> <B> EDITAR NUEVO USUARIO:</B> NOS MUESTA LA PANTALLA PRINCIPAL DONDE PODEMOS EDITAR LOS USUARIOS YA EXISTENTES DEL SISTEMA. <br/>








            </p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  </div>
