<?php $painel_atual = "tesouraria";?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<?php  
require "gerador_cobranca.php";
  $servidor = "localhost";
  $usuario = "root";
  $senha = "1515";
  $db1 = "id7594032_sistema_escolar";
  /*$servidor = "localhost";
  $usuario = "id7594032_root1234";
  $senha = "15151515";
  $db1 = "id7594032_sistema_escolar";
  $db = mysqlii_connect($servidor, $usuario, $senha, $db1);*/ 
  $db = mysqlii_connect($servidor, $usuario, $senha, $db1);

 //require "../config.php"; ?>
<title>To Learn - Tesouraria </title>
<link href="css/topo.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../js/jquery-$db,1.7.2.min.js"></script>
<script src="../js/lightbox.js"></script>
<link href="../css/lightbox.css" rel="stylesheet" />


<link rel="stylesheet" href="../jquery.$db,superbox.css" type="text/css" media="all" />
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/$db,1.3.2/jquery.$db,min.js"></script>

	<script type="text/javascript" src="../jquery.$db,superbox-min.js"></script>
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
<div id="cobre_tudo">
<div id="box_topo">
 
 <div id="logo">
  <a href="index.php"><img border="0" src="../img/logo.png" /></a>
 </div><!-- logo -->
 
 <div id="campo_busca">
  <form name="search" method="post" action="" enctype="multipart/form-data">
   <input type="text" name="key" /><input class="input" type="submit" name="search" value="" />
  </form>
  
  <?php if(isset($_POST['search'])){
  
  $key = $_POST['key'];
  if($key == ''){
	  echo "<script language='javascript'>window.alert('Por favor, informe o n�mero da cobran�a ou o n�mero de matricula!');</script>";
  }else{
	  $sql_1 = mysqli_query($db,"SELECT * FROM mensalidades WHERE code = '$key'");
	  if(mysqli_num_rows($sql_1) >=1){
   			echo "<script language='javascript'>window.location='mostrar_mensalidade.php?mensalidade=$key&status=mostra_fatura';</script>";		
	  }else{
	  $sql_2 = mysqli_query($db,"SELECT * FROM estudantes WHERE code = '$key' OR nome = '$key' OR cpf = '$key'");
	  if(mysqli_num_rows($sql_2) >= 1){
		  while($res_2 = mysqli_fetch_array($sql_2)){	
		  	$code_aluno = $res_2['code'];
	   echo "<script language='javascript'>window.location='mostrar_aluno.php?matricula=$code_aluno';</script>";	
		  }
	  }else{
	   echo "<script language='javascript'>window.alert('N�o foi encontrado nenhum resultado, verifique a informa��o digitada!');</script>";  
		  
  
  }}}}?>
 </div><!-- campo_busca -->
 
 <div id="mostra_login">
  <h1><strong>Seja Bem Vindo <?php echo @$nome; ?></strong> <strong><a href="../config.php?pg=sair">Sair</a></strong></h1>
 </div><!-- mostra_login -->
</div><!-- box_topo -->

</div><!-- cobre_tudo -->
</body>
</html>