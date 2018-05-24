<?php

class Conectar{


	 function conectarDB(){
        try{
            /*
            $conn = new PDO("mysql:host=mysql.hostinger.com.br;dbname=u560868016_site;charset=utf8", "u560868016_diogo", "090799"); 
            return $conn;
           */
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