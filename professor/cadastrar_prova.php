<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php require "../conexao.php"; 
 date_default_timezone_set('America/Fortaleza');
 $date = date("d/m/Y H:i:s");
 $code = $_GET['code']; 


?>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="css/cadastrar_prova.css" rel="stylesheet" type="text/css" />
</head>


<body>
<div id="box">

<?php if(isset($_POST['button'])){

    $dis = $_POST['dis'];
    $aplicacao = $_POST['aplicacao'];
    $detalhes = $_POST['detalhes'];
    $bimestre = $_POST['bimestre'];

    $sql_2 = mysqli_query($db,"SELECT * FROM disciplinas WHERE id = '$dis'");
    while($res_2 = mysqli_fetch_array($sql_2)){
    		
        $curso = $res_2['curso'];
    		
        $verificar = mysqli_num_rows(mysqli_query($db,"SELECT * FROM provas WHERE bimestre = '$bimestre' AND disciplina = '$dis'"));
        if($verificar <= 0){

              $sql_3 = mysqli_query($db,"INSERT INTO provas (date, status, professor, curso, disciplina, detalhes, data_aplicacao, bimestre) VALUES ('$date', 'Ativo', '$code', '$curso', '$dis', '$detalhes', '$aplicacao', '$bimestre')");
                		
              $sql_4 = mysqli_query($db,"INSERT INTO mural_aluno (date, status, curso, titulo) VALUES ('$date', 'Ativo', '$curso', 'As notas das provas bimestrais estão sendo divulgadas')");

              if($sql_3){
                
                  header("Location:todas_as_avaliacoes.php?pg=provas_bimestrais");

              }else{
                  echo "Erro: ".$sql_3;
              }
              die;
        
    		}else{
          echo "Ja existe uma prova desta disciplina para o ".$bimestre."° semestre";
          die;
        }

    }
}?>

 <form name="send" method="post" action="" enctype="multipart/form-data">	
	
<table border="0">
  <tr>
    <td width="272">Disciplina</td>
     <td width="216">Selecione o Bimestre</td>
    <td width="216">Data de aplica&ccedil;&atilde;o da prova</td>

  </tr>
  <tr>
    <td>
      <select name="dis" id="dis">
      <?php
      $sql_1 = mysqli_query($db,"SELECT * FROM disciplinas WHERE professor = '$code'");
	  	while($res_1 = mysqli_fetch_array($sql_1)){
	  ?>
      <option value="<?php echo $res_1['id']; ?>"><?php echo $res_1['disciplina']; ?></option>
      <?php } ?> 
    </select> 
  </td>
   <td>
      <select name="bimestre" id="bimestre">
        <option value="1">1&ordm; Bimestre</option>
        <option value="2">2&ordm; Bimestre</option>
        <option value="3">3&ordm; Bimestre</option>
        <option value="4">4&ordm; Bimestre</option>
      </select>
    </td>
     
     
    <td><input type="text" name="aplicacao" value="<?php echo date("d/m/Y"); ?>"></td>
  </tr> 
  <tr>
    <td>Informa&ccedil;&otilde;es adicionais:</td>
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
</body>
</html>