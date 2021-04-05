<?php 

//Gestion de la déconnexion

if (isset($_GET['logout'])) {
    unset($_COOKIE['admin']); 
    setcookie('admin',"",time() -10); 
}

?>