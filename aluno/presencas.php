<?php $painel_atual = "aluno";?>
<html >
<head>
<link href="css/precesencas.css" rel="stylesheet" type="text/css" />

</head>

<body>
<?php require "topo1.php"; ?><?php require "../config.php"; ?>

<div id="box" class="box">
 <h1><strong>Frequ&ecirc;ncia Escolar</strong></h1>


<table id="customers">

  <tr>
    <th>DISCIPLINA</th>
    <th>Total de presen&ccedil;a</th>
    <th>Total de faltas</th>
    <th>Falta(s) Justificada</th>
    <th>Resultado</th>
  </tr>

  <?php
    $sql_1 = mysqli_query($db,"SELECT * FROM disciplinas WHERE curso = '$serie'");
      while($res_1 = mysqli_fetch_array($sql_1)){
  ?>
  
  <tr>
    <td><?php echo $disciplina = $res_1['disciplina']; ?></td>
    <td><?php echo $sql_2 = mysqli_num_rows(mysqli_query($db,"SELECT * FROM chamadas_em_sala WHERE curso = '$serie' AND disciplina = '$disciplina' AND code_aluno = '$code' AND presente = 'SIM'")); ?></td>
    <td><?php echo $sql_3 = mysqli_num_rows(mysqli_query($db,"SELECT * FROM chamadas_em_sala WHERE curso = '$serie' AND disciplina = '$disciplina' AND code_aluno = '$code' AND presente = 'NAO' ")); ?></td>
    <td><?php echo $sql_4 = mysqli_num_rows(mysqli_query($db,"SELECT * FROM chamadas_em_sala WHERE curso = '$serie' AND disciplina = '$disciplina' AND code_aluno = '$code' AND presente = 'JUSTIFICADA'")); ?></td>
    <td>
    <?php
  $sql_5 = mysqli_query($db,"SELECT * FROM chamadas_em_sala WHERE curso = '$serie' AND disciplina = '$disciplina'");
  $conta_sql_5 = mysqli_num_rows($sql_5);
  
  $total = ($conta_sql_5*25)/100;
  
  if($sql_3 >$total){
    echo "Reprovado"; ?><a href="detalhe_presencas.php?disciplina=<?php echo $disciplina ?>"> | Mais detalhe</a>
  <?php }else{
    echo "Aprovado"; ?><a href="detalhe_presencas.php?disciplina=<?php echo $disciplina ?>"> | Mais detalhe</a>
   <?php }
  
  ?>    
    </td>
  </tr>
  <?php } ?> 
</table>

</div><!-- box -->

</body>
</html>