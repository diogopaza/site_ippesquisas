<?php

	require('conectar.php');
	$banco = new Conectar();
	$conexao =  $banco->conectarDB();
	 
     $q = $_GET['q'];
     



	 $sql = "SELECT *  FROM  cliente JOIN cidade on cliente.cidade_cliente = cidade.id_cidade join img on img.id_cliente = cliente.id_cliente WHERE cliente.id_cliente =".$q;
        
    $sqlImgPrincipal = "SELECT * FROM cliente WHERE id_cliente=".$q;

                    $result = $conexao->query($sql);
                    $resultPrincipal = $conexao->query($sqlImgPrincipal);

                    foreach ($resultPrincipal as $row ) {
                         echo "



                            <div class='col  m3 s12'>
                                <div class='card hoverable ' data-wow-delay='1s'>
                                    <div class='card-image'>
                           
                                        <img src='".$row['img_principal']."' class='imagem-card '>"."
                                        
                                       
                                    
                                    </div>
                                <div class='card-content '>
                                <a  class='card-title linkEstados' onclick='retornarClientes(this)' id='".$row['id_cliente']."'><h5>".$row['nome_cliente']."</h5></a>
                                
                            </div>
                            
                        </div>
                        
                    </div>

                    

                    ";
                        
                    }


                    foreach ($result as $row) {
                    
                       echo "



                            <div class='col  m3 s12'>
                                <div class='card hoverable ' data-wow-delay='1s'>
                                    <div class='card-image'>
                           
                                        <img src='".$row['local_img']."' class='imagem-card '>"."
                                        
                                       
                                    
                                    </div>
                                <div class='card-content '>
                                <a  class='card-title linkEstados' onclick='retornarClientes(this)' id='".$row['id_cliente']."'><h5>".$row['nome_cliente']."</h5></a>
                                
                            </div>
                            
                        </div>
                        
                    </div>

                    

                    "                  
                          
                        
                   
                    ;    
                }
                $conn = null;

               







?>