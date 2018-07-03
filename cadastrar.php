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
   


   
   gravarCliente();  
   
  

}


    


    

?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8">
    <style type="text/css">
        
        img {
        height: 75px;
        border: 1px solid #000;
        margin: 10px 15px 0 0 ;

        }

        ul{

            list-style-type: none;

        }






        li{
            display: inline;
        }


        .formEstados {
            border:solid 1px black; 
            width: 50%;
            margin: 25px auto;
        }

        .divClientes{
            border:solid 1px black; 
            width: 50%;
            margin: 25px auto;
            
        }
        .divClientesDentro{

            margin: 10px auto;
            width: 50%;
        }


        #formCidades{
            border: solid 1px black;
            width: 50%;
            margin: 25px auto;
        }

        #estiloClientes{
            border: solid 1px black;
            width: 50%;
            margin: 25px auto;
        }

        .imgTeste{
        width: 75px;
        height: 75px;
        border: 1px solid #000;
       
        }

        #spanPrincipal{
           
        }



</style>
</head>
<body>

    <form enctype="multipart/form-data" action="cadastrar2.php" method="POST" class="formEstados">
        <div class="formEstados">
             <h3>Cadastrar Estado</h3>
        <div>
            <input type="file" name="image" multiple >
        </div>
        <div>
            <input name="nomeEstado" type="text" placeholder="Digite o nome do estado" required></input>
        </div>


        <div>
            <input type="submit" name="uploadEstados" value="Upload Image" />
        </div>
        <div>
            <a href="percorrer.php">Listar cursos</a>
        </div>
 

        </div>
       


</form>


    <form enctype="multipart/form-data" action="cadastrar2.php" method="POST" >
        <div id="formCidades">
            <h3>Cadastrar Cidade</h3>
                    <div>
                        <input type="file" name="image" multiple >
                    </div>
                    <div>
                        <input name="nome_cidade" type="text" placeholder="Digite o nome da cidade" required>
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
 <form enctype="multipart/form-data" action="" method="post" id=formClientes>
<div class="divClientes">
    <div class="divClientesDentro">
         <h3>Cadastrar Cliente</h3>
           
           
            </div>
                    <div>
                        <input type="file" name="imagePrincipal"  id="inputImagePrincipal">
                        <span id='spanPrincipal'></span>
                    </div>
                    <div>
                        <input type="file" name="image[]" multiple id="inputImage">
                         <div>
                            <ul id="listaImg"></ul>  
                         </div>          
                    </div>
                    <div>
                        <input id='nome_cliente' name="nome_cliente" type="text" placeholder="Digite o nome do cliente" required>
                    </div>
                     <div>
                        <input id='telefone_cliente' name="telefone_cliente" type="text" required placeholder="Digite o telefone do  cliente">
                    </div>
                     <div>
                        <input id='categoria_cliente' name="categoria_cliente" type="text" required placeholder="Digite a categoria ">
                    </div>
                    <div>
                        <textarea rows="10" cols="6" name="text_descricao" required id="textarea_cliente"></textarea>
                    </div>
                     
                     
                     <div id="selectCidades">
                       
                    </div>
            
                    
                    <div id='divteste'>
                       <button>Gravar</button>

                    </div>

    </div>
    

</div>
      
</form>         
                    

        




<script type="text/javascript">

    var imgPrincipal;
    var cont = 0;
    var files;
    var meucontador = 0;
    var myIdBackup='';

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


       
        function drag(evt){
           

            
            
            evt.dataTransfer.setData('text',evt.target.id);
            
            evt.dataTransfer.setData('name',evt.target.name);
            console.log(evt.target.name)
            
            
        }

        function over(evt){
            evt.preventDefault();
            
        }

     


       
      

       function drop(evt){
            
            name = evt.dataTransfer.getData('name')
            data = evt.dataTransfer.getData('text')
            myElement = document.getElementById(data)
           
            
            
            minhaImg = evt.target.id;
            minhaImgId = document.getElementById(minhaImg)
            
            
            copiaImg = minhaImgId.src;
            minhaImgId.src = myElement.src
            myElement.src = copiaImg
            
            copiaName = minhaImgId.name
            minhaImgId.name = name
            myElement.name = copiaName

            console.log(minhaImgId.name)
            
            imgPrincipal =   name
            //console.log(imgPrincipal)
            
             

          
            

         }

            
           
           
    


       
         myFiles = ''
     
   
    function retornaImagensPrincipal(evt){
        files = evt.target.files
        reader = new FileReader()
        console.log(files)

        
        reader.onload = (evt) =>{
                    
                    dataURL = evt.target.result 

                    console.log(myFiles)
                    novaImg = document.createElement('img')
                    novaImg.src = dataURL
                     document.getElementById('spanPrincipal').appendChild(novaImg)   
                   
                    }

                    reader.readAsDataURL( files[0] )

        
        
       
    }




    function retornaImagens(evt){
        
        cont = 0
       
        files = evt.target.files
       
          
        if( files.length > 0){

        document.getElementById('listaImg').innerHTML = ""
        
       

        



        for (var i = 0; i <  files.length; i++) {
                
                   
                    
                if(cont == 0){

                    reader = new FileReader()
                   
                    //reader._NAME = files[cont].name;
                    //console.log('files: ' + files[cont].name)

                reader.onload = (evt) =>{
                    
                    dataURL = evt.target.result    
                    console.log(evt.target.result)    
                    lista  = document.createElement("li")            
                    imagem = document.createElement( "img" )
                    imagem.setAttribute("class","img")
                    imagem.setAttribute("name", files[cont].name)
                    
                    imagem.setAttribute("draggable",'true')
                    imagem.setAttribute("ondragstart",'drag(event)' )
                    imagem.setAttribute("ondragover",'over(event)' )
                    imagem.setAttribute("ondrop",'drop(event)' )           
                    imagem.src = dataURL
                    imagem.id = cont
                   console.log(imagem)
                    lista.appendChild(imagem)
                    listaImg.appendChild(lista)
                    cont++
                    }
                 } else{

                    reader = new FileReader()
                   
                    

                reader.onload = (evt) =>{

                    dataURL = evt.target.result        
                    lista  = document.createElement("li")            
                    imagemx = document.createElement( "img" )
                    imagemx.setAttribute("class","img")
                    imagemx.setAttribute("name", files[cont].name)
                    
                    imagemx.setAttribute("draggable",'true')
                    imagemx.setAttribute("ondragstart",'drag(event)' )
                    imagemx.setAttribute("ondragover",'over(event)' )
                    imagemx.setAttribute("ondrop",'drop(event)' )           
                    imagemx.src = dataURL
                    imagemx.id = cont
                    
                    lista.appendChild(imagem)
                    listaImg.appendChild(lista)

                    cont++


                }                
                   
                   
             }   
                reader.readAsDataURL( files[i] )


         }          
     
        }   
    }

      
        
      





    



    xmlhttpEstados.open("GET","retornarEstados.php",true);
    xmlhttpEstados.send();
    xmlhttpCidades.open("GET","retornaCidades.php",true);
    xmlhttpCidades.send();

    var request = new XMLHttpRequest()
    meuForm = document.querySelector('#formClientes');
    meuForm.addEventListener('submit', function( e ){
        
        e.preventDefault();
        console.log(imgPrincipal)
       var formData = new FormData(meuForm);
       formData.append('img', imgPrincipal);
       request.open('post',"gravaCliente.php", true)
       request.send(formData)

        document.getElementById('nome_cliente').value = '';
        document.getElementById('telefone_cliente').value = '';
        document.getElementById('categoria_cliente').value = '';
        document.getElementById('textarea_cliente').value = '';
        document.getElementById('select_cidades').value = '';
        document.getElementById('inputImage').value = '';
        document.getElementById('listaImg').innerHTML = '';
      
       
       
       
     
    })

     document.getElementById('inputImagePrincipal').addEventListener('change', retornaImagensPrincipal);
    document.getElementById('inputImage').addEventListener('change', retornaImagens);


    
   
    
   

    

</script>

</body>
</html>

