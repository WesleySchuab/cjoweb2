<?php
session_start();
// Incluir o arquivo de conexão com o banco de dados
include '../../central/fn/server.php';

$nome_arquivo = "raul_dias_exe01.php";// NOME DO ARQUIVO

if (isset($_GET['listar'])) {
    $listar = $_GET['listar'];

    if (is_numeric($listar)) {
        $sql = "SELECT * FROM clientes LIMIT $listar";
    } else {
        $sql = "SELECT * FROM clientes";
    }
} else {
    $sql = "SELECT * FROM clientes";
}

// Criar a consulta SQL para selecionar todos os clientes
$result = mysqli_query($conexao, $sql);

//total cliente
$sql_total = "SELECT COUNT(*) as total FROM clientes";
$result_total = mysqli_query($conexao, $sql_total);
$row_total = mysqli_fetch_assoc($result_total);
$total_clientes = $row_total['total'];

//cliente exibidos
$num_clientes_exibidos = mysqli_num_rows($result);

//clientes faltando
$num_clientes_faltando = $total_clientes - $num_clientes_exibidos;
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../central/css/estilo.css" />
    <title>Lista de Clientes</title>
</head>

<body>
    <?php echo $menu_links_clientes; ?>
    <div class="container">
        <h1>Lista de Clientes</h1>
        <p>Ordernar por Quantidade: <input type="number" id="quantidade"
            value="<?php echo (isset($_GET['listar']) && is_numeric($_GET['listar'])) ? $_GET['listar'] : $total_clientes; ?>">
            <a href="#" onclick="listarClientes()">Listar</a>
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
                if (mysqli_num_rows($result) > 0) {
                    // Loop através de cada linha de resultado e exibi-la na tabela
                    while ($row = mysqli_fetch_assoc($result)) {

                        //Converte a data para o modelo pt-br
                        $data_nasc = date("d/m/Y", strtotime($row['dt_nasc']));

                        //Calcula a idade
                        $data_nascimento = new DateTime($row['dt_nasc']);
                        $hoje = new DateTime();
                        $idade = $hoje->diff($data_nascimento)->y; //calcula a idade
                
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['codigo'] . "</td>";
                        echo "<td>" . $row['nome_completo'] . "</td>";
                        echo "<td>" . $row['sexo'] . "</td>";
                        echo "<td>" . $data_nasc . "</td>";
                        echo "<td>" . $idade . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>" . $row['telefone'] . "</td>";
                        echo "<td>
            <a href='cliente_atualizar.php?codigo=" . $row['codigo'] . "'>Editar
            </td>";
                        echo "</tr>";
                    }
                } else {
                    // Caso não haja clientes cadastrados, exibir uma mensagem
                    echo "<tr><td colspan='8' style='text-align:center;'>Nenhum cliente cadastrado.</td></tr>";
                }
                // Fechar a conexão
                mysqli_close($conexao);
                ?>
            </tbody>
        </table>
        <table>
            <tr>
                <th>Total de Clientes:</th>
                <td><?php echo $total_clientes; ?></td>
            </tr>
            <tr>
                <th>Clientes Exibidos:</th>
                <td><?php echo $num_clientes_exibidos; ?></td>
            </tr>
            <tr>
                <th>Clientes Faltando:</th>
                <td><?php echo $num_clientes_faltando; ?></td>
            </tr>
        </table>
    </div>
    <script src="script.js"></script>
    <script>
        function listarClientes() {
            var quantidade = document.getElementById("quantidade").value;
            window.location.href = "<?php echo $nome_arquivo; ?>?listar=" + quantidade;
        }
    </script>
</body>

</html>