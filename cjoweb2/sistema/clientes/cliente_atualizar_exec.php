<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include('conexao.php');    // Receber os dados do formulário

    $codigo = $_POST['codigo'];
    $nome_completo = $_POST['nome_completo'];
    $sexo = $_POST['sexo'];
    $dt_nasc = $_POST['dt_nasc'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];

    // Criar a consulta SQL para atualizar os dados do cliente
    $sql = "UPDATE clientes SET 
                nome_completo = '$nome_completo', 
                sexo = '$sexo',
                dt_nasc = '$dt_nasc', 
                email = '$email', 
                telefone = '$telefone'
            WHERE codigo = '$codigo'";

    // Executar a consulta e verificar se foi bem-sucedida
    if (mysqli_query($conexao, $sql)) {
        header("Location: clientes_listar.php");
    } else {
        echo "Erro ao atualizar o registro: " . mysqli_error($conexao);
    }

    // Fechar a conexão
    mysqli_close($conexao);
}
?>
