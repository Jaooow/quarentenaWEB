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
			
			.dot_branco, .dot_branca_dama{
			  height: 25px;
			  width: 25px;
			  background-color: red;
			  border-radius: 50%;
			  display: inline-block;
			}
			
			.dot_preta, .dot_preta_dama{
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
			.dot_preta_dama{
				height: 40px;
			  	width: 40px;
			}
			.dot_branca_dama{
				height: 40px;
			  	width: 40px;
			}


		</style>
		<script>

			var jogada='b';
			var id_jogada;
			var ponto_branco=0;
			var ponto_preto=0;

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
						}else{

							peca=document.getElementById("dot"+diagonal_esquerda).innerHTML[17];

							if((cor=='b' && peca=='p') || (cor=='p' && peca=='b')){
								
								if(cor == 'b'){
									diagonal_esquerda_comer = ((parseInt(linha)+2) +''+ (parseInt(coluna)-2));
								}else{
									diagonal_esquerda_comer = ((parseInt(linha)-2) +''+ (parseInt(coluna)-2));
								}

								if(document.getElementById("dot"+diagonal_esquerda_comer) != null){
									if(document.getElementById("dot"+diagonal_esquerda_comer).innerHTML == ''){
										document.getElementById("dot"+diagonal_esquerda_comer).style.borderColor = 'green';
										document.getElementById("dot"+diagonal_esquerda_comer).style.backgroundColor = 'lightgreen';
									}
								}
							}
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
									diagonal_esquerda_comer = ((parseInt(linha)+2) +''+ (parseInt(coluna)-2));
								}else{
									diagonal_direita_comer = ((parseInt(linha)-2) +''+ (parseInt(coluna)+2));
									diagonal_esquerda_comer = ((parseInt(linha)-2) +''+ (parseInt(coluna)-2));
								}


								if(document.getElementById("dot"+diagonal_direita_comer) != null){
									if(document.getElementById("dot"+diagonal_direita_comer).innerHTML == ''){
										document.getElementById("dot"+diagonal_direita_comer).style.borderColor = 'green';
										document.getElementById("dot"+diagonal_direita_comer).style.backgroundColor = 'lightgreen';
									}
								}

								if(document.getElementById("dot"+diagonal_esquerda_comer) != null){
									if(document.getElementById("dot"+diagonal_esquerda_comer).innerHTML == ''){
										document.getElementById("dot"+diagonal_esquerda_comer).style.borderColor = 'green';
										document.getElementById("dot"+diagonal_esquerda_comer).style.backgroundColor = 'lightgreen';
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
					var linha_celula=parseInt(celula.id[3]);
					var coluna_celula=parseInt(celula.id[4]);
					var linha_jogada=parseInt(id_jogada[3]);
					var coluna_jogada=parseInt(id_jogada[4]);
					celula.innerHTML=document.getElementById(id_jogada).innerHTML;
					document.getElementById(id_jogada).innerHTML='';

					if(linha_celula-linha_jogada==2 || linha_celula-linha_jogada==-2 ){
						if(linha_celula-linha_jogada==2){
							linha_remover=linha_jogada+1;
							ponto_branco++;
							document.getElementById("ponto_branco").innerHTML="Pontuação Branco: "+ponto_branco;
							if(ponto_branco==12){
								alert("Branco Ganhou!");
								location.reload();
							}
						}else{
							linha_remover=linha_jogada-1;
							ponto_preto++;
							document.getElementById("ponto_preto").innerHTML="Pontuação Preto: "+ponto_preto;
							if(ponto_preto==12){
								alert("Preto Ganhou!");
								location.reload();
							}
						}
						coluna_remover=(coluna_celula+coluna_jogada)/2;
						id_remover="dot"+linha_remover+coluna_remover;
						console.log(id_remover);
						document.getElementById(id_remover).innerHTML='';
					}
					apaga();

					
					if(jogada=='p' && linha_celula==0){
						celula.innerHTML='<span class="dot_preta_dama" onclick="verificaposicao(this.parentNode, \'p\')"></span>';
					}else if(jogada=='b'&& linha_celula==7){
						celula.innerHTML='<span class="dot_branca_dama" onclick="verificaposicao(this.parentNode, \'b\')"></span>';
					}

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
		<div id="ponto_branco">Pontuação Branco: 0</div>
		<div id="ponto_preto">Pontuação Preto: 0</div>
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