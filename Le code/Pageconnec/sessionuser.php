<?php 

include('Cnxserver');
session_start();

if(isset($_SESSION['prenom'])){

    $user_check = $_SESSION['prenom'];
    $sess_sql = mysqli_query($connexion, "SELECT prenom FROM users WHERE prenom='$user_check'");
    $row = mysqli_fetch_array($sess_sql, MYSQLI_ASSOC);
    $loggedin_session = $row['prenom'];
}
if(!isset($loggedin_session)){

    header("Location: ./formlogin.php");

}



?>