<?php
session_start();
$_SESSION['painel_atual'] = "professor";
$code = $_SESSION['code'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="css/turmas_e_alunos.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php require "topo1.php"; ?>


<div id="box">

<?php
 $sql_1 = mysqli_query($db,"SELECT * FROM disciplinas WHERE professor = '$code'");
if(mysqli_num_rows($sql_1) == ''){
	echo "Você não ministra nenhuma disciplina!";
}else{ ?>

	
	<h1><strong>Alunos e Disciplinas</strong></h1>
	<?php while($res_1 = mysqli_fetch_array($sql_1)){
		$curso = $res_1['curso'];
?>	
 <table width="955" border="0" id="customers">
  <tr>
    <td width="400"><strong>Disciplina ministrada:</strong> <?php echo $res_1['disciplina']; ?></td>
    <td width="300"><strong>Total de alunos desta disciplina: </strong><?php echo mysqli_num_rows(mysqli_query($db,"SELECT * FROM estudantes WHERE serie = '$curso'")); ?></td>
    <td width="123"><a href="fazer_chamada.php?curso=<?php echo $res_1['curso']; ?>&dis=<?php echo $res_1['disciplina']; ?>">Fazer Chamada</a></td>
  </tr>
 </table>	
<?php }} ?>
</div><!-- box -->

<?php require "rodape.php"; ?>
</body>
</html>