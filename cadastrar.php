<?php

if(isset($_POST['upload']) ){
    function conectarDB(){
        try{
            $conn = new PDO("mysql:host=localhost;dbname=escola", "root", ""); 
            return $conn;
            echo"conectou";

        }
        catch(PDOException $e)
            {
                echo "Conexão falhou: " . $e->getMessage();
            }
       

    }

    function gravarImagem(){
        $conexao = conectarDB();

        $target = "images/".$_FILES['image']['name'];
        $image = $_FILES['image']['name'];

       
        $nome_curso = $_POST['nomeCurso'];
        $bandeira = $target;
        $ano = 2019;
        $stmt = $conexao->prepare("INSERT INTO curso(nome_curso, descricao_curso, ano_curso) VALUES(:nome, :descricao, :ano)");

        $stmt->bindParam(':nome', $nome_curso);
        $stmt->bindParam(':descricao',$bandeira);
        $stmt->bindParam(':ano',$ano);
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