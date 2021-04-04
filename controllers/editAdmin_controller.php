<?php

$adminRepository = new AdminRepository($pdo);
$message = "";

// Récupération des informations admin si l'idAdmin est présent dans l'URL
if (isset($_GET['id'])) {
    $idAdmin = $_GET['id'];
    $admin = $adminRepository->findBy($idAdmin)->fetch();
}

// Modification de la BDD lors de la soumission du formulaire
if (isset($_POST['submitEditLogin'])) {
    if(isset($_POST['loginAdmin']) && isset($_POST['passwordAdmin1']) && isset($_POST['passwordAdmin2']) && ($_POST['passwordAdmin1'] === $_POST['passwordAdmin2'])){

        // Création de l'objet Admin à partir des éléments du formulaire
        $admin = new Admin(
            isset($_GET['id']) ? $_GET['id'] : null,
            $_POST['loginAdmin'],
            $_POST['passwordAdmin1']
            
        );
        var_dump($admin);
        
        // Appel de la méthode de modification en fonction de la création ou de la modification d'un Admin
        if ($_POST['requete'] == 'update') {
            // var_dump($_POST['requete']);die;
            $adminRepository->update($admin);
        } elseif ($_POST['requete'] == 'insert') {
            $adminRepository->insert($admin);
            $idAdmin = $adminRepository->lastInsert();
        }
        header("location:?page=afficheAdmin&id=$idAdmin");
    }
    echo $message = "Saisies incorrectes";
}



