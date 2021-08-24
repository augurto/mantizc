<?php session_start();
  if (!isset($_SESSION['id_user'])) {
        header("location: login.php");
    exit;
  }
  /* Connect To Database*/
  require_once ("config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
  require_once ("config/conexion.php");//Contiene funcion que conecta a la base de datos
  
  $solicitud="";
  $dashboard="";
  $active_grupos="";
  $proyectos=""; 
   $segmento="active"; 
   $reportes="";  ?><!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Mantiz</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="css/sweetalert.css">
      <link rel="stylesheet" type="text/css" href="css/facebook.css">
</head>

<body id="page-top">
<?php
include('modal/nuevo_miembros.php');
include('modal/editar_miembros.php');
include("modal/cambiar_password.php");
 ?>
  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php include('includes/menu.php');?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php include('includes/nav.php');?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">entregable</h1>
               <?php if($_SESSION['prol']=='Inv Principal'){?>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"  data-toggle="modal" data-target="#NuevoMiembro"><i class="fas fa-users fa-sm text-white-50"></i> Agregar entregable</a>
          <?php }?>
          </div>
<!-- 
           <div class="outer_div"></div> -->
           <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">PRueba detabla</h6>
              <input type="text" value="<?php echo $_GET['id_p']?>">
            </div>
           <div class="table-responsive">
           <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                    <th>Codigo_proyecto</th>
					<th>Nombre</th>
					<th>Fecha de entrega</th>
					
					 <?php if($_SESSION['prol']=='Inv Principal'){?><th class='text-right'>Acciones</th><?php } ?>
                    </tr>
                  </thead>
                  <tbody>
				<?php
				while ($row=mysqli_fetch_array($query)){
						$id=$row['codigo_proyecto'];
						$nombre=$row['nombre'];
						$cedula=$row['fecha_entrega'];
						/* $estado=$row['estado'];
						$email=$row['email'];
						$rol=$row['rol2'];
						$grupo=$row['grupo'];
						if ($estado=='activo'){$label_class='warning '; $ico='info';}
						else{$text_estado="inactivo";$label_class='danger'; $ico='exclamation-triangle';} */
					?>
					<tr>
						
					<td><?php echo $id; ?></td>
					<td><?php echo $nombre; ?></td>
						<td ><?php echo $cedula; ?></td>

					<!-- 	<td ><?php echo $email; ?></td>
						<td ><?php echo $rol; ?></td>
						<?php $grp=mysqli_query($con,'select * from grupos where id='.$row['grupo'].'');
                    $rw=mysqli_fetch_array($grp);

                      $nombre_grupo=$rw["nombre_grupo"];
                      ?>
                     <td ><?php echo $nombre_grupo; ?></td>
                    
					  <td><a href="#" class="btn btn-<?php echo $label_class;?> btn-icon-split"> -->


                    <!-- <span class="icon text-white-50">
                      <i class="fas fa-<?php echo $ico; ?>"></i>
                    </span> -->


             <!--        <span class="text"><?php echo $estado; ?></span> -->

                  </a></td>
					 <?php if($_SESSION['prol']=='Inv Principal'){?><td ><span class="pull-right">
					<a href="#" class='btn btn-info' title='Editar miembro' onclick="obtener_datos(<?php echo $id;?>);" data-toggle="modal" data-target="#EditMiembros"><i class="fa fa-edit"></i></a>
					<a href="#" class='btn btn-info' title='Eliminar miembro' onclick="eliminar(<?php echo $id;?>);" data-toggle="modal" data-target="#myModal2"><i class="fa fa-trash"></i></a> 
					</span></td>
				<?php } ?>
						<input type="text" value="<?php echo $nombre;?>" id="nombre<?php echo $id;?>">
					<input type="text" value="<?php echo $cedula;?>" id="cedula<?php echo $id;?>">
					<input type="text" value="<?php echo $cod;?>">
					<input type="text" value="<?php echo $id;?>">
					<input type="text" value="<?php echo $_GET['id_p']?>">
					<!-- <input type="hidden" value="<?php echo $rol;?>" id="rol<?php echo $id;?>">
					<input type="hidden" value="<?php echo $grupo;?>" id="grupo<?php echo $id;?>">
					<input type="hidden" value="<?php echo $estado;?>" id="estado<?php echo $id;?>">
					<input type="hidden" value="<?php echo $nombre_grupo;?>" id="grupo<?php echo $id;?>">
					<input type="hidden" value="<?php echo $email;?>" id="email<?php echo $id;?>"> -->
					</tr>
					<?php
				}
				?>
			  	</tbody>
                </table>
            </div>

    

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <?php include('includes/footer.php');?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
 <?php include('modal/logout.php'); ?>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/miembros.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
 <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
   <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</body>

</html>
