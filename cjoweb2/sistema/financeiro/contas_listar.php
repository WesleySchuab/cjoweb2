<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Incluir o arquivo de conexão com o banco de dados
include($_SERVER['DOCUMENT_ROOT'] . '/cjoweb2/central/fn/server.php');
include(CJO_PATH . '/central/fn/validar_sessao.php');

// Definir o número de registros por página
$registros_por_pagina = 10;

// Verificar em qual página o usuário está (inicialmente na página 1)
$pagina_atual = isset($_GET['pg']) ? (int)$_GET['pg'] : 1;
$inicio = ($pagina_atual - 1) * $registros_por_pagina;

// Executar consulta SQL com limite de registros para paginação
$sql = "SELECT * FROM financas_contas_bancarias LIMIT $inicio, $registros_por_pagina";
$result = mysqli_query($conexao, $sql);

// Verificar se a consulta foi bem-sucedida
if (!$result) {
    die("Erro ao executar a consulta: " . mysqli_error($conexao));
}

// Contar o total de registros
$sql_total = "SELECT COUNT(*) AS total FROM financas_contas_bancarias";
$result_total = mysqli_query($conexao, $sql_total);
$row_total = mysqli_fetch_assoc($result_total);
$total_registros = $row_total['total'];

// Calcular o número total de páginas
$total_paginas = ceil($total_registros / $registros_por_pagina);
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
        <a class="navbar-brand" href="#">Sistema Financeiro</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Início</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contas_listar.php">Contas Bancárias</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="tipos_pagamentos_listar.php">Tipos de Pagamento</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="operacoes_listar.php">Operações</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Conteúdo Principal -->
<div class="container mt-5">
    <h1 class="mb-4">Contas Bancárias</h1>
    
    <!-- Botão Adicionar Conta -->
    <div class="mb-4">
        <a href="conta_adicionar.php" class="btn btn-success">Adicionar Nova Conta</a>
    </div>

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
                    echo "<td><a href='conta_editar.php?id=" . $row['id_conta'] . "' class='btn btn-primary btn-sm'>Editar</a> ";
                    echo "<a href='conta_excluir.php?id=" . $row['id_conta'] . "' class='btn btn-danger btn-sm' onclick=\"return confirm('Tem certeza que deseja excluir esta conta?');\">Excluir</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='7' class='text-center'>Nenhuma conta cadastrada.</td></tr>";
            }
            mysqli_close($conexao);
            ?>
        </tbody>
    </table>

    <!-- Paginação -->
    <nav>
        <ul class="pagination justify-content-center">
            <?php if ($pagina_atual > 1): ?>
                <li class="page-item">
                    <a class="page-link" href="?pg=<?php echo $pagina_atual - 1; ?>">Anterior</a>
                </li>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $total_paginas; $i++): ?>
                <li class="page-item <?php if ($i == $pagina_atual) echo 'active'; ?>">
                    <a class="page-link" href="?pg=<?php echo $i; ?>"><?php echo $i; ?></a>
                </li>
            <?php endfor; ?>

            <?php if ($pagina_atual < $total_paginas): ?>
                <li class="page-item">
                    <a class="page-link" href="?pg=<?php echo $pagina_atual + 1; ?>">Próximo</a>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
