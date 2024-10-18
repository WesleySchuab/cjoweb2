<?php
error_reporting(E_ALL); ini_set('display_errors', 1);
define('CJO_PATH', $_SERVER['DOCUMENT_ROOT'] . '/cjoweb2');
include(CJO_PATH . '/central/conexao.php');

$homeSite    = CJO_PATH .'/cjoweb2';
$homeLogin   = $homeSite."/sistema";
$homeSistema = $homeSite."/sistema/index2.php";

include(CJO_PATH . '/central/conexao.php');
include(CJO_PATH . '/central/fn/menu.php');

?>