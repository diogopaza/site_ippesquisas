<?php

	$user = $_POST['user'];
	//echo $user;
	require('conectar.php');
	$banco = new Conectar();
	$conexao =  $banco->conectarDB();


	$sql = "SELECT * FROM usuarios";
	$result = $conexao->query($sql);
	


	foreach ($result as $row) {
		echo $row['user'];
		echo $row['password'];

	}



?>