<?php
error_reporting(E_ALL); 
ini_set('display_errors', 1);

// Verificar se a sessão foi iniciada corretamente
if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Iniciar a sessão, caso ainda não tenha sido iniciada
}

// Verificar se o usuário está logado, ou seja, se existe um ID de usuário na sessão
if (isset($_SESSION['id_usuario'])) {
    
    $id_usuario = $_SESSION['id_usuario'];

    $sql = "SELECT status FROM usuarios WHERE id_usuario = ? LIMIT 1";
    $stmt = $conexao->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("i", $id_usuario);
        $stmt->execute();
        $stmt->bind_result($status);
        $stmt->fetch();
        $stmt->close();

        // Verificar se o status do usuário é diferente de '1'
        if ($status !== '1') {
            header("Location: ../../sistema/sair.php"); // Redirecionar para logout ou página de erro
            exit;
        }
    } else {
        die("Erro na preparação da consulta SQL: " . $conexao->error);
    }
} else {
    // Se não houver ID de usuário na sessão, redirecionar para o sistema ou login
    header("Location: $homeLogin");
    exit;
}
?>

