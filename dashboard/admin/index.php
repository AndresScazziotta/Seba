<?php
require '../../include/db_conn.php';
page_protect();
?>
<!DOCTYPE html>
<html lang="en">
<head> 

	<link rel="icon" href="img/logo2.png">
    <title>Gimnasio Yupanqui</title>
	<link rel="icon" href="logo2.png">
	<link rel="stylesheet" href="../../css/style.css"  id="style-resource-5">
    <script type="text/javascript" src="../../js/Script.js"></script>
    <link rel="stylesheet" href="../../css/dashMain.css">
    <link rel="stylesheet" type="text/css" href="../../css/entypo.css">
     <style>
    	.page-container .sidebar-menu #main-menu li#dash > a {
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
					<img src="logo2.png" alt="" width="80" height="80" />
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
							<li>Bienvenid@ <?php echo $_SESSION['full_name']; ?> 
							</li>					
							<li>
								<a href="logout.php">
									Cerrar Sesión <i class="entypo-logout right"></i>
								</a>
							</li>
						</ul>						
					</div>					
				</div>
			<h2>Gimnasio Yupanqui | Panel de Control</h2>
			
			<hr>
<!-- PARA BORRAR CUADROS INICIALES-->
<!--

			<div class="col-sm-3"><a href="revenue_month.php">			
				<div class="tile-stats tile-red">
					<div class="icon"><i class="entypo-users"></i></div>
						<div class="num" data-postfix="" data-duration="1500" data-delay="0">
						<h2>Dinero recibido este Mes</h2><br>	
						<?php
							$date  = date('Y-m');
							$query = "select * from enrolls_to WHERE  paid_date LIKE '$date%'";
							$result  = mysqli_query($con, $query);
							$revenue = 0;
							if (mysqli_affected_rows($con) != 0) {
							    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
							    	$query1="select * from plan where pid='".$row['pid']."'";
							    	$result1=mysqli_query($con,$query1);
							    	if($result1){
							    		$value=mysqli_fetch_row($result1);
							        $revenue = $value[4] + $revenue;
							    	}
							    }
							}
							echo "$".$revenue;
							?>
						</div>
				</div></a>
			</div>
			

			<div class="col-sm-3"><a href="ver_miembro.php">			
				<div class="tile-stats tile-green">
					<div class="icon"><i class="entypo-chart-bar"></i></div>
						<div class="num" data-postfix="" data-duration="1500" data-delay="0">
						<h2>Miembros <br>Totales</h2><br>	
							<?php
							$query = "select COUNT(*) from users";

							$result = mysqli_query($con, $query);
							$i      = 1;
							if (mysqli_affected_rows($con) != 0) {
							    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
							        echo $row['COUNT(*)'];
							    }
							}
							$i = 1;
							?>
						</div>
				</div></a>
			</div>	
				
			<div class="col-sm-3"><a href="over_members_month.php">			
				<div class="tile-stats tile-aqua">
					<div class="icon"><i class="entypo-mail"></i></div>
						<div class="num" data-postfix="" data-duration="1500" data-delay="0">
						<h2>Usuarios Ingresados este mes</h2><br>	
							<?php
							$date  = date('Y-m');
							$query = "select COUNT(*) from users WHERE fecha_inscripcion LIKE '$date%'";
							$result = mysqli_query($con, $query);
							$i      = 1;
							if (mysqli_affected_rows($con) != 0) {
							    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
							        echo $row['COUNT(*)'];
							    }
							}
							$i = 1;
							?>
						</div>
				</div></a>			
			</div>

			<div class="col-sm-3"><a href="view_plan.php">			
				<div class="tile-stats tile-blue">
					<div class="icon"><i class="entypo-rss"></i></div>
						<div class="num" data-postfix="" data-duration="1500" data-delay="0">
						<h2>Planes de Entrenamiento Disponibles</h2><br>	
							<?php
							$query = "select COUNT(*) from plan where active='yes'";

							$result  = mysqli_query($con, $query);
							$i = 1;
							if (mysqli_affected_rows($con) != 0) {
							    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
							        echo $row['COUNT(*)'];
							    }
							}
							$i = 1;
							?>
						</div>
				</div></a>
			</div>
			
						-->
			
   
    	<?php include('footer.php'); ?>
</div>

  
    </body>
</html>
