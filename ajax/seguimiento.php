<?php 



$servername = "localhost";
$database = "u415020159_mantizb";
$username = "u415020159_mantizb";
$password = "Mantizb*#17";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}
 
$codigo_proyecto=mysqli_real_escape_string($conn,(strip_tags($_POST["codigo_proyecto"],ENT_QUOTES)));
$id_entregable=mysqli_real_escape_string($conn,(strip_tags($_POST["id_entregable"],ENT_QUOTES)));
$descripcion=mysqli_real_escape_string($conn,(strip_tags($_POST["descripcion"],ENT_QUOTES)));
$id_miembro=mysqli_real_escape_string($conn,(strip_tags($_POST["id_miembro"],ENT_QUOTES)));
$link=mysqli_real_escape_string($conn,(strip_tags($_POST["link"],ENT_QUOTES)));

$nombre_entregable=mysqli_real_escape_string($conn,(strip_tags($_POST["nombre_entregable"],ENT_QUOTES)));

$nombre_documento=$_FILES['documento']['name'];
$guardado=$_FILES['documento']['tmp_name'];





$direccion=$_GET["id_p2"]; /* codigo de proyecto */
$carpeta='../entregables/'.$codigo_proyecto.'/'.$nombre_entregable;
/* $carpeta='archivos/proyectos/'.$direccion; */


/* $id_miembro=$_GET["id_miembro"]; */


echo "Connected successfully";
/* $sql2 = "SELECT * FROM seguimientos WHERE id_seg = '" . $nomb . "' &&  id_miembros = '" . $id_miem . "';"; */

				
$sql = "INSERT INTO seguimientos (codigo_proyecto, documento,id_seg,descripcion,id_miembros,link) VALUES ('$codigo_proyecto', '$nombre_documento','$id_entregable','$descripcion','$id_miembro','$link')";

if (mysqli_query($conn, $sql)) {

if(!file_exists($carpeta)){
	mkdir($carpeta,0777,true);
	if(file_exists($carpeta)){
		if(move_uploaded_file($guardado, $carpeta.'/'.$nombre_documento)){
			echo "Archivo guardado con exito";
		}else{
			echo "Archivo no se pudo guardar";
		}

	}
}else{
	if(move_uploaded_file($guardado, $carpeta.'/'.$nombre_documento)){
	
        echo "Archivo guardado con exito";
	}else{
		echo "Archivo no se pudo guardar o no seleciono ningun archivo";
	}
}
/* header("Location: ver_entregables.php?var1=$direccion"); */
header("Location: ../ver_entregables.php?id_p=$codigo_proyecto&id_est=$id_miembro");
exit;

} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>