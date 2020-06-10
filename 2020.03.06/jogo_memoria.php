<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
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
            var contador=0, x, y, xID, yID;
            function escolha(letra){
                contador++;

                if(contador%2==0){
                    y = document.getElementById(letra).innerHTML;
                    yID = letra;
                    if(x==y){
                        document.getElementById(xID).style.color = "black";
                        document.getElementById(yID).style.color = "black";
                    }else{
                        document.getElementById(xID).style.color = "white";
                        document.getElementById(yID).style.color = "white";
                    }
                }else{
                    x = document.getElementById(letra).innerHTML;
                    xID = letra;
                    document.getElementById(xID).style.color = "green";
                }

            }

        </script>
    </head>
    <body>
    <?php
    $alfabeto = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z");


    $i=0;

    $vetor_escolha = array();

    while($i<20){
        $r = rand(0,25);
        if(!in_array($r,$vetor_escolha)){
            $vetor_escolha[$i] = $r;
            $i++;
        }
    }

    echo "<table border='1'>
            <tr>";



            for($j=0;$j<20;$j++){
               //abaixo linha que pode alterar o onclick
               echo "<td onclick='escolha(this.id)' id='".$alfabeto[$vetor_escolha[$j]]."1'>".$alfabeto[$vetor_escolha[$j]]."</td>";
            }
            echo "</tr>";

            while($vetor_escolha!=null){
                $r = rand(0,19);
                $entrou=0;
                foreach($vetor_escolha as $i=>$v){
                    if($r==$i){
                        //abaixo linha que pode alterar o onclick
                        echo "<td  onclick='escolha(this.id)' id='".$alfabeto[$vetor_escolha[$i]]."2'>".$alfabeto[$vetor_escolha[$i]]."</td>";
                        $entrou=1;
                        break;

                    }

                }
                if($entrou)
                    unset($vetor_escolha[$i]);
            }

        echo "</tr>
          </table>";
    ?>
    </body>
</html>