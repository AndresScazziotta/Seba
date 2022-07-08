<?php
require '../../include/db_conn.php';
page_protect();
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <title>Gimnasio Yupanqui</title>
	<link rel="icon" href="logo2.png">
    <link rel="stylesheet" href="../../css/style.css"  id="style-resource-5">
    <script type="text/javascript" src="../../js/Script.js"></script>
    <link rel="stylesheet" href="../../css/dashMain.css">
    <link rel="stylesheet" type="text/css" href="../../css/entypo.css">
	<link href="a1style.css" rel="stylesheet" type="text/css">
	
	<style>
 	#button1
	{
	width:126px;
	}

	.page-container .sidebar-menu #main-menu li#hassubopen > a {
	background-color: #2b303a;
	color: #ffffff;
	}

	</style>

</head>
    <body class="page-body  page-fade" onload="collapseSidebar()">

    	<div class="page-container sidebar-collapsed" id="navbarcollapse">	
	
		<div class="sidebar-menu">
	
			<header class="logo-env">
			
			<div class="logo">
				<a href="index.php">
					<img src="logo2.png" alt="" width="192" height="80" />
				</a>
			</div>
			
					<div class="sidebar-collapse" onclick="collapseSidebar()">
				<a href="#" class="sidebar-collapse-icon with-animation">
					<i class="entypo-menu"></i>
				</a>
			</div>
							
			
		
			</header>
    		<?php include('nav.php'); ?>
    	</div>


    		<div class="main-content">
		
				<div class="row">
					
					<div class="col-md-6 col-sm-8 clearfix">	
							
					</div>
					
					
					<div class="col-md-6 col-sm-4 clearfix hidden-xs">
						
						<ul class="list-inline links-list pull-right">

							<li>Bienvenido <?php echo $_SESSION['full_name']; ?> 
							</li>								
						
							<li>
								<a href="logout.php">
									Cerrar Sesión <i class="entypo-logout right"></i>
								</a>
							</li>
						</ul>
						
					</div>
					
				</div>

		<h3>Editar Miembros</h3>

		<hr />
		
		<table class="table table-bordered datatable" id="table-1" border=1>
			<thead>
				<tr><h2>
<!--					<th>Sl.No</th>   -->
					
					<th>ID Miembro</th>
					<th>Nombre</th>
					<th>Apellido</th>
					<th>Contacto</th>
					<th>Correo</th>
					<th>Género</th>
					<th>Fecha de Ingreso</th>
					<th>Fecha de Expiración</th>
					<th>Acción</th></h2>
				</tr>
			</thead>
				<tbody>

						<?php
							$query  = "select * from users ORDER BY fecha_inscripcion";
							$result = mysqli_query($con, $query);
							$sno    = 1;

							if (mysqli_affected_rows($con) != 0) {
							    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
							        $uid   = $row['userid'];
							        $query1  = "select * from enrolls_to WHERE uid='$uid' AND renewal='yes'";
							        $result1 = mysqli_query($con, $query1);
							        if (mysqli_affected_rows($con) == 1) {
							            while ($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {
							                
							                //echo "<tr><td>".$sno."</td>";

							                echo "<td>" . $row['userid'] . "</td>";

							                echo "<td>" . $row['nombre'] . "</td>";

											echo "<td>" . $row['apellido'] . "</td>";

							                echo "<td>" . $row['telefono'] . "</td>";

							                echo "<td>" . $row['email'] . "</td>";

							                echo "<td>" . $row['genero'] . "</td>";

							                echo "<td>" . $row['fecha_inscripcion'] ."</td>";

											echo "<td>" . $row1['expire'] . "</td>";
							                
							                $sno++;
							       
							                echo "<td><form action='edicion_miembros.php' method='post'><input type='hidden'  name='name' value='" . $uid . "'/><input type='submit' class='a1-btn a1-green' id='button1' value='Editar' class='btn btn-warning'/></form><form action='borrar_miembro.php' method='post' onsubmit='return ConfirmDelete()'><input type='hidden' name='name' value='" . $uid . "'/><input type='submit' value='Eliminar' width='20px' id='button1' class='a1-btn a1-orange'/></form></td></tr>";
							                $msgid = 0;
							            }
							        }
							    }
							}
						?>									
					</tbody>
				</table>

<script>
	
	function ConfirmDelete(name){
	
    var r = confirm("¿Estás seguro de borrar este miembro?");
    if (r == true) {
       return true;
    } else {
        return false;
    }
}

</script>

			<?php include('footer.php'); ?>
    	</div>
    </body>
</html>





