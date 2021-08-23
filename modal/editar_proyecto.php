  <div class="modal fade" id="editProyecto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><i class='fa fa-edit'></i> Editar proyecto</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div> 
        <div class="modal-body">
      <form class="form-horizontal" method="post" id="editar_proyecto" name="editar_proyecto">
      <div id="resultados_ajax2"></div>
        <div class="form-group">
        <label for="mod_nombre" class="col-sm-6 control-label">Nombre del proyecto</label>
        <div class="col-sm-12">
          <input type="text" class="form-control" id="mod_nombre" name="mod_nombre"  required>
          <input type="hidden" name="mod_id" id="mod_id">
          <input type="hidden" name="mod_cod" id="mod_cod">
        </div>
        </div>
         <div class="form-group">
        <label for="mod_codigo" class="col-sm-3 control-label">Codigo del proyecto</label>
        <div class="col-sm-12">
          <input type="text" class="form-control" id="mod_codigo" name="mod_codigo">
        </div>
        </div>
        <div class="form-group">
            <label for="mod_telefono" class="col-sm-3 control-label">Presupuesto</label>
            <div class="col-sm-12">
              <input type="text" class="form-control" id="mod_presupuesto" name="mod_presupuesto">
            </div>


            <div class="form-group">
            <label for="mod_telefono" class="col-sm-3 control-label">Entregables</label>
            <div class="col-sm-12">
              <input type="text" class="form-control" id="mod_presupuesto" name="mod_presupuesto">
            </div>
        </div>
         <div class="form-group">
        <label for="mod_descripcion" class="col-sm-3 control-label">Descripcion</label>
        <div class="col-sm-12">
          <textarea class="form-control" id="mod_descripcion" name="mod_descripcion"></textarea>
        </div>
        </div>
              <div class="form-group">
              <label for="mod_telefono" class="col-sm-3 control-label">Estado</label>
              <div class="col-sm-12">
                <select name="mod_estado"  id="mod_estado"  class="form-control">
                <option value="activo">Activo</option>
                <option value="inactivo">Inactivo</option>
                <option value="terminado">Terminado</option>
                </select>
              </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary" id="actualizar_datos">Actualizar</button>
        </div>
        

<!--         agregando los entregables  -->

          <div class="container">
            <p></p>
                <a class="btn btn-primary" href="javascript:void(0)" id="addInput">
                  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                  Mas entregables
                </a>
                <br>
              <label>Entregables</label>
                <div id="dynamicDiv">
                      <div class="row">
                      <div class="col-lg-6">
                        <div class="input-group">
                          <div class="input-group-prepend">
                          <span class="input-group-text">
                          <span class="fa fa-file">
                          </span>
                        </span>
                        </div><input type="text" class="form-control" name="entregable[]" onkeyup="loa();" placeholder="Nombre del entregable" required>
                        </div>
                        </div>
                          <div class="col-lg-5"><div class="input-group"><div class="input-group-prepend"><span class="input-group-text"><span class="fas fa-calendar"></span></span></div><input type="date" class="form-control"  name="f[]" onkeyup="loa();" placeholder="Codigo" required></div></div></div><p></p>
                        </div>
                
                </div>
             
                </form>
                </div>
              </div>
            </div>
          </div>
<!-- aca termina el modal de agregar los entregables -->
      </form>
      </div>
    </div>
  </div>
</div>
        