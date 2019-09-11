<?php
/**
 * O arquivo conexão.php será usado por totas as páginas que necessitem 
 * realizar uma conexão com o banco de dados .Para  não termos que digitar 
 * os dados de acesso ao banco em todas as páginas , centralizamos eles em um 
 * único arquivo e utilizamos o comando include , quando for necessário.
 */

 /**
  * o laço try { } catch serve para tentar executar um código um código . Caso algum erro 
  *ocorra ele é capturado no catch , onde uma exceção é disparada e podemos
  * pegar a msg de erro com o método getMessage (), e customizar a msg 
  *de erro paro o usuário.
  */
  try {
      $usuario = "root"; // usuário do MySQL.
      $senha = " "; //senha do MYSQL.
      $host = "localhost"; // host onde o servidor My sql esta sendo executado .
      $bd = "gescolar "; // nome do bd.
    // aqui vamos definir configurações para o tratamentamento de errros e acentos.
    $config = array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::MYSQL_ATTR_INIT_COMMAND=> "SET NAMES utf8");
  //Aqui criamos uma variável qu abriga o objeto PDO, a conexão com o MySQL.
  $conexao = new PDO( "mysql:host=" . $host . ";dbname =" . $bd, $usuario,$senha,$config);

    }  catch(Exception $e) {
      echo $e->getMessage ();
  }
                