<?php 
      @session_start();
      $painel_atual = "admin";
      $code = isset($_SESSION['code']) ? $_SESSION['code'] : "";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<?php 
  require "../config.php";
  require "../conexao.php";
  
 $sql_ve = mysqli_num_rows(mysqli_query($db,"SELECT * FROM acesso_ao_sistema where code = '$code' AND painel = 'admin' "));
  if($sql_ve == 0){
    session_destroy();
    echo "<script language='javascript'>window.location='../index.php';</script>";
  }
  

 ?>
<link href="css/topo.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../js/jquery-1.7.2.min.js"></script>
<script src="../js/lightbox.js"></script>
<link href="../css/lightbox.css" rel="stylesheet" />


<link rel="stylesheet" href="../jquery.superbox.css" type="text/css" media="all" />
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>

	<script type="text/javascript" src="../jquery.superbox-min.js"></script>
	<script type="text/javascript">

		$(function(){

			$.superbox.settings = {

				closeTxt: "Fechar",

				loadTxt: "Carregando...",

				nextTxt: "Next",

				prevTxt: "Previous"

			};

			$.superbox();

		});

	</script>
</head>

<body>
<div id="box_topo">
 
 <div id="logo">
  <img src="../img/logo.png" />
 </div><!-- logo -->
 
 <div id="campo_busca">
 <?php if(isset($_POST['search'])){
	 
 $key = $_POST['key'];
 if($key == ''){
   echo "<script language='javascript'>window.alert('Digite algo para fazer a pesquisa');</script>";
 }else{
   echo "<script language='javascript'>window.location='resultado_da_pesquisa.php?q=$key';</script>";	 	  
 }}?>
  <form name="" method="post" action="" enctype="multipart/form-data">
   <input type="text" name="key" /><input class="input" type="submit" name="search" value="" />
  </form>
 </div><!-- campo_busca -->
 
 <div id="mostra_login">
  <h1><strong>Seja Bem Vindo - Seu código de acesso é: <?php echo @$code; ?></strong> <strong><a href="../config.php?pg=sair">Sair</a></strong></h1>
 </div><!-- mostra_login -->
</div><!-- box_topo -->

<div id="box_menu">
 
 <div id="menu_topo">
  <ul>
   <img src="img/separador_menu.png" />
   <li><a href="index.php">HOME</a></li>
   <img src="img/separador_menu.png" />
   <li><a href="">CURSOS E DISCIPLINAS</a>
    <ul>
     <li><a href="cursos_e_disciplinas.php?pg=curso">Cadastrar Curso</a></li>
     <li><a href="cursos_e_disciplinas.php?pg=disciplina">Cadastrar Disciplina</a></li>
     <li><a href="cursos_e_disciplinas.php?pg=cursoedisciplinas">Cursos & Disciplinas</a></li>
    </ul>
   </li>
   <img src="img/separador_menu.png" />
   <li><a href="professores.php?pg=todos">PROFESSORES</a></li>   
   <img src="img/separador_menu.png" />
   <li><a href="estudantes.php?pg=todos">ESTUDANTES</a></li>
   <img src="img/separador_menu.png" />
  
   <img src="img/separador_menu.png" />
   <li><a href="suporte_tecnico.php">SUPORTE TECNICO</a></li>
   <img src="img/separador_menu.png" />
   <!--<li><a href="">EXTRAS</a>
    <ul>
    <li><a href="funcionarios.php?pg=todos">Funcionários</a></li>
    </ul>
   </li>-->
   <img src="img/separador_menu.png" />   
  </ul>
 </div><!-- menu_topo -->

</div><!-- box_menu -->
</body>
</html>