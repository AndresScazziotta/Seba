<?php
require '../../include/db_conn.php';
page_protect();
    
    
   $uid=$_POST['uid'];
   $uname=$_POST['nombre'];
   $surname=$_POST['apellido'];
   $gender=$_POST['genero'];
   $mobile=$_POST['telefono'];
   $email=$_POST['email'];
   $dob=$_POST['fi'];
   $jdate=$_POST['fn'];
   $stname=$_POST['direccion'];
   $altura= $_POST['altura'];
   $state=$_POST['localidad'];
   
   $query1="update users set nombre='".$uname."',apellido='".$surname."',genero='".$gender."',telefono='".$mobile."',email='".$email."',fecha_nacimiento='".$dob."',fecha_inscripcion='".$jdate."' where userid='".$uid."'";

   if(mysqli_query($con,$query1)){
     $query2="update address set direccion='".$stname."', altura='".$altura."',localidad='".$state." where id='".$uid."'";
      
      echo "<html><head><script>alert('Miembro Actualizado Satisfactoriamente');</script></head></html>";
      echo "<meta http-equiv='refresh' content='0; url=editar_miembros.php'>";
      
           
     
   }else{
    echo "<html><head><script>alert('ERROR! No es posible actualizar el registro actualmente');</script></head></html>";
    echo "error".mysqli_error($con);
   }






   /*
   $query1="update users set nombre='".$uname."',apellido='".$surname."',genero='".$gender."',telefono='".$mobile."',email='".$email."',fecha_nacimiento='".$dob."',fecha_inscripcion='".$jdate."' where userid='".$uid."'";
   $query2="update address set direccion='".$stname."', altura='".$altura."',localidad='".$state." where id='".$uid."'";
   echo "<meta http-equiv='refresh' content='0; url=editar_miembros.php'>";
   */  
   
  
  
  
  
  
  
  
  
  
  
  
   /*
    
   $query1="update users set nombre='".$uname."',apellido='".$surname."',genero='".$gender."',telefono='".$mobile."',email='".$email."',fecha_nacimiento='".$dob."',fecha_inscripcion='".$jdate."' where userid='".$uid."'";

   if(mysqli_query($con,$query1)){
     $query2="update address set direccion='".$stname."', altura='".$altura."',localidad='".$state." where id='".$uid."'";
      if(mysqli_query($con,$query2)){
            echo "<html><head><script>alert('Miembro Actualizado Satisfactoriamente');</script></head></html>";
            echo "<meta http-equiv='refresh' content='0; url=editar_miembros.php'>";
      }else{
             echo "<html><head><script>alert('ERROR! No es posible actualizar el registro actualmente');</script></head></html>";
             echo "error".mysqli_error($con);
      }
     
     
   }else{
    echo "<html><head><script>alert('ERROR! No es posible actualizar el registro actualmente');</script></head></html>";
    echo "error".mysqli_error($con);
   }

/*
   if(mysqli_query($con,$query1)){
      $query2="update address set direccion='".$stname."', altura='".$altura."',localidad='".$state." where id='".$uid."'";
      if(mysqli_query($con,$query2)){
         $query3="update health_status set calorie='".$calorie."',height='".$height."',weight='".$weight."',fat='".$fat."',remarks='".$remarks."' where uid='".$uid."'";
         if(mysqli_query($con,$query3)){
             echo "<html><head><script>alert('Miembro Actualizado Satisfactoriamente');</script></head></html>";
             echo "<meta http-equiv='refresh' content='0; url=editar_miembros.php'>";
         }else{
              echo "<html><head><script>alert('ERROR! No es posible actualizar el registro actualmente');</script></head></html>";
              echo "error".mysqli_error($con);
         }
      }else{
         echo "<html><head><script>alert('ERROR! No es posible actualizar el registro actualmente');</script></head></html>";
          echo "error".mysqli_error($con);
      }
    }else{
     echo "<html><head><script>alert('ERROR! No es posible actualizar el registro actualmente');</script></head></html>";
     echo "error".mysqli_error($con);
    }
*/  

?>
