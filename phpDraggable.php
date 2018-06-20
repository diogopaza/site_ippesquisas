<!DOCTYPE html>
<html>
<head>
	<title>HTML5 API: Drag and Drop</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<ul>
		<li><img src="1.jpg" id="dragElement" ondragstart="dragStart(event)"></li>
		<li><img src="2.jpg" id="dragElement2" draggable="true"  ondragstart="dragStart(event)"></li>
		<li><img src="3.jpg"></li>
		<li><img src="4.jpg"></li>
		<li><img src="5.jpg"></li>
	</ul>

	<div id="dropLocation" ondragover="over(event)" ondrop="drop(event)"></div>

		<script type="text/javascript">
			var over = function(evt){
				console.log('sobre');
				//evt.dataTransfer.setData('key',evt.target.id);
				evt.preventDefault();
				//console.log(evt.dataTransfer.getData('key'))
				
			}

			var drop = (evt) => {

				var myItem =  evt.dataTransfer.getData( 'key' ) ;
				console.log("myItem: " + myItem);
				var myItemImg = document.getElementById(myItem);
				console.log(myItemImg)
				var myNewItem = document.createElement('img');
					myNewItem.src = myItemImg.src;
					console.log(myNewItem);

			}

		
			var dragStart = (evt) => {
				console.log('arrastando');
				evt.dataTransfer.setData('key',evt.target.id);
				
			}

		</script>

</body>
</html>