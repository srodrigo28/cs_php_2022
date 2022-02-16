<?php 
require_once("../../conexao.php");
require_once("campos.php");

echo <<<HTML
<table id="example" class="table table-striped table-light table-hover my-4">
<thead>
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
		
		$('#tituloModal').text('Editar Registro');
		var myModal = new bootstrap.Modal(document.getElementById('modalForm'), {		});
		myModal.show();
		$('#mensagem').text('');
	}



	function limparCampos(){
		$('#id').val('');
		$('#<?=$campo1?>').val('');


		$('#mensagem').text('');

	}

</script>