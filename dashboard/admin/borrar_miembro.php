<?php
require '../../include/db_conn.php';
page_protect();

$msgid = $_POST['name'];
if (strlen($msgid) > 0) {
    mysqli_query($con, "DELETE FROM users WHERE userid='$msgid'");
    echo "<html><head><script>alert('Miembro eliminado correctamente');</script></head></html>";
    echo "<meta http-equiv='refresh' content='0; url=editar_miembros.php'>";
} else {
    echo "<html><head><script>alert('ERROR! Proceso Insatisfactorio');</script></head></html>";
   echo "error".mysqli_error($con);
}

?>