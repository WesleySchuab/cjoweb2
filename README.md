# cjoweb2
foi criada a conexão com o banco usando o programa MySQL Workbench utilizando o arquivo script_banco.sql
A primeira senha criada foi abc@1234
a senha deve ser passada na pagina pelo metodo get que pega o que é passado na url 
http://localhost:8000/cjoweb2/Central/fn/hashPass.php
após o php acrescenta o sina de interrogação e sigla psw e o sinal de =  ?psw= e a senha psw=abc@1234
O resultado ficara assim
http://localhost:8000/cjoweb2/Central/fn/hashPass.php?psw=abc@1234
uma vez criada a criptografia da senha na pagina de login deve ser usada a senha: abc@1234
feito o login deve vir para a pagina: **http://localhost:8000/cjoweb2/Sistema/clientes/**
Que deverá exibir os clientes da seguinte forma
![image](https://github.com/user-attachments/assets/2446562b-6bd8-4fe8-975e-3746fe77595c)

Criando filtro
na pagina C:\wamp64\www\Cjoweb2\Sistema\Sistema\Clientes\index.php
foi criado a variavel filtro
/*
filtrar por:
Id
AZ
ZA
Idade
*/
$filtro =  $_GET['filtro'];

switch ($filtro) {
    case 'id'; 
        $sql = "SELECT * FROM clientes"; break;
    case 'a-z'; 
        $sql = "SELECT * FROM clientes ORDER BY nome_completo";break;
    case 'z-a';
         $sql = "SELECT * FROM clientes ORDER BY nome_completo DESC";break;
    case 'idade';
        $sql = "SELECT * FROM clientes ORDER BY dt_nasc";break;
}
passando a url com i filtro nesse formato agora o filtro deve funcionar

# Anotações sobre a prova no ultimo exercicio Pg x de y deve mostrar quantas páginas foram geradas após a execução anterior
por exemplo :
http://localhost:8000/cjoweb2/Sistema/clientes/Nome_sobrenome_exe02.php?listar=10
ao listar 10 clientes em total de 50 deve haver mais 5 paginas com 10 clientes cada caso esteja na primeira pagina a coluna do meio 
[ Pg x de y ] deve mostra 1 de 5.
as setas >> deve ir para a próxima pagina e exibir os proximas 10 clientes ou seja os clientes de 11 a 21.
