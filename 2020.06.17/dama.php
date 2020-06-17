<!DOCTYPE html>

<html lang = "pt-Br">
	<head>
		<meta charset = "UTF-8"/>
		<title>Jogo | Dama</title>
		<style>
			.branco{
				background-color:white;
				width:50px;
				height:50px;
			}
			.preto{
				background-color:lightgray;
				width:50px;
				height:50px;
			}
			
			.dot_white{
			  height: 25px;
			  width: 25px;
			  background-color: red;
			  border-radius: 50%;
			  display: inline-block;
			}
			
			.dot_black{
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
	</head>
	<body>
		<table border = "1">
			<?php 
				for($i=0;$i<8;$i++){
					echo'<tr>';
					for($j=0;$j<8;$j++){
						
							if(($i%2==$j%2)){
								echo '<td class="branco" id = "dot'.$i.$j.'">'.$i.$j;
							}
							else{
								echo '<td class="preto" id = "dot'.$i.$j.'">'.$i.$j;
								if(($i) < 3)
								{
									echo'<span class="dot_white"></span>';
								}
								elseif($i >= 5){
									echo'<span class="dot_black"></span>';
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