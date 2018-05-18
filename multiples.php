


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
            $conexao = new PDO("mysql:host=localhost;dbname=site_up;charset=utf8", "root", ""); 
          
           

        }
        catch(PDOException $e)
            {
                echo "Conexão falhou: " . $e->getMessage();
            }
        if(isset($_POST['submit'])){
           /*
            $filename= $_FILES['img']['name'];
            $tmpname=$_FILES['img']['tmp_name'];
            $filetype = $_FILES['img']['type'];
            $name = addslashes($filename);
            $tmp = addslashes(file_get_contents($tmpname));
            $stmt = $conexao->prepare("INSERT INTO imagem(name,image) VALUES(:name, :image)");
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':image',$tmp);           
            $stmt->execute();
            echo "Último id inserido: ".$conexao->lastInsertId();
            */

            $filename= $_FILES['img']['name'];
            $tmpname=$_FILES['img']['tmp_name'];
            $local = 'images/'.$filename;
            
            
     
             if(move_uploaded_file($tmpname, $local)){
                        
                    try{
                        $stmt = $conexao->prepare("INSERT INTO img(id,local_img) VALUES(:local)");
                        $stmt->bindParam(':id', $id);
                        $stmt->bindParam(':local', $local);
                       
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
               
                    

?>

     <div>
            <?php
                    $sqlSelect = "SELECT * FROM img";
                    $stmt2 = $conexao->query($sqlSelect);

                foreach ($stmt2 as $row ) {
                 echo"
                  <img src='".$row['local_img']."' width='250px'>";  
                    
                }
            ?>
        </div>            



</body>

        

</html>

