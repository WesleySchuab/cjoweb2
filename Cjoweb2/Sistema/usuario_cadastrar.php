<?php
include('menu.php');
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css"/>
    <title>Cadastro de Usuários</title>
</head>
<body>
<?php echo $menu_links; ?>
    <div class="container">
        <h1>Cadastro de Usuários</h1>
        <form action="usuario_cadastrar_exec.php" method="POST">
            <label for="nome">Nome Completo</label>
            <input type="text" id="nome" name="nome" maxlength="255" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" maxlength="255" required>

            <label for="senha">Senha</label>
            <input type="password" id="senha" name="senha" maxlength="255" required>

            <label for="status">Status</label>
            <select id="status" name="status" required>
                <option value="1">Ativo</option>
                <option value="0">Inativo</option>
            </select>

            <input type="submit" value="Cadastrar">
        </form>
    </div>
<script src="script.js"></script>
</body>
</html>
