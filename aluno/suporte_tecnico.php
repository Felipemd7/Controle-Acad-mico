<?php $painel_atual = "aluno";?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="css/suporte_tecnico.css" rel="stylesheet" type="text/css" />
<?php require "../config.php"; ?>
</head>

<body>
<?php require "topo1.php"; ?>
<div id="caixa_preta">
</div><!-- caixa_preta -->

<div id="box">
 <h1><strong>Hist�rico de chamados</strong></h1>
 <a href="suporte_tecnico.php?acao=abrir_chamado" class="a_1">Abrir chamado</a>
<table width="832" border="0">
<?php if(@$_GET['acao'] == 'abrir_chamado'){ ?>

<?php if(isset($_POST['enviar_mensagem'])){

$setor = $_POST['setor'];
$mensagem = $_POST['mensagem'];
$anexo = $_FILES['anexo']['name'];
$date = date("d/m/Y H:i:s");

if(file_exists("../anexos/$anexo")){
		$a = 1;
		while(file_exists("../anexos/[$a]$anexo")){
			$a++;
			}
		$anexo = "[".$a."]".$anexo;
	}
	
$sql_4 = mysqli_query($db,"INSERT INTO central_mensagem (date, status, emissor, receptor, mensagem, anexo) VALUES ('$date', 'Aguarda resposta', '$code', '$setor', '$mensagem', '$anexo')");
if($sql_4 == ''){
	echo "<script language='javascript'>window.alert('Ocorreu um erro!');window.location='suporte_tecnico.php';</script>";
}else{

(move_uploaded_file($_FILES['anexo']['tmp_name'],"../anexos/".$anexo));	

if($setor == 'COORDENA��O'){
mysqli_query($db,"INSERT INTO mural_coordenacao (date, status, curso, titulo) VALUES ('$date', 'Ativo', 'N�o informado', 'Existe uma nova mensagem enviada pelo aluno para ser respondida')");
}
	echo "<script language='javascript'>window.alert('Mensagem enviada com sucesso!');window.location='suporte_tecnico.php';</script>";

}
	


}?>


  <tr>
  <td>	 
     <form name="enviar_mensagem" method="post" action="" enctype="multipart/form-data">
	  Selecione o setor que voc� quer enviar esta mensagem
     <select name="setor" size="1" id="select">
       <option value="COORDENA��O">COORDENA��O</option>
        <option value=""></option>
       <option value="">PROFESSOR</option>
       <?php
       $sql_1 = mysqli_query($db,"SELECT * FROM disciplinas WHERE curso = '$serie'");
	   	while($res_1 = mysqli_fetch_array($sql_1)){
			$professor = $res_1['professor'];
			$disciplina = $res_1['disciplina'];
		$sql_2 = mysqli_query($db,"SELECT * FROM professores WHERE code = '$professor'");
			while($res_2 = mysqli_fetch_array($sql_2)){
	   ?>
        <option value="<?php echo $professor; ?>"><?php echo $disciplina ?> - <?php echo $res_2['nome']; ?></option>
       <?php }} ?>
        <option value=""></option>
        
       <option value="">COLEGAS DE CLASSE</option>
       <?php
       $sql_3 = mysqli_query($db,"SELECT * FROM estudantes WHERE serie = '$serie' AND turno = '$turno' AND code != '$code'");
	   	while($res_3 = mysqli_fetch_array($sql_3)){
	   ?>
        <option value="<?php echo $res_3['code']; ?>"><?php echo $res_3['nome']; ?></option>
        <?php } ?>
     </select>
     Caso tenha algum anexo escolha o arquivo abaixo<br />
     <input name="anexo" type="file" />
     <br />Digite sua mensagem
     <textarea name="mensagem"></textarea>
	 <input class="input" type="submit" name="enviar_mensagem" value="Enviar" />
     </form>
     <hr>
  </td>
  </tr>
<?php } ?>
  <tr>
    <td width="826" align="left">Abaixo segue seu ralat�rio de chamadas</td>
  </tr>
  <tr>
    <td align="center"><hr></td>
  </tr>
  <tr>
    <td align="center">
    <?php
    $sql_5 = mysqli_query($db,"SELECT * FROM central_mensagem WHERE emissor = '$code'");
	if(mysqli_num_rows($sql_5) == ''){
		echo "N�o existe nenhuma mensagem";
	}else{
	?>
     <table border="0">
      <tr>
        <td width="114"><strong>Recptor:</strong></td>
        <td width="120"><strong>Status:</strong></td>
        <td width="168"><strong>Data:</strong></td>
        <td width="149"><strong>Anexo:</strong></td>
        <td width="152"><strong>Data da resposta:</strong></td>
      </tr>
      <?php while($res_5 = mysqli_fetch_array($sql_5)){ ?>
      <tr>
        <td><?php echo $res_5['receptor']; ?></td>
        <td><?php echo $res_5['status']; ?></td>
        <td><?php echo $res_5['date']; ?></td>
        <td><a target="_blank" href="../anexos/<?php echo $res_5['anexo']; ?>">Baixar</a></td>
        <td><?php echo $res_5['data_resposta']; ?></td>
        <td width="50">
        <a href="suporte_tecnico.php?acao=ticket&id=<?php echo $res_5['id']; ?>"><img src="../img/visualizar16.gif"  border="0" title="Vizualizar chamada" /></a> |
        <a href="suporte_tecnico.php?acao=fechar&id=<?php echo $res_5['id']; ?>"><img src="../img/deleta.jpg" border="0" title="Excluir chamado" /></a>
      
        </td>
        </tr>
      	<tr>
        <?php if(@$_GET['acao'] == 'ticket'){ ?>
        <td colspan="6"><hr />
        <?php
        if($res_5['resposta'] == ''){
			 echo "<h4 class='h4'>Aida n�o existe resposta para este chamado!</h4>";
		}else{
			
				 $date = $res_5['date'];
				 $resposta = $res_5['resposta'];
				 $anexo_res = $res_5['anexo_resp'];
				 $mensagem = $res_5['mensagem'];
			 echo "<h1 class='h1'><strong>Sua mensagem:</strong><br><br>$mensagem</h1>";
			 echo "<h1 class='h2'><strong>Data:</strong>$date | <strong>Anexo:</strong> <a href='../anexos/$anexo_res' target='_blank'> $anexo_res</a><br><br>$resposta</h1>";			
			
		?>
        
        </td>
        </tr>
        <?php } ?>
      	<tr>
        <td colspan="6"><hr></td>
        </tr>
      <?php } ?>
    </table>
    <?php } ?>
    </td>
  </tr>
</table> 
    <?php } ?>
    </td>
  </tr>
</table> 


<?php if(@$_GET['acao'] == 'fechar'){

mysqli_query($db,"DELETE FROM central_mensagem WHERE id = ".$_GET['id']."");
echo "<script language='javascript'>window.location='suporte_tecnico.php';</script>";
}?>

</div><!-- box -->

</body>
</html>