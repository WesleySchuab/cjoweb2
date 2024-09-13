<?php
// Iniciar a sessão
session_start();

// Incluir o arquivo de conexão com o banco de dados
include('../central/conexao.php');

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
    $stmt->bind_param("s", $email); // "s" indica que o parâmetro é uma string
    $stmt->execute();
    $stmt->bind_result($id_usuario, $codigo, $email, $hash_senha, $status);
    $stmt->fetch();
    $stmt->close();

    // Verificar se o usuário existe e se a senha está correta
    if ($id_usuario && password_verify($senha, $hash_senha)) {
        if ($status == '1') {
            // Usuário autenticado com sucesso e ativo
            $_SESSION['id_usuario'] = $id_usuario;
            $_SESSION['codigo'] = $codigo;
            $_SESSION['email'] = $email;
            header("Location: index2.php"); // Redirecionar para uma página protegida
            exit;
        } else {
            // Usuário inativo
            $mensagem_erro = "Conta inativa. Entre em contato com o administrador.";
        }
    } else {
        // Email ou senha incorretos
        $mensagem_erro = "Email ou senha inválidos.";
    }
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
        <?php if (isset($error)) { echo "<p class='text-danger text-center'>$error</p>"; } ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>