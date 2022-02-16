<?php 
require_once("../conexao.php");
$nome = $_POST['nome-usuario'];
$email = $_POST['email-usuario'];
$senha = $_POST['senha-usuario'];
$id = $_POST['id-usuario'];


//VALIDAR EMAIL
$query = $pdo->query("SELECT * from usuarios where email = '$email'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
$id_usu = $res[0]['id'];
if($total_reg > 0 and $id_usu != $id){
	echo 'Este email já está cadastrado para o usuário ' .$res[0]['nome']. ', escolha outro email!!';
	exit();
}

$query = $pdo->prepare("UPDATE usuarios SET nome = :nome, email = :email, senha = :senha WHERE id = '$id'");
$query->bindValue(":email", "$email");
$query->bindValue(":senha", "$senha");
$query->bindValue(":nome", "$nome");
$query->execute();

echo 'Salvo com Sucesso';

 ?>