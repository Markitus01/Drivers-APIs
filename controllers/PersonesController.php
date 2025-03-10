<?php
//Llamada al modelo
require_once __DIR__ . '/../models/PersonesModel.php';

$per = new PersonesModel();
$datos = $per->getPersones();
 
//Llamada a la vista
require_once __DIR__ . "/../views/personesView.phtml";
?>