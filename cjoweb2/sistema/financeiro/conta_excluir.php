<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Incluir o arquivo de conexão com o banco de dados
include($_SERVER['DOCUMENT_ROOT'] . '/cjoweb2/central/fn/server.php');

// Verificar se o ID foi fornecido
if (isset($_GET['id'])) {
    $id_conta = $_GET['id'];

    // Excluir a conta
    $sql = "DELETE FROM financas_contas_bancarias WHERE id_conta = '$id_conta'";
    if (mysqli_query($conexao, $sql)) {
        $_SESSION['mensagem'] = "Conta excluída com sucesso!";
    } else {
        $_SESSION['mensagem'] = "Erro ao excluir a conta: " . mysqli_error($conexao);
    }

    header("Location: contas_listar.php");
    exit;
} else {
    die("ID da conta não fornecido.");
}
