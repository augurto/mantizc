<?php
////////////////// CONEXION A LA BASE DE DATOS //////////////////
$host = 'localhost';
$basededatos = 'u415020159_mantizc';
$usuario = 'u415020159_mantizc';
$contraseña = 'Mantizc*#17';

$conexion = new mysqli($host, $usuario,$contraseña, $basededatos);
if ($conexion -> connect_errno) {
die( "Fallo la conexión : (" . $conexion -> mysqli_connect_errno() 
. ") " . $conexion -> mysqli_connect_error());
}
/*  ///////////////////CONSULTA DE AMBAS TABLAS///////////////////////
$queryAlumnos= $conexion->query("SELECT * FROM alumnos order by id_alumno");
$queryAlumnosDos=$conexion->query("SELECT * FROM alumnos_dos order by id_alumno_dos"); */

/////////// INSERTAR REGISTRO A AMBAS TABLAS ///////////////////////
if(isset($_POST['insertar']))// SI SE PRESIONA EL BOTÓN INSERTAR OCURRE LO SIGUIENTE:
{

$usuario=$_POST['usuario'];
$pass=$_POST['pass'];
$sha1=sha1($pass);
/* $carrera=$_POST['carrera'];
$grupo=$_POST['grupo']; */

$sql5 = "SELECT * FROM miembros WHERE nombre = '" . $usuario . "' OR email = '" . $email . "';";
$query_check_user_name = mysqli_query($conexion,$sql5);
				$query_check_user=mysqli_num_rows($query_check_user_name);

                if ($query_check_user == 1) {
                    $errors[] = "Lo sentimos usuario ya registrado.";
                    echo "<center><strong><h4>Error XD<BR></strong></h4><h4>Usuario ya registrado<BR></strong></h4></center>";
                } else {
                  # code...
                  $insertarUno=$conexion->query("INSERT INTO usuarios  (username , password, rol,codigo_proyecto, pass2)  VALUES ('$usuario', '$sha1','Inv Principal','$usuario', '$pass')");

                    if ($insertarUno==true)// SI LA QUERY ANTERIOR SE EJECUTA CON EXITO, SE EJECUTA LA INSERCIÓN A LA TABLA 2
                    {
                      $insertarDos=$conexion->query("INSERT INTO miembros  (nombre ,email, grupo, rand, rol,rol2, estado) VALUES ('$usuario','$usuario','51', '$pass','Investigador','$usuario', 'activo')");
                    }


                    if($insertarDos=true)// MENSAJE DE CONFIRMACIÓN DE INSERCIÓN
                    {
                      echo "<center><strong><h4>¡INSERCIÓN EXITOSA!<BR><a href='login.php'>CLICK PARA INICIAR SESSION</a></strong></h4></center>";
                    }
                    }

                }
// SE EJECUTA LA PRIMER INSERCIÓN A LA TABLA NO. 1 

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>MANTIZ</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="css/sweetalert.css">
      <link rel="stylesheet" type="text/css" href="css/facebook.css">
</head>

<body class="bg-gradient-primary">

  <div class="container">
    <br>
    <p></p>
    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row" style="background-color: #f0f8ffa8;">
            <div class="col-lg-6 d-none d-lg-block"><img src="img/mantiz.jpg" width="470px" height="520px"></div>
              <div class="col-lg-6">
                <br>
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4"><b>MANTIZ</b></h1>
                  </div>
                  <div class="alert alert-danger" id="error" style="display: none;" role="alert"></div>

                  

                                        <!-- //////////FORMULARIO PARA INSERTAR DATOS//////////// -->
                        <form method="post">
                        <h5 style="padding: .5%;">INSERTAR NUEVO USUARIO</h5>
                          <input name="usuario" type="text" placeholder="usuario" class="form-control form-control-user"  >
                          <br>
                          <input name="pass" type="text" placeholder="password" class="form-control form-control-user"  >
                          <!-- <input name="carrera" type="text" placeholder="carrera" class="form-control form-inline">
                          <input name="grupo" type="text" placeholder="grupo" class="form-control form-inline"> -->
                          <br>
                          <input name="insertar" type="submit" class="btn btn-primary btn-user btn-block login" value="Insertar Valores">
                          <br>  
                          <center>
                          <input type="reset"  class="btn btn-info" value="Borrar formulario" />
                          </center>
                        </form>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>


</html>

