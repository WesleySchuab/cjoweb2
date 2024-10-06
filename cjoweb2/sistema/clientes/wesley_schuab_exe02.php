<?php
session_start();
include '../../central/fn/server.php';

$nome_arquivo = "nome_sobrenome_exe02.php"; // Alterado para o nome correto

$lt = isset($_GET['listar']) && is_numeric($_GET['listar']) ? (int)$_GET['listar'] : 10;
$pagina_atual = isset($_GET['pg']) && is_numeric($_GET['pg']) ? (int)$_GET['pg'] : 1;
$offset = ($pagina_atual - 1) * $lt;

$sql = "SELECT * FROM clientes LIMIT $offset, $lt";
$result = mysqli_query($conexao, $sql);
$sql_total = "SELECT COUNT(*) as total FROM clientes";
$result_total = mysqli_query($conexao, $sql_total);
$row_total = mysqli_fetch_assoc($result_total);
$total_clientes = $row_total['total'];

$total_paginas = ceil($total_clientes / $lt);
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
<?php echo $menu_links_clientes; ?>
    <div class="container">
        <h1>Lista de Clientes</h1>
        <p>Ordenar por: 
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
                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        $data_nasc = date("d/m/Y", strtotime($row['dt_nasc']));
                        $data_nascimento = new DateTime($row['dt_nasc']);
                        $hoje = new DateTime();
                        $idade = $hoje->diff($data_nascimento)->y;

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
                    echo "<tr><td colspan='8' style='text-align:center;'>Nenhum cliente cadastrado.</td></tr>";
                }
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
            <td><?php echo mysqli_num_rows($result); ?></td>
            <td><?php echo max(0, $total_clientes - $pagina_atual * $lt); ?></td>
        </tr>
    </table>
    <table>
        <tr>
            <th>
                <a href="<?php echo $nome_arquivo; ?>?listar=<?php echo $lt;
                ?>&pg=<?php echo max(1, $pagina_atual - 1); ?>"><<</a>
             </th>
            <th>Pg <?php echo $pagina_atual; ?> de <?php echo $total_paginas; ?></th>
            <th><a href="<?php echo $nome_arquivo; ?>?listar=<?php echo $lt;
             ?>&pg=<?php echo min($total_paginas, $pagina_atual + 1); ?>">>></a></th>
        </tr>
    </table>

    </div>
<script src="script.js"></script>
</body>
</html>
