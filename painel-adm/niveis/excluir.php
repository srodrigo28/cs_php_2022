<?php 
require_once("../../conexao.php");
$id = @$_POST['id-excluir'];

$query = $pdo->query("SELECT * from niveis where id = '$id'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$nivel = $res[0]['nivel'];

$query = $pdo->query("SELECT * from usuarios where nivel = '$nivel'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);

if($total_reg == 0){
	$pdo->query("DELETE from niveis where id = '$id'");
	echo 'Excluído com Sucesso';
}else{
	echo 'Este nível possui usuários associados a ele, primeiro exclua estes usuários e depois exclua o nível!';
}



 ?>