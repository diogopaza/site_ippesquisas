<?php

require('conectar.php');

 $banco = new Conectar();
 $conexao =  $banco->conectarDB();
 $q = 2;

  

  $sqlCidades = "SELECT * FROM cidade ";
            $result = $conexao->query($sqlCidades);
            echo "<select name='select_cidades'>
            		<option ></option>";
           	foreach ($result as $row) {
           		echo " <option value='".$row['nome_cidade'] ."'>".$row['nome_cidade']."</option>"; 
           	}
           	echo "</select>";


?>