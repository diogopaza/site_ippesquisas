<?php

class Conectar{


	 function conectarDB(){
        try{
            $conn = new PDO("mysql:host=localhost;dbname=site_up;charset=utf8", "root", ""); 
            return $conn;
           

        }
        catch(PDOException $e)
            {
                echo "Conexão falhou: " . $e->getMessage();
            }
       

    }



}


 
                               
                               
                              


                          

?>