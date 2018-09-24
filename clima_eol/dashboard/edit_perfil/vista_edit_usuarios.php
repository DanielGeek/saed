

<span id="alert_action"></span>
  <div class="row">
   <div class="col-lg-12">
    <div class="panel panel-default">
                    <div class="panel-heading">
                     <div class="row">
                         <div class="col-lg-10 col-md-10 col-sm-8 col-xs-6">
                             <h3 class="panel-title">Lista de Usuario</h3>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6" align="right">
                             <button type="button" name="add" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-success btn-xs">Add</button>
                         </div>
                        </div>
                       
                        <div class="clear:both"></div>
                    </div>
                    <div class="panel-body">
                     <div class="row">
                     <div class="col-sm-12 table-responsive">
                      <table id="user_data" class="table table-bordered table-striped">
                       <thead>
                        <tr>
                        <th readonly>ID</th>
                        <th>Email</th>
                        <th>Nombre</th>
                        <th>Tipo</th>
                        <th>Estatus</th>
                        <th>Editar</th>
                        <th style="width: 167px;">Cambiar Estatus</th>
                        <th style="width: 147px;">Eliminar</th>
                        </tr>
                        </thead>
                      </table>
                     </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="userModal" class="modal fade">
            <div class="modal-dialog">
                <form method="post" id="user_form">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">
                                <i class="fa fa-plus"></i> Agregar Usuario</h4>
                        </div>
                        <div class="modal-body">
                            
                            <div class="form-group">
                                <label for="user_email">Ingrese Email</label>
                                <input type="email" name="user_email" id="correo_name" class="form-control" required />
                            </div>
                            <div class="form-group">
                                <label for="user_name">Ingrese Usuario</label>
                                <input type="text" name="user_name" id="user_name2" class="form-control" required />
                            </div>
                            <div class="form-group">
                                <label for="user_new_password2" class=" control-label">Contraseña</label>
                                <input type="password" name="user_new_password2" id="user_new_password2" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="user_re_enter_password2" class=" control-label">Confirmar Contraseña</label>
                                <input type="password" name="user_re_enter_password2" id="user_re_enter_password2" class="form-control" />
                                <span  id="error_password2"></span>
                            </div>
                            <div class="alert alert-info">
                                Deje la contraseña en blanco si no desea cambiarla 
                            </div>
                            <div class="form-group">
                                <label for="user_type">Seleccione Tipo de Usuario</label>
                                <select name="user_type" id="user_type" class="form-control" required>
                                    <option value='master'>master</option>
                                    <option value'user'>user</option>
                                </select>
                                <spam id="alert_user_type"></spam>
                            </div>
                            <div class="form-group">
                                <label for="estatus">Seleccione Estatus de Usuario</label>
                                <select name="estatus" id="estatus" class="form-control" required>
                                    <option value='Activo'>Activo</option>
                                    <option value'Inactivo'>Inactivo</option>
                                </select>
                                <spam id="alert_user_type"></spam>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="user_id" id="user_id" />
                            <input type="hidden" name="btn_action" id="btn_action" />
                            <input type="submit" name="action" id="action" class="btn btn-info" value="Add" />
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        </div>

