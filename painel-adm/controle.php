<?php 
require_once("../conexao.php");
require_once("verificar.php");
$pagina = 'controle';

require_once($pagina."/campos.php");

$query = $pdo->query(" SELECT SUM(ho_inicio) as total FROM controle ");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_horimetro = count($res);

$total_horimetro = $res[0]['total'];

if( $total_horimetro > 0 ){
	//print_r($total_horimetro);
	// exit();
}

$query = $pdo->query(" SELECT SUM(producao) as prod FROM controle ");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_prod = count($res);

$total_prod = $res[0]['prod'];

if( $total_prod > 0 ){
	//print_r($total_horimetro);
	// exit();
}

?>
<div class="col-md-12 my-3">
	<a href="#" class="btn btn-primary btn-sm">Total Horimetro: <?= $total_horimetro?></a>
	<a href="#" class="btn btn-success btn-sm">Total Produção: <?= $total_prod?></a>
</div>

<div class="col-md-12 my-3">
	<a href="#" onclick="inserir()" type="button"  class="btn btn-dark btn-sm">Novo Registro</a>
</div>

<small>
	<div class="tabela bg-light" id="listar">

	</div>
</small>

<!-- Modal -->
<div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel"><span id="tituloModal">Inserir Registro</span></h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form id="form" method="post">
				<div class="modal-body">

					<div class="row">
						<div class="col-12">
							<input type="date" class="form-control">
						</div>
					</div>

					<div class="row">
						<div class="mb-3 col-4">
							<label for="exampleFormControlInput1" class="form-label">Total</label>
							<input type="number" class="form-control" name="<?= $campo1 ?>" placeholder="<?= $total_horimetro ?>" id="<?= $campo1 ?>" disabled>
						</div>

						<div class="mb-3 col-4">
							<label for="exampleFormControlInput1" class="form-label">Fechamento Dia</label>
							<input type="number" class="form-control" name="<?= $campo1 ?>" placeholder="<?= $campo1 ?>" id="<?= $campo1 ?>" required>
						</div>

					</div>

					<div class="row">
						<div class="mb-3 col-6">
							<label for="exampleFormControlInput1" class="form-label"><?= $campo4 ?></label>
							<input type="number" class="form-control" name="<?= $campo4 ?>" placeholder="<?= $campo4 ?>" id="<?= $campo4 ?>" required>
						</div>

						<div class="mb-3 col-6">
							<label for="exampleFormControlInput1" class="form-label"><?= $campo5 ?></label>
							<input type="number" class="form-control" name="<?= $campo5 ?>" placeholder="<?= $campo5 ?>" id="<?= $campo5 ?>" required>
						</div>
					</div>

					<div class="row">
						<div class="mb-3 col-12">
							<label for="exampleFormControlInput1" class="form-label"><?= $campo6 ?></label>
							<input type="number" class="form-control" name="<?= $campo6 ?>" placeholder="<?= $campo6 ?>" id="<?= $campo6 ?>" required>
						</div>
					</div>

					<div class="row">
						<div class="mb-3 col-12">
							<label for="exampleFormControlInput1" class="form-label"><?= $campo7 ?></label>
							<input type="text" class="form-control" name="<?= $campo7 ?>" placeholder="<?= $campo7 ?>" id="<?= $campo7 ?>" required>
						</div>
					</div>

					<small><div id="mensagem" align="center"></div></small>

					<input type="hidden" class="form-control" name="id"  id="id">

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="btn-fechar">Fechar</button>
					<button type="submit" id="atualiza" class="btn btn-primary">Salvar</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalExcluir" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel"><span id="tituloModal">Excluir Registro</span></h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form id="form-excluir" method="post">
				<div class="modal-body">

					Deseja Realmente excluir este Registro: <span id="nome-excluido"></span>?

					<small><div id="mensagem-excluir" align="center"></div></small>

					<input type="hidden" class="form-control" name="id-excluir"  id="id-excluir">


				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="btn-fechar-excluir">Fechar</button>
					<button type="submit" class="btn btn-danger">Excluir</button>
				</div>
			</form>
		</div>
	</div>
</div>

<script type="text/javascript">var pag = "<?=$pagina?>"</script>
<script src="../js/ajax.js"></script>