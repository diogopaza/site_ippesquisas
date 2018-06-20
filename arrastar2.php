<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		#destino{
			width: 300px;
			height: 300px;
			border:2px solid #666;

		}
		#destino2{
			width: 300px;
			height: 300px;
			border:2px solid #666;

		}

	</style>
</head>
<body>
<script type="text/javascript">
	
	function allowDrop(ev){

		
		if(document.getElementById('destino2') == true){
			ev.preventDefault();

		}else{

			ev.preventDefault();
			document.getElementById('paragrafo').innerHTML = 'escrevendo paragrafo';

		}
		


	}

	function drag(ev){
		
		ev.dataTransfer.setData("text",ev.target.id);
		
	}

	

	function drop(ev){

		var data = ev.dataTransfer.getData("Text");

	
		ev.target.appendChild(document.getElementById(data));
		ev.preventDefault();
	}

	function teste(){
		/*
		var addNo = document.getElementById('destino');
		var p = document.createElement('p');
		var texto = document.createTextNode('inserindo no paragrafo');
		p.appendChild(texto);
		addNo.appendChild(p);
		
		 guardar = document.getElementById('logo');
		 var clone = guardar.cloneNode(true);
		//document.getElementById('destino').innerHTML = "<img src='img/call-center.jpg' width='150px'>";
		document.getElementById('destino2').innerHTML = "";
		document.getElementById('destino2').appendChild(clone);
		*/



	}

</script>



<div id="destino" ondragover="allowDrop(event)" ondrop="drop(event)"><img id="logo" src="img/logo.png" width="150px" draggable="true" ondragstart="drag(event)" ></div>

<div id="destino2" ondragover="allowDrop(event)" ondrop="drop(event)"><img id="call-center" src="img/call-center.jpg" width="150px" draggable="true" ondragstart="drag(event)" ></div>

<button onclick="teste()">teste</button>
<p id="paragrafo"></p>





</body>
</html>