<?php
  session_start();
  $_SESSION['painel_atual'] = "professor";
  $code = isset($_SESSION['code']) ? $_SESSION['code'] : "";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<meta charset="utf-8">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="css/index.css" rel="stylesheet" type="text/css" />
</head>


<body>
<?php  require "topo1.php";  ?>


<div id="box">
  <div class="border" >
 <div id="relatorios">
   <ul>
    <li class="text"><strong>Disciplinas ministradas por voce: </strong> <?php echo mysqli_num_rows(mysqli_query($db,"SELECT * FROM disciplinas WHERE professor = '$code'")); ?></li>
    <li class="text"><strong>Voce ministra aula para
    
    <?php
    $curso = "";
    $sql_1 = mysqli_query($db,"SELECT * FROM disciplinas WHERE professor = '$code'");
    while($res_1 = mysqli_fetch_array($sql_1)){
      $curso = $res_1['curso'];
    }
    echo mysqli_num_rows(mysqli_query($db,"SELECT * FROM estudantes WHERE serie = '$curso'"));
  
  ?>
    
    alunos. </strong></li>
   </ul>
   <ul >
    <li class="text"><strong >Seu codigo de acesso:</strong> <?php echo $code; ?></li>
    <li class="text"><strong >Senha:</strong>***** <a rel="superbox[iframe][285x100]" href="altera_senha.php?code=<?php echo $code; ?>">Alterar</a></li>
   </ul> 
   
   <ul>
    <li class="text"><strong>Mensagens aguardando resposta:</strong> <?php echo mysqli_num_rows(mysqli_query($db,"SELECT * FROM central_mensagem WHERE receptor = '$code' AND status = 'Aguarda resposta'")); ?></li>
    <li class="text"><strong>Mensagens respondidas:</strong>  <?php echo mysqli_num_rows(mysqli_query($db,"SELECT * FROM central_mensagem WHERE receptor = '$code' AND status = 'Aguarda resposta'")); ?></li>
    <li class="text"><strong>Todas as mensagens:</strong>  <?php echo mysqli_num_rows(mysqli_query($db,"SELECT * FROM central_mensagem WHERE receptor = '$code'")); ?></li>
   </ul>
   </div> 
 </div><!-- relatorios -->
 
 <div id="notificacoes">
  <h1>Notificacoes</h1>
  <div id="avisos_notificacoes">
     <ul>
   <?php
   $sql_1 = mysqli_query($db,"SELECT * FROM mural_professor");
   if(mysqli_num_rows($sql_1) == ''){
     echo "No momento voce nao tem mensagens";
   }else{
    while($res_1 = mysqli_fetch_array($sql_1)){
   ?>
    <li><h1><?php echo $res_1['titulo']; ?></h1></li>
    <?php }} ?>
   </ul>
  </div><!-- avisos_notificacoes -->
 </div><!-- notificacoes -->
 
 
</div><!-- box -->

<?php require "rodape.php"; ?>
</body>
</html>