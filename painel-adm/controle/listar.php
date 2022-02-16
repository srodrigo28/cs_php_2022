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

		//print_r($res[$i]); die();

		$id = $res[$i]['id'];
		$cp1 = $res[$i]['ho_inicio'];
		$cp4 = $res[$i]['diesel'];
		$cp5 = $res[$i]['oleo'];
		$cp6 = $res[$i]['producao'];
		$cp7 = $res[$i]['observacao'];
		$cp8 = $res[$i]['data_at'];

		// function data($cp8){
		// 	return date("d/m/Y", strtotime($cp8));
		// }

		//echo $cp8;
		$data = date('d-m-Y', strtotime ($cp8));
		
echo <<<HTML
	<tr>	
	<td>{$data}</td>
	<td>{$cp1}</td>
	<td>{$cp4}</td>
	<td>{$cp5}</td>
	<td>{$cp7}</td>
	<td>{$cp6}</td>								
	<td>
	<a href="#" onclick="editar('{$id}', '{$cp1}', '{$cp4}', '{$cp5}', '{$cp6}', '{$cp7}')" title="Editar Registro"><i class="bi bi-pencil-square text-primary"></i> </a>
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

function editar(id, ho_inicio, ho_total, diesel, oleo, producao, observacao){
	$('#id').val(id);
	$('#<?=$campo1?>').val(ho_inicio);
	$('#<?=$campo4?>').val(diesel);
	$('#<?=$campo5?>').val(oleo);
	$('#<?=$campo6?>').val(producao);
	$('#<?=$campo7?>').val(observacao);
	
	$('#tituloModal').text('Editar Registro');
	var myModal = new bootstrap.Modal(document.getElementById('modalForm'), {		});
	myModal.show();
	$('#mensagem').text('');
}

function limparCampos(){
	$('#id').val('');
	$('#<?=$campo1?>').val('');
	$('#<?=$campo4?>').val('');
	$('#<?=$campo5?>').val('');
	$('#<?=$campo6?>').val('');
	$('#<?=$campo7?>').val('');

	$('#mensagem').text('');
	
}

</script>