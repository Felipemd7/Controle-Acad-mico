<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<title>Adminstração</title>
<link href="css/cursos_e_disciplinas.css" rel="stylesheet" type="text/css" />


</head>


<body>
<?php require "topo1.php"; ?>


<?php if(@$_GET['pg'] == 'curso'){ ?>
<br /><br />

 <a class="aa2" href="cursos_e_disciplinas.php?pg=curso&cadastra=sim">Cadastrar Curso</a>
<?php if(@$_GET['cadastra'] == 'sim'){?> 
 <br /><br />
 <h1 >Cadastrar novo curso</h1>

<?php if(isset($_POST['cadastra'])){

$curso = $_POST['curso'];
$ano = $_POST['ano'];

$cd = mysqli_query($db,"INSERT INTO cursos(curso,ano,status) VALUES ('$curso','$ano',0)");
if($cd == ''){
	echo "<script language='javascript'>window.alert('Ocorreu um erro, ao cadastrar o curso!');</script>";
}else{
	echo "<script language='javascript'>window.alert('Curso cadastrado com sucesso!');window.location='cursos_e_disciplinas.php?pg=curso';</script>";
}
}?> 
<?php 
    
  date_default_timezone_set('America/Fortaleza');
  $ano = date("Y");

?>

<form name="form1" method="post" action="">
  <div class="tabela2">
  <table>
  <thead>
    <tr>
      <td>Curso</td>
      <td>Ano</td>
    </tr>
    <thead>
    <tr>
    <thead>
      <td><input type="text" name="curso" id="textfield" required=""></td>
      <td><input type="number" name="ano" id="ano" required="" value="<?php echo $ano; ?>"></td>
      <td><input class="input" type="submit" name="cadastra" id="button" value="Cadastrar"></td>
      </thead>
    </tr>
  </table>
  </div>
</form> 

 <br />
<?php die;} ?> 
<?php
$sql_1 = mysqli_query($db,"SELECT * FROM cursos");
 if(mysqli_num_rows($sql_1) == ''){
	 echo "<br><br>No momento no existe nenhum curso cadastrado!<br><br>";
 }else{
?>
<br /><br />
 <div class="tabela">
    <table id="customers">
    <thead>
      <tr>
        
        <th><h4>Curso:</h4></th>
        <th><h4>Ano:</h4></th>
        <th><h4>Total de disciplinas deste curso:</h4></th>
        <th><h4>Status:</h4></th>
        <th>&nbsp;</th>     
      </tr>
     </thead>
      
      <?php while($res_1 = mysqli_fetch_array($sql_1)){ $id_curso = $res_1['id']; ?>
        <tbody>
      <tr>

        <td><h3><?php echo $curso = $res_1['curso']; ?></h3></td>
        <td><h3><?php echo $curso = $res_1['ano']; ?></h3></td>
        <td><h3><?php echo mysqli_num_rows(mysqli_query($db,"SELECT * FROM disciplinas WHERE curso = '$id_curso'")); ?></h3>
        </td>
        <td ><h3><?php if($res_1['status'] == 0) echo "Ativo";
                      else if ($res_1['status'] == 1) echo "Inativo";  ?></h3>
        </td>
        <td ><?php if($res_1['status'] == 0){ ?>
            <a  class="a" href="cursos_e_disciplinas.php?pg=curso&deleta=cur&id=<?php echo @$res_1['id']; ?>"><img title="Inativar curso" src="img/deleta.jpg" width="18" height="18" border="0"></a>
            <?php }else if ($res_1['status'] == 1){ ?>
            <a class="a" href="cursos_e_disciplinas.php?pg=curso&deleta=ativar&id=<?php echo @$res_1['id']; ?>"><img title="Ativar Curso" src="img/correto.png" width="18" height="18" border="0"></a> 

            <?php  }?></td>
       
      </tr>
     </tbody>
      <?php } ?>
  
    </table>	 
           
</div><!-- box_curso -->
<?php } ?> 
<br />

<?php if(@$_GET['deleta'] == 'cur'){

      $id = $_GET['id'];

      mysqli_query($db,"UPDATE cursos SET status = 1  WHERE id = '$id'");

      echo "<script language='javascript'>window.location='cursos_e_disciplinas.php?pg=curso';</script>";

    }if(@$_GET['deleta'] == 'ativar'){

      $id = $_GET['id'];

      mysqli_query($db,"UPDATE cursos SET status = 0  WHERE id = '$id'");

      echo "<script language='javascript'>window.location='cursos_e_disciplinas.php?pg=curso';</script>";

}?>


<?php } ?>



<?php if(@$_GET['pg'] == 'disciplina'){ ?>

<div id="tabela_disciplinas">
<?php if(@$_GET['cadastra'] == 'sim'){ ?>
<h1 >Cadastrar nova disciplina</h1>

<?php if(isset($_POST['cadastra'])){
	
  $curso = $_POST['curso'];	
  $disciplina = $_POST['disciplina'];	
  $professor = $_POST['professor'];	
  $sala = $_POST['sala'];	
  $turno = $_POST['turno'];	

    $sql_5 = mysqli_query($db,"INSERT INTO disciplinas (curso, disciplina, professor, sala, turno) VALUES ('$curso', '$disciplina', '$professor', '$sala', '$turno')");

      if($sql_5 == ''){
      	echo "<script language='javascript'>window.alert('Ocorreu um erro!:');</script>";
        echo "Erro: ".mysql_error();
      }else{
      	 echo "<script language='javascript'>window.alert('Disciplina cadastrada com sucesso!');window.location='cursos_e_disciplinas.php?pg=disciplina';</script>";
      }
 
}?>

<form name="form1" method="post" action="">
  <table width="900" border="0">
    <tr>
      <td width="134">Curso:</td>
      <td width="213">Disciplina:</td>
      <td>Professor:</td>
      <td width="128">Sala: <em>Apenas o n&uacute;mero</em></td>
      <td width="128">Turno:</td>
      <td width="126">&nbsp;</td>
      <td width="0" colspan="2"></td>
    </tr>
    <tr>
      <td>
      <select name="curso">
      <?php
      $sql_3 = mysqli_query($db,"SELECT * FROM cursos");
	  	while($res_3 = mysqli_fetch_array($sql_3)){
	  ?>
      	<option value="<?php echo $res_3['id']; ?>"><?php echo $res_3['curso'].' - '.$res_3['ano']; ?></option>
      <?php } ?>
      </select>
      </td>
      <td>
      <input type="text" name="disciplina" id="textfield" required=""></td>
      <td width="143">
      <select name="professor">
      <?php
      $sql_4 = mysqli_query($db,"SELECT * FROM professores WHERE nome != ''");
	  	while($res_4 = mysqli_fetch_array($sql_4)){
	  ?>
       <option value="<?php echo $res_4['code']; ?>"><?php echo $res_4['nome']; ?></option>
      <?php } ?>
      </select>
      </td>
      <td>
      <input type="number" name="sala" id="textfield" required=""></td>
      <td>
        <select name="turno" size="1" id="turno">
          <option value="Manha">Manha</option>
          <option value="Tarde">Tarde</option>
          <option value="Noite">Noite</option>
      </select></td>
      <td width="126"><input class="input" type="submit" name="cadastra" id="button" value="Cadastrar"></td>
    </tr>    
  </table>
</form>

<?php die; } ?>

<br /><br />
<div class="tabela">
<a class="aa2" href="cursos_e_disciplinas.php?pg=disciplina&cadastra=sim">Cadastrar Disciplina</a>




 <h1>Disciplinas</h1>
<?php
$sql_1 = mysqli_query($db,"SELECT * FROM disciplinas");
if(mysqli_num_rows($sql_1) == ''){
	echo "<h2>No momento n�o existe nenhuma disciplina cadastrar!</h2><br><br>";
}else{
?> 
    <table id="customers" width="900" border="0">
      <tr>
        <td><strong>Curso:</strong></td>
        <td><strong>Disciplina:</strong></td>
        <td><strong>Professor:</strong></td>
        <td><strong>Sala:</strong></td>
        <td><strong>Turno:</strong></td>
      </tr>
      <?php while($res_1 = mysqli_fetch_array($sql_1)){ ?>
      <tr>
        <td><h3><?php $id_curso = $res_1['curso'];
          $sql = mysqli_query($db,"SELECT * FROM cursos WHERE id = $id_curso");
          while ($res = mysqli_fetch_array($sql)) {
              echo $res['curso'].' - '.$res['ano'];
          }
         ?></h3></td>
        <td><h3><?php echo $res_1['disciplina']; ?></h3></td>
        <td><h3>
		<?php
		$professor = $res_1['professor'];
		
		$sql_2 = mysqli_query($db,"SELECT * FROM professores WHERE code = '$professor'");
			while($res_2 = mysqli_fetch_array($sql_2)){
				echo $res_2['nome']; echo " - "; echo $res_1['professor'];
			}
				
		?>
        </h3></td>
        <td><h3><?php echo $res_1['sala']; ?></h3></td>
        <td><h3><?php echo $res_1['turno']; ?></h3></td>
        <td><a class="a" href="cursos_e_disciplinas.php?pg=disciplina&deleta=sim&id=<?php echo $res_1['id']; ?>"><img title="Excluir Disciplina" src="img/deleta.jpg" width="18" height="18" border="0"></a></td>
      </tr>
      <?php } ?>
    </table>
    </div>
<?php } ?>
<br /> 


<?php if(@$_GET['deleta'] == 'sim'){

$id = $_GET['id'];

mysqli_query($db,"DELETE FROM disciplinas WHERE id = '$id'");

echo "<script language='javascript'>window.location='cursos_e_disciplinas.php?pg=disciplina';</script>";

}?> 
</div><!-- box_disciplinas -->
<?php } ?>






<?php if(@$_GET['pg'] == 'cursoedisciplinas'){ ?>
<div id="tabela_curso_e_disciplinas">
<h1>Cursos e Disciplinas</h1>

<?php
$sql_1 = mysqli_query($db,"SELECT * FROM cursos WHERE status = 0");
if(mysqli_num_rows($sql_1) == ''){
	echo "N�o existe nenhum curso cadastrado no momento!";
}else{
?>
<table width="620" border="0">
<?php while($res_1 = mysqli_fetch_array($sql_1)){ ?>
  <tr>
    <td width="614">Curso: <?php 
    echo $res_1['curso'].' - '.$res_1['ano'];
    $curso = $res_1['id']; ?>
      
    </td>
  </tr>
  <tr>
    <td>
    <textarea disabled="disabled" name="textarea" id="textarea" cols="100" rows="5">
    <?php
     $sql_2 = mysqli_query($db,"SELECT * FROM disciplinas WHERE curso = '$curso'");
	 	while($res_2 = mysqli_fetch_array($sql_2)){
		
			$professor = $res_2['professor'];
						
			echo $res_2['disciplina']; 
			echo " - ";
	$sql_3 = mysqli_query($db,"SELECT * FROM professores WHERE code = '$professor'");
		while($res_3 = mysqli_fetch_array($sql_3)){
			echo $res_3['nome'];
			echo " - ";
			echo $res_3['code'];
      echo "\n";
		 }
		}
	?>
    </textarea>
    </td>
  </tr>
<?php } ?>
</table>
<br />	
<?php } ?>

</div><!-- box_curso_e_disciplinas -->
<?php } ?>







<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>