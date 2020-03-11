<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><?php require "../conexao.php"; $id = $_GET['id']; ?>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="css/detalhes_do_trabalho.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php if($_GET['pg'] == 'trabalho'){ ?>
<div id="box">
<?php
$sql_1 = mysqli_query($db,"SELECT * FROM trabalho WHERE id = '$id'");
	while($res = mysqli_fetch_array($sql_1)){
?>
<table border="0">
  <tr>
    <td width="273">N&ordm; trabalho:</td>
    <td width="269">Lan&ccedil;amento:</td>
  </tr>
  <tr>
    <td><h1><?php echo $res['id']; ?></h1></td>
    <td><h1><?php echo $res['data']; ?></h1></td>
  </tr>
  <tr>
    <td width="269">Disciplina:</td>
  </tr>
  <tr>
    <td><h1><?php echo $res['disciplina']; ?></h1></td>
  </tr>  
  <tr>
    <td width="273">Data de entrega:</td>
    <td width="269">Tema:</td>
  </tr>
  <tr>
    <td><h1><?php echo $res['data_de_entrega']; ?></h1></td>
    <td><h1><?php echo $res['tema']; ?></h1></td>
  </tr>
  <tr>
    <td>Mais detalhes sobre o trabalho:</td>
  </tr>
  <tr>
    <td colspan="3"><h1><?php echo $res['detalhe']; ?></h1></td>
  </tr>
  </table>
<?php } ?>  
</div><!-- box -->
<?php } ?>

</body>
</html>