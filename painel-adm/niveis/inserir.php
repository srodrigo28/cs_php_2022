<?php 
require_once("../../conexao.php");
$nivel = $_POST['nivel'];
$id = @$_POST['id'];


//VALIDAR CAMPO
$query = $pdo->query("SELECT * from niveis where nivel = '$nivel'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
$id_reg = @$res[0]['id'];
if($total_reg > 0 and $id_reg != $id){
	echo 'Este nível já está cadastrado!!';
	exit();
}

if($id == ""){
	$query = $pdo->prepare("INSERT INTO niveis set nivel = :nivel");
}else{
	$query = $pdo->prepare("UPDATE niveis set nivel = :nivel WHERE id = '$id'");
}

$query->bindValue(":nivel", "$nivel");
$query->execute();

echo 'Salvo com Sucesso';

 ?>