<h2>Site desenvolvido para a empresa de venda de certificados UPPesquisas</h2>
<a href="http://www.uppesquisas.com.br" target="_blank">Site UPPesquisas</a>

<h4>Alguns recursos utilizados</h4>

<h5>FETCH Javascript</h5>

<strong>Exemplo de uso do fetch:</strong><br>
<p>
	O fetch será usado para acessar logar.php este retornara o resultado
	da pesquisa de usuário e senha do banco de dados, longando ou não o usuário<br>

	
	//busca o elemento button através do seu ID
	logar = document.getElementById('btnLogar')

    //metódo assíncrono do Javascript, que fica escutando o botão e quando o botão é clicado
    retorna uma função com que usa o fetch

  	logar.addEventListener('click',function(){
       
  		//abre arquivo logar.php e usa promisses para obter o retorno dos dados

         fetch('logar.php')
        .then( response => response.text())
        .then(data =>{
          console.log(data)
        })

    })  
</p>

