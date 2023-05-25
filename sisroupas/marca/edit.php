<?php require "../_helpers/index.php";
echo siteHeader("Editar Marca");
require("../_config/connection.php");
require("../dao/marca.php");
$marcaDAO = new Marca();

$marca = false;
$error = false;

if (!$_GET || !isset($_GET["id"])) {
    header('Location: index.php?message=Id da marca não informado!');
    die();
}

$idMarca = $_GET["id"];
$marca = $marcaDAO->getById($idMarca);

if (!$marca || $error) {
    header('Location: index.php?message=Erro ao recuperar dados da marca!');
    die();
}

$updateError = false;
$rs = false;
if ($_POST) {
    try {
        $marca = $_POST["p_marca"];        
        $rs = $marcaDAO->update($idMarca, $marca);
        
        if ($rs) {
            header('Location: index.php?message=Marca atualizada com sucesso!');
            die();
        }
    } catch (Exception $e) {
        $updateError = $e->getMessage();
    }
}

?>

<body>



    <section class="container mt-5 mb-5">

        <?php if ($_POST && (!$rs || $upadeError)) : ?>
            <p>
                Erro ao alterar o marca.
                <?= $error ? $error : "Erro desconhecido." ?>
            </p>
        <?php endif; ?>

        <div class="row mb-3">
            <div class="col">
                <h1>Editar marca</h1>
            </div>
        </div>

        <form action="" method="post">

            <div class="mb-3">
                <label for="p_nome" class="form-label">Marca</label>
                <input type="text" class="form-control" id="p_marca" name="p_marca" placeholder="Marca da roupa" value="<?= $marca["marca"] ?>">
            </div>

            <a href="index.php" class="btn btn-danger">Cancelar</a>
            <button type="submit" class="btn btn-success">Salvar</button>

        </form>
    </section>

    <?php require "../_partials/footer.php"; ?>