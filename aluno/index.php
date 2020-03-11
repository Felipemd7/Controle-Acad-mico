<?php 
require "topo1.php";
$_SESSION['painel_atual'] = "Aluno";
$code = $_SESSION['code'];
?>
<!DOCTYPE html>
<html>
<head>

  <link rel="stylesheet" href="css/style.css">

</head>

<?php 
  $matricula = "Não definido"; $serie = "Não definido";
  $status  = "Não definido"; $email = "Não definido";

$sql =  mysqli_query($db,"SELECT * FROM estudantes WHERE code = '$code'");
while ($res = mysqli_fetch_array($sql)) {
    $matricula = $res['code'];
    $serie = $res['serie'];
    $status  = $res['status'];
    $email = $res['email'];
}
  
  $sql = mysqli_query($db, "SELECT * FROM cursos WHERE id = '".$serie."'");
    while ($res = mysqli_fetch_array($sql)) {
      $curso = $res['curso'];
    }
?>

<body class="template active">
	
        <div class="box">
             
            <div class="border">
               <?php
                $foto = "not_found.png";
                $sql = mysqli_query($db,"SELECT * FROM fotos WHERE code_aluno = '$code'");
                while($res_1 = mysqli_fetch_array($sql)){
                  $foto = $res_1['nome'];
                } 
              ?>
              <a href="alterar_foto.php"><img src="fotos/<?php echo $foto ?>" height="140" width="120"></a>

            <div class="texto"><h3>Status: <?php echo $status ?></h3></div>
            <div class="texto"><h3>Matricula: <?php echo $matricula ?></h3></div>
            <div class="texto"><h3>Curso: <?php echo $curso ?></h3></div>
            <div class="texto"><h3>E-Mail: <?php echo $email ?></h3></div>
            <div class="texto"><h3>Presenças: <?php echo mysqli_num_rows(mysqli_query($db,"SELECT * FROM chamadas_em_sala WHERE code_aluno = '$code' AND presente = 'SIM'")); ?></h3></div>
            <div class="texto"><h3>Faltas Justificadas: <?php echo mysqli_num_rows(mysqli_query($db,"SELECT * FROM chamadas_em_sala WHERE code_aluno = '$code' AND presente = 'JUSTIFICADA'")); ?></h3></div>
            <div class="texto"><h3>Faltas: <?php echo mysqli_num_rows(mysqli_query($db,"SELECT * FROM chamadas_em_sala WHERE code_aluno = '$code' AND presente = 'NAO'")); ?></h3></div>
           </div>

      </div>


        <div class="box">
            <div class="tituloNo"><h2>Notificações</h2></div>
            <div class="textoNo">
              <div id="avisos_notificacoes">
                      <ul>
                       <?php
                       $sql_1 = mysqli_query($db,"SELECT * FROM mural_aluno WHERE curso = '$serie'");
                        while($res_1 = mysqli_fetch_array($sql_1)){
                       ?>
                        <li><h1><?php echo $res_1['titulo']; ?></h1></li>
                        <?php } ?>
                      </ul>
              </div><!-- avisos_notificacoes -->
            </div>
        </div>
       


</body>
</html>