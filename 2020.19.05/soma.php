<!DOCTYPE html>

<html lang = "pt-Br">
	<head>
		<meta charset = "UTF-8"/>
		<title> Soma </title>
		<style>input{ width:100px; text-align:center;} </style>
		<script>
			function somar()
			{
				num1 = document.getElementById('num1').value;
				num2 = document.getElementById('num2').value;
				if( (num1 != '') && (num2 != '') )
				{
					document.getElementById('result').value = parseInt(num1) + parseInt(num2);
					return;
				}
			}
		</script>
	</head>
	<body>
		<h2><u>Soma</u></h2>
		<form name = "form">
			<input type = "number" name = "num1" id = "num1" placeholder = "Nº1"/>
				+
			<input type = "number" name = "num2" id = "num2" placeholder = "Nº2"/>
				=
			<input type = "number" name = "result" id = "result" readonly="readonly" value='' placeholder = "Resultado"/>
		
			<p>
				<button type = "button" onclick="somar(document.form.num1.value, document.form.num2.value)">Somar</button>
				<button type = "reset">Limpar</button>
			</p>
		</form>
	</body>
</html>