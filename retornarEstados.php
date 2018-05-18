<?php

require('conectar.php');

 $banco = new Conectar();
 $conexao =  $banco->conectarDB();

  $sqlEstados = "SELECT * FROM estados";
            $result = $conexao->query($sqlEstados);
            echo "<select name='select_estados' >
            		<option ></option>";
           	foreach ($result as $row) {
           		echo " <option value='".$row['id'] ."'>".$row['nome_estado']."</option>"; 
           	}
           	echo "</select>";

 



?>