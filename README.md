# cjoweb2
** Ia para auxiliar
https://copilot.microsoft.com/chats/pTsvWkWUGMjZsD8fcNnVz

foi criada a conexão com o banco usando o programa MySQL Workbench utilizando o arquivo script_banco.sql
A primeira senha criada foi abc@1234
a senha deve ser passada na pagina pelo metodo get que pega o que é passado na url 
http://localhost:8000/cjoweb2/Central/fn/hashPass.php
após o php acrescenta o sina de interrogação e sigla psw e o sinal de =  ?psw= e a senha psw=abc@1234
O resultado ficara assim
http://localhost:8000/cjoweb2/Central/fn/hashPass.php?psw=abc@1234
uma vez criada a criptografia da senha na pagina de login deve ser usada a senha: abc@1234
feito o login deve vir para a pagina: **http://localhost:8000/cjoweb2/Sistema/clientes/**
Meu usuário foi atualizado para wesley@acme.com a senha permaneceu a mesma
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

## Instruções para execução
primeiro deve fazer o login em seguida acessar o primeiro link abaixo passando como parametro um valor como é mostrado no exemplo onde usamos o 10
### link para o primeiro arquivo
http://localhost:8000/cjoweb2/Sistema/clientes/Nome_sobrenome_exe01.php?listar=10

### como deve ficar
http://localhost:8000/cjoweb2/Sistema/clientes/wesley_schuab_exe01.php?listar=10

link para o segundo arquivo
http://localhost:8000/cjoweb2/sistema/clientes/nome_sobrenome_exe02.php

como deve ficar
http://localhost:8000/cjoweb2/sistema/clientes/wesley_schuab_exe02.php

# Como gerar o Crud com base no banco usando IA

As quebras de linha sem enviar o código deve ser feitas usando o o atalho  shift enter 
*** Executa o script do banco para criar a tabela
**cola a tabela do banco 

CREATE TABLE IF NOT EXISTS fornecedores (
    id_fornecedor INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) DEFAULT NULL,
    cnpj VARCHAR(18) DEFAULT NULL,
    email VARCHAR(100),
    telefone VARCHAR(15),
    endereco TEXT,
    descricao TEXT,
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE = InnoDB DEFAULT CHARSET=UTF8MB4;

passo o novo comando
coma base nessa tabela e a base do código abaixo como referencia de estrutura 
caminho do código que foi passado
C:\wamp64\www\cjoweb2\sistema\clientes\index.php
**agora faço todo layoult usando o bootstrap 5.3 
nesse arquivo temos o exato comando usado na IA

https://github.com/WesleySchuab/cjoweb2/blob/main/cjoweb2/0-Setup/Ia.txt

O arquivo server armazenado no seguinte caminho 
C:\wamp64\www\cjoweb2\central\fn\server.php
aponta para o arquivo onde estão os menus 

O arquivo menu no seguinte caminho 
C:\wamp64\www\cjoweb2\central\fn\menu.php

arquivo de menu
https://github.com/WesleySchuab/cjoweb2/blob/main/cjoweb2/central/fn/menu.php

Deve conter os menus 

### As paginas atualizar
Estão recebendo o codido do que será alterado pelo metodo GET
para passar esse parametro pelo metodo get usamos a URL

### A sintaxe básica é: http://seusite.com/pagina.php?parametro1=valor1&parametro2=valor2
?: Indica o início dos parâmetros.
&: Separa os diferentes parâmetros.
parametro: O nome do parâmetro.
valor: O valor associado ao parâmetro.

*** URL do site que vamos acessar
http://localhost:8000/cjoweb2/Sistema/clientes/cliente_atualizar.php
caracter que indica que será passado parametro 
?
Variavel que recebe o código 
codigo

Sinal de atribuição 
=
Código do cliente que queremos alterar
DRTWR-34XT-D2GT5
