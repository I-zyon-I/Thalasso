<?php

$pr = new SejourRepository($pdo);
$id = $_GET["id"];
$statement = $pr->editSejour($id);
$sejour = $statement->fetchAll();
