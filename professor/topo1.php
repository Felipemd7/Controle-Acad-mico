<?php 
      @session_start();
      $painel_atual = "professor";
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
  $sql_ve = mysqli_num_rows(mysqli_query($db,"SELECT * FROM acesso_ao_sistema where code = '$code' AND painel = 'professor' "));
  if($sql_ve == 0){
    session_destroy();
    echo "<script language='javascript'>window.location='../index.php';</script>";
  }

 ?> 


  <title>SISA</title>
  <link rel="stylesheet" href="css_topo/style.css">
  <script src='js_topo/jquery.min.js'></script>
  <script  src="js_topo/index.js"></script>


  
</head>

<body>

 <?php 
    $nome = "";
    $slq_nome = mysqli_query($db,"SELECT nome FROM professores WHERE code = '$code'");
    while($res_2 = mysqli_fetch_array($slq_nome)){
     $nome = $res_2['nome'];
    }
    $nome_usuario = explode(" ", $nome);

  ?>


  <header>
<nav id='cssmenu'>
<div class="logo" ><a href="index.php">Olá, <?php echo $nome_usuario[0]; ?></a></div>
<div id="head-mobile"></div>
<div class="button"></div>
<ul>
<li class='active'><a href="index.php">INICIO</a></li>
<li><a href="turmas_e_alunos.php">TURMAS & ALUNOS</a></li>
<li><a href="">TODAS AS AVALIAÇÕES</a>
    <ul>
     <li><a href="trabalho.php">Trabalhos</a></li>
     <li><a href="todas_as_avaliacoes.php?pg=provas_bimestrais">Provas</a></li>
    </ul>
   </li>
<!--
<li><a href='contatos.html'>CONTATE-NOS</a></li>-->
<li><a href='../config.php?pg=sair' type="close">SAIR</a></li>
</ul>
</nav>
</header>

</body>

</html>
