<?php

	require('conectar.php');
	$banco = new Conectar();
	$conexao =  $banco->conectarDB();
	 $q = $_GET['q'];


	 $sql = "SELECT *  FROM  cliente JOIN cidade ON cidade.id_cidade = cliente.cidade_cliente JOIN img ON cliente.id_cliente = img.id_cliente WHERE cidade.id_cidade=".$q;
        
                   
                    $result = $conexao->query($sql);
                    foreach ($result as $row) {
                        echo "
                            <div class='col  m4 s12'>
                                <div class='card hoverable ' data-wow-delay='1s'>
                                    <div class='card-image'>
                           
                                        <img src='".$row['local_img']."' class='imagem-card'>"."
                                        
                                       
                                    
                                    </div>
                                <div class='card-action wow '>
                                <a  class='card-title linkEstados' onclick='retornarClientes(this)' id='".$row['id_cliente']."'>".$row['nome_cliente']."</a>
                                
                            </div>
                            
                        </div>
                        
                    </div>




                    ";    
                }
                $conn = null;

               







?>