<?php
session_start();
// Incluir o arquivo de conexão com o banco de dados
include '../../central/fn/server.php';

$nome_arquivo = "nome_sobrenome_exe01.php"; // NOME DO ARQUIVO

// Verifica se a URL contém o parâmetro 'listar'
if (isset($_GET['listar'])) {
    $listar = intval($_GET['listar']); // Converte o valor para número inteiro
    $sql = "SELECT * FROM clientes LIMIT $listar"; // Limita a consulta ao número solicitado
} else {
    $sql = "SELECT * FROM clientes"; // Consulta padrão sem limite
}

// Executa a consulta SQL
$result = mysqli_query($conexao, $sql);

// Executa uma nova consulta para contar o total de clientes
$total_result = mysqli_query($conexao, "SELECT COUNT(*) as total FROM clientes");
$total_row = mysqli_fetch_assoc($total_result);
$total_clientes = $total_row['total']; // Total de clientes cadastrados

// Conta quantos clientes foram exibidos na consulta atual
$clientes_exibidos = mysqli_num_rows($result);
$clientes_faltando = $total_clientes - $clientes_exibidos; // Calcula quantos clientes faltam exibir
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../central/css/estilo.css"/>
    <title>Lista de Clientes</title>
</head>
<body>
<?php  echo $menu_links_clientes; ?>
<div class="container">
    <!-- Conteúdo da tabela de clientes -->
    <h1>Lista de Clientes</h1>
    <p>Ordenar por: 
        <a href="<?php echo $nome_arquivo; ?>">ID</a> | 
        <a href="<?php echo $nome_arquivo; ?>?listar=10">10 Clientes</a> | 
        <a href="<?php echo $nome_arquivo; ?>?listar=20">20 Clientes</a> |
    </p>
<table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Código</th>
                    <th>Nome Completo</th>
                    <th>Sexo</th>
                    <th>Data de Nascimento</th>
                    <th>Idade</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Verificar se há resultados na consulta
                if ($clientes_exibidos > 0) {
                    // Loop através de cada linha de resultado e exibi-la na tabela
                    while($row = mysqli_fetch_assoc($result)) {
                        // Converte a data para o modelo pt-br
                        $data_nasc = date("d/m/Y", strtotime($row['dt_nasc']));

                        // Calcula a idade
                        $data_nascimento = new DateTime($row['dt_nasc']);
                        $hoje      = new DateTime();
                        $idade     = $hoje->diff($data_nascimento)->y; // calcula a idade

                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['codigo'] . "</td>";
                        echo "<td>" . $row['nome_completo'] . "</td>";
                        echo "<td>" . $row['sexo'] . "</td>";
                        echo "<td>" . $data_nasc . "</td>";
                        echo "<td>" . $idade . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>" . $row['telefone'] . "</td>";
                        echo "<td><a href='cliente_atualizar.php?codigo=".$row['codigo']."'>Editar</a></td>";
                        echo "</tr>";
                    }
                } else {
                    // Caso não haja clientes cadastrados, exibir uma mensagem
                    echo "<tr><td colspan='9' style='text-align:center;'>Nenhum cliente cadastrado.</td></tr>";
                }
                ?>
            </tbody>
        </table>

    <!-- Tabela de informações adicionais sobre clientes -->
    <div class="info-clientes">
        <table>
            <tr>
                <td>Total de clientes:</td>
                <td><?php echo $total_clientes; ?></td>
            </tr>
            <tr>
                <td>Clientes exibidos:</td>
                <td><?php echo $clientes_exibidos; ?></td>
            </tr>
            <tr>
                <td>Clientes faltando exibir:</td>
                <td><?php echo $clientes_faltando; ?></td>
            </tr>
        </table>
    </div>
</div>

<script src="script.js"></script>
</body>
</html>

<?php
// Fechar a conexão com o banco de dados
mysqli_close($conexao);
?>
