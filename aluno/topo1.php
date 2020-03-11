<?php
  session_start();
  $_SESSION['painel_atual'] = "Aluno";
  $code = isset($_SESSION['code']) ? $_SESSION['code'] : "";
?>
<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">


  <?php 
  require "../config.php";
  require "../conexao.php";

  //eu verifico se existe realmente o aluno com o codigo e painal informado
  //medida de seguranca
  $sql_ve = mysqli_num_rows(mysqli_query($db,"SELECT * FROM acesso_ao_sistema where code = '$code' AND painel = 'Aluno' "));
  if($sql_ve == 0){
    session_destroy();
    echo "<script language='javascript'>window.location='../index.php';</script>";
  }

    $sql_aluno = mysqli_query($db,"SELECT * FROM estudantes WHERE code = '$code'");
    while($r_aluno = mysqli_fetch_array($sql_aluno)){
      $nome = $r_aluno['nome'];
      $serie = $r_aluno['serie'];
      $turno = $r_aluno['turno'];
      $cpf = $r_aluno['cpf'];
    }

      $nome_usuario = explode(" ", $nome);
  ?>  


  <title>SISA</title>
  <link rel="stylesheet" href="css_topo/style.css">
  <script src='js_topo/jquery.min.js'></script>
  <script  src="js_topo/index.js"></script>


  
</head>

<body>

  <header>
<nav id='cssmenu'>
<div class="logo" ><a href="index.php">Olá, <?php echo $nome_usuario[0]; ?></a></div>
<div id="head-mobile"></div>
<div class="button"></div>
<ul>
<li class='active'><a href='index.php'>INICIO</a></li>
<li><a href='presencas.php'>FREQUÊNCIA</a></li>
<li><a href='trabalhos.php'>TRABALHOS</a></li>
<li><a href='minhas_notas.php?pg=provas' >MINHAS NOTAS</a>
   <!-- <ul>
      <li><a href='minhas_notas.php?pg=trabalhos'>Notas de Trabalhos</a></li>
      <li><a href='minhas_notas.php?pg=provas'>Notas de Provas</a></li>
   </ul> -->
</li>
<!--
<li><a href='contatos.html'>CONTATE-NOS</a></li>-->
<li><a href='../config.php?pg=sair' type="close">SAIR</a></li>
</ul>
</nav>
</header>

</body>

</html>
