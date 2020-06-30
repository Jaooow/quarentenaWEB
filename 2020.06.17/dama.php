<!DOCTYPE html>

<html lang = "pt-Br">
	<head>
		<meta charset = "UTF-8"/>
		<title>Jogo | Dama</title>
		<style>
			.branco{
				background-color:white;
				width:80px;
				height:80px;
			}
			.preto{
				background-color:lightgray;
				width:80px;
				height:80px;
			}
			
			.dot_branco{
			  height: 25px;
			  width: 25px;
			  background-color: red;
			  border-radius: 50%;
			  display: inline-block;
			}
			
			.dot_preta{
			  height: 25px;
			  width: 25px;
			  background-color: black;
			  border-radius: 50%;
			  display: inline-block;
			}
			
			td{
				text-align:center;
				border:1px solid black;
			}
		</style>
		<script>

			var jogada='b';
			var id_jogada;

			function verificaposicao(nopai, cor){
				if(jogada==cor){
					id_jogada = nopai.id;
				
				apaga();
				
				linha = nopai.id[3];
				coluna = nopai.id[4];
				
				if(cor == 'b'){
					diagonal_esquerda = ((parseInt(linha)+1) +''+ (parseInt(coluna)-1));
					diagonal_direita = ((parseInt(linha)+1) +''+ (parseInt(coluna)+1));

				}else{
					diagonal_esquerda = ((parseInt(linha)-1) +''+ (parseInt(coluna)-1));
					diagonal_direita = ((parseInt(linha)-1) +''+ (parseInt(coluna)+1));
				}	
				
					if(document.getElementById("dot"+diagonal_esquerda) != null){
						if(document.getElementById("dot"+diagonal_esquerda).innerHTML == ''){
							document.getElementById("dot"+diagonal_esquerda).style.borderColor = 'green';
							document.getElementById("dot"+diagonal_esquerda).style.backgroundColor = 'lightgreen';
						}
					}
					if(document.getElementById("dot"+diagonal_direita) != null){
						if(document.getElementById("dot"+diagonal_direita).innerHTML == ''){
							document.getElementById("dot"+diagonal_direita).style.borderColor = 'green';
							document.getElementById("dot"+diagonal_direita).style.backgroundColor = 'lightgreen';
						}else{

							peca=document.getElementById("dot"+diagonal_direita).innerHTML[17];
							
							if((cor=='b' && peca=='p') || (cor=='p' && peca=='b')){
								
								if(cor == 'b'){
									diagonal_direita_comer = ((parseInt(linha)+2) +''+ (parseInt(coluna)+2));
								}else{
									diagonal_direita_comer = ((parseInt(linha)-2) +''+ (parseInt(coluna)+2));
								}

								console.log(diagonal_direita_comer);

								if(document.getElementById("dot"+diagonal_direita_comer) != null){
									if(document.getElementById("dot"+diagonal_direita_comer).innerHTML == ''){
										document.getElementById("dot"+diagonal_direita_comer).style.borderColor = 'green';
										document.getElementById("dot"+diagonal_direita_comer).style.backgroundColor = 'lightgreen';
									}
								}

							}
						}
					}
					


				}else{
					alert("Não é sua vez");
				}
				
					
			}
			
			function verificajogada(celula){
				if(celula.style.backgroundColor=='lightgreen'){
					celula.innerHTML=document.getElementById(id_jogada).innerHTML;
					document.getElementById(id_jogada).innerHTML='';
					apaga();
					if(jogada=='b'){
						jogada='p';
					}else{
						jogada='b';
					}
				}
			}

			function apaga(){
				td = document.getElementsByClassName('preto');
				
				for(i=0;i<td.length;i++){
					td[i].style.borderColor = 'black';
					td[i].style.borderWidth = '1px';
					td[i].style.backgroundColor = 'lightgray';
				}
			}
					
		</script>
	</head>
	<body>
		<table border = "1">
		<legend>Jogo da Dama</legend>
			<?php 
				for($i=0;$i<8;$i++){
					echo'<tr>';
					for($j=0;$j<8;$j++){
						
							if(($i%2==$j%2)){
								echo '<td class="branco" id = "dot'.$i.$j.'">';
							}
							else{
								echo '<td class="preto" onclick="verificajogada(this)" id = "dot'.$i.$j.'">';
								if(($i) < 3)
								{
									echo'<span class="dot_branco" onclick="verificaposicao(this.parentNode, \'b\')"></span>';
								}
								elseif($i >= 5){
									echo'<span class="dot_preta" onclick="verificaposicao(this.parentNode, \'p\')"></span>';
								}
							}
						echo'</td>';
					}
					echo'</tr>';
				}
			?>
		</table>
	</body>
<html>