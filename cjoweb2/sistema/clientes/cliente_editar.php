<?php
// Incluir o arquivo de conexão com o banco de dados
include('conexao.php');

// Verificar se o código do cliente foi passado via GET
if (isset($_GET['codigo'])) {
    $codigo = $_GET['codigo'];

    // Consultar o banco de dados para obter os dados do cliente
    $sql = "SELECT * FROM clientes WHERE codigo = '$codigo'";
    $result = mysqli_query($conn, $sql);

    // Verificar se o cliente foi encontrado
    if (mysqli_num_rows($result) > 0) {
        // Obter os dados do cliente
        $cliente = mysqli_fetch_assoc($result);
    } else {
        echo "Cliente não encontrado!";
        exit;
    }
} else {
    echo "Código do cliente não fornecido!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css"/>
    <title>Editar Cliente</title>
</head>
<body>
    <div class="container">
        <h1>Editar Cliente</h1>
        <form action="atualizar_cliente.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $cliente['id']; ?>">

            <label for="codigo">Código</label>
            <input type="text" id="codigo" name="codigo" value="<?php echo $cliente['codigo']; ?>" maxlength="50" readonly>

            <label for="nome_completo">Nome Completo</label>
            <input type="text" id="nome_completo" name="nome_completo" value="<?php echo $cliente['nome_completo']; ?>" maxlength="255" required>

            <label for="sexo">Sexo</label>
            <select id="sexo" name="sexo" required>
                <option value="masculino" <?php if ($cliente['sexo'] == 'masculino') echo 'selected'; ?>>Masculino</option>
                <option value="feminino" <?php if ($cliente['sexo'] == 'feminino') echo 'selected'; ?>>Feminino</option>
            </select>

            <label for="dt_nasc">Data de Nascimento</label>
            <input type="date" id="dt_nasc" name="dt_nasc" value="<?php echo $cliente['dt_nasc']; ?>" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="<?php echo $cliente['email']; ?>" maxlength="255" required>

            <label for="telefone">Telefone</label>
            <input type="tel" id="telefone" name="telefone" value="<?php echo $cliente['telefone']; ?>" maxlength="11" required>

            <input type="submit" value="Atualizar">
        </form>
    </div>
</body>
</html>
