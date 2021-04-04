
<?php

    $id_session = $_COOKIE['PHPSESSID'];
    session_start();
    var_dump($id_session);

    if(!isset($id_session)) {
        header("location: ?page=home");       
    }


?>

<!DOCTYPE html>
<html lang="en">

<head>
<?php 
    require "includes/_head.php"
?>

</head>

<body>
<?php 
    require "includes/_script.php";
    require "includes/_nav.php";
    require "includes/main_listeSejours.php";
    require "includes/_footer.php";  
?>   
</body>
</html>