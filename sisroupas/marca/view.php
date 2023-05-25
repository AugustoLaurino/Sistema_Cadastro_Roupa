<?php require "../_helpers/index.php";
echo siteHeader("Ver Marca");
require("../_config/connection.php");
require("../dao/marca.php");

$marcaDAO = new Marca();
$product = false;
$error = false;

if (!$_GET || !isset($_GET["id"])) {
    header('Location: index.php?message=Id da marca não informado!');
    die();
}

$idMarca = $_GET["id"];

try {
    $marca = $marcaDAO->getById($idMarca);
} catch (Exception $e) {
    $error = $e->getMessage();
}

 if (!$marca || $error) {
    header('Location: index.php?message=Erro ao recuperar dados da marca!');
    die();
} 


?>

    <section class="container mt-5 mb-5">
        <div class="row mb-3">
            <div class="col">
                <h1>Visualizar Marcas</h1>
            </div>
        </div>

        <div class="mb-3">
            <h3>Marca</h3>
            <p><?= $marca["marca"] ?></p>
        </div>
 
        <a href="index.php" class="btn btn-primary">Voltar</a>
       
    </section>
<?php require "../_partials/footer.php"; ?>