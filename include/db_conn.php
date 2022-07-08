<?php
$host     = "localhost";
$username = "root";
$password = "";
$db_name  = "proyectoyupanqui"; 

$con = mysqli_connect($host, $username, $password, $db_name);

if (!$con) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error($con);
}
?>

<?php
function page_protect()
{
    session_start();
    
    global $db;

    if (isset($_SESSION['HTTP_USER_AGENT'])) {
        if ($_SESSION['HTTP_USER_AGENT'] != md5($_SERVER['HTTP_USER_AGENT'])) {
            session_destroy();
            echo "<meta http-equiv='refresh' content='0; url=../login/'>";
            exit();
        }
    }
    

    if (!isset($_SESSION['user_data']) && !isset($_SESSION['logged']) && !isset($_SESSION['auth_level'])) {
        session_destroy();
        echo "<meta http-equiv='refresh' content='0; url=../login/'>";
        exit();
    } else {
        
    }
    
}
?>