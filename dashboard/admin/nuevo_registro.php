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
    <link href="a1style.css" type="text/css" rel="stylesheet">
    <style>
    	.page-container .sidebar-menu #main-menu li#regis > a {
    	background-color: #2b303a;
    	color: #ffffff;
		}
       #boxx
	{
		width:220px;
	}</style>

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

		
        	<h3>Ingreso de Nuevo Usuario</h3>

		<hr />
        
        <div class="a1-container a1-small a1-padding-32" style="margin-top:2px; margin-bottom:2px;">
        <div class="a1-card-8 a1-light-gray" style="width:500px; margin:0 auto;">
		<div class="a1-container a1-dark-gray a1-center">
        	<h6>Nuevo Ingreso</h6>
        </div>
       <form id="form1" name="form1" method="post" class="a1-container" action="nuevo_registroOK.php">
         <table width="100%" border="0" align="center">
         <tr>
           <td height="35"><table width="100%" border="0" align="center">
           	 <tr>
           	   <td height="35">ID MEMBRESÍA:</td>
           	   <td height="35"><input type="text" id="boxx" name="m_id" value="<?php echo time(); ?>" readonly required/></td>
         	   </tr>
			   
			   <tr>
               <td height="35">NOMBRE:</td>
               <td height="35"><input name="nombre" id="boxx"  required/></td>
             </tr>
             <tr>
               <td height="35">APELLIDO:</td>
               <td height="35"><input  name="apellido" id="boxx"   required/></td>
             </tr>
             <tr>
			   <td height="35">DIRECCIÓN:</td>
               <td height="35"><input  name="direccion" id="boxx"   required/></td>
<!--
               <td height="35">DIRECCION:</td>
               <td height="35"><input  name="localidad" id="boxx" required/ ></td>
-->
             </tr>
             <tr>
               <td height="35">ALTURA:</td>
               <td height="35"><input type="number" name="altura" id="boxx" maxlength="6" required / ></td>
             </tr>
            <tr>
               <td height="35">LOCALIDAD:</td>
               <td height="35"><input type="text" name="localidad" id="boxx" required/ size="30"></td>
             </tr>
            <tr>
               <td height="35">GÉNERO:</td>
               <td height="35"><select name="genero" id="boxx" required>

					<option value="">--Favor Seleccionar--</option>
					<option value="Hombre">Hombre</option>
					<option value="Mujer">Mujer</option>
				</select></td>
             </tr>
            <tr>
               <td height="35">FECHA DE NACIMIENTO:</td>
               <td height="35"><input type="date" name="fecha_nacimiento" id="boxx" required/ size="30"></td>
             </tr>
			 <tr>
               <td height="35">No TELÉFONO:</td>
               <td height="35"><input type="number" name="telefono" id="boxx" maxlength="10" required/ size="30"></td>
             </tr>
			  <tr>
               <td height="35">CORREO ELECTRÓNICO:</td>
               <td height="35"><input type="email" name="email" id="boxx" required/ size="30"></td>
             </tr>
			 <tr>
<!--
               <td height="35">FECHA DE INGRESO:</td>
               <td height="35"><input type="date" name="fecha_inscripcion" id="boxx" required size="30"></td>
-->
			   <td height="35">FECHA DE INGRESO:</td>
               <td height="35"><input type="date" name="ingreso" id="boxx" required/ size="30"></td>	
             </tr>
             <tr>
               <td height="35">PLAN:</td>
               <td height="35"><select name="plan" id="boxx" required onchange="myplandetail(this.value)">
					<option value="">--Favor Seleccionar--</option>
					<?php
						$query="select * from plan where active='yes'";
						$result=mysqli_query($con,$query);
						if(mysqli_affected_rows($con)!=0){
							while($row=mysqli_fetch_row($result)){
								echo "<option value=".$row[0].">".$row[1]."</option>";
							}
						}

					?>
					
				</select></td>
             </tr>
			
	    <tbody id="plandetls">
             
            </tbody>

             <tr>
             <tr>
               <td height="35">&nbsp;</td>
               <td height="35"><input class="a1-btn a1-blue" type="submit" name="submit" id="submit" value="Registrar" >
                 <input class="a1-btn a1-blue" type="reset" name="reset" id="reset" value="Borrar"></td>
             </tr>
           </table></td>
         </tr>
         </table>
       </form>
    </div>
    </div>   
        
        <script>
        	function myplandetail(str){

        		if(str==""){
        			document.getElementById("plandetls").innerHTML = "";
        			return;
        		}else{
        			if (window.XMLHttpRequest) {
           			 xmlhttp = new XMLHttpRequest();
       				 }
       			 	xmlhttp.onreadystatechange = function() {
            		if (this.readyState == 4 && this.status == 200) {
               		 document.getElementById("plandetls").innerHTML=this.responseText;
                
            			}
        			};
        			
       				 xmlhttp.open("GET","plandetail.php?q="+str,true);
       				 xmlhttp.send();	
        		}
        		
        	}
        </script>
        
        
			<?php include('footer.php'); ?>
    	</div>

    </body>
</html>

