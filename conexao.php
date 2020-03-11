<meta http-equiv="Content-Type" content="text/html; charset=uft-8" />
<?php

  $servidor = "localhost";
  $usuario = "root";
  $senha = "";
  $db1 = "id7594032_sistema_escolar";
  /*$servidor = "localhost";
  $usuario = "id7594032_root1234";
  $senha = "15151515";
  $db1 = "id7594032_sistema_escolar";*/
  $db = mysqli_connect($servidor, $usuario, $senha, $db1); 
  @mysqli_set_charset("utf8_unicode_ci",$db);
 // mysqli_set_charset($db,"utf8_decode");

  //$db = mysql_connect("localhost", "root", "");

  //$conexao = mysqli_select_db("sistema_escolar");

?>