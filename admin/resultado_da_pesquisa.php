<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Resultado da pesquisa</title>
<link href="css/resultado_da_pesquisa.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php require "topo1.php";?>
<div id="caixa_preta">
</div><!-- caixa_preta -->

<div id="box">

<h1>Resultado da pesquisa para  <?php echo $q = $_GET['q']; ?></h1>
<br/><h2>Resultados para professor: </h2>
<ul>
<?php

$sql_1 = mysqli_query($db,"SELECT * FROM professores WHERE code like '$q%' OR nome like '$q%'");
if(mysqli_num_rows($sql_1) == ''){
	echo "<h2>Não foi encontrado nenhum professor.</h2>";
}else{
	while($res_1 = mysqli_fetch_array($sql_1)){
		$code = $res_1['code'];
		$professor = $res_1['nome'];
		$status = $res_1['status'];
			echo "<a href='mostrar_resultado.php?q=$code&s=professor&status=$status'><strong>$professor</strong><a><br/>";
		}
}
?>

<h2>Resultados para aluno: </h2>
<?php				
$sql_1 = mysqli_query($db,"SELECT * FROM estudantes WHERE code like '$q%' OR nome like '$q%'");
if(mysqli_num_rows($sql_1) == ''){
	echo "<h2>Não foi encontrado nenhum estudante.</h2>";
}else{
	while($res_1 = mysqli_fetch_array($sql_1)){
		$code = $res_1['code'];
		$aluno = $res_1['nome'];
		$curso = $res_1['serie'];
		echo "<a href='mostrar_resultado.php?q=$code&s=aluno&curso=$curso'><strong>$aluno</strong><a><br/>";
	}
}
?>

</ul>
</div><!-- box -->

<?php require "rodape.php"; ?>
</body>
</html>