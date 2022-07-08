<?php
require '../../include/db_conn.php';
page_protect();

 $memID=$_POST['m_id'];
 $name=$_POST['nombre'];
 $surname=$_POST['apellido'];
 $street=$_POST['direccion'];
 $number=$_POST['altura'];
 $city=$_POST['localidad'];
 $gender=$_POST['genero'];
 $fn=$_POST['fecha_nacimiento'];
 $mobile=$_POST['telefono'];
 $email=$_POST['email'];
 $fi=$_POST["ingreso"];
 $email2=$_POST['email'];
 $plan=$_POST['plan'];
 
 
 //$fi=$_POST['fecha_ingreso'];
 
 //$stname=$_POST['street_name'];
 //$city=$_POST['city'];
 //$zipcode=$_POST['zipcode'];
 //$state=$_POST['state'];
 //$gender=$_POST['gender'];
 //$dob=$_POST['dob'];
 //$phn=$_POST['mobile'];
 //$email=$_POST['email'];
 //$jdate=$_POST['jdate'];
 //$plan=$_POST['plan'];

$query="insert into users(nombre, apellido, genero, telefono, email, fecha_nacimiento, fecha_inscripcion, userid)
values('$name', '$surname', '$gender', '$mobile', '$email', '$fn', '$fi', '$memID')";
    if(mysqli_query($con,$query)==1){
      $query1="select * from plan where pid='$plan'";
      $result=mysqli_query($con,$query1);

        if($result){
          $value=mysqli_fetch_row($result);
          date_default_timezone_set('America/Bogota');
          $d=strtotime("+".$value[3]." Months");
          $cdate=date("Y-m-d"); 
          $expiredate=date("Y-m-d",$d); 
          $query2="insert into enrolls_to(pid,uid,paid_date,expire,renewal) values('$plan','$memID','$cdate','$expiredate','yes')";
          if(mysqli_query($con,$query2)==1){

            $query4="insert into health_status(uid) values('$memID')";
            if(mysqli_query($con,$query4)==1){

              $query5="insert into address(id,direccion,altura,localidad) values('$memID','$street','$number','$city')";
              if(mysqli_query($con,$query5)==1){
               echo "<head><script>alert('Miembro Agregado ');</script></head></html>";
               echo "<meta http-equiv='refresh' content='0; url=nuevo_registro.php'>";
              }
              else{
                  echo "<head><script>alert('Miembro Agregado Fallo');</script></head></html>";
                 echo "error: ".mysqli_error($con);
                 $query3 = "DELETE FROM users WHERE userid='$memID'";
                 mysqli_query($con,$query3);
              }
            }
             
            else{
               echo "<head><script>alert('Miembro Agregado Fallido');</script></head></html>";
              echo "error: ".mysqli_error($con);
                $query3 = "DELETE FROM users WHERE userid='$memID'";
                mysqli_query($con,$query3);
            }
            
          }
          else{
            echo "<head><script>alert('Miembro Agregado Fallido');</script></head></html>";
            echo "error: ".mysqli_error($con);
             $query3 = "DELETE FROM users WHERE userid='$memID'";
             mysqli_query($con,$query3);
          }

         
        }
        else
        {
          echo "<head><script>alert('Miembro Agregado Fallo');</script></head></html>";
          echo "error: ".mysqli_error($con);
          $query3 = "DELETE FROM users WHERE userid='$memID'";
          mysqli_query($con,$query3);
        }

    }
    else{
        echo "<head><script>alert('Miembro Agregado Fallido');</script></head></html>";
        echo "error: ".mysqli_error($con);
      }
?>
