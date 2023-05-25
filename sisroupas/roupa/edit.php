<?php require "../_helpers/index.php";
echo siteHeader("Editar Roupa");
require("../_config/connection.php");

require("../dao/roupa.php");
require("../dao/marca.php");
$roupaDAO = new Roupa();
$marcaDAO = new Marca();

$roupa = false;
$error = false;

if (!$_GET || !isset($_GET["id"])) {
    header('Location: index.php?message=Id da roupa não informado!');
    die();
}

$idRoupa = $_GET["id"];

try {
    $roupa = $roupaDAO->getById($idRoupa);
} catch (Exception $e) {
    $error = $e->getMessage();
}

if (!$roupa || $error) {
    header('Location: index.php?message=Erro ao recuperar dados da roupa!');
    die();
}

$upadeError = false;
$updateResult = false;
if ($_POST) {
    try {
        $idMarca  = $_POST["p_idMarca"];
        $modelo = $_POST["p_modelo"];
        $tamanho = $_POST["p_tamanho"];
        
        $rs = $roupaDAO->update($idRoupa, $idMarca, $modelo, $tamanho);
        
        if ($rs) {
            header('Location: index.php?message=Roupa alterada com sucesso!');
            die();
        }
    } catch (Exception $e) {
        $upadeError = $e->getMessage();
    }
}
try {
    $marcas = $marcaDAO->getAll();
} catch (Exception $e) {
    header('Location: index.php?message=Erro ao recuperar marcas!');
    die();
}

?>


<section class="container mt-5 mb-5">

    <?php if ($_POST && (! $rs || $upadeError)) : ?>
        <p>
            Erro ao alterar a roupa.
            <?= $error ? $error : "Erro desconhecido." ?>
        </p>
    <?php endif; ?>

    <div class="row mb-3">
        <div class="col">
            <h1>Editar Roupa</h1>
        </div>
    </div>

    <form action="" method="post">
    <div class="row">

        <div class="mb-3">
            <label for="p_idMarca" class="form-label">Selecione a Marca da Roupa</label>
            <select class="form-select" id="p_idMarca" name="p_idMarca" required>
                <option value="">-- Selecione um --</option>

                <?php foreach ($marcas as $marca) : ?>
                    <option value="<?= $marca->id ?>" <?= $marca->id == $roupa["idMarca"] ? "selected" : "" ?> >
                        <?= $marca->marca ?>
                </option>

                <?php endforeach; ?>

            </select>
        </div>        
        
        <div class="row mb-3">
            <div class="col-3">
                <label for="p_modelo" class="form-label">Modelo</label>
                <input type="text" class="form-control" id="p_modelo" name="p_modelo" value="<?= $roupa["modelo"] ?>" />
            </div>
            <div class="col-9">
                <label for="p_tamanho" class="form-label">Tamanho</label>
                <input type="text" class="form-control" id="p_tamanho" name="p_tamanho" value="<?= $roupa["tamanho"] ?>"/>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <a href="index.php" class="btn btn-danger">Cancelar</a>
                <button type="submit" class="btn btn-success">Atualizar</button>
            </div>
        </div>

    </form>
</section>

<?php require "../_partials/footer.php"; ?>