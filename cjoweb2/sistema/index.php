<?php
// Iniciar a sessão
session_start();

// Incluir o arquivo de conexão com o banco de dados
include($_SERVER['DOCUMENT_ROOT'] . '/cjoweb2/central/conexao.php');

// Verificar se a conexão foi bem-sucedida
if ($conexao->connect_error) {
    die("Erro na conexão: " . $conexao->connect_error);
}

// Inicializar variáveis
$mensagem_erro = "";

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obter os dados do formulário de forma segura
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Criar a consulta SQL preparada para verificar o usuário
    $sql = "SELECT id_usuario, codigo, email, senha, status FROM usuarios WHERE email = ? LIMIT 1";
    $stmt = $conexao->prepare($sql);
    
    if ($stmt === false) {
        die('Erro na preparação da consulta: ' . htmlspecialchars($conexao->error));
    }

    $stmt->bind_param("s", $email); // "s" indica que o parâmetro é uma string
    $stmt->execute();
    
    // Vincular o resultado da consulta às variáveis
    $stmt->bind_result($id_usuario, $codigo, $email, $hash_senha, $status);

    // Verificar se houve resultado
    if ($stmt->fetch()) {
        // Verificar se a senha está correta
        if (password_verify($senha, $hash_senha)) {
            if ($status == '1') {
                // Usuário autenticado com sucesso e ativo
                $_SESSION['id_usuario'] = $id_usuario;
                $_SESSION['codigo'] = $codigo;
                $_SESSION['email'] = $email;
                header("Location: index2.php"); // Redirecionar para uma página protegida
                exit();
            } else {
                // Usuário inativo
                $mensagem_erro = "Conta inativa. Entre em contato com o administrador.";
            }
        } else {
            // Senha incorreta
            $mensagem_erro = "Email ou senha inválidos.";
        }
    } else {
        // Email não encontrado
        $mensagem_erro = "Email ou senha inválidos.";
    }

    // Fechar a declaração
    $stmt->close();
}

// Fechar a conexão
$conexao->close();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #121212;
            color: #ffffff;
        }
        .login-container {
            max-width: 400px;
            margin: 100px auto;
            padding: 20px;
            background-color: #1e1e1e;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }
    </style>
</head>
<body>
<div class="container">
    <div class="login-container">
        <h2 class="text-center">Login</h2>

        <!-- Exibir mensagem de erro com alert do Bootstrap -->
        <?php if (isset($mensagem_erro) && $mensagem_erro != ""): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php echo $mensagem_erro; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <form method="POST" action="index.php">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="senha" class="form-label">Senha</label>
                <input type="password" class="form-control" id="senha" name="senha" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Entrar</button>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
