<?php

	require('conectar.php');
	$banco = new Conectar();
	$conexao =  $banco->conectarDB();
	 $q = $_GET['q'];



	 $sql = "SELECT *  FROM  cliente JOIN cidade ON cidade.id_cidade = cliente.cidade_cliente   WHERE cidade.id_cidade=".$q;
        
                   
                    $result = $conexao->query($sql);
                    foreach ($result as $row) {
                        echo "
                            <div class='col  m4 s12'>
                                <div class='card hoverable ' data-wow-delay='1s'>
                                    <div class='card-image'>
                           
                                        <img src='".$row['img_principal']."' class='imagem-card'>"."
                                        
                                       
                                    
                                    </div>
                                <div class='card-title '>
                                <a href='javascript:void(0);' class='card-title linkEstados' onclick='retornarClientesFinal(this)' id='".$row['id_cliente']."'><h4>".$row['nome_cliente']."</h4></a>
                                
                            </div>
                            
                        </div>
                        
                    </div>




                    ";    
                }
                $conn = null;

               







?>