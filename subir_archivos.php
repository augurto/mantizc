<?php session_start();
  if (!isset($_SESSION['id_user'])) {
        header("location: login.php");
    exit;
  }
  if ($_SESSION['prol']=="administrador" || $_SESSION['prol']=="Inv Principal"  || $_SESSION['prol']=="Coinvestigador" || $_SESSION['prol']=="estudiante"){
      

  }else{
     header("location: index.php"); 
  }
  /* Connect To Database*/
  require_once ("config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
  require_once ("config/conexion.php");//Contiene funcion que conecta a la base de datos
  
  $solicitud="active";
  $dashboard="";
  $active_grupos="";
  $proyectos=""; 
   $segmento=""; 
   $reportes="";  

      $est=$_GET['id_est'];
       $id_p=$_GET['id_p'];
     $sql=mysqli_query($con,"SELECT * FROM miembros WHERE id='".$est."'");
      $rws=mysqli_fetch_array($sql);
      $nombre=$rws["nombre"];

      ?><!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Mantiz</title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/sweetalert.css">
      <link rel="stylesheet" type="text/css" href="css/facebook.css">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">
<?php 
      include("modal/agregar_programas.php");
       include("modal/editar_programas.php");
       include("modal/cambiar_password.php");
       include("modal/comments.php");
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

       <?php  include('includes/nav.php');?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">


        <form action="../ajax/seguimiento.php" method="post"  enctype="multipart/form-data">
        <input type="text" name="descripcion" id="descripcion"class="form-control"  placeholder="Descripcion">
        <br>
            <?php 
            $username=$_SESSION["username"];
            $s=mysqli_query($con,"SELECT * FROM miembros WHERE email='".$username."'");
                $rwse=mysqli_fetch_array($s);
                $id_username=$rwse["id"];
                $nombre_entregable=$rwse["nombre"];
            
            ?>
            <input type="hidden" value="<?php echo $id_username;?>" id="id_miembro" name="id_miembro" class="form-control">
            
            <input type="hidden" value="<?php echo $id_p;?>" id="codigo_proyecto" name="codigo_proyecto" class="form-control">
            
                  
            
        <input type="file"   id="documento" name="documento" >
                    <br><br>

                  <!--   otro modelo de select
                    <select class="custom-select" name="SelectBanco" id="SelectBanco" required="">
                        <option disabled="disabled" value="" selected>Elegir...</option>
                       solo le falta el php incluido
                    </select> -->
                            <br>

                    <select class="form-control" name="id_entregable" id="id_entregable" required="">
                        <option disabled="disabled" value="" selected>Seleccionar entregable...</option>
                        <?php 

                        $sss=mysqli_query($con,"SELECT * FROM entregables where codigo_proyecto=$id_p");
                                while($f=mysqli_fetch_assoc($sss)){    

                                    echo '<option value="'.$f['id'].'">'.$f['nombre'].'</option>';

                        }
                        
                        ?>
                        <input type="hidden" value="<?php echo $f['nombre'];?>" id="nombre_entregable" name="nombre_entregable" class="form-control">

                        <input type="text" class="form-control" placeholder="Pegue el link de google Drive" id="link" name="link">
                    <center>
                    <input  class="btn btn-info btn-icon-split" type="submit" value="Enviar este formulario" />
                    </center>
                   
</form>




        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
     <?php include('includes/footer.php'); ?>
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
   <script type="text/javascript" src="js/comments.js"></script>
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

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</body>

</html>
