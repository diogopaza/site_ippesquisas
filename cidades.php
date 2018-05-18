

	




    <?php

    	require('conectar.php');

		$banco = new Conectar();
    	$conexao =  $banco->conectarDB();
        $q = $_GET['q'];
        $sql = "SELECT * FROM cidade JOIN estados ON cidade.estado = estados.id WHERE estados.id=".$q;
        
                   
                    $result = $conexao->query($sql);
                    foreach ($result as $row) {
                        echo "
                            <div class='col  m4 s12'>
                                <div class='card hoverable ' data-wow-delay='1s'>
                                    <div class='card-image'>
                           
                                        <img src='".$row['bandeira_cidade']."' class='imagem-card'>"."
                                        
                                       
                                    
                                    </div>
                                <div class='card-action wow '>
                                <a  class='card-title linkEstados' onclick='retornarClientes(this)' id='".$row['id_cidade']."'>".$row['nome_cidade']."</a>
                                
                            </div>
                            
                        </div>
                        
                    </div>




                    ";    
                }
                $conn = null;

               



?>


    

   
    


