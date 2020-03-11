<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><?php require "../conexao.php"; ?>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>

<body>
<?php if($_GET['pg'] == 'trabalho_bimestral'){ ?>
<?php if(isset($_POST['send'])){

$nota = $_POST['nota'];
$aluno = $_GET['aluno'];
$id = $_GET['id'];
$dis = $_GET['disciplina'];

mysqli_query($db,"UPDATE envio_de_trabalhos SET nota = '$nota' WHERE id = '$id' AND aluno = '$aluno'");
mysqli_query($db,"UPDATE notas_trabalhos SET nota = '$nota' WHERE code = '$aluno' AND disciplina = '$dis'");

echo "A nota deste aluno foi alterada com sucesso!!!<br>Pressione F5 de seu teclado";
die;

}?>
<em>Digite abaixo qual vai ser a nova nota</em>
<form name="" method="post" action="" enctype="multipart/form-data">
 <input type="text" size="4" maxlength="7" name="nota" value="<?php echo $_GET['nota']; ?>" /><input type="submit" name="send" value="Alterar" />
</form>
<?php }?>



<?php if($_GET['pg'] == 'prova_bimestral'){ ?>

<?php if(isset($_POST['send'])){

$notaQual = $_POST['notaQual'];
$notaQuant = $_POST['notaQuant'];
$professor = $_GET['professor'];
$disciplina = $_GET['disciplina'];
$code_aluno = $_GET['aluno'];


$sql_sucess = mysqli_query($db,"UPDATE notas_provas SET notaQual = '$notaQual', notaQuant = '$notaQuant' WHERE code = '$code_aluno' AND disciplina = '$disciplina'");
if($sql_sucess){
	echo "A nota deste aluno foi alterada com sucesso!!!";
}else{
	echo "Erro ao alterar nota!";
}

die;
	
}?>

<em>Digite abaixo qual vai ser a nova nota</em>
<form name="" method="post" action="" enctype="multipart/form-data">
 <input type="text" size="4" maxlength="7" name="notaQual" value="<?php echo $_GET['notaQual']; ?>" />
 <input type="text" size="4" maxlength="7" name="notaQuant" value="<?php echo $_GET['notaQuant']; ?>" />
 <input type="submit" name="send" value="Alterar" />
</form>

<?php } ?>

</body>
</html>