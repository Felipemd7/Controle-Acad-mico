<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="css/setor_financeiro.css" rel="stylesheet" type="text/css" />
<title>Administração To Learn</title>
</head>

<body>
<?php 
  $servidor = "localhost";
  $usuario = "root";
  $senha = "1515";
  $db1 = "id7594032_sistema_escolar";
  /*$servidor = "localhost";
  $usuario = "id7594032_root1234";
  $senha = "15151515";
  $db1 = "id7594032_sistema_escolar";
  $db = mysqli_connect($servidor, $usuario, $senha, $db1);*/ 
  $db = mysqli_connect($servidor, $usuario, $senha, $db1);
//require "topo.php"; ?>
<div id="caixa_preta">
</div><!-- caixa_preta -->


<div id="box_aluno">
<h1>Fluxo de caixa</h1>
<a class="a" href="fluxo_de_caixa.php?s=<?php echo base64_encode("WHERE m = ".date("m")." AND a = ".date("Y").""); ?>&acao=lancamento">CADASTRAR INFORMAÇÃO</a>


<?php if(@$_GET['acao'] == 'lancamento'){ ?>

<?php if(isset($_POST['button'])){

$date = $_POST['data'];
$tipo = $_POST['tipo_lan'];
$descricao = $_POST['descricao'];
$valor = $_POST['valor'];
$form = $_POST['form'];

$d = date("d");
$m = date("m");
$y = date("Y");
$date_completo = date("d/m/Y H:i:s");

$sql_6 = mysqli_query($db,"INSERT INTO fluxo_de_caixa (status, tipo, d, m, a, date_completo, date, codigo, descricao, valor, form_pag) VALUES ('Ativo', '$tipo', '$d', '$m', '$y', '$date_completo', '$date', 'Não informado', '$descricao', '$valor', '$form')");

$s = $_GET['s'];

echo "<script language='javascript'>
window.alert('Informação lançada com sucesso');
window.location='fluxo_de_caixa.php?s=$s';</script>';
</script>";

}?>

<form name="button" method="post" action="" enctype="multipart/form-data">
<table width="950" border="0">
  <tr>
    <td width="168">Data do acontecimento:</td>
    <td width="168">Tipo:</td>
    <td width="181">Descrição:</td>
    <td width="90">Valor</td>
    <td width="90">Form. Pgto</td>
  </tr>
  <tr>
    <td><label for="textfield"></label>
    <input class="input" type="text" name="data" id="textfield" value="<?php echo date("d/m/Y"); ?>"></td>
    <td><label for="select"></label>
      <select name="tipo_lan" size="1" id="select">
        <option value="CRÉDITO">CRÉDITO</option>
        <option value="DÉBITO">DÉBITO</option>
    </select></td>
    <td><label for="textfield3"></label>
    <input class="input" name="descricao" type="text" id="textfield3"></td>
    <td><label for="textfield4"></label>
    <input class="input" type="text" name="valor" id="textfield4"></td>
    <td><label for="select2"></label>
      <select name="form" size="1" id="select2">
        <option value="Dinheiro">Dinheiro</option>
        <option value="Cheque">Cheque</option>
        <option value="Transferência Bancaria">Transferência Bancaria</option>
        <option value="Depósito Bancario">Depósito Bancario</option>
        <option value="Cartão de crédito">Cartão de crédito</option>
        <option value="Cartão de débito">Cartão de débito</option>
    </select></td>
  </tr>
  <tr>
    <td><input type="submit" name="button" id="button" value="Lançar"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<form>

<hr />

<?php } ?>



<?php if(isset($_POST['filtrar'])){

$dia = $_POST['dia'];
$mes = $_POST['mes'];
$ano = $_POST['ano'];
$tipo = $_POST['tipo'];

if($tipo == 'Todos'){
$s = base64_encode("WHERE d = '$dia' AND m = '$mes' AND a = '$ano'");
echo "<script language='javascript'>window.location='fluxo_de_caixa.php?s=$s';</script>";
}else{
$s = base64_encode("WHERE d = '$dia' AND m = '$mes' AND a = '$ano' AND tipo = '$tipo'");
echo "<script language='javascript'>window.location='fluxo_de_caixa.php?s=$s';</script>";
 }
}?>

<form name="" method="post" action="" enctype="multipart/form-data">
<table width="950" border="0">
  <tr>
    <td colspan="4"><h2><strong>Selecione o filtro</strong></h2></td>
  </tr>
  <tr>
    <td width="144"><strong>Dia de relatório:</strong></td>
    <td width="144"><strong>Mês do relatório</strong></td>
    <td width="144"><strong>Ano do relatório</strong></td>
    <td width="84"><strong>Tipo de relatório</strong></td>
  </tr>
  <tr>
    <td><input class="input2" type="text" name="dia"></td>
    <td><input class="input2" type="text" name="mes"></td>
    <td><input class="input2" type="text" name="ano"?></td>
    <td><select name="tipo" size="1" id="select4">
      <option value="Todos">Todos</option>
      <option value="CRÉDITO">Crédito</option>
      <option value="DÉBITO">Débito</option>
    </select></td>
    <td width="412"><input type="submit" class="" name="filtrar" value="FILTRAR" /></td>
  </tr>
</table>
</form>
<?php

$s = base64_decode($_GET['s']);

 $sql_1 = mysqli_query($db,"SELECT * FROM fluxo_de_caixa $s");
if(mysqli_fetch_array($sql_1) == ''){
	echo "Não foi encontra filtro para sua pesquisa";
}else{

?>

 <table width="950" border="0">
  <tr>
    <td width="130"><strong>Data:</strong></td>
    <td width="85"><strong>Tipo:</strong></td>
    <td width="100"><strong>Código:</strong></td>
    <td width="400"><strong>Descrição</strong></td>
    <td width="81"><strong>Valor:</strong></td>
    <td width="124"><strong>For. recebimento:</strong></td>
  </tr>
  <tr>
    <td colspan="7"><hr></td>
  </tr>
  <?php while($res_1 = mysqli_fetch_array($sql_1)){ ?>
  <tr>
    <td><?php echo $res_1['date_completo']; ?></td>
    <td><?php echo $res_1['tipo']; ?></td>
    <td width="111"><?php echo $res_1['codigo']; ?></td>
    <td><?php echo $res_1['descricao']; ?></td>
    <td>R$ <?php echo number_format($res_1['valor'],2); ?></td>
    <td><?php echo $res_1['form_pag']; ?></td>
    <td width="17">&nbsp;</td>
    <td width="31">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="7"><hr></td>
  </tr>
  <?php } ?>
  <tr>
    <td colspan="7">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="7"><strong>RESUMO DO FLUXO DE CAIXA:</strong>
      <hr /></td>
  </tr>
  <tr>
    <td colspan="2"><strong>CR&Eacute;DITOS:</strong></td>
    <td width="111"><strong>D&Eacute;BITOS:</strong></td>
    <td colspan="4"><strong>VALOR EM CAIXA:</strong></td>
  </tr>
  <tr>
    <td colspan="2"> R$
    <?php
    
	$sql_2 = mysqli_query($db,"SELECT SUM(valor) as soma FROM fluxo_de_caixa $s AND tipo = 'CRÉDITO'");
		while($res_2 = mysqli_fetch_array($sql_2)){
				echo number_format($res_2["soma"],2);
			}
	
	?>
    
    </td>
    <td>R$ 
        <?php
    
	$sql_3 = mysqli_query($db,"SELECT SUM(valor) as soma FROM fluxo_de_caixa $s AND tipo = 'DÉBITO'");
		while($res_3 = mysqli_fetch_array($sql_3)){
				echo number_format($res_3["soma"],2);
			}
	
	?>
    </td>
    <td colspan="4"> R$ 
    <?php
    
		$sql_4 = mysqli_query($db,"SELECT SUM(valor) as soma FROM fluxo_de_caixa $s AND tipo = 'CRÉDITO'");
		while($res_4 = mysqli_fetch_array($sql_4)){
			
		$sql_5 = mysqli_query($db,"SELECT SUM(valor) as soma FROM fluxo_de_caixa $s AND tipo = 'DÉBITO'");
		while($res_5 = mysqli_fetch_array($sql_5)){	
		
		echo number_format($res_4["soma"]-$res_5["soma"],2);
		
		}}
	
	?>
    
    </td>
  </tr>
</table>
<?php } ?>

</div><!-- box_aluno -->
<?php require "rodape.php"; ?>
</body>
</html>