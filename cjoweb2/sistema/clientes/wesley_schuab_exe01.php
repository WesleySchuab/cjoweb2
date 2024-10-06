<?php
session_start();

include '../../central/fn/server.php';

$nome_arquivo = "index.php";

if (isset($_GET['listar']) && is_numeric($_GET['listar'])) {
    $lt = (int)$_GET['listar'];

    
    $sql = "SELECT * FROM clientes LIMIT $lt";
} else {
  
    $sql = "SELECT * FROM clientes";
}

$result = mysqli_query($conexao, $sql);
$sql_total = "SELECT COUNT(*) as total FROM clientes";
$result_total = mysqli_query($conexao, $sql_total);
$row_total = mysqli_fetch_assoc($result_total);
$total_clientes = $row_total['total'];


$clientes_restantes = $total_clientes - $lt;
if ($clientes_restantes < 0) {
    $clientes_restantes = 0;
}

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
        <h1>Lista de Clientes</h1>
        <p>Ordernar por: 
            <a href="<?php echo $nome_arquivo; ?>">ID</a> | 
            <a href="<?php echo $nome_arquivo; ?>?filtro=az">A-Z</a> | 
            <a href="<?php echo $nome_arquivo; ?>?filtro=za">Z-A</a> |
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
                    while($row = mysqli_fetch_assoc($result)) {

                        //Converte a data para o modelo pt-br
                        $data_nasc = date("d/m/Y", strtotime($row['dt_nasc']));

                        //Calcula a idade
                        $data_nascimento = new DateTime($row['dt_nasc']);
                        $hoje      = new DateTime();
                        $idade     = $hoje->diff($data_nascimento)->y; //calcula a idade

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
            <a href='cliente_atualizar.php?codigo=".$row['codigo']."'>Editar
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
        <th>Total de Clientes</th>
        <th>Clientes Exibidos</th>
        <th>Quantos clientes faltam ser exibidos</th>
    </tr>
    <tr>
        <td><?php echo $total_clientes; ?></td>
        <td><?php echo $lt; ?></td>
        <td><?php echo $clientes_restantes; ?></td>
    </tr>
</table>
    </div>
<script src="script.js"></script>
</body>
</html>
