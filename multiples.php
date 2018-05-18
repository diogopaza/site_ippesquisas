<?php




?>


<!DOCTYPE html>
<html>
<head>
    <title>Multiple Upload</title>
</head>
<body>
    <form action="multiples.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="img" multiple />
        <input type="submit" name="submit">


    </form>
    <?php
        try{
            $conexao = new PDO("mysql:host=localhost;dbname=multiple;charset=utf8", "root", ""); 
          
           

        }
        catch(PDOException $e)
            {
                echo "Conexão falhou: " . $e->getMessage();
            }
        if(isset($_POST['submit'])){
           
            $filename= $_FILES['img']['name'];
            $tmpname=$_FILES['img']['tmp_name'];
            $filetype = $_FILES['img']['type'];
            $name = addslashes($filename);
            $tmp = addslashes(file_get_contents($tmpname));
            
           

            $stmt = $conexao->prepare("INSERT INTO imagem(name,image) VALUES(:name, :image)");

            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':image',$tmp);           
            $stmt->execute();

            

        }

    ?>

</body>
</html>