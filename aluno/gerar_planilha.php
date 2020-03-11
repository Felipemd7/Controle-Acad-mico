<?php
	
  require "../conexao.php";
	$serie = $_GET['serie'];
	$code = $_GET['code'];
	$tipo = $_GET['tipo'];

	//referenciar o DomPDF com namespace
	use Dompdf\Dompdf;
	// include autoloader
	require_once("dompdf/autoload.inc.php");
			
			
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>GERANDO PANILHA</title>
	</head>
	<body>
		

	<?php
		$arquivo = 'boletim.xls';//nome do arquivo

			$css = '<style type="text/css">
				  table{
						margin:10px;
						width:99%;
						padding:5px;
						font:15px Arial, Helvetica, sans-serif;
						background:#FFF;
						border:2px solid #000;
					}
					#customers td, #customers th {
					  border: 1px solid #ddd;
					  padding: 8px;
					}
					#customers tr{
					  background:#BEBEBE;
					  border: 1px solid #ddd;
					  padding: 8px;
					}
			</style>';

	
		$conteudo = '<table id="customers"  border="1">
	  <tr>
	    <th rowspan="3"><strong>DISCIPLINA<br /><br /></strong></th>
	    <th colspan="4"><strong>1&ordm; Bimestre</strong></th>
	    <th colspan="4"><strong>2&ordm; Bimestre</strong></th>
	    <th rowspan="2" colspan="3"><strong></strong></th><!-- MEDIA -->
	    <th colspan="4"><strong>3&ordm; Bimestre</strong></th>
	    <th colspan="4"><strong>4&ordm; Bimestre</strong></th>
	    <th rowspan="2" colspan="3"><strong></strong></th><!-- MEDIA -->
	  </tr>

	  <tr>
	    <th colspan="4"><strong>1&ordm; Avaliacao</strong></th>
	    <th colspan="4"><strong>2&ordm; Avaliacao</strong></th>
	    <th colspan="4"><strong>3&ordm; Avaliacao</strong></th>
	    <th colspan="4"><strong>4&ordm; Avaliacao</strong></th>

	  </tr>
	  <tr>
		   <th ><strong><b>AQ</b></strong></th>
		   <th ><strong><b>AI</b></strong></th>
		   <th ><strong><b>M</b></strong></th>
		   <th ><strong><b>F</b></strong></th>

		    <th ><strong><b>AQ</b></strong></th>
		    <th ><strong><b>AI</b></strong></th>
		    <th ><strong><b>M</b></strong></th>
		   <th ><strong><b>F</b></strong></th>

		   <!-- MEDIA -->
		   <th   ><strong>1 MS</strong></th>
		   <th   ><strong>RS</strong></th>
		   <th   ><strong>RESULTADO 1 MS</strong></th>

		     <th ><strong>AQ</strong></th>
		    <th ><strong>AI</strong></th>
		    <th ><strong>M</strong></th>
		   <th ><strong>F</strong></th>

		     <th ><strong>AQ</strong></th>
		    <th ><strong>AI</strong></th>
		    <th ><strong>M</strong></th>
		   <th ><strong>F</strong></th>

	    <!-- MEDIA -->
		   <th   ><strong>2 MS</strong></th>
		   <th   ><strong>RS</strong></th>
		   <th   ><strong>RESULTADO 2 MS</strong></th>
	  </tr>';

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

			$conteudo .= '<tr>';
			$conteudo .= '<td>'. $disciplina .'</td>';

				if(mysqli_num_rows($sql_2) == 0){
				    	$conteudo .='<td>Aguarda</td>';
				    	$conteudo .='<td>Aguarda</td>';
				    	$conteudo .='<td> 0 </td>';
						$conteudo .='<td> F </td>';

				}else{
						while($res_2 = mysqli_fetch_array($sql_2)){
							$notaQual = $res_2['notaQual'];
							$notaQuant = $res_2['notaQuant'];
							$prova = $res_2['prova'];
							$media1B += ($notaQual+$notaQuant);
			
							 $conteudo .='<td><strong>'.$res_2['notaQual'].'</strong></td>';
							 $conteudo .='<td><strong>'.$res_2['notaQuant'].'</strong></td>';

							 $conteudo .='<td>'. $media1B/2 .'</td>';
							 $conteudo .='<td>F</td>';
			   			}
				}
				//----------segundo bimestre
				if(mysqli_num_rows($sql_3) == 0){
				    	$conteudo .='<td>Aguarda</td>';
				    	$conteudo .='<td>Aguarda</td>';
				    	$conteudo .='<td> 0 </td>';
						$conteudo .='<td> F </td>';
				}else{
						while($res_3 = mysqli_fetch_array($sql_3)){
							$notaQual = $res_3['notaQual'];
							$notaQuant = $res_3['notaQuant'];
							$prova = $res_3['prova'];
							$media2B += ($notaQual+$notaQuant);
			
					 $conteudo .='<td><strong>'.$res_3['notaQual'].'</strong></td>';
					 $conteudo .='<td><strong>'.$res_3['notaQuant'].'</strong></td>';

					 $conteudo .='<td>'. $media2B/2 .'</td>';
					 $conteudo .='<td>F</td>';
			   			}
				}
		
		//----------media bimestre

				$media1S = ($media1B+$media2B)/2;
				$conteudo .= '<td>'.  ($media1S/2) .'</td>';
				
				if(($media1S/2) >= 6)
					$conteudo .='<td>A</td>';
				else
					$conteudo .='<td>R</td>';
			
		        $conteudo .='<td> 11AAA </td>';

		//----------segundo bimestre
				if(mysqli_num_rows($sql_4) == 0){
				    	$conteudo .='<td>Aguarda</td>';
				    	$conteudo .='<td>Aguarda</td>';
				    	$conteudo .='<td> 0 </td>';
						$conteudo .='<td> F </td>';
				}else{
						while($res_4 = mysqli_fetch_array($sql_4)){
							$notaQual = $res_4['notaQual'];
							$notaQuant = $res_4['notaQuant'];
							$prova = $res_4['prova'];
							$media3B += ($notaQual+$notaQuant);
			
					 $conteudo .='<td><strong>'.$res_4['notaQual'].'</strong></td>';
					 $conteudo .='<td><strong>'.$res_4['notaQuant'].'</strong></td>';

					 $conteudo .='<td>'. $media3B/2 .'</td>';
					 $conteudo .='<td>F</td>';
			   			}
				}

		//----------segundo bimestre
				if(mysqli_num_rows($sql_5) == 0){
				    	$conteudo .='<td>Aguarda</td>';
				    	$conteudo .='<td>Aguarda</td>';
				    	$conteudo .='<td> 0 </td>';
						$conteudo .='<td> F </td>';
				}else{
						while($res_5 = mysqli_fetch_array($sql_5)){
							$notaQual = $res_5['notaQual'];
							$notaQuant = $res_5['notaQuant'];
							$prova = $res_5['prova'];
							$media4B += ($notaQual+$notaQuant);
			
					 $conteudo .='<td><strong>'.$res_5['notaQual'].'</strong></td>';
					 $conteudo .='<td><strong>'.$res_5['notaQuant'].'</strong></td>';

					 $conteudo .='<td>'. $media4B/2 .'</td>';
					 $conteudo .='<td>F</td>';
			   			}
				}		
		//----------media bimestre

				$media2S = ($media3B+$media4B)/2;
				$conteudo .= '<td>'.  ($media2S/2) .'</td>';
				
				if(($media2S/2) >= 6)
					$conteudo .='<td>A</td>';
				else
					$conteudo .='<td>R</td>';
			
		        $conteudo .='<td> 22AAA </td>';


			$conteudo .= '</tr>';

		}
$conteudo .= '</table>';

	if($tipo == "excel"){
			header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
			header("Last-Modified: " . gmdate("D, d M YH:i:s") . " GMT");
			header("Cache-Control: no-cache, must-revalidade");
			header("Pragma: no-cache");
			header("Content-type: application/x-msexcel");
			header("Content-Disposition: attachment; filename=".$arquivo."");
			header("Content-Description: PHP Generated Data");
			$html = "<page>" . $css . $conteudo . "</page>";
			echo $html;
	}else if($tipo == "pdf"){
			//Criando a Instancia
			$dompdf = new DOMPDF();
			$html = "<page>" . $css . $conteudo . "</page>";
			// Carrega seu HTML
			$dompdf->load_html(''.$html.'');
			//Renderizar o html
			$dompdf->render();
			//Exibibir a página
			echo $html;
			$dompdf->stream(
				"Boletim", 
				array(
					"Attachment" => false //Para realizar o download somente alterar para true
				)
			);
	}

	exit;
	?>

	</body>
</html>