<?php 
require_once("../../conexao.php");
require_once("campos.php");

$cp1 = $_POST[$campo1];
$cp2 = $_POST[$campo2];
$cp3 = $_POST[$campo3];
$cp4 = $_POST[$campo4];
$cp5 = $_POST[$campo5];

$id = @$_POST['id'];

//VALIDAR CAMPO
$query = $pdo->query(" SELECT * from $pagina where data_now = '20/02/2021' ");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
$id_reg = @$res[0]['id'];

$campo1 = 'brita_po';
$campo2 = 'brita_0';
$campo3 = 'brita_1';
$campo4 = 'cap';
$campo5 = 'observacao';

if($total_reg > 0 and $id_reg != $id){
	echo 'Este registro já está cadastrado!!';
	exit();
}

if($id == ""){
	$query = $pdo->prepare("INSERT INTO $pagina set brita_po = :campo1, brita_0 = :campo2, brita_1 = :campo3, cap = :campo4, observacao = :campo5");
}else{
	$query = $pdo->prepare("UPDATE $pagina set brita_po = :campo1, brita_0 = :campo2, brita_1 = :campo3, cap = :campo4, observacao = :campo5 WHERE id = '$id'");
}

$query->bindValue(":campo1", "$cp1");
$query->bindValue(":campo2", "$cp2");
$query->bindValue(":campo3", "$cp3");
$query->bindValue(":campo4", "$cp4");
$query->bindValue(":campo5", "$cp5");
$query->execute();

echo 'Salvo com Sucesso';

 ?>