<!DOCTYPE html>
<html>
<head>
    <title>Desconto para funcionários</title>
</head>
<body>
    <?php
    $produto1 = 145.65;
    $margemdeVenda = 1.65;
    $produtofinal  = $produto1 * $margemdeVenda;
    $operador = "Caixa";
    $numeroAleatorio = rand(6, 12);


//C:\wamp64\www\Wesley

    switch($operador){
        case "Caixa":
            {
                echo "Desconto para Caixa = "; 
                echo ($produtofinal - $produto1 ) *0.5;
                break;
            }        
       
        case "Supervisor":
            {
                echo $numeroAleatorio;
                echo "Desconto para Supervisor = "; 
                $numeroAleatorio = rand(6, 12);
                $numeroAleatorio = $numeroAleatorio / 10;
                echo ($produtofinal - $produto1 ) *$numeroAleatorio;
                 break;

            } 
        case "Gerente":
            {
                echo "Desconto para Gerente = ";
                echo ($produtofinal - $produto1 ) *0.5;
                break;
                $numeroAleatorio = rand(15, 18);
                $numeroAleatorio = $numeroAleatorio / 10;
                echo ($produtofinal - $produto1 ) *$numeroAleatorio;
                 break;
            } 

    }
    ?>
</body>
</html>
