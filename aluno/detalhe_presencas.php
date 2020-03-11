<?php $painel_atual = "aluno";?>
<html >
<head>
<link href="css/precesencas.css" rel="stylesheet" type="text/css" />

</head>

<body>
<?php require "topo1.php"; ?><?php require "../config.php";
  
  $disciplina = $_GET['disciplina'];
  
 ?>

<div id="box" class="box">
 <h1><strong>Historico de chamada da disciplina de <?php echo $disciplina; ?></strong></h1>


<table id="customers">

  <tr>
    <th>Data</th>
    <th>Frequencia registrada</th>
  </tr>

  <?php
        $data = mysqli_query($db,"SELECT * FROM chamadas_em_sala WHERE curso = '$serie' AND disciplina = '$disciplina' AND code_aluno ='$code'");
        while ($datas = mysqli_fetch_array($data)) {  ?>
  
      <tr>
        <td><?php echo $datas['date_day']; ?></td>
        <td><?php echo $datas['presente']; ?></td>
      </tr>
  <?php } ?> 
</table>

</div><!-- box -->

</body>
</html>