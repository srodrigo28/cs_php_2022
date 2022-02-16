<?php 
require_once("../../conexao.php");
require_once("campos.php");

$cp1 = $_POST[$campo1];
$cp2 = $_POST[$campo2];
$cp3 = $_POST[$campo3];
$cp4 = $_POST[$campo4];
$cp5 = $_POST[$campo5];
$cp6 = $_POST[$campo6];

$id = @$_POST['id'];

//VALIDAR CAMPO
$query = $pdo->query("SELECT * from $pagina where prefix = '$cp4' or placa = '$cp5'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
$id_reg = @$res[0]['id'];
if($total_reg > 0 and $id_reg != $id){
	echo 'Este registro já está cadastrado!!';
	exit();
}

if($id == ""){
	$query = $pdo->prepare("INSERT INTO $pagina set 
												condicao = :campo1, 
												modelo = :campo2, 
												capacidade = :campo3, 
												prefix = :campo4,
												placa = :campo5, 
												observacoes = :campo6
												");
}else{
	$query = $pdo->prepare("UPDATE $pagina set 
											condicao = :campo1, 
											modelo = :campo2, 
											capacidade = :campo3, 
											prefix = :campo4,
											placa = :campo5, 
											observacoes = :campo6
											
											WHERE id = '$id'");
}

$query->bindValue(":campo1", "$cp1");
$query->bindValue(":campo2", "$cp2");
$query->bindValue(":campo3", "$cp3");
$query->bindValue(":campo4", "$cp4");
$query->bindValue(":campo5", "$cp5");
$query->bindValue(":campo6", "$cp6");
$query->execute();

echo 'Salvo com Sucesso';

 ?>