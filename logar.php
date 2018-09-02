<?php

	$user = $_POST['user'];
	$password = $_POST['password'];
	echo $password;
	require('conectar.php');
	$banco = new Conectar();
	$conexao =  $banco->conectarDB();


	$sql = "SELECT * FROM usuarios";
	$result = $conexao->query($sql);
	


	foreach ($result as $row) {
		//echo $row['user'];
		//echo $row['password'];

	}



?>