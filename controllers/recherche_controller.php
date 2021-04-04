<?php
// Recherche dans Séjour
$rechercheRepositorySj = new SejourRepository($pdo);
$rechercheSj = $rechercheRepositorySj->rechercheSejour($_POST["search"])->fetchAll();

//Recherche des SeJours par CLient

$rechercheRepositorySjCl = new SejourRepository($pdo);
$rechercheSjCl = $rechercheRepositorySjCl->rechercheByClient(ucfirst($_POST["search"]))->fetchAll();

//Recherche dans Client
$rechercheRepositoryCl = new ClientRepository($pdo);
$rechercheCl = $rechercheRepositoryCl->rechercheClient($_POST["search"])->fetchAll();