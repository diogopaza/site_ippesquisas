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

       
        $nome_cidade = $_POST['nomeCidade'];
        $bandeira = $target;
        $descricao = $_POST['descricao_cidade'];
        $estado =  $_POST['estado'];
        
        $stmt = $conexao->prepare("INSERT INTO cidade(nome_cidade,bandeira_cidade,descricao_cidade,estado) VALUES(:nome, :bandeira,:descricao,:estado)");

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
                        <input name="nomeCidade" type="text" placeholder="Digite o nome da cidade">
                    </div>
                     <div>
                        <textarea rows="10" cols="10" placeholder="descrição" name="descricao_cidade"></textarea>
                    </div>
                     <div>
                        <input name="estadoCidade" type="text" placeholder="Digite estado">
                    </div>
            
            
                    <div>
                        <input type="submit" name="uploadCidades" value="Upload Image" />
                    </div>
                    <div>
                        <a href="percorrer.php">Listar cidades</a>
                    </div>


        </div>
        

</form>

</body>
</html>

