<?php 
		@session_start();
		$code = $_SESSION['code'];
		require "../conexao.php";


	$result = '';

	//esse '[0]' resepresenta o indice, pois posso arrastar varios arquivos
	if(isset($_FILES['file']['name'][0])){
		foreach ($_FILES['file']['name'] as $key => $file) {
			
			$extensao = strtolower(substr($_FILES['file']['name'][0], -4));//pega a extensao do arquivo
            $nome_novo = md5(time()) . $extensao;//dou um novo nome ao arquivo, impedindo  que um sobreescreva  outro
            $diretorio = "fotos/";

            //antes de alterar, eu verfico se ja tem uma foto la, se tiver, apenas altero a foto
             $sql = mysqli_query($db,"SELECT * FROM fotos WHERE code_aluno = '$code'");
             $quant = mysqli_num_rows($sql);
             if($quant>0){
                //pego o nome do arquivo atual que ta la para poder apagar o arquivo
                while ($res_1 = mysqli_fetch_array($sql)) { $nome_atual = $res_1['nome']; }

                unlink($diretorio.$nome_atual);//aqui eu apago o arquivo
				$sql1 = "UPDATE fotos SET nome = '$nome_novo' WHERE code_aluno = '$code';";
             }else{
                $sql1 = "INSERT INTO fotos (nome, code_aluno) VALUES ('$nome_novo','$code')";
             }

			if(move_uploaded_file($_FILES['file']['tmp_name'][$key], $diretorio.$nome_novo)){

				 $result.="<h3><center>Foto alterada com sucesso!!!</center></h3><div class='image'> <img src = 'fotos/$nome_novo' /> </div>";
				 $sql_code = mysqli_query($db,$sql1);
				 //$result = "Foto alterada com sucesso!!!";
			 }

		}
	}
  echo $result;

?>