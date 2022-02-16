<?php 
require_once("../../conexao.php");
require_once("campos.php");

echo <<<HTML
<table id="example" class="table table-striped table-light table-hover my-4">
<thead>
<tr>
<th>{$campo6}</th>
<th>{$campo1}</th>
<th>{$campo2}</th>
<th>{$campo3}</th>								
<th>Ações</th>
</tr>
</thead>
<tbody>
HTML;


$query = $pdo->query("SELECT * from $pagina order by usuario asc ");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
for($i=0; $i < @count($res); $i++){
	foreach ($res[$i] as $key => $value){}

		//print_r($res[$i]); die();

		$id = $res[$i]['id'];
		$cp6 = $res[$i]['usuario'];
		$cp1 = $res[$i]['lanche'];
		$cp2 = $res[$i]['almoco'];
		$cp3 = $res[$i]['janta'];
		$cp4 = $res[$i]['pessoas'];
		$cp5 = $res[$i]['observacao'];
		$cp6 = $res[$i]['usuario'];

echo <<<HTML
	<tr>
	<td>{$cp6}</td>		
	<td>{$cp1}</td>		
	<td>{$cp2}</td>	
	<td>{$cp3}</td>								
	<td>
	<a href="#" onclick="editar('{$id}', '{$cp1}', '{$cp2}', '{$cp3}', '{$cp4}', '{$cp5}', '{$cp6}')" title="Editar Registro">	<i class="bi bi-pencil-square text-primary"></i> </a>
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
		"ordering": false
	});
});

function editar(id, lanche, almoco, janta, pessoas, observacao, usuario){
	$('#id').val(id);
	$('#<?=$campo1?>').val(lanche);
	$('#<?=$campo2?>').val(almoco);
	$('#<?=$campo3?>').val(janta);
	$('#<?=$campo4?>').val(pessoas);
	$('#<?=$campo5?>').val(observacao);
	$('#<?=$campo6?>').val(usuario);
	
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
	$('#<?=$campo6?>').val('');

	$('#mensagem').text('');
	
}

</script>