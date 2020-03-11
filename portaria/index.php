<?php $painel_atual = "portaria"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sem t&iacute;tulo</title>
<link href="css/index.css" rel="stylesheet" type="text/css" />
<?php require "../config.php"; ?>
</head>

<body>
<div id="box">
 
 <div id="porteiro">
  <h1><strong>Seu código é:</strong> <?php echo $code; ?> <a href="../config.php?acao=quebra"><strong>SAIR</strong></a></h1>
 </div><!-- porteiro -->
 
 <div id="logo">
  <img src="../img/logo.png" />
 </div><!-- logo -->
 
 <div id="campo_busca">
   <form name="" method="post" action="" enctype="multipart/form-data">
   <input type="text" name="cpf" value="" /><input class="input" type="submit" name="send" value="" />
  </form>
  
 <?php if(isset($_POST['send'])){
 
 $cpf = $_POST['cpf'];
 
 if($cpf == ''){
	 echo "<script language='javascript'>window.alert('Digite o número o número de matricula ou o CPF!');</script>";
 }else{
 
 	$sql_1 = mysql_query("SELECT * FROM estudantes WHERE code = '$cpf' OR nome = '$cpf' OR cpf = '$cpf' OR rg = '$cpf'");
 	if(mysql_num_rows($sql_1) == ''){
	echo "<br><br><br><br><h2>Aluno não encontrado, verifique a informação inserida!</h2>";
	}else{
		while($res_1 = mysql_fetch_array($sql_1)){
			
			$nome = $res_1['nome'];
			$code = $res_1['code'];
			$rg = $res_1['rg'];
			
	?>
<br><br><br><br><h3><strong>Aluno:</strong> <?php echo $nome ?> <strong>Nº de matricula:</strong> <?php echo $code; ?> <strong>RG:</strong> <?php echo $rg; ?> <a href="index.php?pg=confirma&code_a=<?php echo $code; ?>"><img src="../img/correto.jpg" title="Confirmar" border="0" /></a> <a href="index.php"><img src="../img/deleta.jpg" title="Cancelar" /></a> </h3><input type="hidden" name="codes" value="<?php $codes = $res_1['code']; ?>" />  
    
<?php }}}} ?>


<?php if(@$_GET['pg'] == 'confirma'){

$dates = date("d/m/Y H:i:s");
$date = date("d/m/Y");
$code_a = $_GET['code_a'];

mysql_query("INSERT INTO confirma_entrada_de_alunos (date, data_hoje, porteiro, code_aluno) VALUES ('$dates', '$date', '$code', '$code_a')");
echo "<script language='javascript'>window.alert('Entrada deste(a) aluno(a) foi confirmada!');window.location='index.php';</script>";

}?>



 </div><!-- campo_busca -->
 <br><br><br>
</div><!-- box -->
</body>
</html>