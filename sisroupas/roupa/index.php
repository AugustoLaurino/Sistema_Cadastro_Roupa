<?php require "../_helpers/index.php";
echo siteHeader("Gerenciar Roupas");
require("../_config/connection.php");
require("../dao/roupa.php");


$message = false;
if ($_GET && $_GET["message"]) {
	$message = $_GET["message"];
}
$roupa = new Roupa();
?>
<section class="container mt-5 mb-5">

	<?php if ($message) : ?>
		<div class="alert alert-primary alert-dismissible fade show" role="alert">
			<?= $message ?>
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
	<?php endif; ?>

	<div class="row mb-3">
		<div class="col">
			<h1>Roupa</h1>
		</div>
		<div class="col d-flex justify-content-end align-items-center">
			<a class="btn btn-primary" href="add.php">Adicionar</a>
		</div>
	</div>

	<table class="table table-striped table-bordered text-center">
		<thead class="table-dark">
			<tr>
				<th>ID</th>
				<th>Marca</th>
				<th>Modelo</th>
				<th>Tamanho</th>				
				<th>Ações</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($roupa->getAll() AS $roupa) : ?>
				<tr>
					<td>
						<?= "#".$roupa->id?>
					</td>

					<td>
						<?= $roupa->marca ?>
					</td>
					
					<td>
						<?= $roupa->modelo ?>
					</td>
					
					<td>
						<?= $roupa->tamanho ?>
					</td>					
					<td>
						<div class="btn-group" role="group">
							<button type="button" class="btn btn-outline-primary" onclick="confirmDelete(<?= $roupa->id ?>)">
								Excluir
							</button>
							<a href="edit.php?id=<?= $roupa->id ?>" class="btn btn-outline-primary">
								Editar
							</a>
							<a href="view.php?id=<?= $roupa->id ?>" class="btn btn-outline-primary">
								Ver
							</a>
						</div>
					</td>
				</tr>

			<?php endforeach; ?>
		</tbody>
		<tfooter class="table-dark">
			<tr>
				<th>ID</th>
				<th>Marca</th>
				<th>Modelo</th>
				<th>Tamanho</th>				
				<th>Ações</th>
			</tr>
		</tfooter>
	</table>
</section>

<script>
	const confirmDelete = (idRoupa) => {
		const response = confirm("Deseja realmente excluir a roupa?")
		if (response) {
			window.location.href = "delete.php?id=" + idRoupa
		}
	}
</script>

<?php require("../_partials/footer.php"); ?>