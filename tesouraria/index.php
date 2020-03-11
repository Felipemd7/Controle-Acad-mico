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
<link href="css/index_1.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php require "topo.php"; ?>
<div id="caixa_preta">
</div><!-- caixa_preta -->

<div id="box">
<?php
$d = date("d");
$m = date("m");
$a = date("Y");
?>
 <div id="relatorios">
   <ul>
    <h1><strong>Situa��o financeira do caixa (R$) Hoje</strong></h1>
    <li><strong>Mensalidades pagas em dinheiro:</strong> R$
     <?php
     $sql_2 = mysqli_query($db,"SELECT SUM(valor) as soma FROM mensalidades WHERE dia_pagamento = '$d/$m/$a' AND metodo_pagamento = 'Dinheiro'");
	 	while($res_2 = mysqli_fetch_array($sql_2)){
			echo number_format($res_2['soma'],2);
		}
	 ?>
    </li>
    <li><strong>Mensalidades pagas em cart�o de credito:</strong> R$ 
     <?php
     $sql_2 = mysqli_query($db,"SELECT SUM(valor) as soma FROM mensalidades WHERE dia_pagamento = '$d/$m/$a' AND metodo_pagamento = 'Cart�o de cr�dito'");
	 	while($res_2 = mysqli_fetch_array($sql_2)){
			echo number_format($res_2['soma'],2);
		}
	 ?>    
    </li>
    <li><strong>Mensalidades pagas em cart�o de d�bito:</strong> R$ 
     <?php
     $sql_2 = mysqli_query($db,"SELECT SUM(valor) as soma FROM mensalidades WHERE dia_pagamento = '$d/$m/$a' AND metodo_pagamento = 'Cart�o de d�bito'");
	 	while($res_2 = mysqli_fetch_array($sql_2)){
			echo number_format($res_2['soma'],2);
		}
	 ?>      
    </li>
    <li><strong>Mensalidades pagas em cheques:</strong> R$ 
     <?php
     $sql_2 = mysqli_query($db,"SELECT SUM(valor) as soma FROM mensalidades WHERE dia_pagamento = '$d/$m/$a' AND metodo_pagamento = 'Cheque'");
	 	while($res_2 = mysqli_fetch_array($sql_2)){
			echo number_format($res_2['soma'],2);
		}
	 ?>      
    </li>
   </ul>

 </div><!-- relatorios -->
 
 <div id="notificacoes">
  <h1>Notifica��es</h1>
  <div id="avisos_notificacoes">
  <?php
  
  $sql_1 = mysqli_query($db,"SELECT * FROM mural_tesouraria ORDER BY id DESC LIMIT 30");
  $conta_sql_1 = mysqli_num_rows($sql_1);
  
  if($conta_sql_1 == ''){
	  echo "<h1>No momento n�o existe nenhum aviso em seu mural!</h1>";
  }else{
	  while($res_1 = mysqli_fetch_array($sql_1)){
  ?>
   <ul>
    <li><?php echo $res_1['titulo']; ?></li>
   </ul>
  <?php }} ?>  
  </div><!-- avisos_notificacoes -->
 </div><!-- notificacoes -->
 
 
</div><!-- box -->
</body>
</html>