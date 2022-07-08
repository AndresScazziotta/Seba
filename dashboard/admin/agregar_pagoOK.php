<?php
require '../../include/db_conn.php';
page_protect();

 $memID=$_POST['m_id'];
 $plan=$_POST['plan'];

$query="update enrolls_to set renewal='no' where uid='$memID'";
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

               echo "<head><script>alert('Pago Actualizado Satisfactoriamente ');</script></head></html>";
               echo "<meta http-equiv='refresh' content='0; url=pagos.php'>";
            }
             
            else{
               echo "<head><script>alert('Pago no Ingresado Fallo en Sistema');</script></head></html>";
              echo "error: ".mysqli_error($con);
            }
            
          }
          else{
            echo "<head><script>alert('Pago no Ingresado Fallo en Sistema');</script></head></html>";
            echo "error: ".mysqli_error($con);
          }

         
        }
        else
        {
          echo "<head><script>alert('Pago no Ingresado Fallo en Sistema');</script></head></html>";
          echo "error: ".mysqli_error($con);
        }

?>
