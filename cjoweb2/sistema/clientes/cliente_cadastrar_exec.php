<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);



/*
$codigo        = $_POST['codigo'];
$nome_completo = $_POST['nome_completo'];
$dt_nasc       = $_POST['dt_nasc'];
$email         = $_POST['email'];
$telefone      = $_POST['telefone'];


echo "<br>Código do Cliente: $codigo<br>";
echo "<br>Nome Completo: $nome_completo<br>";
echo "<br>Dt. Nasc.: $dt_nasc<br>";
echo "<br>Email: $email<br>";
echo "<br>Telefone (zap): $telefone<br>";
*/

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include('conexao.php');    // Receber os dados do formulário
    $codigo = $_POST['codigo'];
    $nome_completo = $_POST['nome_completo'];
    $dt_nasc = $_POST['dt_nasc'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];

    // Criar a consulta SQL para inserir os dados na tabela clientes
    $sql = "INSERT INTO clientes 
    ( codigo,    nome_completo,    dt_nasc,    email, telefone) VALUES 
    ('$codigo', '$nome_completo', '$dt_nasc', '$email', '$telefone')";

    // Executar a consulta e verificar se foi bem-sucedida
    if (mysqli_query($conexao, $sql)) {
        //echo "Cadastro realizado com sucesso!";
        header("Location: clientes_listar.php");
    } else {
        echo "Erro: " . $sql . "<br>" . mysqli_error($conn);
    }
    

    // Fechar a conexão
    mysqli_close($conexao);
}
?>
