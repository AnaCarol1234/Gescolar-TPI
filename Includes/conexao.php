<?php

/*
 * o arquivo conexão.php será usado por todas a páginas que necessitem
 * realizar um conexão com o o bando de dados. para nao termos que digigar
 * os dados de acesso ao banco em todas as paginas, centralizamos eles
 * em um unico arquivo e utilizamos o comando include, quando forn cessario.
 */

 /**
 * O laço try { } catch serve para tentar executar um código. Caso algum erro
 * ocorra ele é caputuyrado no catch, entre uma exeção é disparada e podemos
 * pegar a mensagem de erro com o método getMessa(), e customizar a mensagem
 * de erro para o usuario
 */

 try {

    $usuario = "root"; //usuario do MySQL.
    $senha = ""; //senha do MySQL.
    $host = "localhost"; //host onde o servidor MySQL está sendo executado.
    $bd = "gescolar"; //nome do banco de dados.

    $config = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXEPTION,
                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
 
    // Arqui criamos um varíavel que abriga o objeto PDO, a conexao com o MySQL.
    $conexao = new PDO("mysql:host=" . $host . ";dbname=" . $bd, $usuario, $senha, $config);

 } catch(Exception $e) {
     echo $e->getMessage();
 }

?>