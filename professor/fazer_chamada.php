<?php
session_start();
$code = $_SESSION['code'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UFT-8" />
<link href="css/fazer_chamada.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php require "topo1.php";  date_default_timezone_set('America/Fortaleza'); ?>
<div id="caixa_preta">
</div><!-- caixa_preta -->

<?php


$date = date("d/m/Y H:i:s");
$date_hoje = date('d/m/y');
$dis = $_GET['dis'];
$curso = $_GET['curso'];

  $sql_curso = mysqli_query($db,"SELECT * FROM cursos WHERE id = ".$curso."");  
  while ($res = mysqli_fetch_array($sql_curso)) {
      $nome_curso = $res['curso'];
  }



?>

<div id="box">
  <a href="turmas_e_alunos.php">Voltar</a>
 <h1>Chamada para alunos do curso de <strong><?php echo $nome_curso ?></strong> da disciplina de <?php echo $dis ?></h1>
 <h1>Chamada referente &agrave; <strong><?php echo date('d/m/Y'); ?></strong></h1>
 <form name="form1" method="post" enctype="multipart/form-data" action="">

<?php

$sql_1 = mysqli_query($db,"SELECT * FROM estudantes WHERE serie = '$curso'");
if(mysqli_num_rows($sql_1) == ''){
	 echo "<h2>Não existe nenhum aluno cadastro nesta disciplina!</h2>";
}else{
 while($res_1 = mysqli_fetch_array($sql_1)){
	 $code_aluno = $res_1['code'];
   ?> 
      <form name="button" method="post" enctype="multipart/form-data" action="">
      <table width="955" border="0">
        <tr>
          <td width="94"><strong>C&oacute;digo:</strong></td>
          <td width="466"><strong>Aluno:</strong></td>
          <td colspan="2"><strong>Este aluno est&aacute; presente?</strong></td>
        </tr>
        <tr>
          <td><?php echo $res_1['code']; ?><input type="hidden" name="code_aluno" value="<?php echo $res_1['code']; ?>" /></td>
          <td><?php echo $res_1['nome']; ?><input type="hidden" name="nome" value="<?php echo $res_1['nome']; ?>" /></td>
          <td width="315">
          <?php


          $sql_2 = mysqli_query($db,"SELECT * FROM chamadas_em_sala WHERE  disciplina = '$dis' AND code_aluno = '$code_aluno' AND date_day = '".$date_hoje."' ");
      	 if(mysqli_num_rows($sql_2) == 0){?>

          <input type="radio" name="presensa" id="radio" value="SIM">
          <label for="radio">SIM</label>  
          <input type="radio" name="presensa" value="NAO">
          <label for="radio">N&Atilde;O</label> 
          <input type="radio" name="presensa" value="JUSTIFICADA">
          <label for="radio">FALTA JUSTIFICADA </label> 
          
          <label for="fileField"></label></td>
          <td width="62"><input type="submit" name="button" id="button" value="Guardar"></td>
          <?php 
          }else if(mysqli_num_rows($sql_2) >= 1){ 


            while ($res = mysqli_fetch_array($sql_2)) {
                $id_chamada = $res['id'];
            echo "Chamada registrada | ".$res['presente']; ?>
            <form action=" method="post">
                <input type="hidden" name="id_disciplina"  VALUE="<?php echo $id_chamada; ?>">
                <input id="editar" name="editar" type="submit" value="EDITAR" />
            </form>
            

        <?php } } ?>

        </tr>
        <tr> 
        </tr>
      </table>
      </form>
    </form>

<?php }} ?>

</div><!-- box -->

<?php if(isset($_POST['button'])){

$code_aluno = $_POST['code_aluno']; 
$nome = $_POST['nome']; 
@$presensa = $_POST['presensa'];

if(@$presensa == ''){
  echo "<script language='javascript'>window.alert('Por favor, informe se este aluno está presente ou não na sala de aula!');</script>";
}else{
$sql_4 = mysqli_query($db,"INSERT INTO chamadas_em_sala (date, date_day, curso, disciplina, code_professor, code_aluno, presente) VALUES ('$date', '$date_hoje', '$curso', '$dis', '$code', '$code_aluno', '$presensa')");  
echo "<script language='javascript'>window.location='';</script>";
}}?> 

<?php if(isset($_POST['editar'])){

  $id_disciplina = $_POST['id_disciplina'];

    $sql_4 = mysqli_query($db,"DELETE FROM chamadas_em_sala WHERE id = '$id_disciplina'");  
    echo "<script language='javascript'>window.location='';</script>";
    }
?>

<?php require "rodape.php"; ?>
</body>
</html>