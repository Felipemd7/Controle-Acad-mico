<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><?php require "../conexao.php"; $id = $_GET['id']; $code = $_GET['id']; ?>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="css/editar_trabalho.css" rel="stylesheet" type="text/css" />
</head>


<body>
<div id="box">
<?php

$sql_1 = mysqli_query($db,"SELECT * FROM trabalhos_extras WHERE id = '$id'");
while($res_1 = mysqli_fetch_array($sql_1)){
?>
 <form name="send" method="post" action="" enctype="multipart/form-data">		
<table width="700" border="0">
  <tr>
    <td width="198">N&ordm; trabalho</td>
    <td width="216">Lan&ccedil;amento</td>
    <td width="272">Disciplina</td>
  </tr>
  <tr>
    <td><input disabled type="text" value="<?php echo $res_1['id'];?>"></td>
    <td><input disabled type="text" value="<?php echo $res_1['date'];?>"></td>
    <td>
      <select name="dis" id="dis">
      <option value=""></option>
      </select></td>
  </tr>
  <tr>
    <td>Total de pontos:</td>
    <td width="216">Data de entrega</td>
    <td width="272">Tema</td>
  </tr>
  <tr>
    <td><input type="text" name="pontos" value="<?php echo $res_1['pontos'];?>"></td>
    <td><input type="text" name="encerramento" value="<?php echo $res_1['data_entrega'];?>"></td>
    <td><input type="text" name="tema" value="<?php echo $res_1['tema'];?>"></td>
  </tr>
  <tr>
    <td>Mais detalhes sobre o trabalho:</td>
  </tr>
  <tr>
    <td colspan="3"><textarea name="detalhes" cols="" rows=""><?php echo $res_1['detalhe'];?></textarea></td>
  </tr>  
  <tr>
    <td><input class="input" type="submit" name="button" id="button" value="Editar"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  </table>
  </form>
<?php } ?>  
</div><!-- box -->
</body>
</html>