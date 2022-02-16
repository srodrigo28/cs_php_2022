<?php 
require_once("../../conexao.php");
require_once("campos.php");

echo <<<HTML
<table id="example" class="table table-striped table-light table-hover my-4">
<thead>
<tr>
<th>{$campo1}</th>
<th>{$campo2}</th>						
<th>{$campo5}</th>	
<th>Ações</th>
</tr>
</thead>
<tbody>
HTML;


$query = $pdo->query("SELECT * from $pagina order by id desc ");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
for($i=0; $i < @count($res); $i++){
	foreach ($res[$i] as $key => $value){} 

		$id = $res[$i]['id'];

		$cp1 = $res[$i]['condicao'];
		$cp2 = $res[$i]['modelo'];
		$cp3 = $res[$i]['capacidade'];
		$cp4 = $res[$i]['prefix'];
		$cp5 = $res[$i]['placa'];
		$cp6 = $res[$i]['observacoes'];

echo <<<HTML
	<tr>
	<td>{$cp1}</td>		
	<td>{$cp2}</td>
	<td>{$cp5}</td>
	
	<td>
	<a href="#" onclick="editar('{$id}', '{$cp1}', '{$cp2}', '{$cp3}', '{$cp4}', '{$cp5}', '{$cp6}' )" title="Editar Registro">	<i class="bi bi-pencil-square text-primary"></i> </a>
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

} );

function editar(id, condicao, modelo, capacidade, prefix, placa, observacoes){
	$('#id').val(id);
	$('#<?=$campo1?>').val(condicao);
	$('#<?=$campo2?>').val(modelo);
	$('#<?=$campo3?>').val(capacidade);
	$('#<?=$campo4?>').val(prefix);
	$('#<?=$campo4?>').val(placa);
	$('#<?=$campo4?>').val(observacoes);
	
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