<?php 


//Gestion des Sessions 

$id_session = $_COOKIE['PHPSESSID'];

if(!isset($id_session)) {
    header("location: ?page=home");       
}


?>