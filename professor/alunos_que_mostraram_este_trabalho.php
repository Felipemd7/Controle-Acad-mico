<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html >
<head>
<link href="css/alunos_que_mostraram_este_trabalho.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php require "topo1.php"; ?>
<div id="caixa_preta">
</div><!-- caixa_preta -->

<div id="box">
 <h1>Abaixo segue a lista dos alunos que enviaram o trabalho!</h1>

<?php if($_GET['pg'] == 'trabalho'){ ?>
<?php if(isset($_POST['button'])){

  $code_aluno = $_POST['code_aluno'];
  $nota = $_POST['nota'];
  $id_trabalho = $_POST['id_trabalho'];
  $disciplina = $_POST['disciplina'];
  $bimestre = $_POST['bimestre'];

$sql_3 = mysqli_query($db,"UPDATE envio_de_trabalhos SET status = 'Aceito', nota = '$nota' WHERE id = '$id_trabalho'");

echo "<script language='javascript'>window.window.location='';</script>";


}?>


<?php

$id = $_GET['id'];

$sql_1 = mysqli_query($db,"SELECT * FROM envio_de_trabalhos WHERE id_trabalho = '$id'");
if(mysqli_num_rows($sql_1) == ''){
	 echo "<h2>No momento não existe nenhum trabalho enviados para ser corrigido!</h2>";	 
}else{

	while($res_1 = mysqli_fetch_array($sql_1)){
		
$sql_1_extra = mysqli_query($db,"SELECT * FROM trabalho WHERE id = '$id'");
	while($res_1_extra = mysqli_fetch_array($sql_1_extra)){
?>

<form name="" method="post" action="" enctype="multipart/form-data">

<table width="955" border="0">
  <tr>
    <td width="107">C&oacute;digo:</td>
    <td width="302">Nome do aluno:</td>
    <td width="100">Trabalho:</td>
    <td width="144">Data de envio:</td>
    <td width="156">Nota:</td>
    <td width="170">&nbsp;</td>
  </tr>
  <tr>
  <input type="hidden" name="code_aluno" value="<?php echo $res_1['aluno']; ?>" />
  <input type="hidden" name="disciplina" value="<?php echo $res_1['disciplina']; ?>" />
  <input type="hidden" name="id_trabalho" value="<?php echo $res_1['id']; ?>" />
    <td><h3><?php echo $code_aluno = $res_1['aluno']; ?></h3></td>
    <td><h3>
     <?php
     $sql_2 = mysqli_query($db,"SELECT * FROM estudantes WHERE code = '$code_aluno'");	 
	 	while($res_2 = mysqli_fetch_array($sql_2)){
			echo $res_2['nome'];
		}
	 ?>
    </h3></td>
    <td><a href="../trabalhos_alunos/<?php echo $res_1['trabalho']; ?>" target="_blank">Ver</a></td>
    <td><h3><?php echo $res_1['data']; ?></h3></td>
    
    <?php
	if($res_1['status'] != 'Aguardar'){ 
	$nota = $res_1['nota'];
	echo "<td><h3>Corrigido - Nota: $nota</h3></td>";
	}else{
	
	?>
    <td><input name="nota" type="number" step="0.01" id="textfield" size="2" required=""></td>
    <td><input type="submit" name="button" id="button" value="Concretizar"></td>
    <?php } ?>
    
    <td> <a href="alunos_que_mostraram_este_trabalho.php?pg=excluir&id=<?php echo $res_1['id']; ?>&id_t=<?php echo $res_1['id_trabalho']; ?>"><img src="../img/deleta.jpg" border="0" title="Excluir trabalho" /></a></td>
   <?php if($res_1['status'] != 'Aguarda'){ ?>   
   <td><a href="alterar_nota_trabalho.php?pg=trabalho_bimestral&id=<?php echo $res_1['id']; ?>&aluno=<?php echo $res_1['aluno']; ?>&disciplina=<?php echo $res_1['disciplina']; ?>&nota=<?php echo $res_1['nota']; ?>" rel="superbox[iframe][400x100]"><img border="0" src="../img/ico-editar.png" title="Alterar a nota deste trabalho" /></a></td>
   <?php } ?>
  </tr>
</table>
</form>
<?php }}} ?>

<?php } ?>

<?php if(@$_GET['pg'] == 'excluir'){

$id_t = $_GET['id_t'];
$id = $_GET['id'];
$sql_2 = mysqli_query($db,"DELETE FROM envio_de_trabalhos WHERE id = '$id'");

echo "<script language='javascript'>window.location='alunos_que_mostraram_este_trabalho.php?id=$id_t&pg=trabalhos_bimestrais';</script>";

}?>
</div><!-- box -->

<?php require "rodape.php"; ?>
</body>
</html>