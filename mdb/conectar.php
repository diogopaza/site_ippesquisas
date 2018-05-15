<?php

class Conectar{
		
	function conectarDB(){
        try{
            $conn = new PDO("mysql:host=localhost;dbname=escola", "root", ""); 
            return $conn;
            echo"conectou";

        }
        catch(PDOException $e)
            {
                echo "Conexão falhou: " . $e->getMessage();
            }
       

    }

}


?>