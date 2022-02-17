<?php 
require_once("../../conexao.php");
require_once("campos.php");

echo <<<HTML
<script> alert('hello'); </script>
<table width="10%" >
<tr>
<th>{$campo1}</th>							
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
		$cp1 = $res[$i]['nome'];

echo <<<HTML
	<tr>
		<td>{$cp1}</td>							
		<td>
			<a href="#" onclick="editar('{$id}', '{$cp1}')" title="Editar Registro">	<i class="bi bi-pencil-square text-primary"></i> </a>
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


function editar(id, nome, email, senha, nivel){
	$('#id').val(id);
	$('#<?=$campo1?>').val(nome);
	$('#<?=$campo2?>').val(email);
	$('#<?=$campo3?>').val(senha);
	$('#<?=$campo4?>').val(nivel);
	
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

	$('#mensagem').text('');
	
}

</script>