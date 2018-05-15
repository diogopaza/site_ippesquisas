<?php

	require('conectar.php');

	$banco = new Conectar();
    $conexao =  $banco->conectarDB();


     $sql = "SELECT * FROM cidade";
            $result = $conexao->query($sql);
            
           	foreach ($result as $row) {
           		echo $row['id_cidade'].' - '.$row['nome_cidade']."<br /><img src='".$row['bandeira_cidade']."'>";
           	}

    $conn = null;





?>