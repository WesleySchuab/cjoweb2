<?php
session_start();
error_reporting(E_ALL); 
ini_set('display_errors', 1);
// Incluir o arquivo de conexão com o banco de dados
include($_SERVER['DOCUMENT_ROOT'] . '/cjoweb2/central/fn/server.php');
include(CJO_PATH . '/central/fn/validar_sessao.php');


// Executar consulta SQL
$sql = "SELECT * FROM financas_contas_bancarias";
$result = mysqli_query($conexao, $sql);

// Verificar se a consulta foi bem-sucedida
if (!$result) {
    die("Erro ao executar a consulta: " . mysqli_error($conexao));
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Contas Bancárias</title>
</head>
<body>

<!-- Menu de Navegação -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Sistema Financeiro</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<? echo $homeSistema; ?>">Início</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="listagem_contas.php">Contas Bancárias</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="listagem_tipos_pagamentos.php">Tipos de Pagamento</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="listagem_operacoes.php">Operações</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Conteúdo Principal -->
<div class="container mt-5">
    <h1 class="mb-4">Contas Bancárias</h1>
    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Banco</th>
                <th>Agência</th>
                <th>Conta</th>
                <th>Saldo</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['id_conta']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['id_cliente']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['banco']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['agencia']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['numero_conta']) . "</td>";
                    echo "<td>R$ " . number_format($row['saldo'], 2, ',', '.') . "</td>";
                    echo "<td><a href='editar_conta.php?id=" . $row['id_conta'] . "' class='btn btn-primary btn-sm'>Editar</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='7' class='text-center'>Nenhuma conta cadastrada.</td></tr>";
            }
            mysqli_close($conexao);
            ?>
        </tbody>
    </table>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
