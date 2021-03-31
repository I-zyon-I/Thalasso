<?php

$idClient = $_GET['id'];

$clientRepository = new ClientRepository($pdo);
$client = $clientRepository->findBy($idClient)->fetch();