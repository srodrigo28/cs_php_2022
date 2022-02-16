<?php 
require_once("../../conexao.php");
require_once("campos.php");

$campo1 = 'brita_po';
$campo2 = 'brita_0';
$campo3 = 'brita_1';
$campo4 = 'cap';
$campo5 = 'observacao';
$campo6 = 'data_now';

echo <<<HTML
<table id="example" class="table table-striped table-light table-hover my-4">
<thead>
<tr>
<th>Data</th>
<th>Brita Pó</th>
<th>Brita 0</th>
<th>Brita 1</th>
<th>Cap</th>
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

		$id  = $res[$i]['id'];
		$cp1 = $res[$i]['brita_po'];
		$cp2 = $res[$i]['brita_0'];
		$cp3 = $res[$i]['brita_1'];
		$cp4 = $res[$i]['cap'];
		$cp5 = $res[$i]['observacao'];
		$cp6 = $res[$i]['data_now'];
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
	<a href="#" onclick="editar('{$id}', '{$cp1}', '{$cp2}', '{$cp3}', '{$cp4}', '{$cp5}')" title="Editar Registro"> <i class="bi bi-pencil-square text-primary"></i> </a>
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

function editar(id, brita_po, brita_0, brita_1, cap, observacao){
	$('#id').val(id);
	$('#<?=$campo1?>').val(brita_po);
	$('#<?=$campo2?>').val(brita_0);
	$('#<?=$campo3?>').val(brita_1);
	$('#<?=$campo4?>').val(cap);
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