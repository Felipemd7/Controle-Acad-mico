<?php $painel_atual = "aluno";?>

<html>
<head>
<?php //require "../config.php"; ?>
<link href="css/provas_bimestrais.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php require "topo1.php"; ?>
<div id="caixa_preta">
</div><!-- caixa_preta -->

<div id="box">

<h1><strong>Notas de suas provas em cada bimestre</strong></h1>


<div class="dropdown">
  <button class="dropbtn">IMPRIMIR</button>
  <div class="dropdown-content">
  <a href="gerar_planilha.php?serie=<?php echo $serie; ?>&code=<?php echo $code; ?>&tipo=excel">IMPRIMIR EXCEL</a>
  <a href="gerar_planilha.php?serie=<?php echo $serie; ?>&code=<?php echo $code; ?>&tipo=pdf">IMPRIMIR PDF</a>
  </div>
</div>


	<table id="customers" width="900" border="1">
		<tfoot>OBS: Esta nota que voce tirou em cada prova de cada bimestre!</tfoot>
	  <tr>
	    <th width="317" rowspan="3"><strong>DISCIPLINA<br /><br /></strong></th>
	    <th width="150" colspan="4"><strong>1&ordm; Bimestre</strong></th>
	    <th width="150"  colspan="4"><strong>2&ordm; Bimestre</strong></th>
	     <th width="150" rowspan="2" colspan="3"><strong></strong></th><!-- MEDIA -->
	    <th width="150"  colspan="4"><strong>3&ordm; Bimestre</strong></th>
	    <th width="150"  colspan="4"><strong>4&ordm; Bimestre</strong></th>
	     <th width="150" rowspan="2" colspan="3"><strong></strong></th><!-- MEDIA -->
	  </tr>

	  <tr>
	    <th width="150" colspan="4"><strong>1&ordm; Avaliacao</strong></th>
	    <th width="150"  colspan="4"><strong>2&ordm; Avaliacao</strong></th>
	    <th width="150"  colspan="4"><strong>3&ordm; Avaliacao</strong></th>
	    <th width="150"  colspan="4"><strong>4&ordm; Avaliacao</strong></th>

	  </tr>

	  <!----------------------------->
	  <tr>
		   <th width="150"><strong>AQ</strong></th>
		   <th width="150"><strong>AI</strong></th>
		   <th width="150"><strong>M</strong></th>
		   <th width="150"><strong>F</strong></th>

		    <th width="150"><strong>AQ</strong></th>
		    <th width="150"><strong>AI</strong></th>
		    <th width="150"><strong>M</strong></th>
		   <th width="150"><strong>F</strong></th>

		   <!-- MEDIA -->
		   <th width="150"  ><strong>1 MS</strong></th>
		   <th width="150"  ><strong>RS</strong></th>
		   <th width="150"  ><strong>RESULTADO 1 MS</strong></th>

		     <th width="150"><strong>AQ</strong></th>
		    <th width="150"><strong>AI</strong></th>
		    <th width="150"><strong>M</strong></th>
		   <th width="150"><strong>F</strong></th>

		     <th width="150"><strong>AQ</strong></th>
		    <th width="150"><strong>AI</strong></th>
		    <th width="150"><strong>M</strong></th>
		   <th width="150"><strong>F</strong></th>

	    <!-- MEDIA -->
		   <th width="150"  ><strong>2 MS</strong></th>
		   <th width="150"  ><strong>RS</strong></th>
		   <th width="150"  ><strong>RESULTADO 2 MS</strong></th>
	  </tr>
	<?php
	$sql_1 = mysqli_query($db,"SELECT * FROM disciplinas WHERE curso = '$serie'");
		while($res_1 = mysqli_fetch_array($sql_1)){
			$code_disciplina = $res_1['id'];
			$disciplina = $res_1['disciplina'];
			// estou comparado com o nome. devo comparar com o id da discipliana
		$sql_2 = mysqli_query($db,"SELECT * FROM notas_provas WHERE code = '$code' AND disciplina = '$code_disciplina' AND bimestre = '1'");	
		$sql_3 = mysqli_query($db,"SELECT * FROM notas_provas WHERE code = '$code' AND disciplina = '$code_disciplina' AND bimestre = '2'");		
		$sql_4 = mysqli_query($db,"SELECT * FROM notas_provas WHERE code = '$code' AND disciplina = '$code_disciplina' AND bimestre = '3'");		
		$sql_5 = mysqli_query($db,"SELECT * FROM notas_provas WHERE code = '$code' AND disciplina = '$code_disciplina' AND bimestre = '4'");	

			$media1B = 0;
			$media2B = 0;
			$media3B = 0;
			$media4B = 0;

			$media1S = 0;
			$media2S = 0;

	?>  
	  <tr>
		<!-- td - Uma coluna -->
	    <td><?php echo $disciplina; ?></td>

	    <!-- 1° BIMESTRE -->
	    
		    <?php
			    if(mysqli_num_rows($sql_2) == ''){ ?>
			    	<td><?php echo "<h2>Aguarda</h2>"; ?> </td>
			    	<td><?php echo "<h2>Aguarda</h2>"; ?> </td> <?php
				}else{
					while($res_2 = mysqli_fetch_array($sql_2)){
						$notaQual = $res_2['notaQual'];
						$notaQuant = $res_2['notaQuant'];
						$prova = $res_2['prova'];
						$media1B += ($notaQual+$notaQuant);
			?>
				<td><?php
					if($notaQual >= 7){
						echo "<h2><strong>".$res_2['notaQual']."</strong></h2>";
					}else{
						echo "<h3><strong>".$res_2['notaQual']."</strong></h3>";			
					} 
					if($res_2['prova'] == ''){
					}else{
					echo " | <a target='_blank' class='a5' href='../trabalhos_alunos/$prova'>Ver</a></h2>";
					}
				?></td>

				<td><?php

					if($notaQuant >= 7){
						echo "<h2><strong>".$res_2['notaQuant']."</strong></h2>";
					}else{
						echo "<h3><strong>".$res_2['notaQuant']."</strong></h3>";			
					}
					if($res_2['prova'] == ''){
					}else{
					echo " | <a target='_blank' class='a5' href='../trabalhos_alunos/$prova'>Ver</a></h2>";
					}
				?></td>
			<?php }} ?>
			<td><?php echo $media1B/2; ?></td>
			<td>F</td>

		<!--- 2° BIMESTRE -->
	    <?php
	    if(mysqli_num_rows($sql_3) == ''){ ?>
			    	<td><?php echo "<h2>Aguarda</h2>"; ?> </td>
			    	<td><?php echo "<h2>Aguarda</h2>"; ?> </td> <?php
		}else{
			while($res_3 = mysqli_fetch_array($sql_3)){
				$notaQual = $res_3['notaQual'];
				$notaQuant = $res_3['notaQuant'];
				$prova = $res_3['prova'];
				$media2B += ($notaQual+$notaQuant);
		?> 
			<td><?php
					if($notaQual >= 7){
						echo "<h2><strong>".$res_3['notaQual']."</strong></h2>";
					}else{
						echo "<h3><strong>".$res_3['notaQual']."</strong></h3>";			
					} 
					if($res_3['prova'] == ''){
					}else{
					echo " | <a target='_blank' class='a5' href='../trabalhos_alunos/$prova'>Ver</a></h2>";
					}
				?></td>

			<td><?php
				if($notaQuant >= 7){
					echo "<h2><strong>".$res_3['notaQuant']."</strong>";
				}else{
					echo "<h3><strong>".$res_3['notaQuant']."</strong></h3>";			
				}
				if($res_3['prova'] == ''){
				}else{
				echo " | <a target='_blank' class='a5' href='../trabalhos_alunos/$prova'>Ver</a></h2>";
				}
			?></td>			
			<?php }} ?>
			<td><?php echo $media2B/2; ?></td>
			<td>F</td>
	    <!-- MEDIA -->

		<td>
			<?php //AQUI EU CALCULO A MEDIA DO PRIMEIRO SEMESTRE
				$media1S = ($media1B+$media2B)/2;
				//$media2S = ($media3B+$media4B)/2;
				echo $media1S/2;
			?>
			
		</td>
		<td>
			<?php 
				if(($media1S/2) >= 7){
						echo "A";
				}else{
						echo "R";
				}
			?> 
		</td> 
		<td> 11AAA </td>

	    <!-- 3° BIMESTRE -->
	    <?php
	    if(mysqli_num_rows($sql_4) == ''){?>
			    	<td><?php echo "<h2>Aguarda</h2>"; ?> </td>
			    	<td><?php echo "<h2>Aguarda</h2>"; ?> </td> <?php
		}else{
			while($res_4 = mysqli_fetch_array($sql_4)){
				$notaQual = $res_4['notaQual'];
				$notaQuant = $res_4['notaQuant'];
				$prova = $res_4['prova']; 
				$media3B += ($notaQual+$notaQuant);
				?>
				
				<td><?php
				if($notaQual >= 7){
					echo "<h2><strong>".$res_4['notaQual']."</strong>";
				}else{
					echo "<h3><strong>".$res_4['notaQual']."</strong></h3>";			
				} 
				if($res_4['prova'] == ''){
				}else{
				echo " | <a target='_blank' class='a5' href='../trabalhos_alunos/$prova'>Ver</a></h2>";
				}?></td>
				<td><?php
				if($notaQuant >= 7){
					echo "<h2><strong>".$res_4['notaQuant']."</strong>";
				}else{
					echo "<h3><strong>".$res_4['notaQuant']."</strong></h3>";			
				}
				if($res_4['prova'] == ''){
				}else{
				echo " | <a target='_blank' class='a5' href='../trabalhos_alunos/$prova'>Ver</a></h2>";
				}?></td>		
		<?php	} }?>
			<td><?php echo $media3B/2; ?></td>
			<td>F</td>	

	     <!-- 4° BIMESTRE -->

	    <?php
	    if(mysqli_num_rows($sql_5) == ''){?>
			    	<td><?php echo "<h2>Aguarda</h2>"; ?> </td>
			    	<td><?php echo "<h2>Aguarda</h2>"; ?> </td> <?php
		}else{
			while($res_5 = mysqli_fetch_array($sql_5)){
				$notaQual = $res_5['notaQual'];
				$notaQuant = $res_5['notaQuant'];
				$prova = $res_5['prova'];
				$media4B += ($notaQual+$notaQuant);
				?>
				<td><?php
				if($notaQual >= 7){
					echo "<h2><strong>".$res_5['notaQual']."</strong>";
				}else{
					echo "<h3><strong>".$res_5['notaQual']."</strong></h3>";			
				}
				if($res_5['prova'] == ''){
				}else{
				echo " | <a target='_blank' class='a5' href='../trabalhos_alunos/$prova'>Ver</a></h2>";
				}?></td>
				<td><?php
				if($notaQuant >= 7){
					echo "<h2><strong>".$res_5['notaQuant']."</strong>";
				}else{
					echo "<h3><strong>".$res_5['notaQuant']."</strong></h3>";			
				}
				if($res_5['prova'] == ''){
				}else{
				echo " | <a target='_blank' class='a5' href='../trabalhos_alunos/$prova'>Ver</a></h2>";
				}
				?></td>		
		<?php	} }?>
				<td><?php echo $media4B/2; ?></td>
				<td>F</td>	
	    <!-- MEDIA -->

		<td>
			<?php //AQUI EU CALCULO A MEDIA DO SEGUNDO SEMESTRE
				//$media1S = ($media1B+$media2B)/2;
				$media2S = ($media3B+$media4B)/2;
				echo $media2S/2;
			?>
		</td>
		<td>
			<?php 
				if(($media2S/2) >= 6){
						echo "A";
				}else{
						echo "R";
				}
			?> 
		</td> 
		<td> 222AAA </td>

	  </tr>
	<?php } ?> 
	</table>
	<h4>OBS: Esta nota que voce tirou em cada prova de cada bimestre!</h4>
</div>
</body>
</html>