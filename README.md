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
  		//o metódo fetch pode receber como parâmetro um objeto de configuração. É nele onde indicamos o método da requisição,
  		cabeçalho, corpo, etc
  		// No body o fetch está enviando os dados do formulário para o servidor e este irá tratar estes dados recebidos via POST.
         fetch('logar.php', {
         	method: 'POST',
         	headers: {'Content-Type':'application/x-www-form-urlencoded'}, 
      		body: 'user=' + usuario + '&password=' + senha

         	})
        .then( response => response.text())
        .then(data =>{
          console.log(data)
        })

    })  
</p>

