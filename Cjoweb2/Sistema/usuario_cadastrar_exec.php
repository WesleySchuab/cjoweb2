<?php
// Conexão com o banco de dados
include('conexao.php');

// Verifica se os dados foram enviados via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recebe os dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $status = $_POST['status'];

    // Validação básica
    if (!empty($nome) && !empty($email) && !empty($senha)) {
        // Criptografa a senha
        $senha_criptografada = password_hash($senha, PASSWORD_DEFAULT);

        // Prepara a query SQL para inserção
        $sql = "INSERT INTO usuarios (nome, email, senha, status) VALUES (?, ?, ?, ?)";
        $stmt = $conexao->prepare($sql);
        
        if ($stmt) {
            // Faz a vinculação dos parâmetros e executa a query
            $stmt->bind_param('sssi', $nome, $email, $senha_criptografada, $status);

            if ($stmt->execute()) {
                echo "Usuário cadastrado com sucesso!";
            } else {
                echo "Erro ao cadastrar o usuário: " . $stmt->error;
            }

            // Fecha o statement
            $stmt->close();
        } else {
            echo "Erro na preparação da query: " . $conn->error;
        }

    } else {
        echo "Por favor, preencha todos os campos.";
    }
    
    // Fecha a conexão com o banco
    $conexao->close();
} else {
    echo "Método de requisição inválido.";
}
?>
