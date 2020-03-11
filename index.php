<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="UTF-8">
<title>SISA - Sistema Institucional de Serviços Acadêmicos</title>
<?php require "conexao.php"; require "operacional.php";  $erro = ""; ?>
	<meta http-equiv="Content-Type" content="text/html" />
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="login/css/util.css">
	<link rel="stylesheet" type="text/css" href="login/css/main.css">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="login/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	
<!--===============================================================================================-->
</head>
<body>
	
<?php if(isset($_POST['button'])){



$code = $_POST['code'];
$password = $_POST['password'];

if($code == ''){
	echo "<h2>Por favor, digite sua matricula!</h2>";
}else if($password == ''){
	echo "<h2>Por favor, digite sua senha!</h2>";
}else{
	
$sql_1 = mysqli_query($db,"SELECT * FROM acesso_ao_sistema WHERE code = '$code' AND senha = '$password'");
$conta_sql_1 = mysqli_num_rows($sql_1);

if($conta_sql_1 == ''){
	$erro = "Matricula ou senha incorretos!";
}else{
	
	while($res_1 = mysqli_fetch_array($sql_1)){
		
		$status = $res_1['status'];
		$code = $res_1['code'];
		$senha = $res_1['senha'];
		$nome = $res_1['nome'];
		$painel = $res_1['painel'];
   
	if($status == 'Inativo'){
   		 $erro = "Você está inativo, por favor, digiga-se a coordenação da escola para que seu acesso seja liberado!";
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
		
   		 $erro = "Seu acesso está correto, porém, não estamos conseguindo acessar o seu painel, por favor, digira-se a coordenação!";
		
	 }
	}
   }
  }
 }
}?>


	<div class="limiter">
		<div class="container-login100" >
			<div class="wrap-login100 p-t-190 p-b-30">
				<form class="login100-form validate-form" name="form" method="post" action="" enctype="multipart/form-data">
					<div class="login100-form-avatar">
						<img src="login/images/sisa.png" alt="AVATAR">
					</div>

					<span class="login100-form-title p-t-20 p-b-45">
						Sistema Institucional de Serviços Acadêmicos
					</span>

					<span class="login100-title-erro p-b-45">
						<?php echo $erro ?>
					</span> 

					<div class="wrap-input100 validate-input m-b-10" data-validate = "Digite sua matricula">
						<input class="input100" type="text" name="code" placeholder="Usuario">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input m-b-10" data-validate = "Digite sua senha">
						<input class="input100" type="password" name="password" placeholder="Senha">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock"></i>
						</span>
					</div>

					<div class="container-login100-form-btn p-t-10">
						<button class="login100-form-btn" name="button">
							Login
						</button>
					</div>

					<div class="text-center w-full p-t-25 p-b-230">
						<a href="recuperar_senha/recuperar_senha.php?a=0" class="txt1">
							Esqueceu o nome de usuário / senha?
						</a>
					</div>

				<!--	<div class="text-center w-full">
						<a class="txt1" href="#">
							Criar Nova Conta
							<i class="fa fa-long-arrow-right"></i>						
						</a>
					</div> -->
					
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/bootstrap/js/popper.js"></script>
	<script src="login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="login/js/main.js"></script>

</body>
</html>