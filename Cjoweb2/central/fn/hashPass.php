<?php

$senha = $_GET["psw"];

//$senha = "abc@1234";

 $passHash = password_hash($senha, PASSWORD_DEFAULT);
 //$passHash = "$2y$10$4Lpy25uBXYxW97faMw5Cy.GnX64Da9nv4Yobb6Jml/.xP2Wh6ylgS";

echo " Senha textual informada: ".$senha."</BR></BR>";

echo " Senha codificada: ".$passHash."</BR></BR>";

echo "
if(password_verify($senha, $passHash))</BR>
  {</BR>
    echo '1';</BR>
  }</BR>
  else</BR>
  {</BR>
    echo '0';</BR>
  }</BR></BR></BR>";


if(password_verify($senha, $passHash))
  {
    echo "As senhas Conferem";
  }
  else
  {
    echo "As senhas NÃO Conferem";
  }

?>