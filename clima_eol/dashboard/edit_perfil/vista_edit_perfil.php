<!-- Row Start -->
<span id="message"></span>
<div class="row gutter">
  <div class="col-lg-12 col-md-12">
    <div class="widget no-margin">
      <div class="widget-header">
        <div class="title">
          Editar Perfil
        </div>
        <span class="tools">
          <i class="fa fa-cogs"></i>
        </span>
      </div>
      <div class="widget-body">
        <div class="row gutter">
          
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <form class="form-horizontal" id="edit_profile_form">
              <h5>
                Información de ingreso
              </h5>
              <hr>
              <div class="form-group">
                <label for="user_name" class="col-sm-2 control-label">Nombre</label>
                <div class="col-sm-10">
                  <input type="text" name="user_name" id="user_name" class="form-control" value="<?php echo $name; ?>" required />
                </div>
              </div>
              <div class="form-group">
                <label for="user_email" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                  <input type="email" name="user_email" id="user_email" class="form-control" required value="<?php echo $email; ?>" />
                </div>
              </div>

              <br />
              <h5>
              <div class="col-sm-10 col-sm-offset-2 alert alert-info">
                 Deje la contraseña en blanco si no desea cambiarla 
              </div>
              </h5>
              <hr>
              <div class="form-group">
                <label for="user_new_password" class="col-sm-2 control-label">Contraseña</label>
                <div class="col-sm-10">
                  <input type="password" name="user_new_password" id="user_new_password" class="form-control" />
                </div>
              </div>
              <div class="form-group">
                <label for="user_re_enter_password" class="col-sm-2 control-label">Confirmar Contraseña</label>
                <div class="col-sm-10">
                  <input type="password" name="user_re_enter_password" id="user_re_enter_password" class="form-control" />
                  <input type="hidden" name="user_id2" id="user_id2" value="<?php echo $user_id; ?>" class="form-control" />
                  <span  id="error_password"></span>
                </div>
              </div>

              <div class="form-actions">
                <button type="submit" name="edit_prfile" id="edit_prfile" class="btn btn-info pull-right">
                  Guardar cambios
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Row End -->