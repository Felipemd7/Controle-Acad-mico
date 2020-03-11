<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><?php require "../conexao.php"; $date = date("d/m/Y H:i:s"); $code = $_GET['code']; $id = $_GET['id']; ?>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="css/cadastrar_prova.css" rel="stylesheet" type="text/css" />
</head>


<body>
<div id="box">
<?php if(isset($_POST['button'])){

$dis = $_POST['dis'];
$aplicacao = $_POST['aplicacao'];
$detalhes = $_POST['detalhes'];

$sql_3 = mysqli_query($db,"UPDATE provas SET disciplina = '$dis', detalhes = '$detalhes', data_aplicacao = '$aplicacao' WHERE id = '$id' ");
		
echo "Esta prova foi atualizada no sistema com sucesso!<br>Aparte em F5 em seu teclado.";

die;		

}?>

<?php

$sql_5 = mysqli_query($db,"SELECT * FROM provas WHERE id = '$id'");
	while($res_5 = mysqli_fetch_array($sql_5)){
?>
 <form name="send" method="post" action="" enctype="multipart/form-data">	
	
<table border="0">
  <tr>
    <td width="272">Disciplina</td>
    <td width="216">Data de aplicação da prova</td>
  </tr>
  <tr>
    <td>
      <select name="dis" id="dis">
      <?php
      $sql_1 = mysqli_query($db,"SELECT * FROM disciplinas WHERE professor = '$code'");
	  	while($res_1 = mysqli_fetch_array($sql_1)){
	  ?>
      <option value="<?php echo $res_1['id']; ?>"><?php echo $res_1['disciplina']; ?></option>
      <?php } ?>
      </select>
      </td>
    <td><input type="text" name="aplicacao" value="<?php echo $res_5['data_aplicacao']; ?>"></td>
  </tr> 
  <tr>
    <td>Informações adicionais:</td>
  </tr>
  <tr>
    <td colspan="3"><textarea name="detalhes" cols="" rows=""><?php echo $res_5['detalhes']; ?></textarea></td>
  </tr>
  <tr>
    <td><input class="input" type="submit" name="button" id="button" value="Atualizar"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  </table>
  </form>
<?php } ?>  
</div><!-- box -->
</body>
</html>