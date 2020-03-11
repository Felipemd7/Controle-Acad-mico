<html>
<head>
<?php require "topo1.php" ?>
<?php require "../conexao.php";  $code = $_GET['code']; $date = date("d/m/Y"); ?>

<link href="css/trabalho.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
</head>



<body>
<div id="box">
<?php 

if(isset($_POST['button'])){

$curso = $_POST['curso'];
$dis = $_POST['disciplina'];
$tema = $_POST['tema'];
$detalhes = $_POST['detalhes'];
$encerramento = $_POST['encerramento'];


    $sql_5 = mysqli_query($db,"INSERT INTO trabalho (data, status, professor, curso, disciplina, tema,detalhe, data_de_entrega, nota) VALUES ('$date', 'Ativo', '$code', '$curso', '$dis', '$tema', '$detalhes', '$encerramento', '-1')");

    if($sql_5 == true){
      $nome_dis = $dis;
      $sql_dis = mysqli_query($db,"SELECT * FROM disciplinas WHERE id = $dis");
      while ($res_dis = mysqli_fetch_array($sql_dis)) {
        $nome_dis = $res_dis['disciplina'];
      }

      $sql_6 = mysqli_query($db,"INSERT INTO mural_aluno (date, status, curso, titulo) VALUES ('$date', 'Ativo', '$curso', 'Trabalho bimestral de $nome_dis com encerramento no dia $encerramento - Para ver mais detalhes vá em AVALIAÇÕES')");
     

      echo "<script language='javascript'>window.location='trabalho.php';</script>";
      echo "<br><br><br>Este trabalho foi lançado no sistema com sucesso!<br>Aparte em F5 em seu teclado.";

      die;


    }else{
      echo "Deu errado: ".mysql_error()." Erro: ".$sql_5;
      die;
    }


          
  
}?>

<?php
     $id = 1;
    $sql_1 = mysqli_query($db,"SELECT * FROM trabalho ORDER BY id DESC LIMIT 1");
    if(mysqli_num_rows($sql_1) == ''){
         $id = 1;
    }else{
       while($res_1 = mysqli_fetch_array($sql_1)){
         $id = $res_1['id']+1;      
      }
    }
?>

 <form name="send" method="post" action="" enctype="multipart/form-data">		
<table border="0">
  <tr>
    <td width="198">N&ordm; do trabalho</td>
  </tr>
  <tr>
    <td><input disabled type="text" value="<?php echo $id ?>">
  </td>
  </tr>
  <tr>
    <td width="272">Curso</td>
    <td width="272"><span id="tefDis" style="display:none;">Disciplina</span></td>
  </tr>
  <tr>
<!------------------------------------------------------------->
<!------------------------------------------------------------->
   <td>
    <select name="curso" id="curso" required="">
      <option value="">Escolha o curso</option>
      <?php
          /*$conexao = new PDO("mysql:host=".$servidor.";dbname=".$db1."",$usuario,$senha);
          $conexao ->exec('SET CHARACTER SET uft8');
          $select = $conexao->prepare("SELECT * FROM disciplinas WHERE professor = '$code' GROUP BY curso");
          $select->execute();
          $fetchAll = $select -> fetchAll();
          foreach ($fetchAll as $cursos) {

            $select1 = $conexao->prepare("SELECT * FROM curso WHERE id = '".$cursos['id']."'");
            $select1->execute();
            $fetchAll1 = $select1 -> fetchAll();
            foreach ($fetchAll1 as $cursos1) {
              echo '<option value="'.$cursos['id'].'">'.$cursos1['curso'].'</option>';
            }
          }*/


            /*$sql_1 = mysqli_query($db,"SELECT * FROM disciplinas WHERE professor = '$code' GROUP BY curso");
              while($res_1 = mysqli_fetch_array($sql_1)){
                 echo '<option value="'.$res_1['id'].'">'.$res_1['curso'].'</option>';     
              }*/
            $sql_1 = mysqli_query($db,"SELECT * FROM disciplinas WHERE professor = '$code' GROUP BY curso");
              while($res_1 = mysqli_fetch_array($sql_1)){

                 $sql = mysqli_query($db, "SELECT * FROM cursos WHERE id = '".$res_1['curso']."' "); 
                 while ($res = mysqli_fetch_array($sql)) {
                    $curso = $res['curso'];
                 }
                 echo '<option value="'.$res_1['curso'].'">'.$curso.'</option>';     
              }

          ?>
    </select>
  </td>

    <td><select name="disciplina" style="display:none;" id="disciplina" required="">
       <option value="">Escolha a disciplinha</option>
      </select>
    </td>

    <script type="text/javascript">

      $("#curso").on("change",function(){
          var idCurso = $("#curso").val();
          $.ajax({
            url:'sub_disciplina.php',
            type: 'POST',
            data:{id:idCurso,code:<?php echo $code ?>},
            beforeSend: function(){
                $("#tefDis").css({'display':'block'});
                $("#disciplina").css({'display':'block'});
                $("#disciplina").html("Carregando...");
            },
            success: function(data){
                $("#tefDis").css({'display':'block'});
                $("#disciplina").css({'display':'block'});
                $("#disciplina").html(data);
            },
            error: function(data){
              $("#tefDis").css({'display':'block'});
              $("#disciplina").css({'display':'block'});
              $("#disciplina").html("Houve um erro... Contate-nos!");
            }
          });
      }); 

    </script>
<!------------------------------------------------------------->
<!------------------------------------------------------------->
  </tr>  
  <tr>
    <td width="216">Lan&ccedil;amento</td>
    <td width="216">Data de entrega</td>
    <td width="272">Titulo</td>
  </tr>
  <tr>
    <td><input disabled type="text" value="<?php echo $date; ?>" ></td>
    <td><input type="date" name="encerramento" value="" min="<?php echo date("d/m/Y"); ?>" placeholder="Selecione uma data..." required=""></td>
    <td><input type="text" name="tema" value="" required=""></td>
  </tr>
  <tr>
    <td>Mais detalhes sobre o trabalho:</td>
  </tr>
  <tr>
    <td colspan="3"><textarea name="detalhes" cols="" rows=""></textarea></td>
  </tr>
  <tr>
    <td><input class="input" type="submit" name="button" id="button" value="Cadastrar"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  </table>
  </form>


</div><!-- box -->
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
  google.load("jquery","1.4.2");
</script>

</body>
</html>

