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
       $banco = new Conectar();
        $conexao =  $banco->conectarDB();
        
       

        $target = "images/".$_FILES['image']['name'];
        $image = $_FILES['image']['name'];       
        $nome_cidade = $_POST['nome_cidade'];
        $bandeira = $target;        
        $cidade =  $_POST['select_cidades'];

        

        
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

    function teste(){
        for ($i=0; $i<count( $_FILES["image"]["name"] ); $i++) { 
           echo $imagem = $_FILES['image']['name'][$i]."<br>";
        }
       
        
    }

    teste();

  
   
  

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
                        <textarea rows="10" cols="6"></textarea>
                    </div>
                     <div class="selectEstados">
                        
                        
                    </div>
                     
                     <div id="selectCidades">
                        <select>
                            <option></option>
                        </select>
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

