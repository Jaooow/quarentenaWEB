<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Jogo 21</title>
		<style>
			body{
				text-align:center;
			}
			table{
				margin:30px;
				font-size:16px;
				font-weight:bold;
				font-family:arial;
			}
			td{
				padding:20px;
				text-align:center;
				color:white;
			}
		</style>

		<script>
				var sequencia_de_cartas = [];
				var jogador=0, mao1=0, mao2=0;
				var cartas = ["img/2_copas.png", "img/3_copas.png","img/4_copas.png","img/5_copas.png","img/6_copas.png","img/7_copas.png","img/8_copas.png","img/9_copas.png","img/10_copas.png", "img/A_copas.png", "img/J_copas.png", "img/Q_copas.png", "img/K_copas.png",
							"img/2_espada.png", "img/3_espada.png","img/4_espada.png","img/5_espada.png","img/6_espada.png","img/7_espada.png","img/8_espada.png","img/9_espada.png","img/10_espada.png", "img/A_espada.png", "img/J_espada.png", "img/Q_espada.png", "img/K_espada.png",
							"img/2_ouro.png", "img/3_ouro.png","img/4_ouro.png","img/5_ouro.png","img/6_ouro.png","img/7_ouro.png","img/8_ouro.png","img/9_ouro.png","img/10_ouro.png", "img/A_ouro.png", "img/J_ouro.png", "img/Q_ouro.png", "img/K_ouro.png",
							"img/2_paus.png", "img/3_paus.png","img/4_paus.png","img/5_paus.png","img/6_paus.png","img/7_paus.png","img/8_paus.png","img/9_paus.png","img/10_paus.png", "img/A_paus.png", "img/J_paus.png", "img/Q_paus.png", "img/K_paus.png"];
				var ncarta = [2,3,4,5,6,7,8,9,10,1,11,12,13,2,3,4,5,6,7,8,9,10,1,11,12,13,2,3,4,5,6,7,8,9,10,1,11,12,13,2,3,4,5,6,7,8,9,10,1,11,12,13,];
			function chamar_carta(){
				
				if(sequencia_de_cartas.length == 0){
					aleatorio();
				}
				
				if(jogador == 0)
				{
					mao1+= ncarta[sequencia_de_cartas[0]];
					document.getElementById("jogador1").innerHTML ='<img src ="' + cartas[sequencia_de_cartas[0]] + '">';
					sequencia_de_cartas.shift();
					
					jogador = 1;
					
					
				}
				else{
					mao2+= ncarta[sequencia_de_cartas[0]];
					document.getElementById("jogador2").innerHTML ='<img src ="' + cartas[sequencia_de_cartas[0]] + '">';
					sequencia_de_cartas.shift();
					
					jogador = 0;
					
				}
				
				
			}
			
			function aleatorio(){
				
				var i=0;
				while(i<52){
					r = Math.floor(Math.random() * 52);
					if(!sequencia_de_cartas.includes(r)){
						sequencia_de_cartas.push(r);
						i++;
					}
				}
			}
			
			
		</script>

	</head>
	<body>
		<input type = "button" value = "Enviar" onclick = "chamar_carta()"/>
		
		<div id = "jogador1">
		
		</div>
				
		<div id = "jogador2">
		
		</div>
	</body>
</html>