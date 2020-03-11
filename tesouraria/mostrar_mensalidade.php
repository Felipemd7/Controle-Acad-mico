<?php
session_start();
$_SESSION['painel_atual'] = "tesouraria";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<?php require "../config.php"; ?>
<title>To Learn - Tesouraria - <?php echo $nome; ?> </title>
<link href="css/index.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php if(@$_GET['status'] == 'mostra_fatura'){ ?>
<?php require "topo.php"; ?>
<div id="caixa_preta">
</div><!-- caixa_preta -->

<div id="box">
<h1>Resumo da cobran�a <?php echo $mensalidade = $_GET['mensalidade']; ?></h1>
<?php

$sql_1 = mysqli_query($db,"SELECT * FROM mensalidades WHERE code = '$mensalidade'");
while($res_1 = mysqli_fetch_array($sql_1)){
	$matricula =  $res_1['matricula'];

$sql_2 = mysqli_query($db,"SELECT * FROM estudantes WHERE code = '$matricula'");	
	while($res_2 = mysqli_fetch_array($sql_2)){
?>
 <table width="950" border="0">
  <tr>
    <td colspan="4"><hr /></td>
  </tr>
  <tr>
    <td><strong>N�mero de matricula:</strong></td>
    <td><strong>Nome do aluno:</strong></td>
    <td><strong>Vencimento:</strong></td>
  </tr>
  <tr>
    <td><?php echo $matricula; ?></td>
    <td><?php echo $res_2['nome']; ?></td>
    <td><?php echo $res_1['vencimento']; ?></td>
  </tr>
  <tr>
    <td><strong>Valor:</strong></td>
    <td><strong>Status:</strong></td>
    <td><strong>Data do pagamento:</strong></td>
  </tr>
  <tr>
    <td>R$ <?php echo number_format($res_1['valor'],2); ?></td>
    <td><?php echo $res_1['status']; ?></td>
    <td><?php echo $res_1['data_pagamento']; ?></td>
  </tr>
  <tr>
    <td><strong>CPF:</strong></td>
    <td><strong>Curso:</strong></td>
  </tr>
  <tr>
    <td><?php echo $res_2['cpf']; ?></td>
    <td><?php echo $res_2['serie']; ?></td>
  </tr>
  <tr>
    <td><strong>Forma de pagamento:</strong></td>
    <td><?php echo $res_1['metodo_pagamento']; ?></td>
  </tr>
  <tr>
    <td colspan="4"><hr /></td>
  </tr>
  <?php if($res_1['status'] != 'Pagamento Confirmado'){ ?>
  <tr>
    <td colspan="4">| <a rel="superbox[iframe][270x180]" href="mostrar_mensalidade.php?mensalidade=<?php echo $mensalidade; ?>&status=baixa_mensalidade&valor=<?php echo $res_1['valor']; ?>&matricula=<?php echo $matricula; ?>">Informar pagamento</a> | <a rel="superbox[iframe][270x180]" href="mostrar_mensalidade.php?mensalidade=<?php echo $mensalidade; ?>&status=reajustar_mensalidade&valor=<?php echo $res_1['valor']; ?>">Reajustar valor de cobran�a</a> | </td>
  </tr>  
  <?php } ?>
</table>
<?php }} ?>
<ul>
 <li>Lembrando que ao informar a baixa do pagamento, voc� ser� o respons�vel pela entrada do dinheiro em caixa.</li>
 <li>N�o se esque�a que antes de voc� reajustar a mensalidade, voc� deve ter outoriza��o da coordena��o para executar tal fun��o.</li>
 <li>Aten��o, se voc� enviar um alerta de cobran�a ao aluno voc� ser� a respons�vel por tal atitudade.</li>
 <li>Caso tenha qualquer d�vida entre em contato com a coordena��o.</li>
</ul>
</div><!-- box -->
<?php } ?>



<?php if($_GET['status'] == 'baixa_mensalidade'){ ?>
<div id="box_baixa">

<?php if(isset($_POST['confirm'])){

$date = date("d/m/Y H:i:s");
$dia = date("d/m/Y");
$d = date("d");
$m = date("m");
$a = date("Y");
$forma_de_pagamento = $_POST['forma_de_pagamento'];
$mensalidade = $_GET['mensalidade'];
$matricula = $_GET['matricula'];
$valor = $_GET['valor'];

$sql_1 = mysqli_query($db,"UPDATE mensalidades SET status = 'Pagamento Confirmado', data_pagamento = '$date', dia_pagamento = '$dia', metodo_pagamento = '$forma_de_pagamento', d_p = '$d', m_p = '$m', a_p = '$a' WHERE code = '$mensalidade'");


$sql_2 = mysqli_query($db,"INSERT INTO fluxo_de_caixa (status, tipo, d, m, a, date_completo, date, codigo, descricao, valor, form_pag) VALUES ('Ativo', 'CR�DITO', '$d', '$m', '$a', '$date', '$dia', 'mensalidade=$code', 'Mensalidade do aluno: $matricula Competencia: $m/$a', '$valor', '$forma_de_pagamento')");

	echo "<br><br>Opera��o realizada com sucesso!<br> Pressione F5 para mesclar a opera��o.";	
die;

}?>

<h1>Forma de pagamento</h1>
<form name="confirm" method="post" action="" enctype="multipart/form-data">
<select name="forma_de_pagamento">
 <option value="">Selecione</option>
 <option value="Cart�o de cr�dito">Cart�o de cr�dito</option>
 <option value="Cart�o de d�bito">Cart�o de d�bito</option>
 <option value="Dinheiro">Dinheiro</option>
 <option value="Cheque">Cheque</option>
</select>
<input class="select" type="submit" name="confirm" value="Confirmar" />
</form>
</div><!-- box_baixa -->
<?php } ?>




<?php if($_GET['status'] == 'reajustar_mensalidade'){ ?>
<div id="box_baixa">
<?php if(isset($_POST['confirm'])){

$valor = $_POST['valor'];
$mensalidade = $_GET['mensalidade'];
$date = date("d/m/Y H:i:s");

$sql_1 = mysqli_query($db,"UPDATE mensalidades SET valor = '$valor' WHERE code = '$mensalidade'");

$sql_2 = mysqli_query($db,"INSERT INTO mural_coordenacao (date, status, curso, titulo) VALUES ('$date', 'Ativo', 'N�o informado', 'A mensalidade de um aluno foi reajustada!')");

	echo "<br><br>Opera��o realizada com sucesso!<br> Pressione F5 para mesclar a opera��o.";	
die;

}?>
<h1>Reajustar valor da cobran�a</h1>
<form name="confirm" method="post" action="" enctype="multipart/form-data">
<input type="text" name="valor" value="<?php echo $_GET['valor']; ?>" />
<input class="select" type="submit" name="confirm" value="Confirmar" />
</form>
</div><!-- box_baixa -->
<?php } ?>
</body>
</html>