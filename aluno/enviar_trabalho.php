<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><?php require "../conexao.php"; ?>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="css/enviar_trabalho.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="box">
<?php if(isset($_POST['button'])){

		$extensao = strtolower(substr($_FILES['trabalho']['name'], -4));//pega a extensao do arquivo
        $nome_novo = md5(time()) . $extensao;//dou um novo nome ao arquivo, impedindo  que um sobreescreva  outro
		$diretorio = "../trabalhos_alunos/";
		$mover = move_uploaded_file($_FILES['trabalho']['tmp_name'], $diretorio.$nome_novo);

		if($mover){

			$date = date("d/m/Y H:i:s");
			$id = $_GET['id'];
			$dis = $_GET['dis'];
			$code  =$_GET['aluno'];

		$sql_1 = mysqli_query($db,"INSERT INTO envio_de_trabalhos (data, status, id_trabalho, disciplina, trabalho, aluno, nota) VALUES ('$date', 'Aguardar', '$id', '$dis', '$nome_novo', '$code','-1')");

			if($sql_1){
				echo "<h1>Trabalho enviado com sucesso!<br>Aperte F5 em seu teclado para atualizar a página.</h1>";
				echo "<a href='trabalhos.php'> Voltar</a>";
				die;
			}else{
				echo "<h1>Ocorreu um erro ao salvar no banco de dados.</h1>".mysql_error();
				die;
			}
		}else{
				echo "<h1>Ocorreu um erro ao mover.</h1>";
				die;
		}

}?>


<strong>Aten&ccedil;&atilde;o:</strong> Voc&ecirc; tem at&eacute; o dia <?php echo $_GET['entrega']; ?>
<form name="" method="post" action="" enctype="multipart/form-data">
  <table width="379" border="0">
  <tr>
    <td>Clique na caixa abaixo para selecionar o trabalho</td>
  </tr>
  <tr>
    <td><label for="fileField"></label>
    <input type="file" name="trabalho" id="fileField"></td>
  </tr>
  <tr>
    <td><input class="input" type="submit" name="button" id="button" value="Enviar"></td>
  </tr>
</table>
</form>
</div><!-- box -->
</body>
</html>