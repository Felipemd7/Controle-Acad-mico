<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="UTF-8">
<link href="css/mostrar_resultado.css" rel="stylesheet" type="text/css" />
<?php require "topo1.php"; require "../conexao.php"; ?>

</head>

<body>
<div id="box">
<?php if(@$_GET['s'] == 'professor'){ ?>
<?php
$q = $_GET['q'];
$sql_1 = mysqli_query($db,"SELECT * FROM professores WHERE code = '$q'");
	while($res_1 = mysqli_fetch_array($sql_1)){
?>
<table width="750" border="0">
  <tr>
    <td colspan="3"><h1>Informacoes sobre este professor</h1></td>
  </tr>
  <tr>
    <td><strong>Nome:</strong></td>
    <td><strong>CPF:</strong></td>
  </tr>
  <tr>
    <td><?php echo $res_1['nome']; ?></td>
    <td><?php echo $res_1['cpf']; ?></td>
  </tr>
  <tr>
    <td><strong>Formacao</strong>:</td>
    <td><strong>Graduacao:</strong></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><?php echo $res_1['formacao']; ?></td>
    <td><?php echo $res_1['graduacao']; ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Pos-graduacao:</strong></td>
    <td><strong>Mestrado:</strong></td>
    <td><strong>Doutorado:</strong></td>
  </tr>
  <tr>
    <td><?php echo $res_1['pos_graduacao']; ?></td>
    <td><?php echo $res_1['mestrado']; ?></td>
    <td><?php echo $res_1['doutorado']; ?></td>
  </tr>
</table>
<?php } ?>
<?php
$sql_2 = mysqli_query($db,"SELECT * FROM disciplinas WHERE professor = '$q'");
?>
<table width="750" border="0">
  <tr>
    <td colspan="2"><h1>Informacoes academicas</h1></td>
  </tr>
  <tr>
    <td width="404"><strong>Status: </strong> <?php echo $_GET['status']; ?></td>
    <td width="330">&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Disciplinas ministradas:</strong></td>
    <td><strong>Curso</strong></td>
  </tr>
  <?php while($res_2 = mysqli_fetch_array($sql_2)){ ?>
  <tr>
    <td><?php echo $res_2['disciplina']; ?></td>
    <td><?php 
          $sel_curso = mysqli_query($db,"SELECT * FROM cursos WHERE id = ".$res_2['curso']."");
          while ($res = mysqli_fetch_array($sel_curso)) {
            echo $res['curso'];
          }
       ?></td>
  </tr>
 <?php } ?> 
</table>

<p>&nbsp;</p>
<p>&nbsp;</p>
<?php } ?>


<?php if($_GET['s'] == 'aluno'){ ?>
<?php
$q = $_GET['q'];
$sql_1 = mysqli_query($db,"SELECT * FROM estudantes WHERE code = '$q'");
	while($res_1 = mysqli_fetch_array($sql_1)){
?>
<h1>Informacoes Gerais</h1>
<table width="99%" border="0" id="customers">
  <tr>
    <th><strong>Nome:</strong></th>
    <th><strong>CPF:</strong></th>
    <th><strong>RG:</strong></th>
  </tr>
  <tr>
    <td><?php echo $res_1['nome']; ?></td>
    <td><?php echo $res_1['cpf']; ?></td>
    <td><?php echo $res_1['rg']; ?></td>
  </tr>
  <tr>
    <th><strong>Nascimento:</strong></th>
    <th><strong>Mae:</strong></th>
    <th><strong>Pai:</strong></th>
  </tr>
  <tr>
    <td><?php echo $res_1['nascimento']; ?></td>
    <td><?php echo $res_1['mae']; ?></td>
    <td><?php echo $res_1['pai']; ?></td>
  </tr>
  <tr>
    <th><strong>Estado:</strong></th>
    <th><strong>Cidade:</strong></th>
    <th><strong>Bairro:</strong></th>
  </tr>
  <tr>
    <td><?php echo $res_1['estado']; ?></td>
    <td><?php echo $res_1['cidade']; ?></td>
    <td><?php echo $res_1['bairro']; ?></td>
  </tr>
  <tr>
    <th><strong>Endereco:</strong></th>
    <th><strong>Complemento:</strong></th>
    <th><strong>Cep:</strong></th>
  </tr>
  <tr>
    <td><?php echo $res_1['endereco']; ?></td>
    <td><?php echo $res_1['complemento']; ?></td>
    <td><?php echo $res_1['cep']; ?></td>
  </tr>
  <tr>
    <th><strong>Telefone Residencial:</strong></th>
    <th><strong>Celular:</strong></th>
    <th><strong>Telefone do amigo:</strong></th>
  </tr>
  <tr>
    <td><?php echo $res_1['tel_residencial']; ?></td>
    <td><?php echo $res_1['celular']; ?></td>
    <td><?php echo $res_1['tel_amigo']; ?></td>
  </tr>
  <tr>
    <th><strong>Turma:</strong></th>
    <th><strong>Turno:</strong></th>
    <th><strong>Atendimento Especial:</strong></th>
  </tr>
  <tr>
    <td><?php echo $serie = $res_1['serie']; ?></td>
    <td><?php echo $res_1['turno']; ?></td>
    <td><?php echo $res_1['atendimento_especial']; ?></td>
  </tr>
  <tr>
    <th colspan="3"><strong>OBS:</strong></th>
  </tr>
  <tr>
    <td colspan="3"><?php echo $res_1['obs']; ?></td>
  </tr>
</table>
<?php } ?>

<h1>Presencas do aluno</h1>
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
    <td><?php echo $sql_2 = mysqli_num_rows(mysqli_query($db,"SELECT * FROM chamadas_em_sala WHERE curso = '$serie' AND disciplina = '$disciplina' AND code_aluno = '$q' AND presente = 'SIM'")); ?></td>
    <td><?php echo $sql_3 = mysqli_num_rows(mysqli_query($db,"SELECT * FROM chamadas_em_sala WHERE curso = '$serie' AND disciplina = '$disciplina' AND code_aluno = '$q' AND presente = 'NAO' ")); ?></td>
    <td><?php echo $sql_4 = mysqli_num_rows(mysqli_query($db,"SELECT * FROM chamadas_em_sala WHERE curso = '$serie' AND disciplina = '$disciplina' AND code_aluno = '$q' AND presente = 'JUSTIFICADA'")); ?></td>
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

<!-- ================================BOLETIM DO ALUNO==================-->
<h1>Boletim do aluno 
<div class="dropdown">
    <button class="dropbtn"><img src="img/print.png" height="35px" width="35px"></button>
    <div class="dropdown-content">
      <a href="../aluno/gerar_planilha.php?serie=<?php echo $serie; ?>&code=<?php echo $q; ?>&tipo=excel"><h5>IMPRIMIR EXCEL</h5></a>
      <a href="../aluno/gerar_planilha.php?serie=<?php echo $serie; ?>&code=<?php echo $q; ?>&tipo=pdf"><h5>IMPRIMIR PDF</h5></a>
    </div>
</div></h1>
<table id="customers" width="900" border="1">

    <tr>
      <th width="317" rowspan="3"><strong>DISCIPLINA<br /><br /></strong></th>
      <th width="150" colspan="4"><strong>1&ordm; Bimestre</strong></th>
      <th width="150"  colspan="4"><strong>2&ordm; Bimestre</strong></th>
       <th width="150" rowspan="2" colspan="3"><strong></strong></th><!-- MEDIA -->
      <th width="150"  colspan="4"><strong>3&ordm; Bimestre</strong></th>
      <th width="150"  colspan="4"><strong>4&ordm; Bimestre</strong></th>
       <th width="150" rowspan="2" colspan="3"><strong></strong></th><!-- MEDIA -->
    </tr>

    <tr>
      <th width="150" colspan="4"><strong>1&ordm; Avaliacao</strong></th>
      <th width="150"  colspan="4"><strong>2&ordm; Avaliacao</strong></th>
      <th width="150"  colspan="4"><strong>3&ordm; Avaliacao</strong></th>
      <th width="150"  colspan="4"><strong>4&ordm; Avaliacao</strong></th>

    </tr>

    <!----------------------------->
    <tr>
       <th width="150"><strong>AQ</strong></th>
       <th width="150"><strong>AI</strong></th>
       <th width="150"><strong>M</strong></th>
       <th width="150"><strong>F</strong></th>

        <th width="150"><strong>AQ</strong></th>
        <th width="150"><strong>AI</strong></th>
        <th width="150"><strong>M</strong></th>
       <th width="150"><strong>F</strong></th>

       <!-- MEDIA -->
       <th width="150"  ><strong>1 MS</strong></th>
       <th width="150"  ><strong>RS</strong></th>
       <th width="150"  ><strong>RESULTADO 1 MS</strong></th>

         <th width="150"><strong>AQ</strong></th>
        <th width="150"><strong>AI</strong></th>
        <th width="150"><strong>M</strong></th>
       <th width="150"><strong>F</strong></th>

         <th width="150"><strong>AQ</strong></th>
        <th width="150"><strong>AI</strong></th>
        <th width="150"><strong>M</strong></th>
       <th width="150"><strong>F</strong></th>

      <!-- MEDIA -->
       <th width="150"  ><strong>2 MS</strong></th>
       <th width="150"  ><strong>RS</strong></th>
       <th width="150"  ><strong>RESULTADO 2 MS</strong></th>
    </tr>
  <?php
  $sql_1 = mysqli_query($db,"SELECT * FROM disciplinas WHERE curso = '$serie'");
    while($res_1 = mysqli_fetch_array($sql_1)){
      $code_disciplina = $res_1['id'];
      $disciplina = $res_1['disciplina'];
      // estou comparado com o nome. devo comparar com o id da discipliana
    $sql_2 = mysqli_query($db,"SELECT * FROM notas_provas WHERE code = '$q' AND disciplina = '$code_disciplina' AND bimestre = '1'");  
    $sql_3 = mysqli_query($db,"SELECT * FROM notas_provas WHERE code = '$q' AND disciplina = '$code_disciplina' AND bimestre = '2'");    
    $sql_4 = mysqli_query($db,"SELECT * FROM notas_provas WHERE code = '$q' AND disciplina = '$code_disciplina' AND bimestre = '3'");    
    $sql_5 = mysqli_query($db,"SELECT * FROM notas_provas WHERE code = '$q' AND disciplina = '$code_disciplina' AND bimestre = '4'");  

      $media1B = 0;
      $media2B = 0;
      $media3B = 0;
      $media4B = 0;

      $media1S = 0;
      $media2S = 0;

  ?>  
    <tr>
    <!-- td - Uma coluna -->
      <td><?php echo $disciplina; ?></td>

      <!-- 1° BIMESTRE -->
      
        <?php
          if(mysqli_num_rows($sql_2) == ''){ ?>
            <td><?php echo "<h2>Aguarda</h2>"; ?> </td>
            <td><?php echo "<h2>Aguarda</h2>"; ?> </td> <?php
        }else{
          while($res_2 = mysqli_fetch_array($sql_2)){
            $notaQual = $res_2['notaQual'];
            $notaQuant = $res_2['notaQuant'];
            $prova = $res_2['prova'];
            $media1B += ($notaQual+$notaQuant);
      ?>
        <td><?php
          if($notaQual >= 6){
            echo "<h2><strong>".$res_2['notaQual']."</strong></h2>";
          }else{
            echo "<h3><strong>".$res_2['notaQual']."</strong></h3>";      
          } 
          if($res_2['prova'] == ''){
          }else{
          echo " | <a target='_blank' class='a5' href='../trabalhos_alunos/$prova'>Ver</a></h2>";
          }
        ?></td>

        <td><?php

          if($notaQuant >= 6){
            echo "<h2><strong>".$res_2['notaQuant']."</strong></h2>";
          }else{
            echo "<h3><strong>".$res_2['notaQuant']."</strong></h3>";     
          }
          if($res_2['prova'] == ''){
          }else{
          echo " | <a target='_blank' class='a5' href='../trabalhos_alunos/$prova'>Ver</a></h2>";
          }
        ?></td>
      <?php }} ?>
      <td><?php echo $media1B/2; ?></td>
      <td>F</td>

    <!--- 2° BIMESTRE -->
      <?php
      if(mysqli_num_rows($sql_3) == ''){ ?>
            <td><?php echo "<h2>Aguarda</h2>"; ?> </td>
            <td><?php echo "<h2>Aguarda</h2>"; ?> </td> <?php
    }else{
      while($res_3 = mysqli_fetch_array($sql_3)){
        $notaQual = $res_3['notaQual'];
        $notaQuant = $res_3['notaQuant'];
        $prova = $res_3['prova'];
        $media2B += ($notaQual+$notaQuant);
    ?> 
      <td><?php
          if($notaQual >= 6){
            echo "<h2><strong>".$res_3['notaQual']."</strong></h2>";
          }else{
            echo "<h3><strong>".$res_3['notaQual']."</strong></h3>";      
          } 
          if($res_3['prova'] == ''){
          }else{
          echo " | <a target='_blank' class='a5' href='../trabalhos_alunos/$prova'>Ver</a></h2>";
          }
        ?></td>

      <td><?php
        if($notaQuant >= 6){
          echo "<h2><strong>".$res_3['notaQuant']."</strong>";
        }else{
          echo "<h3><strong>".$res_3['notaQuant']."</strong></h3>";     
        }
        if($res_3['prova'] == ''){
        }else{
        echo " | <a target='_blank' class='a5' href='../trabalhos_alunos/$prova'>Ver</a></h2>";
        }
      ?></td>     
      <?php }} ?>
      <td><?php echo $media2B/2; ?></td>
      <td>F</td>
      <!-- MEDIA -->

    <td>
      <?php //AQUI EU CALCULO A MEDIA DO PRIMEIRO SEMESTRE
        $media1S = ($media1B+$media2B)/2;
        //$media2S = ($media3B+$media4B)/2;
        echo $media1S/2;
      ?>
      
    </td>
    <td>
      <?php 
        if(($media1S/2) >= 6){
            echo "A";
        }else{
            echo "R";
        }
      ?> 
    </td> 
    <td> 11AAA </td>

      <!-- 3° BIMESTRE -->
      <?php
      if(mysqli_num_rows($sql_4) == ''){?>
            <td><?php echo "<h2>Aguarda</h2>"; ?> </td>
            <td><?php echo "<h2>Aguarda</h2>"; ?> </td> <?php
    }else{
      while($res_4 = mysqli_fetch_array($sql_4)){
        $notaQual = $res_4['notaQual'];
        $notaQuant = $res_4['notaQuant'];
        $prova = $res_4['prova']; 
        $media3B += ($notaQual+$notaQuant);
        ?>
        
        <td><?php
        if($notaQual >= 6){
          echo "<h2><strong>".$res_4['notaQual']."</strong>";
        }else{
          echo "<h3><strong>".$res_4['notaQual']."</strong></h3>";      
        } 
        if($res_4['prova'] == ''){
        }else{
        echo " | <a target='_blank' class='a5' href='../trabalhos_alunos/$prova'>Ver</a></h2>";
        }?></td>
        <td><?php
        if($notaQuant >= 6){
          echo "<h2><strong>".$res_4['notaQuant']."</strong>";
        }else{
          echo "<h3><strong>".$res_4['notaQuant']."</strong></h3>";     
        }
        if($res_4['prova'] == ''){
        }else{
        echo " | <a target='_blank' class='a5' href='../trabalhos_alunos/$prova'>Ver</a></h2>";
        }?></td>    
    <?php } }?>
      <td><?php echo $media3B/2; ?></td>
      <td>F</td>  

       <!-- 4° BIMESTRE -->

      <?php
      if(mysqli_num_rows($sql_5) == ''){?>
            <td><?php echo "<h2>Aguarda</h2>"; ?> </td>
            <td><?php echo "<h2>Aguarda</h2>"; ?> </td> <?php
    }else{
      while($res_5 = mysqli_fetch_array($sql_5)){
        $notaQual = $res_5['notaQual'];
        $notaQuant = $res_5['notaQuant'];
        $prova = $res_5['prova'];
        $media4B += ($notaQual+$notaQuant);
        ?>
        <td><?php
        if($notaQual >= 6){
          echo "<h2><strong>".$res_5['notaQual']."</strong>";
        }else{
          echo "<h3><strong>".$res_5['notaQual']."</strong></h3>";      
        }
        if($res_5['prova'] == ''){
        }else{
        echo " | <a target='_blank' class='a5' href='../trabalhos_alunos/$prova'>Ver</a></h2>";
        }?></td>
        <td><?php
        if($notaQuant >= 6){
          echo "<h2><strong>".$res_5['notaQuant']."</strong>";
        }else{
          echo "<h3><strong>".$res_5['notaQuant']."</strong></h3>";     
        }
        if($res_5['prova'] == ''){
        }else{
        echo " | <a target='_blank' class='a5' href='../trabalhos_alunos/$prova'>Ver</a></h2>";
        }
        ?></td>   
    <?php } }?>
        <td><?php echo $media4B/2; ?></td>
        <td>F</td>  
      <!-- MEDIA -->

    <td>
      <?php //AQUI EU CALCULO A MEDIA DO SEGUNDO SEMESTRE
        //$media1S = ($media1B+$media2B)/2;
        $media2S = ($media3B+$media4B)/2;
        echo $media2S/2;
      ?>
    </td>
    <td>
      <?php 
        if(($media2S/2) >= 6){
            echo "A";
        }else{
            echo "R";
        }
      ?> 
    </td> 
    <td> 222AAA </td>

    </tr>
  <?php } ?> 
  </table>
<!-- ================================ FIM DO BOLETIM DO ALUNO==================-->
<?php } ?>


<?php if($_GET['s'] == 'cobranca'){ ?>

<?php
$q = $_GET['q'];
$sql_1 = mysqli_query($db,"SELECT * FROM mensalidades WHERE code = '$q'");
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
    <td><strong>Numero de matricula:</strong></td>
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
</table>
<?php }} ?>


<?php } ?>
</div><!--box  -->
</body>
</html>