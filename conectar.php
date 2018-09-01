<?php

class Conectar{


	 function conectarDB(){
        try{
            /*
            $conn = new PDO("mysql:host=mysql.hostinger.com.br;dbname=u560868016_site;charset=utf8", "u560868016_diogo", "090799"); 
            return $conn;
           */
             $conn = new PDO("mysql:host=localhost;dbname=u543559947_up;charset=utf8", "u543559947_diogo", "0igNXWaCmnbw"); 
            return $conn;
            

        }
        catch(PDOException $e)
            {
                echo "Conexão falhou: " . $e->getMessage();
            }
       

    }



}


 
                               
                               
                              


                          

?>