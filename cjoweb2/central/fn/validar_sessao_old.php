<?php
error_reporting(E_ALL); 
ini_set('display_errors', 1);
//session_start(); // Iniciar a sessão caso não tenha sido iniciada

// Verificar se o usuário está logado
var_dump($_SESSION);
/*
if (!isset($_SESSION['id_usuario'])) {
    // Se o usuário não estiver logado, redirecionar para a página de login
    header("Location: $homeLogin");
    exit;
}


// Se o usuário está logado, verificar no banco de dados se ainda está ativo
$id_usuario = $_SESSION['id_usuario'];

$sql = "SELECT status FROM usuarios WHERE id_usuario = ? LIMIT 1";
$stmt = $conexao->prepare($sql);
$stmt->bind_param("i", $id_usuario);
$stmt->execute();
$stmt->bind_result($status);
$stmt->fetch();
$stmt->close();


// Se o status for diferente de '1' (inativo), redirecionar para o logout ou página de erro

if ($status !== '1') {
    header("Location: ../../sistema/sair.php"); // Ou defina o caminho correto
    exit;
}

// Se tudo estiver ok, redirecionar o usuário para o sistema
header("Location: $homeSistema");
exit;
*/
?>
