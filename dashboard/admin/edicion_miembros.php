<?php
require '../../include/db_conn.php';
page_protect();

if (isset($_POST['name'])) {
    $memid = $_POST['name'];
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
	#boxxe
	{
		width:230px;
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
			
			<!-- logo -->
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
			<h3>Editar Detalles de Miembro</h3>
			<hr/>
			<?php
	    
				    $query  = "SELECT * FROM users u 
				    		   INNER JOIN address a ON u.userid=a.id
				    		   INNER JOIN  health_status h ON u.userid=h.uid
				    		   WHERE userid='$memid'";
				    $result = mysqli_query($con, $query);
				    $sno    = 1;
				    
				    $name="";
				    $gender="";

				    if (mysqli_affected_rows($con) == 1) {
				        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				    
				            $nombre    = $row['nombre'];
							$apellido = $row['apellido'];
				            $genero =$row['genero'];
				            $telefono = $row['telefono'];
				            $email   = $row['email'];
				            $fn	 = $row['fecha_nacimiento'];         
				            $fi    = $row['fecha_inscripcion'];
				          	$direccion=$row['direccion'];
				          	$altura=$row['altura'];
				          	$localidad=$row['localidad'];  
				          	$zipcode=$row['zipcode'];
				            			            
				        }
				    }
				    else{
				    	 echo "<html><head><script>alert('Cambio Insatisfactorio');</script></head></html>";
				    	 echo mysqli_error($con);
				    }


				?>


			
			
			<div class="a1-container a1-small a1-padding-32" style="margin-top:2px; margin-bottom:2px;">
        <div class="a1-card-8 a1-light-gray" style="width:600px; margin:0 auto;">
		<div class="a1-container a1-dark-gray a1-center">
        	<h6>Editar Detalles de Miembro</h6>
        </div>
       <form id="form1" name="form1" method="post" class="a1-container" action="edicion_miembrosOK.php">
         <table width="100%" border="0" align="center">
         <tr>
           <td height="35"><table width="100%" border="0" align="center">
           	 <tr>
           	   <td height="35">ID de Usuario:</td>
           	   <td height="35"><input id="boxxe" type="text" name="uid" readonly required value=<?php echo $memid?>></td>
         	   </tr>
             <tr>
               <td height="35">NOMBRE:</td>
               <td height="35"><input id="boxxe" type="text" name="nombre" value='<?php echo $nombre?>'></td>
             </tr>
			 <tr>
               <td height="35">APELLIDO:</td>
               <td height="35"><input id="boxxe" type="text" name="apellido" value='<?php echo $apellido?>'></td>
             </tr>
             <tr>
               <td height="35">GÉNERO:</td>
               <td height="35"><select id="boxxe" name="genero" id="gender" required>

						<option <?php if($gender == 'Hombre'){echo("selected");}?> value="Hombre">Hombre</option>
						<option <?php if($gender == 'Mujer'){echo("selected");}?> value="Mujer">Mujer</option>
						</select></td><br>
             </tr>
			  <tr>
               <td height="35">TELÉFONO:</td>
               <td height="35"><input id="boxxe" type="number" name="telefono" maxlength="10" value=<?php echo $telefono?>></td>
             </tr>
             <tr>
               <td height="35">CORREO:</td>
               <td height="35"><input id="boxxe" type="email" name="email" required value=<?php echo $email?>></td>
             </tr>
			 <tr>
               <td height="35">FECHA DE NACIMIENTO:</td>
               <td height="35"><input type="date" id="boxxe" name="fn" value=<?php echo $fn?>></td>
             </tr>
			 <tr>
               <td height="35">FECHA DE INGRESO:</td>
               <td height="35"><input type="date" id="boxxe" name="fi" value=<?php echo $fi?>></td>
             </tr>

			<tr>
               <td height="35">DIRECCIÓN:</td>
               <td height="35"><input type="text" id="boxxe" name="direccion" value='<?php echo $direccion?>'></td>
             </tr>

			 <tr>
               <td height="35">ALTURA:</td>
               <td height="35"><input type="number" id="boxxe" name="altura" value='<?php echo $altura?>'></td>
             </tr>
			 <tr>
               <td height="35">LOCALIDAD:</td>
               <td height="35"><input type="text" id="boxxe" name="localidad" value='<?php echo $localidad?>'></td>
             </tr>
<!--             <tr>
               <td height="35">Código Postal:</td>
               <td height="35"><input type="text" id="boxxe" name="zipcode" value='<?php echo $zipcode?>'></td>
             </tr>  -->
			 <tr>
              
             </tr>
			 
			 
			 
             <br>
            
             <tr>
             <tr>
               <td height="35">&nbsp;</td>
               <td height="35"><input class="a1-btn a1-blue" type="submit" name="submit" id="submit" value="Actualizar" >
                 <input class="a1-btn a1-blue" type="reset" name="reset" id="reset" value="Borrar"></td>
             </tr>
           </table></td>
         </tr>
         </table>
       </form>
    </div>
    </div>   
			
			
			
			
					

			<?php include('footer.php'); ?>
    	</div>

  
</body>
</html>	

<?php
} else {
    
}
?>
