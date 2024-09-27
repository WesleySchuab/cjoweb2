<?php
// Incluir o arquivo de conexão com o banco de dados
include('conexao.php');

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Receber os dados do formulário
    $id            = $_POST['id'];
    $nome_completo = $_POST['nome_completo'];
    $sexo          = $_POST['sexo'];
    $dt_nasc       = $_POST['dt_nasc'];
    $email         = $_POST['email'];
    $telefone      = $_POST['telefone'];

    // Criar a consulta SQL para atualizar os dados do cliente
    $sql = "UPDATE clientes SET 
                nome_completo = '$nome_completo',
                sexo = '$sexo',
                dt_nasc = '$dt_nasc',
                email = '$email',
                telefone = '$telefone'
            WHERE id = $id";

    // Executar a consulta e verificar se foi bem-sucedida
    if (mysqli_query($conexao, $sql)) {
        echo "Dados atualizados com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Fechar a conexão
    mysqli_close($conexao);
}
?>
