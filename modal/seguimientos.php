<div class="modal fade" id="seguim" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><i class='fa fa-user'></i> Entregables</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div> 
        <div class="modal-body">
        <form class="form-horizontal" name="seg" id="seg" method="post"> <?php if($_SESSION['prol']=="administrador" || $_SESSION['prol']=="estudiante" || $_SESSION['prol']=="Inv Principal"  || $_SESSION['prol']=="Coinvestigador"){?>
      <div></div>
                <div class="col-lg-12">
                <div class="form-group">
                    <textarea class="form-control" placeholder="Descripcion del proyecto" name="descripcion" id="descripcion"></textarea>
                  </div>
          </div>
      <form action="../ajax/seguimiento222.php" method="get">

      <div class="col-sm-12">
       <div class="form-group">
        <label for="exampleInputFile">Archivo</label>
        <?php 
        $username=$_SESSION["username"];
        $s=mysqli_query($con,"SELECT * FROM miembros WHERE email='".$username."'");
             $rwse=mysqli_fetch_array($s);
               $id_username=$rwse["id"];
        
        ?>
        <input type="text" value="<?php echo $id_username;?>" id="id_miembro" name="id_miembro" class="form-control">
        <div class="input-group">
        <div class="custom-file">
        <input type="file" onkeyup="loaddds(1);"  class="custom-file-input" id="exampleInputFile" name="exampleInputFile" required>
        <label class="custom-file-label" for="exampleInputFile">Archivo</label>
                      </div>
                    </div>
                  </div>
              </div>
        <div class="col-sm-12">
        <select name="nomb"  id="nomb" onkeyup="select();"  class="form-control" required>
        </select>
        <input type="hidden" name="cd" placeholder="Nombre del seguimiento"  id="cd"  class="form-control">
        <input type="hidden" name="cdd" placeholder="Nombre del seguimiento"  id="cdd"  class="form-control">
        <input type="hidden" name="id" placeholder="Nombre del seguimiento"  id="id"  class="form-control">
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary" id="seg" name="seg">Guardar </button>
      <?php }else{?>
      <input type="hidden" name="cd" placeholder="Nombre del seguimiento"  id="cd"  class="form-control">
      <input type="hidden" name="cdd" placeholder="Nombre del seguimiento"  id="cdd"  class="form-control">
     
      <?php }?>
          
        </div>
        <input type="submit" value="Submit">
      </form>
      </form>
       </div>
       <div class='outer_div11'></div><!-- Carga los datos ajax -->
    </div>
  </div>
</div>



        