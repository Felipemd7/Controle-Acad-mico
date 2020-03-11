<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>To Learn - Mirando em seu futuro</title>
<link href="css/index.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="img/logo.png" />
<?php require "conexao.php"; require "operacional.php"; require "pagamento_funcionarios.php"; ?>
</head>

<body>
<div id="logo">
 <img src="img/logo.png" />
</div><!-- logo -->

<div id="caixa_login">

<?php if(isset($_POST['button'])){

$code = $_POST['code'];
$password = $_POST['password'];

if($code == ''){
	echo "<h2>Por favor, digite o número do cartão ou seu código de acesso!</h2>";
}else if($password == ''){
	echo "<h2>Por favor, digite sua senha!</h2>";
}else{
	
$sql_1 = mysqli_query($db,"SELECT * FROM acesso_ao_sistema WHERE code = '$code' AND senha = '$password'");
$conta_sql_1 = mysqli_num_rows($sql_1);

if($conta_sql_1 == ''){
	echo "<h2>O código de acesso ou a senha não corresponde!</h2>";
}else{
	
	while($res_1 = mysqli_fetch_array($sql_1)){
		
		$status = $res_1['status'];
		$code = $res_1['code'];
		$senha = $res_1['senha'];
		$nome = $res_1['nome'];
		$painel = $res_1['painel'];
   
	if($status == 'Inativo'){
   		 echo "<h2>Você está inativo, por favor, digiga-se a coordenação da escola para que seu acesso seja liberado!</h2>";
	}else{
		
		session_start();
		$_SESSION['code'] = $code;
		$_SESSION['nome'] = $nome;
		$_SESSION['password'] = $senha;
		$_SESSION['painel'] = $painel;
		
		if($painel == 'admin'){
			echo "<script language='javascript'>window.location='admin';</script>";
		}else if($painel == 'Aluno'){
			echo "<script language='javascript'>window.location='aluno';</script>";
		}else if($painel == 'professor'){
			echo "<script language='javascript'>window.location='professor';</script>";	
		}else if($painel == 'portaria'){
			echo "<script language='javascript'>window.location='portaria';</script>";	
		}else if($painel == 'tesoureiro'){
			echo "<script language='javascript'>window.location='tesouraria';</script>";			
		}else{
		
   		 echo "<h2>Seu acesso está correto, porém, não estamos conseguindo acessar o seu painel, por favor, digira-se a coordenação!</h2>";
		
	 }
	}
   }
  }
 }
}?>

<form name="form" method="post" action="" enctype="multipart/form-data">
 <table>
  <tr>
   <td><h1>Número do cartão ou código de acesso:</h1></td>
  </tr>
  <tr>
   <td><input type="text" name="code" /></td>
  </tr>
   <tr>
   <td><h1>senha:</h1></td>
  </tr>
  <tr>
   <td><input type="password" name="password" /></td>
  </tr>
  <tr>
   <td><input class="input" type="submit" name="button" value="Entrar" /></td>
  </tr>
 </table>
</form>
</div><!-- caixa_login -->

</body>
</html>