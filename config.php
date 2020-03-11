<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>

<body>


<?php 
	@session_start();
	$code = isset($_SESSION['code']) ? $_SESSION['code'] : "";
	//$code = $_SESSION['code'];
	if($code == "" ){
		session_destroy();
		header("javascript:history.go(-1)");
	}
	else if(@$_GET['pg'] == 'sair'){
	
		session_destroy();
		echo "<script language='javascript'>window.location='index.php';</script>";
		
	}
?>



<?php require "conexao.php";

    @session_start();
    $code = isset($_SESSION['code']) ? $_SESSION['code'] : "";
    $nome = isset($_SESSION['nome']) ? $_SESSION['nome'] : "";
    $password = isset($_SESSION['password']) ? $_SESSION['password'] : "";
    $painel = isset($_SESSION['painel']) ? $_SESSION['painel'] : "";

if($code == ''){
	echo "<script language='javascript'>window.location='../index.php';</script>";
}else if($nome == ''){
	echo "<script language='javascript'>window.location='../index.php';</script>";
}else if($password == ''){
	echo "<script language='javascript'>window.location='../index.php';</script>";
}else{

$sql_1 = mysqli_query($db,"SELECT * FROM acesso_ao_sistema WHERE code = '$code' AND senha = '$password'");
$conta_sql_1 = mysqli_num_rows($sql_1);

if($conta_sql_1 == ''){
	
}else{

 }
}
?>




<?php if(@$_GET['acao'] == 'quebra'){
	
	session_destroy();
	$_SESSION['code'];
	$_SESSION['nome'];
	$_SESSION['password'];
	$_SESSION['painel'];



	echo "<script language='javascript'>window.location='index.php';</script>";



}?>
</body>
</html>