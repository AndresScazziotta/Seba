<?php
require '../../include/db_conn.php';
page_protect();

$msgid = $_POST['name'];
if (strlen($msgid) > 0) {
    mysqli_query($con, "update plan set active ='no' WHERE pid='$msgid'");
    echo "<html><head><script>alert('Plan Eliminado');</script></head></html>";
    echo "<meta http-equiv='refresh' content='0; url=edicion_plan.php'>";
} else {
    echo "<html><head><script>alert('ERROR! Eliminar operación no exitosa');</script></head></html>";
   echo "error".mysqli_error($con);
}

?>