<?php require "topo1.php"; ?>

<!DOCTYPE html>
<html>
<head>
  <link href="css/index.css" rel="stylesheet" type="text/css" />
   <!--<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">-->
</head>

<body>

 <?php
 
 $d = date("d");
 $m = date("m");
 $y = date("Y");
 
 ?>
  

    <div class="box">
        <div class="tituloNo"><h2>Cursos e Disciplinas</h2></div>
            <div class="textoNo">
                <li><strong>Total de cursos cadastradas:</strong> <?php echo mysqli_num_rows(mysqli_query($db,"SELECT * FROM cursos")); ?>  </li>
                <li><strong>Total de disciplinas cadastradas:</strong> <?php echo mysqli_num_rows(mysqli_query($db,"SELECT * FROM disciplinas")); ?>  </li>
            </div>
    </div>

     <div class="box">
        <div class="tituloNo"><h2>Professores</h2></div>
            <div class="textoNo">
                <li><strong>Professores Ativos:</strong> <?php echo mysqli_num_rows(mysqli_query($db,"SELECT * FROM professores WHERE status = 'Ativo'")); ?></li>
                <li><strong>Professores Inativos:</strong> <?php echo mysqli_num_rows(mysqli_query($db,"SELECT * FROM professores WHERE status = 'Inativo'")); ?></li>
            </div>
    </div>

    <div class="box">
        <div class="tituloNo"><h2>Estudantes</h2></div>
            <div class="textoNo">
               <li><strong>Estudantes Ativos:</strong> <?php echo mysqli_num_rows(mysqli_query($db,"SELECT * FROM estudantes WHERE status = 'Ativo'")); ?></li>
               <li><strong>Estudantes Inativos:</strong> <?php echo mysqli_num_rows(mysqli_query($db,"SELECT * FROM estudantes WHERE status = 'Inativo'")); ?></li>
            </div>
    </div>

    <div class="box">
        <div class="tituloNo"><h2>Suporte T&eacute;cnico</h2></div>
            <div class="textoNo">
                <li><strong>Contatos que aguarda resposta:</strong> <?php echo mysqli_num_rows(mysqli_query($db,"SELECT * FROM central_mensagem WHERE status = 'Aguarda resposta'")); ?></li>
                <li><strong>Contatos respondidos:</strong><?php echo mysqli_num_rows(mysqli_query($db,"SELECT * FROM central_mensagem WHERE status = 'Respondido'")); ?></li>
                <li><strong>Total de contatos:</strong> <?php echo mysqli_num_rows(mysqli_query($db,"SELECT * FROM central_mensagem")); ?></li>
            </div>
    </div>
 
   <div class="box">
            <div class="tituloNo"><h2>Notifica&ccedil;&otilde;es</h2></div>
            <div class="textoNo">
              <div id="avisos_notificacoes">
                      <ul>
                       <?php
                         $sql_1 = mysqli_query($db,"SELECT * FROM mural_coordenacao ORDER BY id DESC");
                         if($sql_1 == ''){
                           echo "No momento n�o existe novidades";
                         }else{
                           while($res_1 = mysqli_fetch_array($sql_1)){
                         ?>
                          <li><h1><?php echo $res_1['titulo']; ?></h1></li>
                          <?php }} ?>
                      </ul>
              </div><!-- avisos_notificacoes -->
            </div>
    </div>
 

</body>
</html>