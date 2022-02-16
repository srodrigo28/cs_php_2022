<?php 
require_once("../../conexao.php");
require_once("campos.php");

echo <<<HTML
<table id="example" class="table table-striped table-light table-hover my-4">
<thead>
<tr>
<th>{$campo1}</th>
<th>{$campo3}</th>
<th>{$campo4}</th>
<th>Ações</th>
</tr>
</thead>
<tbody>
HTML;

$query = $pdo->query("SELECT * from $pagina order by nome asc ");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
for($i=0; $i < @count($res); $i++){
	foreach ($res[$i] as $key => $value){}

		//print_r($res[$i]); die();

		$id = $res[$i]['id'];
		$cp1 = $res[$i]['nome'];
		$cp2 = $res[$i]['rg'];
		$cp3 = $res[$i]['cpf'];
		$cp4 = $res[$i]['profissao'];
		$cp5 = $res[$i]['observacao'];

echo <<<HTML
	<tr>
	<td>{$cp1}</td>		
	<td>{$cp4}</td>		
	<td>{$cp3}</td>	
	<td>
	<a href="#" onclick="editar('{$id}', '{$cp1}', '{$cp2}', '{$cp3}', '{$cp4}', '{$cp5}')" title="Editar Registro">	<i class="bi bi-pencil-square text-primary"></i> </a>
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

// $campo1 = 'nome';
// $campo2 = 'rg';
// $campo3 = 'cpf';
// $campo4 = 'profissao';
// $campo5 = 'observacao';
// $campo6 = 'data_now';

function editar(id, nome, rg, cpf, profissao, observacao){
	$('#id').val(id);
	$('#<?=$campo1?>').val(nome);
	$('#<?=$campo2?>').val(rg);
	$('#<?=$campo3?>').val(cpf);
	$('#<?=$campo4?>').val(profissao);
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