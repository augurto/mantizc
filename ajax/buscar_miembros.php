 <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<?php
session_start();
	
	require_once ("../config/db.php");
	require_once ("../config/conexion.php");
	
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if (isset($_GET['id'])){
		$idd=intval($_GET['id']);
			if ($delete1=mysqli_query($con,"DELETE FROM miembros WHERE id='".$idd."'")){
			?>
			<div class="alert alert-success alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Aviso!</strong> Datos eliminados exitosamente.
			</div>
			<?php 
		}else {
			?>
			<div class="alert alert-danger alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Error!</strong> Lo siento algo ha salido mal intenta nuevamente.
			</div>
			<?php
			
		}
			
		
		
	}
	if($action == 'ajax'){
		$id_e=$_GET["id_p"];
		
			?>
			<div class="card shadow mb-4">
            
            <div class="card-body">
              
                
              </div>
            </div>
          </div>

			<?php
		}
?>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
 
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
   <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

   <?php 
        $activo=mysqli_query($con,"SELECT count(*) as activo FROM miembros where estado='activo'");
        $rwt_act=mysqli_fetch_array($activo);
        $act=$rwt_act['activo'];

        $inactivo=mysqli_query($con,"SELECT count(*) as inactivo FROM miembros where estado='inactivo'");
        $rwt_inac=mysqli_fetch_array($inactivo);
        $inac=$rwt_inac['inactivo'];
 ?>
  <script type="text/javascript">
    // Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["Activos", "Inactivos"],
    datasets: [{
      data: [<?php echo $act; ?>, <?php echo $inac; ?>],
      backgroundColor: ['#6610f2', '#e74a3b'],
      hoverBackgroundColor: ['#6610f2', '#e74a3b'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});

  </script>