<?php
session_start();
$code = $_SESSION['code'];
?>
<html>
<head>
<link href="css/trabalhos_bimestral.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php require "topo1.php"; ?>
<div id="caixa_preta">
</div><!-- caixa_preta -->

<div id="box">
<br />
<a class="a2" rel="superbox[iframe][680x400]" href="postar_trabalho.php?code=<?php echo $code; ?>">Postar trabalho</a>
<p></p>
 <h1>Abaixo segue seu histórico de trabalhos todos!</h1>

<?php
$sql_1 = mysqli_query($db,"SELECT * FROM trabalho WHERE professor = '$code' ORDER BY id DESC");
if(mysqli_num_rows($sql_1) == ''){
 echo "<h2>No momento não existe nenhum trabalho lançado no sistema!</h2>";	 
}else{
	while($res_1 = mysqli_fetch_array($sql_1)){	
?>
 
<table width="955" border="0">
  <tr>
    <td width="90">Nº trabalho</td>
    <td width="60">Status</td>
    <td width="131">Lançamento</td>
    <td width="187">Curso</td>
    <td width="187">Disciplina</td>
    <td width="323">Tema</td>
    <td width="129">Data de entrega</td>
  </tr>
  <tr>
    <td><h3><?php  echo $res_1['id']; ?></h3></td>
    <td><h3><?php  echo $res_1['status']; ?></h3></td>
    <td><h3><?php  echo $res_1['data']; ?></h3></td>
    <td><h3><?php 

          $sql = mysqli_query($db, "SELECT * FROM cursos WHERE id = '".$res_1['curso']."' "); 
          while ($res = mysqli_fetch_array($sql)) {
             $curso = $res['curso'];
          }

        echo $curso; 

    ?></h3></td>
    <td><h3><?php

            $sql = mysqli_query($db, "SELECT * FROM disciplinas WHERE id = '".$res_1['disciplina']."' "); 
            while ($res = mysqli_fetch_array($sql)) {
               $disciplina = $res['disciplina'];
            }

            echo $disciplina; 

    ?></h3></td>
    <td><h3><?php  echo $res_1['tema']; ?></h3></td>
    <td><h3><?php  echo $res_1['data_de_entrega']; ?></h3></td>
  </tr>
  <tr>
    <td><a rel="superbox[iframe][680x400]" href="editar_trabalho_bimestral.php?id=<?php  echo $res_1['id']; ?>&code=<?php  echo $code; ?>">Editar</a></td>
    <td colspan="3"><a href="alunos_que_mostraram_este_trabalho.php?id=<?php  echo $res_1['id']; ?>&pg=trabalho">Alunos que entregaram este trabalho</a></td>
    <td></td>
    <td><a href="trabalho.php?pg=excluir&code=<?php  echo $code; ?>&id=<?php  echo $res_1['id']; ?>">Excluir</a></td>
  </tr>  
  </table>

<?php  }} ?>
</div><!-- box -->


<?php if(@$_GET['pg'] == 'excluir'){

$id = $_GET['id'];
$code = $_GET['code'];

$sql_2 = mysqli_query($db,"DELETE FROM trabalho WHERE id = '$id' AND professor = '$code'");

echo "<script language='javascript'>window.location='trabalho.php';</script>";

}?>


<?php  require "rodape.php"; ?>
</body>
</html>