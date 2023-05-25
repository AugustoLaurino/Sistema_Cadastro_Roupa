<?php require "../_helpers/index.php";
echo siteHeader("Adicionar Marca");
require("../_config/connection.php");

require("../dao/marca.php");
$marcaDAO = new Marca();

$result = false;
$error = false;


if ($_POST) {
    try {
        $marca = $_POST["p_marca"];
        $rs = $marcaDAO->insert($marca);

        if ($rs) {
            header('Location: index.php?message=Marca inserida com sucesso!');
            die();
        }
    } catch (Exception $e) {
        $error = $e->getMessage();
    }
}


?>

<body>



    <section class="container mt-5 mb-5">

        <?php if ($_POST && (!$result || $error)) : ?>
            <p>
                Erro ao salvar a nova marca.
                <?= $error ? $error : "Erro desconhecido." ?>
            </p>
        <?php endif; ?>

        <div class="row mb-3">
            <div class="col">
                <h1>Adicionar Marca</h1>
            </div>
        </div>

        <form action="" method="post">
            <div class="mb-3">
                <label for="p_nome" class="form-label">Marca</label>
                <input type="text" class="form-control" id="p_marca" name="p_marca" placeholder="Marca da roupa">
            </div>

            <a href="index.php" class="btn btn-danger">Cancelar</a>
            <button type="submit" class="btn btn-success">Salvar</button>
        </form>
    </section>

    <?php require "../_partials/footer.php"; ?>