<?php 
@session_start();
if(@$_SESSION['nivel_usuario'] != 'Administrador'){
		echo "<script>window.location='../index.php'</script>";
	}
 ?>
