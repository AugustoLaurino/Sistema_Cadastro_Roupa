<?php
require("../_config/connection.php");
require("../dao/marca.php");
$marcaDAO = new Marca();
$error = false;

if (!$_GET || !$_GET["id"]) {
    header('Location: index.php?message=Id da marca não informada!');
    die();
}

$idMarca = $_GET["id"];

try {
    $result = $marcaDAO->delete($idMarca);
  
} catch (Exception $e) {
    $error = $e->getMessage();
}

$message = ($result && !$error) ? "marca excluida com sucesso." : "Erro ao excluir a marca.";
header("Location: index.php?message=$message");
die();
