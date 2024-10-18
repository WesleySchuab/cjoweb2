<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Incluir o arquivo de conexão com o banco de dados
include($_SERVER['DOCUMENT_ROOT'] . '/cjoweb2/central/fn/server.php');
include(CJO_PATH . '/central/fn/validar_sessao.php');

// Verificar se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_cliente = $_POST['id_cliente'];
    $id_fornecedor = $_POST['id_fornecedor'];
    $banco = $_POST['banco'];
    $agencia = $_POST['agencia'];
    $numero_conta = $_POST['numero_conta'];
    $tipo_conta = $_POST['tipo_conta'];
    $saldo = $_POST['saldo'];
    $data_abertura = $_POST['data_abertura'];

    // Preparar a consulta SQL
    $sql = "INSERT INTO financas_contas_bancarias (id_cliente, id_fornecedor, banco, agencia, numero_conta, tipo_conta, saldo, data_abertura)
            VALUES ('$id_cliente', '$id_fornecedor', '$banco', '$agencia', '$numero_conta', '$tipo_conta', '$saldo', '$data_abertura')";

    // Executar a consulta
    if (mysqli_query($conexao, $sql)) {
        $_SESSION['mensagem'] = "Conta adicionada com sucesso!";
        header("Location: contas_listar.php");
        exit;
    } else {
        echo "Erro: " . mysqli_error($conexao);
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Conta</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Adicionar Nova Conta Bancária</h1>
    <form action="conta_adicionar.php" method="POST">
        <div class="mb-3">
            <label for="id_cliente" class="form-label">ID Cliente</label>
            <input type="number" class="form-control" id="id_cliente" name="id_cliente">
        </div>
        <div class="mb-3">
            <label for="id_fornecedor" class="form-label">ID Fornecedor</label>
            <input type="number" class="form-control" id="id_fornecedor" name="id_fornecedor">
        </div>
        <div class="mb-3">
            <label for="banco" class="form-label">Banco</label>
            <input type="text" class="form-control" id="banco" name="banco" required>
        </div>
        <div class="mb-3">
            <label for="agencia" class="form-label">Agência</label>
            <input type="text" class="form-control" id="agencia" name="agencia" required>
        </div>
        <div class="mb-3">
            <label for="numero_conta" class="form-label">Número da Conta</label>
            <input type="text" class="form-control" id="numero_conta" name="numero_conta" required>
        </div>
        <div class="mb-3">
            <label for="tipo_conta" class="form-label">Tipo de Conta</label>
            <select class="form-select" id="tipo_conta" name="tipo_conta" required>
                <option value="Corrente">Corrente</option>
                <option value="Poupança">Poupança</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="saldo" class="form-label">Saldo Inicial</label>
            <input type="number" class="form-control" id="saldo" name="saldo" step="0.01" required>
        </div>
        <div class="mb-3">
            <label for="data_abertura" class="form-label">Data de Abertura</label>
            <input type="date" class="form-control" id="data_abertura" name="data_abertura">
        </div>
        <button type="submit" class="btn btn-primary">Adicionar Conta</button>
    </form>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
