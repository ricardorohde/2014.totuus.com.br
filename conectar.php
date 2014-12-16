<?php


//nome do servidor (localhost)
$servidor = "localhostt";
 
//usu�rio do banco de dados
$user = "root";
 
//senha do banco de dados
$senha = "root";
      
//nome da base de dados
$db = "totuus";
 
//executa a conex�o com o banco, caso contr�rio mostra o erro ocorrido
$conexao = mysql_connect($servidor,$user,$senha);
 
//seleciona a base de dados daquela conex�o, caso contr�rio mostra o erro ocorrido
$banco = mysql_select_db($db, $conexao);


/*

//nome do servidor (localhost)
$servidor = "mysql5";
 
//usu�rio do banco de dados
$user = "totuusftp";
 
//senha do banco de dados
$senha = "xazAxZ9B";
 
//nome da base de dados
$db = "totuus";
 
//executa a conex�o com o banco, caso contr�rio mostra o erro ocorrido
$conexao = mysql_connect($servidor,$user,$senha);
 
//seleciona a base de dados daquela conex�o, caso contr�rio mostra o erro ocorrido
$banco = mysql_select_db($db, $conexao);

*/
 
?>