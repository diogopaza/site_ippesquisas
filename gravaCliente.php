<?php
	require('conectar.php');
    
   
    
   

    function gravarCliente(){
      
      	 $imagemGET = $_GET['q'];
         $myfiles =  $_FILES['image']['name'] ;



       try{


        $banco = new Conectar();
        $conexao =  $banco->conectarDB();

        for($i=0; $i< count( $myfiles ); $i++){
    	

    		if( $_FILES['image']['name'][$i] == $imagemGET ){
    		
	    		
	    		$localImgPrincipal = 'images/' . $_FILES['image']['name'][$i];
	    	
	    		$tmpnameImgPrincipal = $_FILES['image']['tmp_name'][$i];
	    		
    		}

    	}
        
        
     
        //echo 'nome d imagem ' . $_FILES['image']['name'][0];
        //echo '<br>local gravar imagem principal: '.$localImgPrincipal.'<br>';
        //echo 'local temporario '.$tmpnameImgPrincipal.'<br>';



        $nomeCliente = $_POST['nome_cliente'];
        $telefoneCliente = $_POST['telefone_cliente'];
        $cidadeCliente =  $_POST['select_cidades'];
        $categoriaCliente =  $_POST['categoria_cliente'];
        $descricaoCliente = $_POST['text_descricao'];
       
       
        
        if(copy($tmpnameImgPrincipal, $localImgPrincipal)){
            echo 'copiei arquivo principal <br/>';   


        }else{
            var_dump('não é possível gravar a imagem principal');
        }
    	
        $stmt = $conexao->prepare("INSERT INTO cliente(nome_cliente,cidade_cliente,descricao_cliente,telefone,categoria_cliente,img_principal) VALUES(:nome, :cidade,:descricao,:telefone,:categoria,:img)");

        $stmt->bindParam(':nome', $nomeCliente);
        $stmt->bindParam(':cidade',$cidadeCliente);
        $stmt->bindParam(':descricao',$descricaoCliente);
        $stmt->bindParam(':telefone',$telefoneCliente);
        $stmt->bindParam(':categoria',$categoriaCliente);
        $stmt->bindParam(':img',$localImgPrincipal);
        $stmt->execute();
        $idCliente = $conexao->lastInsertId();
       
        
       
       }catch(PDOException $e){

        echo "Erro ao gravar no banco ".$e->getMessage();

       }

        gravarImagem($idCliente);
        
        

    }

    function gravarImagem($id){

    	
        $banco = new Conectar();
        $conexao =  $banco->conectarDB();
       
        for ($i=0; $i<count( $_FILES["image"]["name"] ); $i++) { 
          	

            $local = 'images/'.$_FILES['image']['name'][$i];
            $tmpname = $_FILES['image']['tmp_name'][$i];
            $id_cliente = $id;
          
             if(move_uploaded_file($tmpname, $local)){
                        
                    try{
                        $stmt = $conexao->prepare("INSERT INTO img(local_img,id_cliente) VALUES(:local,:id)");
                      
                        $stmt->bindParam(':local', $local);
                        $stmt->bindParam(':id', $id_cliente);
                        $stmt->execute();
                        print_r('gravei');
                      


                    }
                    catch(PDOException $e){

                         echo 'Não foi possível gravar no banco de dados';
                    }            
                    
                    

                    }else{
                        echo 'Não foi possível gravar a imagem na pasta selecionada';
                    }


        }

        
          
               
       
        
    }

    gravarCliente();
   

?>