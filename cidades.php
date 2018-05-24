

	




    <?php

    	require('conectar.php');

		$banco = new Conectar();
    	$conexao =  $banco->conectarDB();
        $q = $_GET['q'];
        $sql = "SELECT * FROM cidade JOIN estados ON cidade.estado = estados.id WHERE estados.id=".$q;
        
                   
                    $result = $conexao->query($sql);
                    foreach ($result as $row) {
                        echo "
                            <div class='col  m6 s12'>
                                <div class='card hoverable ' data-wow-delay='1s'>
                                    <div class='card-image'>
                           
                                        <img src='".$row['bandeira_cidade']."' class='imagem-card'>"."
                                        
                                       
                                    
                                    </div>
                                <div class='card-title'>
                                <a href='javascript:void(0);' class='card-title linkEstados' onclick='retornarClientes(this)' id='".$row['id_cidade']."'><h4>".$row['nome_cidade']."</h4></a>
                                
                            </div>
                            
                        </div>
                        
                    </div>




                    ";    
                }
                $conn = null;

               



?>


    

   
    


