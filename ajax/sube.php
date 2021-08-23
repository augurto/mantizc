<?php 
$entregable=$_GET["nom"];

$est=$_GET["cd"];
$descripcion=$_GET["descripcion"];

$direccion=$_GET["cdd"]; /* codigo de proyecto */
$carpeta='../entregables/'.$direccion.'/'.$est;
/* $carpeta='archivos/proyectos/'.$direccion; */
$nombre=$_FILES['exampleInputFile']['name'];
$guardado=$_FILES['exampleInputFile']['tmp_name'];

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
 
echo "Connected successfully";
/* $sql2 = "SELECT * FROM seguimientos WHERE id_seg = '" . $nomb . "' &&  id_miembros = '" . $id_miem . "';"; */
$sql = "INSERT INTO seguimientos (codigo_proyecto, documento,id_seg,descripcion,id_miembros) VALUES ('$direccion', '$nombre','$entregable','$descripcion','$est')";

if (mysqli_query($conn, $sql)) {

if(!file_exists($carpeta)){
	mkdir($carpeta,0777,true);
	if(file_exists($carpeta)){
		if(move_uploaded_file($guardado, $carpeta.'/'.$nombre)){
			echo "Archivo guardado con exito";
		}else{
			echo "Archivo no se pudo guardar";
		}

	}
}else{
	if(move_uploaded_file($guardado, $carpeta.'/'.$nombre)){
	
        echo "Archivo guardado con exito";
	}else{
		echo "Archivo no se pudo guardar o no seleciono ningun archivo";
	}
}
/* header("Location: ver_entregables.php?var1=$direccion"); */
header("Location: ver_entregables.php?id_p=$direccion&id_est=$est");
exit;

} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>