<html>
<head>
<link href="css/correcao_prova.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php  require "topo1.php"; 
$id = $_GET['id'];
$bimestre = $_GET['bimestre'];//AQUI EU PEGO O ID DA PROVA
?>
<div id="caixa_preta">
</div><!-- caixa_preta -->

<div id="box">
 <h1>Abaixo segue a lista dos alunos desta disciplina!</h1>

<?php if(isset($_POST['button'])){

$code_aluno = $_POST['code_aluno'];
$notaQual = $_POST['notaQual'];
$notaQuant = $_POST['notaQuant'];
$disciplina = $_POST['disciplina'];
$prova = $_FILES['prova']['name'];

if(file_exists("../trabalhos_alunos/$prova")){
	$a = 1;
	while(file_exists("../trabalhos_alunos/[$a]$prova")){
	$a++;
  }
  	$prova = "[".$a."]".$prova;
 }

 $sql_3 = mysqli_query($db,"INSERT INTO notas_provas (code, disciplina, notaQual,notaQuant, prova,bimestre, id_prova) VALUES ('$code_aluno', '$disciplina', '$notaQual', '$notaQuant', '$prova','$bimestre', '$id')");
 
 (move_uploaded_file($_FILES['prova']['tmp_name'], "../trabalhos_alunos/".$prova));
 
 echo "<script language='javascript'>window.location='';</script>";

}?> 
 
 
 
<?php

$sql_1 = mysqli_query($db,"SELECT * FROM provas WHERE id = '$id'");
	while($res_1 = mysqli_fetch_array($sql_1)){
		$curso = $res_1['curso'];
		$professor = $res_1['professor'];
		
$sql_2 = mysqli_query($db,"SELECT * FROM estudantes WHERE serie = '$curso'");
if(mysqli_num_rows($sql_2) == ''){
	echo "<h2>Nem um aluno cadastrado neste curso</h2>";
}else{
		while($res_2 = mysqli_fetch_array($sql_2)){
?> 
 
<form name="" method="post" action="" enctype="multipart/form-data">
<input type="hidden" name="disciplina" value="<?php echo $res_1['disciplina']; ?>" />
<input type="hidden" name="code_aluno" value="<?php echo $res_2['code']; ?>" />
<table width="955" border="0">
  <tr>
    <td width="107">C&oacute;digo:</td>
    <td width="302">Nome do aluno:</td>
 <!--  <td width="200">&nbsp</td> 
  <td width="200">Prova Scaneada:</td> -->
    <td width="156">1 Prova</td>
     <td width="156">2 Prova</td>
  </tr>
  <tr>
    <td><h3><?php echo $code_aluno = $res_2['code']; ?></h3></td>
    <td><h3><?php echo $res_2['nome']; ?></h3></td>
   <!-- <td><h3><?php echo $res_1['data_aplicacao']; ?></h3></td>-->
    <?php
    $sql_4 = mysqli_query($db,"SELECT * FROM notas_provas WHERE code = '$code_aluno' AND id_prova = '".$id."'");
	if(mysqli_num_rows($sql_4) == ''){
	?>
    <td><input type="file" name="prova" size="5"  /></td>
    <td><input name="notaQual" type="text" id="textfield" size="6"></td><!--Nota Qualitativa-->
     <td><input name="notaQuant" type="text" id="textfield" size="6"></td><!--Nota Quantitativa-->
    <td><input type="submit" name="button" id="button" value="Concretizar"></td>
    
    <?php }else{ 
      while($res_4 = mysqli_fetch_array($sql_4)){ ?>
    <!--<td><a target="_blank" href="../trabalhos_alunos/<?php echo $res_4['prova']; ?>">Ver prova</a></td>-->
    <td><h3><?php echo $res_4['notaQual']; ?></h3></td>
     <td><h3><?php echo $res_4['notaQuant']; ?></h3></td>

   <td><a href="alterar_nota_trabalho.php?pg=prova_bimestral&id=<?php echo $res_4['id']; ?>&aluno=<?php echo $res_2['code']; ?>&disciplina=<?php echo $res_1['disciplina']; ?>&professor=<?php echo $res_1['professor'];  ?>&notaQual=<?php echo $res_4['notaQual']; ?>&notaQuant=<?php echo $res_4['notaQuant']; ?>" rel="superbox[iframe][400x100]"><img src="../img/ico-editar.png" border="0" title="Alterar a nota" /></a></td>
    <?php }}?>
  </tr>
</table>
</form>
<?php }}} ?>
</div><!-- box -->

<?php require "rodape.php"; ?>
</body>
</html>