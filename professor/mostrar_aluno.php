<?php
session_start();
$_SESSION['painel_atual'] = "professor";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="css/mostrar_aluno.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php require "topo.php"; ?>
<div id="caixa_preta">
</div><!-- caixa_preta -->

<div id="box">
 <?php
$q = $_GET['code'];
$sql_1 = mysqli_query($db,"SELECT * FROM estudantes WHERE code = '$q'");
	while($res_1 = mysqli_fetch_array($sql_1)){
?>
<table width="950" border="0">
  <tr>
    <td colspan="5"><h1>Informações acadêmicas</h1></td>
  </tr>
  <tr>
    <td width="248"><strong>Presenças:</strong> <?php echo mysqli_num_rows(mysqli_query($db,"SELECT * FROM chamadas_em_sala WHERE code_aluno = '$q' AND presente = 'SIM' ")); ?></td>
    <td colspan="2"><strong>Faltas:</strong>  <?php echo mysqli_num_rows(mysqli_query($db,"SELECT * FROM chamadas_em_sala WHERE code_aluno = '$q' AND presente = 'NÃO' ")); ?></td>
    <td colspan="2"><strong>Faltas justificadas:</strong>  <?php echo mysqli_num_rows(mysqli_query($db,"SELECT * FROM chamadas_em_sala WHERE code_aluno = '$q' AND presente = 'JUSTIFICADA' ")); ?></td>
  </tr>
  <tr>
    <td>
    <?php
    $sql_2 = mysqli_query($db,"SELECT * FROM chamadas_em_sala WHERE code_aluno = '$q' AND presente = 'SIM'");
		while($res_2 = mysqli_fetch_array($sql_2)){
				echo $res_2['date_day'];
				echo " - ";
				echo $res_2['disciplina'];		
				echo "<br>";		
					
			}
	?>
    </td>
    <td colspan="2">
    <?php
    $sql_3 = mysqli_query($db,"SELECT * FROM chamadas_em_sala WHERE code_aluno = '$q' AND presente = 'NÃO'");
		while($res_3 = mysqli_fetch_array($sql_3)){
				echo $res_3['date_day'];
				echo " - ";
				echo $res_3['disciplina'];	
				echo "<br>";		
			}
	?>    
    </td>
    <td colspan="2">
    <?php
    $sql_3 = mysqli_query($db,"SELECT * FROM chamadas_em_sala WHERE code_aluno = '$q' AND presente = 'JUSTIFICADA'");
		while($res_3 = mysqli_fetch_array($sql_3)){
				echo $res_3['date_day'];
				echo " - ";
				echo $res_3['disciplina'];	
				echo "<br>";		
			}
	?>      
    </td>
  </tr>
  <tr>
    <td colspan="5"><hr></td>
  </tr>
  <tr>
    <td colspan="5"><hr>      <h2><strong>Notas dos trabalhos bimestrais</strong></h2></td>
  </tr>
  <tr>
    <td><strong>Disciplina:</strong></td>
    <td width="119"><strong>1º Bimestre</strong></td>
    <td width="119"><strong>2º Bimestre</strong></td>
    <td width="119"><strong>3º Bimestre</strong></td>
    <td width="119"><strong>4º Bimestre</strong></td>
  </tr>
 <?php
 $curso = $_GET['curso'];
 $sql_4 = mysqli_query($db,"SELECT * FROM disciplinas WHERE curso = '$curso'");
 	while($res_4 = mysqli_fetch_array($sql_4)){
		$disciplina = $res_4['disciplina'];
 ?> 
  <tr>
    <td><?php echo $res_4['disciplina']; ?></td>
    <td>
    <?php
     $sql_5 = mysqli_query($db,"SELECT * FROM notas_trabalhos WHERE bimestre = '1' AND disciplina = '$disciplina' AND code = '$q'");			
	 
	 	while($res_5 = mysqli_fetch_array($sql_5)){
				echo $res_5['nota'];
			}
	 
	?>
    </td>
    <td>
    <?php
     $sql_4 = mysqli_query($db,"SELECT * FROM notas_trabalhos WHERE bimestre = '2' AND disciplina = '$disciplina' AND code = '$q'");			
	 
	 	while($res_4 = mysqli_fetch_array($sql_4)){
				echo $res_4['nota'];
			}
	 
	?>    
    </td>
    <td>
    <?php
     $sql_4 = mysqli_query($db,"SELECT * FROM notas_trabalhos WHERE bimestre = '3' AND disciplina = '$disciplina' AND code = '$q'");			
	 
	 	while($res_4 = mysqli_fetch_array($sql_4)){
				echo $res_4['nota'];
			}
	 
	?>    
    </td>
    <td>
    <?php
     $sql_4 = mysqli_query($db,"SELECT * FROM notas_trabalhos WHERE bimestre = '4' AND disciplina = '$disciplina' AND code = '$q'");			
	 
	 	while($res_4 = mysqli_fetch_array($sql_4)){
				echo $res_4['nota'];
			}
	 
	?>    
    </td>
  </tr>
  <tr>
    <td colspan="5"><hr></td>
  </tr>`
  <?php } ?>
  <tr>
    <td colspan="5"><hr>      <h2><strong>Notas de trabalhos extras</strong></h2></td>
  </tr>
 <?php
 $curso = $_GET['curso'];
 $sql_3 = mysqli_query($db,"SELECT * FROM disciplinas WHERE curso = '$curso'");

 ?>  
  <tr>
    <td><strong>Disciplina:</strong></td>
    <td colspan="4"><strong>Pontos</strong></td>
  </tr>
 <?php  	while($res_3 = mysqli_fetch_array($sql_3)){
		$disciplina = $res_3['disciplina'];
 ?> 
  <tr>
    <td><?php echo $res_3['disciplina']; ?></td>
    <td colspan="4">
    <?php
     $sql_4 = mysqli_query($db,"SELECT * FROM pontos_extras WHERE disciplina = '$disciplina' AND code = '$q'");			
	 
	 	while($res_4 = mysqli_fetch_array($sql_4)){
				echo $res_4['nota'];
			}
	 
	?>       
    </td>
  </tr>
  <tr>
    <td colspan="5"><hr></td>
  </tr>
<?php } ?>  
  <tr>
    <td colspan="5"><hr>      <h2><strong>Notas das provas</strong></h2></td>
  </tr>
  <tr>
    <td><strong>Disciplina:</strong></td>
    <td><strong>1º Bimestre</strong></td>
    <td><strong>2º Bimestre</strong></td>
    <td><strong>3º Bimestre</strong></td>
    <td><strong>4º Bimestre</strong></td>
  </tr>
 <?php
 $curso = $_GET['curso'];
 $sql_3 = mysqli_query($db,"SELECT * FROM disciplinas WHERE curso = '$curso'");
 	while($res_3 = mysqli_fetch_array($sql_3)){
		$disciplina = $res_3['disciplina'];
 ?> 
  <tr>
    <td><?php echo $res_3['disciplina']; ?></td>
    <td>
    <?php
     $sql_4 = mysqli_query($db,"SELECT * FROM notas_provas WHERE bimestre = '1' AND disciplina = '$disciplina' AND code = '$q'");			
	 
	 	while($res_4 = mysqli_fetch_array($sql_4)){
				echo $res_4['nota'];
			}
	 
	?>
    </td>
    <td>
    <?php
     $sql_4 = mysqli_query($db,"SELECT * FROM notas_provas WHERE bimestre = '2' AND disciplina = '$disciplina' AND code = '$q'");			
	 
	 	while($res_4 = mysqli_fetch_array($sql_4)){
				echo $res_4['nota'];
			}
	 
	?>    
    </td>
    <td>
    <?php
     $sql_4 = mysqli_query($db,"SELECT * FROM notas_provas WHERE bimestre = '3' AND disciplina = '$disciplina' AND code = '$q'");			
	 
	 	while($res_4 = mysqli_fetch_array($sql_4)){
				echo $res_4['nota'];
			}
	 
	?>    
    </td>
    <td>
    <?php
     $sql_4 = mysqli_query($db,"SELECT * FROM notas_provas WHERE bimestre = '4' AND disciplina = '$disciplina' AND code = '$q'");			
	 
	 	while($res_4 = mysqli_fetch_array($sql_4)){
				echo $res_4['nota'];
			}
	 
	?>    
    </td>
  </tr>
  <tr>
    <td colspan="5"><hr></td>
  </tr>`
  <?php } ?>
  <tr>
    <td colspan="5"><hr>      <h2><strong>Notas de observação</strong></h2></td>
  </tr>
  <tr>
    <td><strong>Disciplina:</strong></td>
    <td><strong>1º Bimestre</strong></td>
    <td><strong>2º Bimestre</strong></td>
    <td><strong>3º Bimestre</strong></td>
    <td><strong>4º Bimestre</strong></td>
  </tr>
 <?php
 $curso = $_GET['curso'];
 $sql_3 = mysqli_query($db,"SELECT * FROM disciplinas WHERE curso = '$curso'");
 	while($res_3 = mysqli_fetch_array($sql_3)){
		$disciplina = $res_3['disciplina'];
 ?> 
  <tr>
    <td><?php echo $res_3['disciplina']; ?></td>
    <td>
    <?php
     $sql_4 = mysqli_query($db,"SELECT * FROM notas_observacao WHERE bimestre = '1' AND disciplina = '$disciplina' AND code = '$q'");			
	 
	 	while($res_4 = mysqli_fetch_array($sql_4)){
				echo $res_4['nota'];
			}
	 
	?>
    </td>
    <td>
    <?php
     $sql_4 = mysqli_query($db,"SELECT * FROM notas_observacao WHERE bimestre = '2' AND disciplina = '$disciplina' AND code = '$q'");			
	 
	 	while($res_4 = mysqli_fetch_array($sql_4)){
				echo $res_4['nota'];
			}
	 
	?>    
    </td>
    <td>
    <?php
     $sql_4 = mysqli_query($db,"SELECT * FROM notas_observacao WHERE bimestre = '3' AND disciplina = '$disciplina' AND code = '$q'");			
	 
	 	while($res_4 = mysqli_fetch_array($sql_4)){
				echo $res_4['nota'];
			}
	 
	?>    
    </td>
    <td>
    <?php
     $sql_4 = mysqli_query($db,"SELECT * FROM notas_observacao WHERE bimestre = '4' AND disciplina = '$disciplina' AND code = '$q'");			
	 
	 	while($res_4 = mysqli_fetch_array($sql_4)){
				echo $res_4['nota'];
			}
	 
	?>    
    </td>
  </tr>
  <tr>
    <td colspan="5"><hr></td>
  </tr>`
  <?php } ?>
  <tr>
    <td colspan="5"><hr>      <h2><strong>Notas bimestrais</strong></h2></td>
  </tr>
  <tr>
    <td><strong>Disciplina:</strong></td>
    <td><strong>1º Bimestre</strong></td>
    <td><strong>2º Bimestre</strong></td>
    <td><strong>3º Bimestre</strong></td>
    <td><strong>4º Bimestre</strong></td>
  </tr>
 <?php
 $curso = $_GET['curso'];
 $sql_3 = mysqli_query($db,"SELECT * FROM disciplinas WHERE curso = '$curso'");
 	while($res_3 = mysqli_fetch_array($sql_3)){
		$disciplina = $res_3['disciplina'];
 ?> 
  <tr>
    <td><?php echo $res_3['disciplina']; ?></td>
    <td>
    <?php
     $sql_4 = mysqli_query($db,"SELECT * FROM notas_bimestrais WHERE bimestre = '1' AND disciplina = '$disciplina' AND code = '$q'");			
	 
	 	while($res_4 = mysqli_fetch_array($sql_4)){
				echo $res_4['nota'];
			}
	 
	?>
    </td>
    <td>
    <?php
     $sql_4 = mysqli_query($db,"SELECT * FROM notas_bimestrais WHERE bimestre = '2' AND disciplina = '$disciplina' AND code = '$q'");			
	 
	 	while($res_4 = mysqli_fetch_array($sql_4)){
				echo $res_4['nota'];
			}
	 
	?>    
    </td>
    <td>
    <?php
     $sql_4 = mysqli_query($db,"SELECT * FROM notas_bimestrais WHERE bimestre = '3' AND disciplina = '$disciplina' AND code = '$q'");			
	 
	 	while($res_4 = mysqli_fetch_array($sql_4)){
				echo $res_4['nota'];
			}
	 
	?>    
    </td>
    <td>
    <?php
     $sql_4 = mysqli_query($db,"SELECT * FROM notas_bimestrais WHERE bimestre = '4' AND disciplina = '$disciplina' AND code = '$q'");			
	 
	 	while($res_4 = mysqli_fetch_array($sql_4)){
				echo $res_4['nota'];
			}
	 
	?>    
    </td>
  </tr>
  <tr>
    <td colspan="5"><hr></td>
  </tr>`
  <?php } ?>
  <tr>
    <td colspan="5">&nbsp;</td>
  </tr>
</table>

<?php } ?>
</div><!-- box -->

<?php require "rodape.php"; ?>
</body>
</html>