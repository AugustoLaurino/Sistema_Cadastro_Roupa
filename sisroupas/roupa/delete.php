<?php  
	require("../_config/connection.php");
    require("../dao/roupa.php");
    $roupaDAO = new Roupa();
    $error = false;

    if(!$_GET || !$_GET["id"]){
        header('Location: index.php?message=Id da roupa não informado!');
        die();
    }

    $idRoupa = $_GET["id"];

    try {
        $result = $roupaDAO->delete($idRoupa);
    } catch (Exception $e) {
        $error = $e->getMessage();
    }

    $message = ($result && !$error) ? "Roupa excluida com sucesso." : "Erro ao excluir a roupa.";
    header("Location: index.php?message=$message");
    die();

