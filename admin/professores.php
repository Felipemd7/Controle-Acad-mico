<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Adminstra&ccedil;&atilde;o</title>
<link href="css/professores.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php require "topo1.php"; ?>


<?php if(@$_GET['pg'] == 'todos'){ ?>
<div id="box_professores">
  <div id="customers">
<br /><br />
<a class="a2" href="professores.php?pg=cadastra">Cadastrar Professor</a>
<h1>Professores</h1>
<?php
$sql_1 = mysqli_query($db,"SELECT * FROM professores WHERE nome != ''");
if(mysqli_num_rows($sql_1) == ''){
	echo "No momento não existe professores cadastrados!";
}else{
?>
    <table width="900" border="0">
      <tr>
        <td><h3>Codigo:</h3></td>
        <td><h3>Nome:</h3></td>
        <td><h3>Disciplina(s):</h3></td>
        <td><h3>Remuneracao:</h3></td>
        <td><h3>Status:</h3></td>
        <td></td>
      </tr>
      <?php while($res_1 = mysqli_fetch_array($sql_1)){ ?>
      <tr>
        <td><h4><?php echo $code = $res_1['code']; ?></h3></t4>
        <td><h4><?php echo $res_1['nome']; ?></h4></td>
        <td><h4><?php echo mysqli_num_rows(mysqli_query($db,"SELECT * FROM disciplinas WHERE professor = '$code'")); ?></h4></td>
        <td><h4>R$ <?php echo $res_1['salario']; ?></h4></td>
        <td><h4><?php echo $res_1['status']; ?></h4></td>
        
        <td>
        <a class="a" href="professores.php?pg=todos&func=deleta&id=<?php echo $res_1['id']; ?>"><img title="Excluir Professor" src="img/deleta.jpg" width="18" height="18" border="0"></a>
        <?php if($res_1['status'] == 'Inativo'){?>
        <a class="a" href="professores.php?pg=todos&func=ativa&id=<?php echo $res_1['id']; ?>&code=<?php echo $res_1['code']; ?>"><img title="Ativar novamente professor" src="../img/correto.jpg" width="20" height="20" border="0"></a>
        <?php } ?>
        <?php if($res_1['status'] == 'Ativo'){?>
        <a class="a" href="professores.php?pg=todos&func=inativa&id=<?php echo $res_1['id']; ?>&code=<?php echo $res_1['code']; ?>"><img title="Inativar Professor(a)" src="../img/ico_bloqueado.png" width="18" height="18" border="0"></a>
        <?php } ?>
        
        <a class="a" href="professores.php?pg=todos&func=edita&id=<?php echo $res_1['id']; ?>"><img title="Editar Dados Cadastrais" src="../img/ico-editar.png" width="18" height="18" border="0"></a>

        <a class="a" rel="superbox[iframe][930x500]" href="historico_professor.php?id=<?php echo $res_1['id']; ?>"><img title="Histórico deste professor" src="../img/visualizar16.gif" width="18" height="18" border="0"></a></td>
      </tr>
      <?php } ?>
    </table>
    </div>
<?php }?>
<br />

<?php if(@$_GET['func'] == 'deleta'){

$id = $_GET['id'];

mysqli_query($db,"DELETE FROM professores WHERE id = '$id'");

echo "<script language='javascript'>window.location='professores.php?pg=todos';</script>";

}?>


<?php if(@$_GET['func'] == 'ativa'){

$id = $_GET['id'];
$code = $_GET['code'];

mysqli_query($db,"UPDATE professores SET status = 'Ativo' WHERE id = '$id'");
mysqli_query($db,"UPDATE acesso_ao_sistema SET status = 'Ativo' WHERE code = '$code'");

echo "<script language='javascript'>window.location='professores.php?pg=todos';</script>";

}?>


<?php if(@$_GET['func'] == 'inativa'){

$id = $_GET['id'];
$code = $_GET['code'];

mysqli_query($db,"UPDATE professores SET status = 'Inativo' WHERE id = '$id'");
mysqli_query($db,"UPDATE acesso_ao_sistema SET status = 'Inativo' WHERE code = '$code'");

echo "<script language='javascript'>window.location='professores.php?pg=todos';</script>";

}?>


<?php if(@$_GET['func'] == 'edita'){ ?>
<hr />
<h1>Editar professor</h1>


<?php
$id = $_GET['id'];

$sql_1 = mysqli_query($db,"SELECT * FROM professores WHERE id = '$id'");
	while($res_1 = mysqli_fetch_array($sql_1)){
?>

<?php if(isset($_POST['button'])){
$id = $_GET['id'];
$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$nascimento = $_POST['nascimento'];
$formacao = $_POST['formacao'];
$graduacao = $_POST['graduacao'];
$pos_graduacao = $_POST['pos_graduacao'];
$mestrado = $_POST['mestrado'];
$doutorado = $_POST['doutorado'];
$salario = $_POST['salario'];


$sql_2 = mysqli_query($db,"UPDATE professores SET nome = '$nome', cpf = '$cpf', nascimento = '$nascimento', formacao = '$formacao', graduacao = '$graduacao', pos_graduacao = '$pos_graduacao', mestrado = '$mestrado', doutorado = '$doutorado', salario = '$salario' WHERE id = '$id'");
if($sql_2 == ''){
	echo "<script language='javascript'>window.alert('Ocorreu um erro tente novamente!');window.location='';</script>";
}else{
	echo "<script language='javascript'>window.alert('Atualização realizada com sucesso!');window.location='professores.php?pg=todos';</script>";

}}?>

<form name="form1" method="post" action="" enctype="multipart/form-data">
  <table width="900" border="0">
    <tr>
      <td>Nome:</td>
      <td>CPF</td>
      <td>Salário:</td>
    </tr>
    <tr>
      <td><label for="textfield2"></label>
      <input type="text" name="nome" id="textfield2" value="<?php echo $res_1['nome']; ?>"></td>
      <td><label for="textfield3"></label>
      <input type="text" name="cpf" id="textfield3" value="<?php echo $res_1['cpf']; ?>"></td>
      <td><input type="text" name="salario" id="textfield8" value="<?php echo $res_1['salario']; ?>"></td>
    </tr>
    <tr>
      <td>Data de nascimento:</td>
      <td>Formação Acadêmica</td>
      <td>Graduação(ões):</td>
    </tr>
    <tr>
      <td><label for="textfield4"></label>
      <input type="text" name="nascimento" id="textfield4" value="<?php echo $res_1['nascimento']; ?>"></td>
      <td><label for="select"></label>
        <select name="formacao" size="1" id="select">
          <option value="<?php echo $res_1['formacao']; ?>"><?php echo $res_1['formacao']; ?></option>
          <option value=""></option>
          <option value="Ensino Médio Incompleto">Ensino M&eacute;dio Incompleto</option>
          <option value="Ensino Médio Completo">Ensino M&eacute;dio Completo</option>
          <option value="Superior Incompleto">Superior Incompleto</option>
          <option value="Superior Completo">Superior Completo</option>
      </select></td>
      <td><input type="text" name="graduacao" id="textfield5" value="<?php echo $res_1['graduacao']; ?>"></td>
    </tr>
    <tr>
      <td>Pos-graduação(ões):</td>
      <td>Mestrado(s):</td>
      <td>Doutorado(s):</td>
    </tr>
    <tr>
      <td><input type="text" name="pos_graduacao" id="textfield6" value="<?php echo $res_1['pos_graduacao']; ?>"></td>
      <td><input type="text" name="mestrado" id="textfield7" value="<?php echo $res_1['mestrado']; ?>"></td>
      <td><input type="text" name="doutorado" id="textfield8" value="doutorado"></td>
    </tr>
    <tr>
      <td><input class="input" type="submit" name="button" id="button" value="Atualizar"></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
<?php } ?>
</form>
<?php } ?>
<br />
</div><!-- box_professores -->


<?php } // aqui é o fechamento da PG todos ?>




<?php if(@$_GET['pg'] == 'cadastra'){ ?>
<div id="cadastra_professores">
  <div id="customers"></div>
<h1>Cadastrar novo professor</h1>
<?php if(isset($_POST['button'])){
	
$code = $_POST['code'];
$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$nascimento = $_POST['nascimento'];
$formacao = $_POST['formacao'];
$graduacao = $_POST['graduacao'];
$pos_graduacao = $_POST['pos_graduacao'];
$mestrado = $_POST['mestrado'];
$doutorado = $_POST['doutorado'];
$salario = $_POST['salario'];

$sql_2 = mysqli_query($db,"INSERT INTO professores (code, status, nome, cpf, nascimento, formacao, graduacao, pos_graduacao, mestrado, doutorado, salario) VALUES ('$code', 'Ativo', '$nome', '$cpf', '$nascimento', '$formacao', '$graduacao', '$pos_graduacao', '$mestrado', '$doutorado', '$salario')");
if($sql_2 == ''){
	echo "<script language='javascript'>window.alert('Ocorreu um erro ao cadastrar!');</script>";
}else{
	mysqli_query($db,"INSERT INTO acesso_ao_sistema (status, code, senha, nome, painel) VALUES ('Ativo', '$code', '$cpf', '$nome', 'professor')");
	echo "<script language='javascript'>window.alert('Professor cadastrado com sucesso!');window.location='professores.php?pg=todos';</script>";
 }
}?>



<form name="form1" method="post" action="">
  <table width="900" border="0">
    <tr>
      <td><h4>C&oacute;digo:</h4></td>
      <td><h4>Nome:</h4></td>
      <td><h4>CPF:<h4></td>
    </tr>
    <tr>
      <td>
      <?php
      $sql_1 = mysqli_query($db,"SELECT * FROM professores ORDER BY id DESC LIMIT 1");
	  if(mysqli_num_rows($sql_1) == ''){
		  $new_code = "87415978";
	  ?>
        <input type="text" name="code" id="textfield" disabled="disabled" value="<?php echo $new_code;  ?>">
        <input type="hidden" name="code" value="<?php echo $new_code;  ?>" />
        </td>      
      <?php
	  }else{
	  	while($res_1 = mysqli_fetch_array($sql_1)){
			
			$new_code = $res_1['code']+$res_1['id']+741;
	  ?>
        <input type="text" name="code" id="textfield" disabled="disabled" value="<?php echo $new_code;  ?>">
        <input type="hidden" name="code" value="<?php echo $new_code;  ?>" />
        </td>
      <?php }} ?>
      <td>
      <input type="text" name="nome" id="textfield2"></td>
      <td>
      <input type="text" name="cpf" id="textfield3"></td>
    </tr>
    <tr>
      <td><h4>Data de nascimento:</h4></td>
      <td><h4>Forma&ccedil;&atilde;o Acad&ecirc;mica</h4></td>
      <td><h4>Gradua&ccedil;&atilde;o(&otilde;es):</h4></td>
    </tr>
    <tr>
      <td><label for="textfield4"></label>
      <input type="text" name="nascimento" id="textfield4"></td>
      <td><label for="select"></label>
        <select name="formacao" size="1" id="select">
          <option value="Ensino Médio Incompleto">Ensino M&eacute;dio Incompleto</option>
          <option value="Ensino Médio Completo">Ensino M&eacute;dio Completo</option>
          <option value="Superior Incompleto">Superior Incompleto</option>
          <option value="Superior Completo">Superior Completo</option>
      </select></td>
      <td><input type="text" name="graduacao" id="textfield5"></td>
    </tr>
    <tr>
      <td><h4>Pos-gradua&ccedil;&atilde;:</h4></td>
      <td><h4>Mestrado(s):</h4></td>
      <td><h4>Doutorado(s):</h4></td>
    </tr>
    <tr>
      <td><input type="text" name="pos_graduacao" id="textfield6"></td>
      <td><input type="text" name="mestrado" id="textfield7"></td>
      <td><input type="text" name="doutorado" id="textfield8"></td>
    </tr>
    <tr>
      <td><h4>Sal&agrave;rio:</h4></td>
    </tr>
    <tr>
      <td><input type="text" name="salario" id="textfield8"></td>
    </tr>
    <tr>
      <td><input class="input" type="submit" name="button" id="button" value="Cadastrar"></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>
<br />
</div>
</div><!-- cadastra_professores -->
<?php } // aqui é o fechamento da PG cadastra ?>


</body>
</html>