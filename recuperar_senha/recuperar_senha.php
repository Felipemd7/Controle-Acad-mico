<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="UTF-8">
<title>SISA - Sistema Institucional de Serviços Acadêmicos</title>

<?php require "../conexao.php";  $erro = ""; ?>

	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="../login/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../login/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../login/css/util.css">
	<link rel="stylesheet" type="text/css" href="../login/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
<?php if(isset($_POST['button'])){


	$cpf = $_POST['cpf'];
	$code = $_POST['matricula'];

	$sql_1 = mysqli_query($db,"SELECT * FROM estudantes WHERE code = '$code' AND cpf = '$cpf'");
	$conta_sql_1 = mysqli_num_rows($sql_1);

if($conta_sql_1 == ''){
	$erro = "Nenhum aluno cadastrado com essa matricula ou cpf foi encontrado!";
}else{
	
	

	while($res_1 = mysqli_fetch_array($sql_1)){
		$nome = $res_1['nome'];
		$email = $res_1['email'];
	}

	$nova_senha = rand(0, 1000);
	$sql_2 = mysqli_query($db,"UPDATE acesso_ao_sistema SET senha = '$nova_senha' WHERE code = '$code'");

	echo "<script language='javascript'>window.location='recuperar_senha.php?a=1&senha=$nova_senha&aluno=$nome';</script>";

	//$assunto = "Envio de mensagem";
	//$corpo = "Texto da mensagem saqui";
	//mail('igorbezerra234@gmail.com', $assunto, $corpo, 'From: webservices2019@gmail.com');
	

	/*$conta_sql_2 = mysqli_num_rows($sql_2);

	while($res_1 = mysqli_fetch_array($sql_2)){
		
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

	}*/
  }
 }
?>


	<div class="limiter">
		<div class="container-login100" style="background-image: url('../login/images/sisa.jpg');">
			<div class="wrap-login100 p-t-190 p-b-30">
				<form class="login100-form validate-form" name="form" method="post" action="" enctype="multipart/form-data">
					<div class="login100-form-avatar">
						<img src="../login/images/sisa.png" alt="AVATAR">
					</div>

					<span class="login100-form-title p-t-20 p-b-45">
						Recuperação de senha
					</span>

					<span class="login100-title-erro p-b-45">
						<?php echo $erro ?>
					</span> 
			<?php 
				$op = $_GET['a'];

			if($op == 0){ ?>

					<div class="wrap-input100 validate-input m-b-10" data-validate = "Digite aqui sua matricula">
						<input class="input100" type="text" name="matricula" placeholder="Digite aqui sua matricula">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input m-b-10" data-validate = "Digite seu cpf">
						<input class="input100" type="text" name="cpf" placeholder="Digite aqui seu cpf">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user"></i>
						</span>
					</div>

					<div class="container-login100-form-btn p-t-10">
						<button class="login100-form-btn" name="button">
							Recuperar
						</button>
					</div>
					<br/>
				<?php } else if($op == 1){ 
					$senha = $_GET['senha'];
					$aluno = $_GET['aluno']; ?>

					<span class="login100-form-title p-t-20 p-b-45">
						<?php echo $aluno ?>, sua senha foi alterada com sucesso.<br/>
						Sua nova senha agora é: <?php echo $senha ?>.
					</span>

					<div class="text-center w-full">
					<a class="txt1" href="../index.php">
							Voltar
							<i class="fa fa-long-arrow-right"></i>						
						</a>
					</div>
					<?php } ?>	


					
				</form>
			</div>
		</div>
	</div>

	

	
<!--===============================================================================================-->	
	<script src="../login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="../login/vendor/bootstrap/js/popper.js"></script>
	<script src="../login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="../login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="../login/js/main.js"></script>

</body>
</html>