<?php require "../_helpers/index.php";
echo siteHeader("Adicionar Roupa");
require("../_config/connection.php");
require("../dao/roupa.php");
require("../dao/marca.php");

$roupaDAO = new Roupa();
$marcaDAO = new Marca();

$result = false;
$error = false;
if ($_POST) {
    try {
        $idMarca  = $_POST["p_idMarca"];
        $modelo = $_POST["p_modelo"];
        $tamanho = $_POST["p_tamanho"];
        
        $rs = $roupaDAO->insert($idMarca, $modelo, $tamanho);
         if ($rs) {
            header('Location: index.php?message=Roupa inserida com sucesso!');
            die();
        } 
    } catch (Exception $e) {
        $error = $e->getMessage();
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

    <?php if ($_POST && (!$result || $error)) : ?>
        <p>
            Erro ao salvar a roupa.
            <?= $error ? $error : "Erro desconhecido." ?>
        </p>
    <?php endif; ?>

    <div class="row mb-3">
        <div class="col">
            <h1>Adicionar Roupa</h1>
        </div>
    </div>

    <form action="" method="post">
        <div class="row">

            <div class="mb-3">
                <label for="p_idMarca" class="form-label">Selecione a Marca da Roupa</label>
                <select class="form-select" id="p_idMarca" name="p_idMarca" required>
                    <option value="">-- Selecione um --</option>

                    <?php foreach ($marcas as $marca) : ?>
                        <option value="<?= $marca->id ?>">
                            <?= $marca->marca ?>
                        </option>
                    <?php endforeach; ?>

                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-3">
                <label for="p_modelo" class="form-label">Modelo</label>
                <input type="text" class="form-control" id="p_modelo" name="p_modelo" />
            </div>
            <div class="col-9">
                <label for="p_tamanho" class="form-label">Tamanho</label>
                <input type="text" class="form-control" id="p_tamanho" name="p_tamanho" />
            </div>
        </div>
        
        
        <div class="row">
            <div class="col">
                <a href="index.php" class="btn btn-danger">Cancelar</a>
                <button type="submit" class="btn btn-success">Salvar</button>
            </div>
        </div>

    </form>
</section>

<?php require "../_partials/footer.php"; ?>