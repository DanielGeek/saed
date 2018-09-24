

<span id="alert_action"></span>
  <div class="row">
   <div class="col-lg-12">
    <div class="panel panel-default">
                    <div class="panel-heading">
                     <div class="row">
                         <div class="col-lg-10 col-md-10 col-sm-8 col-xs-6">
                             <h3 class="panel-title">Lista de comentarios</h3>
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
                                <label for="user_name">Ingrese Usuario</label>
                                <input type="text" name="user_name" id="user_name" class="form-control" required />
                            </div>
                            <div class="form-group">
                                <label for="user_email">Ingrese Email</label>
                                <input type="email" name="user_email" id="user_email" class="form-control" required />
                            </div>
                            <div class="form-group">
                                <label for="user_textarea">Ingrese Comentario</label>
                                <textarea name="user_textarea" id="user_textarea" class="form-control"></textarea>
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

