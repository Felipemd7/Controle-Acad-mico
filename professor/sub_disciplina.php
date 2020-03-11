<?php 
	require "../conexao.php";
			
		$conexao = new PDO("mysql:host=".$servidor.";dbname=".$db1."",$usuario,$senha);
        $conexao ->exec('SET CHARACTER SET uft8');
	
	$pegaDisciplinas = $conexao->prepare("SELECT * FROM disciplinas WHERE curso ='".$_POST['id']."' AND 
	professor ='".$_POST['code']."' ");
	$pegaDisciplinas->execute();

	$fetchAll = $pegaDisciplinas -> fetchAll();
	foreach ($fetchAll as $disciplinas) {
		//echo '<option>'.$disciplinas['disciplina'].'</option>';
		echo '<option value="'.$disciplinas['id'].'">'.$disciplinas['disciplina'].'</option>';
}

