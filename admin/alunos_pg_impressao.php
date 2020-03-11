<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="css/relatorios.css" rel="stylesheet" type="text/css" />
<?php  require "../conexao.php"; ?>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Página de impresão</title>
</head>

<body>
<div id="box">
<script language="javascript">
window.print() 
</script>


<?php 
$s = base64_decode($_GET['s']);
$sql_1 = mysqli_query($db,$s);
?>
<table width="950" border="0">
  <tr>
    <td width="200"><strong>Nome:</strong></td>
    <td width="130"><strong>Nº de matricula:</strong></td>
    <td width="155"><strong>Série:</strong></td>
    <td width="194"><strong>Mensalidades pagas:</strong></td>
    <td width="149"><strong>Mensalidade devedoras:</strong></td>
  </tr>
  <?php while($res_1 = mysqli_fetch_array($sql_1)){ ?>
  <tr>
    <td><?php echo $res_1['nome']; ?></td>
    <td><?php echo $res_1['code']; ?></td>
    <td><?php echo $res_1['serie']; ?></td>
    <td><?php echo mysqli_num_rows(mysqli_query($db,"SELECT * FROM mensalidades WHERE matricula = ".$res_1['code']." AND status = 'Pagamento Confirmado'")); ?></td>
    <td><?php echo mysqli_num_rows(mysqli_query($db,"SELECT * FROM mensalidades WHERE matricula = ".$res_1['code']." AND status = 'Aguarda Pagamento'")); ?></td>
  </tr>
  <tr>
    <td colspan="5"><hr></td>
  </tr>
  <?php } ?>
  <tr>
  </tr>
</table>
</div><!-- box -->
</body>
</html>