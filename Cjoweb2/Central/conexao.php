<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "banco_web2";

// Criar conexão
$conexao = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conexao->connect_error) {
    die("Conexão falhou: " . $conexao->connect_error);
}
else
{
	echo "<br>Conexão bem-sucedida<br>";
}

?>
