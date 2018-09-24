

<span id="alert_action2"></span>
  <div class="row">
   <div class="col-lg-12">
    <div class="panel panel-default">
                    <div class="panel-heading">
                     <div class="row">
                         <div class="col-lg-10 col-md-10 col-sm-8 col-xs-6">
                             <h3 class="panel-title">Lista de Telefonos</h3>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6" align="right">
                             <button type="button" name="add2" id="add_button2" data-toggle="modal" data-target="#userModal2" class="btn btn-success btn-xs">Add</button>
                         </div>
                        </div>
                       
                        <div class="clear:both"></div>
                    </div>
                    <div class="panel-body">
                     <div class="row">
                     <div class="col-sm-12 table-responsive">
                      <table id="user_data2" class="table table-bordered table-striped">
                       <thead>
                        <tr>
                        <th readonly>ID</th>
                        <th>Telefono</th>
                        <th>WhatsApp</th>
                        <th>Nombre</th>
                        <th>Email </th>
                        <th>Comentario</th>
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

        <div id="userModal2" class="modal fade">
            <div class="modal-dialog">
                <form method="post" id="user_form2">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title modal-title-telefonos">
                                <i class="fa fa-plus"></i> Agregar Usuario</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="user_tel">Ingrese Télefono</label>
                                <input type="tel" name="user_tel" id="user_tel" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="user_ws">Ingrese WhatsApp</label>
                                <input type="tel" name="user_ws" id="user_ws" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="user_name2">Ingrese Usuario</label>
                                <input type="text" name="user_name2" id="user_name2" class="form-control" required />
                            </div>
                            <div class="form-group">
                                <label for="user_email2">Ingrese Email</label>
                                <input type="email" name="user_email2" id="user_email2" class="form-control" required />
                            </div>
                            <div class="form-group">
                                <label for="user_textarea2">Ingrese Comentario</label>
                                <textarea name="user_textarea2" id="user_textarea2" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="user_id2" id="user_id2" />
                            <input type="hidden" name="btn_action2" id="btn_action2" />
                            
                            <input type="submit" name="action2" id="action2" class="btn btn-info" value="Add" />
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        </div>

