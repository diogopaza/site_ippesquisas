<?php

require('conectar.php');

if(isset($_POST['uploadEstados']) ){
   


    function gravarEstado(){
       $banco = new Conectar();
        $conexao =  $banco->conectarDB();


        $target = "images/".$_FILES['image']['name'];
        $image = $_FILES['image']['name'];

       
        $nome_curso = $_POST['nomeEstado'];
        $bandeira = $target;
        
        $stmt = $conexao->prepare("INSERT INTO estados(nome_estado,bandeira_estado) VALUES(:nome, :bandeira)");

        $stmt->bindParam(':nome', $nome_curso);
        $stmt->bindParam(':bandeira',$bandeira);
        $stmt->execute();
       



        if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
			$msg = "imagem uploaded suessfully";
		}else{
			$msg = "There was a problem uploading image";
		}

    }



    gravarEstado();

}

if(isset($_POST['uploadCidades']) ){
   


    function gravarCidade(){
       $banco = new Conectar();
        $conexao =  $banco->conectarDB();
        
       

        $target = "images/".$_FILES['image']['name'];
        $image = $_FILES['image']['name'];

       
        $nome_cidade = $_POST['nome_cidade'];
        $bandeira = $target;
        
        $estado =  $_POST['select_estados'];

        

        
        $stmt = $conexao->prepare("INSERT INTO cidade(nome_cidade,bandeira_cidade,estado) VALUES(:nome, :bandeira,:estado)");

        $stmt->bindParam(':nome', $nome_cidade);
        $stmt->bindParam(':bandeira',$bandeira);
       
        $stmt->bindParam(':estado',$estado);
        $stmt->execute();
       



        if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
            $msg = "imagem uploaded suessfully";
        }else{
            $msg = "There was a problem uploading image";
        }

    }

  
   
    gravarCidade();

}


if(isset($_POST['uploadClientes']) ){
   


    function gravarCliente(){
       try{


        $banco = new Conectar();
        $conexao =  $banco->conectarDB();
        
       

        $nomeCliente = $_POST['nome_cliente'];
        $telefoneCliente = $_POST['telefone_cliente'];
        $cidadeCliente =  $_POST['select_cidades'];
        $categoriaCliente =  $_POST['categoria_cliente'];
        $descricaoCliente = $_POST['text_descricao'];
        echo "Nome: ".$nomeCliente."<br>";
        echo "Telefone: ".$telefoneCliente."<br>";
        echo "Cidade: ".$cidadeCliente."<br>";
        echo "Categoria: ".$categoriaCliente."<br>";
        echo "Descrição: ".$descricaoCliente."<br>";


    
        $stmt = $conexao->prepare("INSERT INTO cliente(nome_cliente,cidade_cliente,descricao_cliente,telefone,categoria_cliente) VALUES(:nome, :cidade,:descricao,:telefone,:categoria)");

        $stmt->bindParam(':nome', $nomeCliente);
        $stmt->bindParam(':cidade',$cidadeCliente);
        $stmt->bindParam(':descricao',$descricaoCliente);
        $stmt->bindParam(':telefone',$telefoneCliente);
        $stmt->bindParam(':categoria',$categoriaCliente);
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
                        echo "Último id inserido: ".$conexao->lastInsertId();


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

    

  
   
  

}


    


    

?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

    <form enctype="multipart/form-data" action="cadastrar.php" method="POST" class="formEstados">
        <div class="formEstados">
             <h3>Cadastrar Estado</h3>
        <div>
            <input type="file" name="image" multiple >
        </div>
        <div>
            <input name="nomeEstado" type="text" placeholder="Digite o nome do estado"></input>
        </div>


        <div>
            <input type="submit" name="uploadEstados" value="Upload Image" />
        </div>
        <div>
            <a href="percorrer.php">Listar cursos</a>
        </div>
 

        </div>
       


</form>


    <form enctype="multipart/form-data" action="cadastrar.php" method="POST" >
        <div id="formCidades">
            <h3>Cadastrar Cidade</h3>
                    <div>
                        <input type="file" name="image" multiple >
                    </div>
                    <div>
                        <input name="nome_cidade" type="text" placeholder="Digite o nome da cidade">
                    </div>
                     
                     <div class="selectEstados">
                        
                    </div>
            
            
                    <div>
                        <input type="submit" name="uploadCidades" value="Upload Image" />
                    </div>
                    <div>
                        <a href="percorrer.php">Listar cidades</a>
                    </div>


        </div>
        

</form>

<form enctype="multipart/form-data" action="cadastrar.php" method="POST" id="estiloClientes">
      
            <h3>Cadastrar Cliente</h3>
                    <div>
                        <input type="file" name="image[]" multiple >
                    </div>
                    <div>
                        <input name="nome_cliente" type="text" placeholder="Digite o nome do cliente">
                    </div>
                     <div>
                        <input name="telefone_cliente" type="text" placeholder="Digite o telefone do  cliente">
                    </div>
                     <div>
                        <input name="categoria_cliente" type="text" placeholder="Digite a categoria ">
                    </div>
                    <div>
                        <textarea rows="10" cols="6" name="text_descricao"></textarea>
                    </div>
                     
                     
                     <div id="selectCidades">
                       
                    </div>
            
            
                    <div>
                        <input type="submit" name="uploadClientes" value="Upload Image" />
                    </div>
                    <div>
                        <a href="percorrer.php">Listar cidades</a>
                    </div>


        

</form>


<script type="text/javascript">

   

    if(window.XMLHttpRequest){
        xmlhttpEstados = new XMLHttpRequest();
        xmlhttpCidades = new XMLHttpRequest();
       
       

    }

    xmlhttpEstados.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
               
                var classes = document.querySelectorAll('.selectEstados');
                
                for (var i = 0; i < classes.length; i++) {
                   
                    classes[i].innerHTML = this.responseText;
                }

                /*
                document.querySelector('.selectEstados').innerHTML = this.responseText;
                console.log('executei innerHTML');
               */
                
            }
        }

     xmlhttpCidades.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
               
                var classes = document.querySelectorAll('#selectCidades');
               
                for (var i = 0; i < classes.length; i++) {
                   
                    classes[i].innerHTML = this.responseText;
                }

                /*
                document.querySelector('.selectEstados').innerHTML = this.responseText;
                console.log('executei innerHTML');
               */
                
            }
    }

    

    xmlhttpEstados.open("GET","retornarEstados.php",true);
    xmlhttpEstados.send();



   

    

    xmlhttpCidades.open("GET","retornaCidades.php",true);
    xmlhttpCidades.send();

 
    
   

    

</script>

</body>
</html>

