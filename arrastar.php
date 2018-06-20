<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		
	.column{

		width:150px;
		height: 150px;
		float: left;
		border:2px solid #666666;
		background-color: #ccc;
		margin-right: 5px;
		border-radius: 10px;
		box-shadow: inset 0 0 3px #000;
		text-align: center;
		cursor: move;
	}

	.column header{
		color: #fff;
		text-shadow: #000 0 1px;
		box-shadow: 5px;
		padding: 5px;
		border-bottom: 1px solid #ddd;
	}

	#p1{
		border:2px solid #bbb;
		width: 50px;
		margin: 30px;
		padding: 10px;
	}

	#p2{
		border:2px solid #bbb;
		width: 50px;
		margin: 30px;
		padding: 10px;
	}


	</style>
</head>
<body>

	<div id="columns">
		<div class="column" draggable="true" id='imagem' ondragstart="dragstar_handler(event)"><img src="img/logo.png" width="150px"></div>
		<div class="column" draggable="true" id="imagem2"></div>
		<div class="column" draggable="true" id="imagem3"></div>


	</div>
	<div class="mozilla">
		<div id="p1" draggable='true' ondragstart="dragstar_handler(event)">Este elemento é arrastavel</div>
		<div id="p2" ondrop="drop_handler(event)" ondragover="dragover_handler(event)";>Zona de soltura</div>
		<div>
			<img src="img/logo.png">
		</div>
		
		
	</div>

	<script type="text/javascript">
		
		function dragstar_handler(ev){
			console.log("dragstart");
			ev.dataTransfer.setData("text/plain", ev.target.id);
			ev.dropEffect = 'move';
			//ev.dataTransfer.setData("text/html", "<p>Paragrafo de exemplo</p>");


		}

		function dragover_handler(ev) {
			ev.preventDefault();
			 // Define o dropEffect para ser do tipo move
			 ev.dataTransfer.dropEffect = "move"
		}

		function drop_handler(ev){
			
			var data = ev.dataTransfer.getData('text');
			ev.target.appendChild(document.getElementById(data));
		}

		

	</script>



</body>
</html>