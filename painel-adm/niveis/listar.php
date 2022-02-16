<?php 
require_once("../../conexao.php");

echo <<<HTML
<table id="example" class="table table-striped table-light table-hover my-4">
<thead>
<tr>
<th>Nível</th>										
<th>Ações</th>
</tr>
</thead>
<tbody>
HTML;


$query = $pdo->query("SELECT * from niveis order by id desc ");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
for($i=0; $i < @count($res); $i++){
	foreach ($res[$i] as $key => $value){} 

echo <<<HTML
	<tr>
	<td>{$res[$i]['nivel']}</td>										
	<td>
	<a href="#" onclick="editar('{$res[$i]['id']}', '{$res[$i]['nivel']}')" title="Editar Registro">	<i class="bi bi-pencil-square text-primary"></i> </a>
	<a href="#" onclick="excluir('{$res[$i]['id']}' , '{$res[$i]['nivel']}')" title="Excluir Registro">	<i class="bi bi-trash text-danger"></i> </a>
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


function editar(id, nivel){
	$('#id').val(id);
	$('#nivel').val(nivel);
	$('#tituloModal').text('Editar Registro');
	var myModal = new bootstrap.Modal(document.getElementById('modalForm'), {		});
	myModal.show();

}



function limparCampos(){
	$('#id').val('');
	$('#nivel').val('');
	
}

</script>