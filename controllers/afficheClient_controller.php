<?php

$idClient = $_GET['id'];

$clientRepository = new ClientRepository($pdo);
$client = $clientRepository->findByClient($idClient)->fetch();

$sejourRepository = new SejourRepository($pdo);
$sejours = $sejourRepository->findByClient($idClient)->fetchAll();