<!DOCTYPE html>
<html>
<head>
    <title>Lendo Números com Vírgula</title>
</head>
<body>
    <form method="post">
        <label for="numero">Digite um número:</label>
        <input type="text" name="numero" id="numero">
        <input type="submit" value="Enviar">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $numeroComVirgula = $_POST['numero'];
        setlocale(LC_NUMERIC, 'pt_BR');
        $numero = floatval($numeroComVirgula);
        echo "O número digitado foi: " . number_format($numero, 2, ',', '.');
        //$numero = 6;
        echo "numero $numero";
        function obter_produto($numero) {
            if ($numero >= 0 && $numero < 1.99) {
                echo "Reprovado\n";
            } elseif ($numero >= 2 && $numero <= 2.99) {
                echo "Reprovado";
            } elseif ($numero >= 3 && $numero <= 4.99) {
                echo "Recuperação";
            } elseif ($numero >= 5 && $numero <= 6.99) {
                echo "Aprovado";
            } elseif ($numero >= 7 && $numero <= 8.99) {
                echo "Aprovado";
            } elseif ($numero >= 9 && $numero <= 10) {
                echo "Aprovado";
            } else {
                echo "Opção Inválida";
            }
        }
        function obter_conceito($numero) {
            if ($numero >= 0 && $numero < 1.99) {
                echo "F" . PHP_EOL;
            } elseif ($numero >= 2 && $numero <= 2.99) {
                echo "E". PHP_EOL;
            } elseif ($numero >= 3 && $numero <= 4.99) {
                echo "D". PHP_EOL;
            } elseif ($numero >= 5 && $numero <= 6.99) {
                echo "C". PHP_EOL;
            } elseif ($numero >= 7 && $numero <= 8.99) {
                echo "B". PHP_EOL;
            } elseif ($numero >= 9 && $numero <= 10) {
                echo "A". PHP_EOL;
            } else {
                echo "Opção Inválida";
            }
        }
         obter_conceito($numero) ;
         obter_produto($numero);
            
}
    ?>
</body>
</html>
