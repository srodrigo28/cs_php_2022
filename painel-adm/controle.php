<?php 
require_once("../conexao.php");
require_once("verificar.php");
$pagina = 'controle';

require_once($pagina."/campos.php");
// Calculo Horimetro
	$query = $pdo->query(" SELECT SUM(ho_inicio) as total FROM controle ");
	$res = $query->fetchAll(PDO::FETCH_ASSOC);
	$total_horimetro = count($res);

	$total_horimetro = $res[0]['total'];

	if( $total_horimetro > 0 ){
		//print_r($total_horimetro);
		// exit();
	}
// Calculo Horimetro

// Calculo Produção
	$query = $pdo->query(" SELECT SUM(producao) as prod FROM controle ");
	$res = $query->fetchAll(PDO::FETCH_ASSOC);
	$total_prod = count($res);

	$total_prod = $res[0]['prod'];

	if( $total_prod > 0 ){
		//print_r($total_horimetro);
		// exit();
	}
// Calculo Produção

// Calculo Diesel
	$query = $pdo->query(" SELECT SUM(diesel) as diesel_total FROM controle ");
	$res = $query->fetchAll(PDO::FETCH_ASSOC);
	$total_dielse = count($res);

	$total_dielse = $res[0]['diesel_total'];

	if( $total_dielse > 0 ){
		//print_r($total_horimetro);
		// exit();
	}

// Calculo Diesel

// Calculo Diesel
	$query = $pdo->query(" SELECT SUM(oleo) as oleo_total FROM controle ");
	$res = $query->fetchAll(PDO::FETCH_ASSOC);
	$total_oleo = count($res);

	$total_oleo = $res[0]['oleo_total'];

	if( $total_oleo > 0 ){
		//print_r($total_horimetro);
		// exit();
	}
// Calculo Diesel

?>
<div class="col-md-12 my-3"> <!-- Controle do Acumuladores -->
	<h1 class="text-center">Controle</h1>
	<h5>Resumo</h5>
	<a href="#" class="btn btn-primary btn-sm">Horimetro: <?= $total_horimetro ?></a>
	<a href="#" class="btn btn-success btn-sm">Produção: <?= $total_prod ?></a>
	<a href="#" class="btn btn-danger btn-sm">Diesel: <?= $total_dielse ?></a>
	<a href="#" class="btn btn-warning btn-sm">Óleo Queima: <?= $total_oleo ?></a>
</div>

<div class="col-md-12 my-3">
	<a href="#" onclick="inserir()" type="button"  class="btn btn-dark btn-sm">Novo Registro</a>
</div>

<small> <!-- Tabela -->
	<div class="tabela bg-light" id="listar" style="background: red">
	
	</div>
</small>

<!-- Modal INSERIR-->
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
							<label for="exampleFormControlInput1" class="form-label">Fechamento</label>
							<input type="number" class="form-control" name="<?= $campo1 ?>" placeholder="<?= $campo1 ?>" id="<?= $campo1 ?>" required>
						</div>

					</div>

					<div class="row">
						<div class="mb-3 col-6">
							<label for="exampleFormControlInput1" class="form-label"><?= $campo2 ?></label>
							<input type="number" class="form-control" name="<?= $campo2 ?>" placeholder="<?= $campo2 ?>" id="<?= $campo2 ?>" required>
						</div>

						<div class="mb-3 col-6">
							<label for="exampleFormControlInput1" class="form-label"><?= $campo3 ?></label>
							<input type="number" class="form-control" name="<?= $campo3 ?>" placeholder="<?= $campo3 ?>" id="<?= $campo3 ?>" required>
						</div>
					</div>

					<div class="row">
						<div class="mb-3 col-12">
							<label for="exampleFormControlInput1" class="form-label"><?= $campo4 ?></label>
							<input type="number" class="form-control" name="<?= $campo4 ?>" placeholder="<?= $campo4 ?>" id="<?= $campo4 ?>" required>
						</div>
					</div>

					<div class="row">
						<div class="mb-3 col-12">
							<label for="exampleFormControlInput1" class="form-label"><?= $campo5 ?></label>
							<input type="text" class="form-control" name="<?= $campo5 ?>" placeholder="<?= $campo5 ?>" id="<?= $campo5 ?>" required>
						</div>
					</div>

					<small><div id="mensagem" align="center"></div></small>

					<input type="hidden" class="form-control" name="id"  id="id">

				</div>
				<div class="modal-footer">
					<button type="submit" id="atualiza" class="btn btn-primary" id="salvar">Salvar</button>
					<button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="btn-fechar">Fechar</button>
				</div>
				<script>
					// document.getElementById("salvar").addEventListener("click", function(event){
					// 	event.preventDefault()
					// 	window.location.reload()
					// })
				</script>
			</form>
		</div>
	</div>
</div>

<!-- Modal EXCLUIR-->
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

