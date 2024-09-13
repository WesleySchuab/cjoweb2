<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "banco_dw2";

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

/*
INSERT INTO `banco_dw2`.`clientes`
(`codigo`,   `nome_completo`, `dt_nasc`, `email`,  `telefone`) VALUES
('codigo',   'nome_completo', 'dt_nasc', 'email' , 'telefone');
*/

$sql = "INSERT INTO clientes 
( codigo,      nome_completo,     dt_nasc,      email,              telefone) VALUES 
('ABCD-1234', 'Ricardo Alsoa',   '1977-08-15', 'ricardo@acme.com', '12991747581')";

    if (mysqli_query($conexao, $sql)) {
        echo "Cadastro realizado com sucesso!";
        //header("Location: clientes_listar.php");
    } else {
        echo "Erro: " . $sql . "<br>" . mysqli_error($conexao);
    }



?>
