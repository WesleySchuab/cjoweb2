<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Incluir o arquivo de conexão com o banco de dados
include($_SERVER['DOCUMENT_ROOT'] . '/cjoweb2/central/fn/server.php');
include(CJO_PATH . '/central/fn/validar_sessao.php');

// Verificar se o ID da conta foi passado pela URL
if (isset($_GET['id'])) {
    $id_conta = intval($_GET['id']); // Garantir que o ID seja um número inteiro

    // Preparar a consulta SQL para buscar os dados da conta
    $sql = "SELECT id_cliente, id_fornecedor, banco, agencia, numero_conta, tipo_conta, saldo, data_abertura 
            FROM financas_contas_bancarias WHERE id_conta = ?";
    $stmt = $conexao->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("i", $id_conta); // Associar o parâmetro de ID da conta
        $stmt->execute();
        $stmt->bind_result($id_cliente, $id_fornecedor, $banco, $agencia, $numero_conta, $tipo_conta, $saldo, $data_abertura);
        $stmt->fetch();
        $stmt->close();
    } else {
        echo "Erro ao preparar a consulta: " . $conexao->error;
        exit;
    }
} else {
    echo "ID da conta não fornecido.";
    exit;
}

// Verificar se o formulário foi enviado para salvar as alterações
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_cliente = intval($_POST['id_cliente']);
    $id_fornecedor = intval($_POST['id_fornecedor']);
    $banco = trim($_POST['banco']);
    $agencia = trim($_POST['agencia']);
    $numero_conta = trim($_POST['numero_conta']);
    $tipo_conta = $_POST['tipo_conta'];
    $saldo = floatval($_POST['saldo']);
    $data_abertura = $_POST['data_abertura'];

    // Atualizar os dados da conta no banco de dados
    $sql = "UPDATE financas_contas_bancarias 
            SET id_cliente = ?, id_fornecedor = ?, banco = ?, agencia = ?, numero_conta = ?, tipo_conta = ?, saldo = ?, data_abertura = ? 
            WHERE id_conta = ?";
    $stmt = $conexao->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("iissssdsi", $id_cliente, $id_fornecedor, $banco, $agencia, $numero_conta, $tipo_conta, $saldo, $data_abertura, $id_conta);
        
        if ($stmt->execute()) {
            $_SESSION['mensagem'] = "Conta atualizada com sucesso!";
            header("Location: contas_listar.php");
            exit;
        } else {
            echo "Erro ao atualizar a conta: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Erro ao preparar a consulta de atualização: " . $conexao->error;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Conta</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Editar Conta Bancária</h1>
    <form action="conta_editar.php?id=<?php echo $id_conta; ?>" method="POST">
        <div class="mb-3">
            <label for="id_cliente" class="form-label">ID Cliente</label>
            <input type="number" class="form-control" id="id_cliente" name="id_cliente" value="<?php echo htmlspecialchars($id_cliente); ?>" required>
        </div>
        <div class="mb-3">
            <label for="id_fornecedor" class="form-label">ID Fornecedor</label>
            <input type="number" class="form-control" id="id_fornecedor" name="id_fornecedor" value="<?php echo htmlspecialchars($id_fornecedor); ?>">
        </div>
        <div class="mb-3">
            <label for="banco" class="form-label">Banco</label>
            <input type="text" class="form-control" id="banco" name="banco" value="<?php echo htmlspecialchars($banco); ?>" required>
        </div>
        <div class="mb-3">
            <label for="agencia" class="form-label">Agência</label>
            <input type="text" class="form-control" id="agencia" name="agencia" value="<?php echo htmlspecialchars($agencia); ?>" required>
        </div>
        <div class="mb-3">
            <label for="numero_conta" class="form-label">Número da Conta</label>
            <input type="text" class="form-control" id="numero_conta" name="numero_conta" value="<?php echo htmlspecialchars($numero_conta); ?>" required>
        </div>
        <div class="mb-3">
            <label for="tipo_conta" class="form-label">Tipo de Conta</label>
            <select class="form-select" id="tipo_conta" name="tipo_conta" required>
                <option value="Corrente" <?php echo ($tipo_conta == 'Corrente') ? 'selected' : ''; ?>>Corrente</option>
                <option value="Poupança" <?php echo ($tipo_conta == 'Poupança') ? 'selected' : ''; ?>>Poupança</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="saldo" class="form-label">Saldo</label>
            <input type="number" class="form-control" id="saldo" name="saldo" step="0.01" value="<?php echo htmlspecialchars($saldo); ?>" required>
        </div>
        <div class="mb-3">
            <label for="data_abertura" class="form-label">Data de Abertura</label>
            <input type="date" class="form-control" id="data_abertura" name="data_abertura" value="<?php echo htmlspecialchars($data_abertura); ?>">
        </div>
        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
    </form>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
