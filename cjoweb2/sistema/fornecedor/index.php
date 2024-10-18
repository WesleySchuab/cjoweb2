<?php
session_start();
// Incluir o arquivo de conexão com o banco de dados
include '../../central/fn/server.php';

$nome_arquivo = "index.php"; // NOME DO ARQUIVO

if (isset($_GET['filtro'])) {
    $filtros = $_GET['filtro'];

    switch ($filtros) {
        case 'id':
            $sql = "SELECT * FROM fornecedores";
            break;
        case 'az':
            $sql = "SELECT * FROM fornecedores ORDER BY nome";
            break;
        case 'za':
            $sql = "SELECT * FROM fornecedores ORDER BY nome DESC";
            break;
        case 'cnpj':
            $sql = "SELECT * FROM fornecedores ORDER BY cnpj";
            break;
    }
} else {
    $sql = "SELECT * FROM fornecedores";
}

// Criar a consulta SQL para selecionar todos os fornecedores
$result = mysqli_query($conexao, $sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Lista de Fornecedores</title>
</head>
<body>
<?php echo $menu_links_fornecedores; ?>
    <div class="container mt-4">
        <h1 class="mb-4">Lista de Fornecedores</h1>
        <p>Ordenar por: 
            <a href="<?php echo $nome_arquivo; ?>" class="btn btn-link">ID</a> | 
            <a href="<?php echo $nome_arquivo; ?>?filtro=az" class="btn btn-link">A-Z</a> | 
            <a href="<?php echo $nome_arquivo; ?>?filtro=za" class="btn btn-link">Z-A</a> |
            <a href="<?php echo $nome_arquivo; ?>?filtro=cnpj" class="btn btn-link">CNPJ</a>
        </p>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>CNPJ</th>
                        <th>Email</th>
                        <th>Telefone</th>
                        <th>Endereço</th>
                        <th>Descrição</th>
                        <th>Data de Cadastro</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Verificar se há resultados na consulta
                    if (mysqli_num_rows($result) > 0) {
                        // Loop através de cada linha de resultado e exibi-la na tabela
                        while ($row = mysqli_fetch_assoc($result)) {
                            $data_cadastro = date("d/m/Y", strtotime($row['data_cadastro']));
                            echo "<tr>";
                            echo "<td>" . $row['id_fornecedor'] . "</td>";
                            echo "<td>" . $row['nome'] . "</td>";
                            echo "<td>" . $row['cnpj'] . "</td>";
                            echo "<td>" . $row['email'] . "</td>";
                            echo "<td>" . $row['telefone'] . "</td>";
                            echo "<td>" . $row['endereco'] . "</td>";
                            echo "<td>" . $row['descricao'] . "</td>";
                            echo "<td>" . $data_cadastro . "</td>";
                            echo "<td><a href='fornecedor_atualizar.php?id_fornecedor=" . $row['id_fornecedor'] . "' class='btn btn-primary'>Editar</a></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='9' class='text-center'>Nenhum fornecedor cadastrado.</td></tr>";
                    }
                    // Fechar a conexão
                    mysqli_close($conexao);
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
