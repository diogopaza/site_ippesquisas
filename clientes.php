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
    <script type="text/javascript" src="antigos/js/materialize.min.js"></script>
    <script>
        new WOW().init();
    </script>

  
</head>
<body>



	<header class="container-fluid ">
<div class="navbar-fixed ">
 <nav class="white" role="navigation">
    
      <div class="nav-wrapper">
         <a id="logo-container" href="index.php" class="brand-logo center hide-on-med-and-down ">UP Pesquisas & Publicidade</a>
         <a id="logo-container" href="index.php" class="brand-logo center hide-on-large-only">UPPesquisas</a>
     
    </div>


 </nav>
      </div>
     
 
</header>

    <main>
       

        <div class="carousel carousel-slider">
                  <a class="carousel-item" href="#one!"><img src="img/logo.png"></a>
                  <a class="carousel-item" href="#two!"><img src="img/logo.png"></a>
                  dasdasdasdasdsa
             </div>






         <div class="container"> 
          <div class="row section no-space-row">
          
             <div id="conteudo">
                
                 <?php
                   
                    $result = $conn->query("SELECT * FROM estados");
                    foreach ($result as $row) {
                        echo "
                            <div class='col  m6 s12'>
                                <div class='card hoverable wow bounceInLeft' data-wow-delay='1s'>
                                    <div class='card-image'>
                           
                                        <img src='".$row['bandeira_estado']."' class='imagem-card'>"."
                                        
                                       
                                    
                                    </div>
                                <div class='card-title '>
                                <a  href='javascript:void(0);' class='card-title linkEstados' onclick='retornarCidades(this)' id='".$row['id']."'><h4>".$row['nome_estado']."</h4></a>
                                
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
    

    function retornarCidades(elemento){
        console.log('id do estado'+elemento.id)
        if(window.XMLHttpRequest){
           xmlhttp = new XMLHttpRequest();
        }
        xmlhttp.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
               
               
                document.getElementById('conteudo').innerHTML = this.responseText;
                

            }
        }

         xmlhttp.open("GET","cidades.php?q="+elemento.id,true);
         xmlhttp.send();

    }

    function retornarClientes(elemento){
      console.log('id da cidade: '+elemento.id)
      if(window.XMLHttpRequest){
           xmlhttp = new XMLHttpRequest();
        }
      xmlhttp.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
               
               
                document.getElementById('conteudo').innerHTML = this.responseText;
               

            }
        }

         xmlhttp.open("GET","retornarClientes.php?q="+elemento.id,true);
         xmlhttp.send();

      


   } 


   function retornarClientesFinal(elemento){
     
    console.log('id do cliente: '+elemento.id)
      if(window.XMLHttpRequest){
           xmlhttpFinal = new XMLHttpRequest();
        }
      xmlhttpFinal.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                
               
                document.getElementById('conteudo').innerHTML = this.responseText;
                
            }
        }

         xmlhttpFinal.open("GET","retornaClientesFinal.php?q="+elemento.id,true);
         xmlhttpFinal.send();

      



   } 



  



  
 
 

    
 
   
</script>

</body>