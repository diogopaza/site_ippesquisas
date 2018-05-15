<?php
  
  include ("conectar.php");  

  $conexaoDB = new Conectar();
  $conn = $conexaoDB->conectarDB();


?>

<!DOCTYPE html>
<html>
<head>
	<title>
			
	</title>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="stylesheet" type="text/css" href="antigos/css/materialize.min.css">
	
	<link rel="stylesheet" type="text/css" href="antigos/css/estilos.css">
  <link rel="stylesheet" href="antigos/css/animate.min.css">
  <script type="text/javascript" src="antigos/js/jquery-3.3.1.min.js"></script>
  <script type="text/javascript" src="antigos/js/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>

  
</head>
<body>

	<header class="container-fluid ">
 <nav class="white" role="navigation">
    <div class="nav-fixed container">
      <a id="logo-container" href="index.html" class="brand-logo">UP Pesquisas & Publicidade</a>
      <ul class="right hide-on-med-and-down">
        <li><a href="clientes.html">Clientes</a></li>
        <li><a href="#">Contato</a></li>
      </ul>

      <ul id="nav-mobile" class="sidenav">
        <li><a href="clientes.html">Clientes</a></li>
      </ul>
      <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
  </nav>
</header>

    <main>
        <h5>Clientes</h5>
         <div class="container"> 
          <div class="row section no-space-row">
          
             <div id="conteudo">
                 <?php
                   
                    $result = $conn->query("SELECT * FROM estados");
                    foreach ($result as $row) {
                        echo "
                            <div class='col  m4 s12'>
                                <div class='card hoverable wow bounceInLeft' data-wow-delay='1s'>
                                    <div class='card-image'>
                           
                                        <img src='".$row['bandeira_estado']."' class='imagem-card'>"."
                                        
                                       
                                    
                                    </div>
                                <div class='card-action wow '>
                                <a href='#' class='card-title linkEstados' onclick='teste(this)' id='".$row['id']."'>".$row['nome_estado']."</a>
                                
                            </div>
                            
                        </div>
                        
                    </div>




                    ";    
                }

               ?>


             </div>  
                 

         
      
          

            
               
        </div>
    </div>

    </main>
<script type="text/javascript">
    

    function teste(elemento){
        console.log(elemento.id);
        if(window.XMLHttpRequest){
           xmlhttp = new XMLHttpRequest();
        }
        xmlhttp.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                console.log('status ok');
               
                document.getElementById('conteudo').innerHTML = this.responseText;
                console.log('executei innerHTML');

            }
        }

         xmlhttp.open("POST","cidades.php",true);
         xmlhttp.send();

    }
 
 
   
</script>

</body>