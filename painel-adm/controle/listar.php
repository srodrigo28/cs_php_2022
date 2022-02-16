<?php 
require_once("../../conexao.php");
require_once("campos.php");

$query = $pdo->query(" SELECT SUM(ho_inicio) as total FROM controle ");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_horimetro = count($res);

$total_horimetro = $res[0]['total'];

if( $total_horimetro > 0 ){
	//print_r($total_horimetro);
	// exit();
}
// Calculo Horimetro

echo <<<HTML
<table id="example" class="table table-striped table-light table-hover my-4">
<thead>
<tr>
	<th>Data</th>
	<th>Horimetro Dia</th>
	<th>Diesel</th>
	<th>Óleo</th>
	<th>Produção</th>
	<th>Observações</th>
	<th>Ações</th>
</tr>
</thead>
<tbody>
HTML;


$query = $pdo->query("SELECT * from $pagina order by id asc ");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
for($i=0; $i < @count($res); $i++){
	foreach ($res[$i] as $key => $value){}

		$id = $res[$i]['id'];
		$cp1 = $res[$i]['ho_inicio'];
		$cp2 = $res[$i]['diesel'];
		$cp3 = $res[$i]['oleo'];
		$cp4 = $res[$i]['producao'];
		$cp5 = $res[$i]['observacao'];
		$cp6 = $res[$i]['data_at'];

		$data = date('d-m-Y', strtotime ($cp6));
		
echo <<<HTML
	<tr>	
		<td>{$data}</td>
		<td>{$cp1}</td>
		<td>{$cp2}</td>
		<td>{$cp3}</td>
		<td>{$cp4}</td>
		<td>{$cp5}</td>
	<td>
	<a href="#" onclick="editar('{$id}', '{$cp1}', '{$cp2}', '{$cp3}', '{$cp4}', '{$cp5}')" title="Editar Registro"><i class="bi bi-pencil-square text-primary"></i> </a>
	<a href="#" onclick="excluir('{$id}' , '{$cp1}')" title="Excluir Registro">	<i class="bi bi-trash text-danger"></i> </a>
	</td>
	</tr>
	HTML;
} 
echo <<<HTML
</tbody>
</table>
HTML;

?>

<script>
$(document).ready(function() {    
	$('#example').DataTable({
		"ordering": true
	});
});

function editar(id, ho_inicio, diesel, oleo, producao, observacao){
	$('#id').val(id);
	$('#<?=$campo1?>').val(ho_inicio);
	$('#<?=$campo2?>').val(diesel);
	$('#<?=$campo3?>').val(oleo);
	$('#<?=$campo4?>').val(producao);
	$('#<?=$campo5?>').val(observacao);
	
	$('#tituloModal').text('Editar Registro');
	var myModal = new bootstrap.Modal(document.getElementById('modalForm'), {		});
	myModal.show();
	$('#mensagem').text('');
}

function limparCampos(){
	$('#id').val('');
	$('#<?=$campo1?>').val('');
	$('#<?=$campo2?>').val('');
	$('#<?=$campo3?>').val('');
	$('#<?=$campo4?>').val('');
	$('#<?=$campo5?>').val('');

	$('#mensagem').text('');
	
}

</script>