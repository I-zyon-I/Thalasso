<?php 

//Gestion des Sessions 

$id_session = $_COOKIE['admin'];

if(!isset($id_session)) {
    header("location: ?page=home");       
}




?>