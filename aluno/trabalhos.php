<?php $painel_atual = "aluno";?>
<html>
<head>
<link href="css/provas_bimestrais.css" rel="stylesheet" type="text/css" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>

<body>
<?php require "topo1.php"; ?><?php require "../config.php"; ?>

<div id="box">
<h1><strong>Trabalhos lan&ccedil;ados no sistema!</strong></h1>

<div class="box">
<table id="customers">

  <tr>
    <th>N&ordm; do trabalho</th>
    <th>Disciplina</th>
    <th>Tema</th>
    <th>Data max. de entrega:</th>
    <th>Mais informa&ccedil;&otilde;es</th>
    <th>Nota</th>
    <th>Enviar</th>
  </tr>

<?php

$sql_1 = mysqli_query($db,"SELECT * FROM trabalho WHERE status = 'Ativo' AND curso = '$serie'");

if(mysqli_num_rows($sql_1) == ''){
  echo "<h2>No momento não existe nenhum trabalho lançado no sistema!</h2>";
}else{
    while($res_1 = mysqli_fetch_array($sql_1)){
?>
  
  <tr>
    <td><?php echo $id = $res_1['id']; ?></td>
    <td><?php 
      $disciplina = $res_1['disciplina'];
      $sql = mysqli_query($db,"SELECT * FROM disciplinas WHERE id = '$disciplina'");
      while ($ress = mysqli_fetch_array($sql)) {
        echo  $ress['disciplina'];
      }
      
    ?></td>
    <td><?php echo $res_1['tema']; ?></td>
    <td><?php echo $res_1['data_de_entrega']; ?></td>
    <td><a href="detalhes_do_trabalho.php?id=<?php echo $res_1['id']; ?>&pg=trabalho" rel="superbox[iframe][515x400]" data-toggle="modal" data-target="#myModal">Mais detalhes</a></td>
    <td><?php 
        $sql = mysqli_query($db,"SELECT * FROM envio_de_trabalhos WHERE id_trabalho = ".$res_1['id']." AND aluno = '$code'");
        $nota = "Indefinido";
        $status = "Indefinido";
        while ($res = mysqli_fetch_array($sql)) {
            $nota  = $res['nota'];
            $status = $res['status'];
        }
        if($status == "Aceito")
            echo $nota;
        else
          echo "Aguardar";
     ?>
      
    </td>
    <?php 
 // $sql_2 = mysqli_query($db,"SELECT * FROM envio_de_trabalhos WHERE id_trabalho = ".$res_1['id']." AND aluno = '$code' AND status = 'Aceito' OR status = 'Aguarda'");
  $sql_2 = mysqli_query($db,"SELECT * FROM envio_de_trabalhos WHERE id_trabalho = ".$res_1['id']." AND aluno = '$code'");
  if(mysqli_num_rows($sql_2) >= '1'){
    while ($res = mysqli_fetch_array($sql_2)) {
      $trabalho = $res['trabalho'];
    }
    echo "<td><h2><strong>Trabalho j&aacute; enviado | </strong></h2><a href='../trabalhos_alunos/".$trabalho."'>Ver</a></td>";

}else{
  ?>

    <td colspan="2"><a href="enviar_trabalho.php?id=<?php echo $res_1['id']; ?>&aluno=<?php echo $code; ?>&dis=<?php echo $res_1['disciplina']; ?>&entrega=<?php echo $res_1['data_de_entrega']; ?>" rel="superbox[iframe][400x190]">Enviar trabalho</a></td>
    <?php } ?>
 
  </tr>
  <?php }} ?>

</table>
</div>
</div><!-- box -->
</body>

</html>