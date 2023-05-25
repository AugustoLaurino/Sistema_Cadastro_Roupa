<?php require "../_helpers/index.php";
echo siteHeader("Ver Roupa");
require("../_config/connection.php");

require("../dao/roupa.php");

$roupaDAO = new Roupa();

$roupa = false;
$error = false;

if (!$_GET || !$_GET["id"]) {
    header('Location: index.php?message=Id da roupa não informado!');
    die();
}

$idRoupa = $_GET["id"];

try {
    $roupa = $roupaDAO->getById($idRoupa);
} catch (Exception $e) {
    echo "Id: ".$idRoupa."<br>";
    $error = $e->getMessage();
}

if (!$roupa || $error) {
    header('Location: index.php?message=Erro ao recuperar dados da roupa!');
    die();
}


?>


    <section class="container mt-5 mb-5">
        <div class="row mb-3">
            <div class="col">
                <h1>Visualizar Roupa</h1>
            </div>
        </div>

        <div class="mb-3">
            <h3>Marca</h3>
            <p><?= $roupa["marca"] ?></p>
        </div>
        
        <div class="mb-3">
            <h3>Modelo</h3>
            <p><?= $roupa["modelo"] ?></p>
        </div>
        
        <div class="mb-3">
            <h3>Tamanho</h3>
            <p><?= $roupa["tamanho"] ?></p>
        </div>
        <a href="index.php" class="btn btn-primary">Voltar</a>
    </section>

<?php require "../_partials/footer.php"; ?>