<?php
session_start();
$code = $_SESSION['code'];
$bi_sel = 0;
?>

<html>
<head>
<link href="css/todas_as_avaliacoes.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php require "topo1.php"; ?>
<div id="caixa_preta">
</div><!-- caixa_preta -->

<div id="box">
<?php if($_GET['pg'] == 'provas_bimestrais'){ ?>
<br /><a class="a2" rel="superbox[iframe][850x350]" href="cadastrar_prova.php?tipo=bimestral&code=<?php echo $code; ?>">Cadastrar Prova</a>
<br/>
<p></p>
 <h1>Abaixo segue seu hist&oacute;rico de provas bimestrais de suas turmas!</h1>

<?php 
  $sql = "SELECT * FROM provas WHERE professor = '$code' ORDER BY disciplina DESC";
  if(isset($_POST['bt_filtrar'])){
       $bi = $_POST['sel_bimestre'];
       $bi_sel = $bi;
       if($bi > 0)
         $sql = "SELECT * FROM provas WHERE professor = '$code' AND bimestre = ".$bi." ORDER BY id DESC";
    }else{
      $sql = "SELECT * FROM provas WHERE professor = '$code' ORDER BY disciplina DESC";
    }
?>

 <form  name="send" method="post" action="" enctype="multipart/form-data">
   <h1> Filtrar por: <select name="sel_bimestre" id="sel_bimestre">
      <option value="0" <?php if($bi_sel == 0){ echo "selected=''";} ?>>Todos</option>
      <option value="1" <?php if($bi_sel == 1){ echo "selected=''";} ?>>1 Bimestre</option>
      <option value="2" <?php if($bi_sel == 2){ echo "selected=''";} ?>>2 Bimestre</option>
      <option value="3" <?php if($bi_sel == 3){ echo "selected=''";} ?>>3 Bimestre</option>
      <option value="4" <?php if($bi_sel == 4){ echo "selected=''";} ?>>4 Bimestre</option>
    </select>
  <button name="bt_filtrar">Filtrar</button></h1>
</form>

<?php
    $sql_1 = mysqli_query($db,$sql);
    if(mysqli_num_rows($sql_1) == ''){
    	 echo "<h2>No momento não existe nenhuma prova lançada no sistema!</h2>";	 
    }else{
    	while($res_1 = mysqli_fetch_array($sql_1)){
    ?> 
    <table width="98%" border="0">
      <tr>
        <td width="50">N&ordm; prova</td>
        <td width="60">Status</td>
        <td width="131">Lan&ccedil;amento</td>
        <td width="140">Data de aplica&ccedil;&atilde;o</td>
        <td width="100">Disciplina</td>
        <td width="100">Detalhes</td>
        <td width="100">Bimestre</td>
      </tr>
      <tr>
        <td><h3><?php echo $res_1['id'];?></h3></td>
        <td><h3><?php echo $res_1['status']; ?></h3></td>
        <td><h3><?php echo $res_1['date']; ?></h3></td>
        <td><h3><?php echo $res_1['data_aplicacao']; ?></h3></td>
        <td><h3><?php

            $sql = mysqli_query($db, "SELECT * FROM disciplinas WHERE id = '".$res_1['disciplina']."' ");
            while($res = mysqli_fetch_array($sql)){
              $disciplina = $res['disciplina'];
            }
            echo $disciplina;

         ?></h3></td>
        <td><h3><?php echo $res_1['detalhes']; ?></h3></td>
         <td><h3><?php echo $res_1['bimestre']; ?></h3></td>
      </tr>
      <tr>
        <td><a rel="superbox[iframe][850x350]" href="editar_prova.php?id=<?php echo $res_1['id']; ?>&code=<?php echo $code; ?>">Editar</a></td>

        <td colspan="5"><a href="correcao_prova.php?id=<?php echo $res_1['id']; ?>&bimestre=<?php echo $res_1['bimestre']; ?>">Fazer corre&ccedil;&atilde;o</a></td>

        <td><a href="todas_as_avaliacoes.php?pg=excluir&id=<?php echo $res_1['id']; ?>&code=<?php echo $code; ?>">Deletar</a></td>
      </tr>  
      </table> 
     
    <?php }}}
    

if($_GET['pg'] == 'excluir'){
	
    $id = $_GET['id'];
    $code = $_GET['code'];

    mysqli_query($db,"DELETE FROM provas WHERE id = '$id'");

    echo "<script language='javascript'>window.location='todas_as_avaliacoes.php?pg=provas_bimestrais';</script>";
      die;

}?> 
</div><!-- box-->


<?php require "rodape.php"; ?>
</body>
</html>