<?php

require('conectar.php');

if(isset($_POST['upload']) ){
   


    function gravarImagem(){
       $banco = new Conectar();
        $conexao =  $banco->conectarDB();


        $target = "images/".$_FILES['image']['name'];
        $image = $_FILES['image']['name'];

       
        $nome_curso = $_POST['nomeCurso'];
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



    gravarImagem();

}

    


    

?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8">
</head>
<body>
    <form enctype="multipart/form-data" action="cadastrar.php" method="POST" >


        <div>
            <input type="file" name="image" multiple >
        </div>
        <div>
            <input name="nomeCurso" type="text" placeholder="Digite o nome do curso"></input>
        </div>


        <div>
            <input type="submit" name="upload" value="Upload Image" />
        </div>
        <div>
            <a href="percorrer.php">Listar cursos</a>
        </div>





</form>
</body>
</html>

