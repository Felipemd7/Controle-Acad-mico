<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
<link href="//fonts.googleapis.com/css?family=Lobster&subset=latin,latin-ext" rel="stylesheet" type="text/css">
<title>SISA</title>
<link href="css/estudantes.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php require "topo1.php"; 
?>


<?php if(@$_GET['pg'] == 'todos'){ ?>
<div id="box_aluno">
   <div id="customers">
 <br /><br />
 <a class="a2" href="estudantes.php?pg=cadastra&bloco=1">Cadastrar novo aluno</a>
 <h1 class="personh1">Alunos cadastrados</h1>

<?php
$sql_1 = mysqli_query($db,"SELECT * FROM estudantes WHERE nome != ''");
if(mysqli_num_rows($sql_1) == ''){
  echo "<h2>Nao exisite nenhum aluno cadastrado no momento</h2>";
}else{
?>

    <table width="900" border="0">
      <tr>
        <td><h3>Status:</h3></td>
        <td><h3>Matricula:</h3></td>
        <td><h3>Nome:</h3></td>
        <td><h3>Serie(ano):</h3></td> <td></td>
        <td><h3>Acoes:</h3></td>
        <td></td>
      </tr>
      <?php while($res_1 = mysqli_fetch_array($sql_1)){ ?>
      <tr>
        <td><h4><?php echo $res_1['status']; ?></h4></td>
        <td><h4><?php echo $res_1['code']; ?></h4></td>
        <td><h4><?php echo $res_1['nome']; ?></h4></td>
        <td><h4><?php 

          $sql = mysqli_query($db, "SELECT * FROM cursos WHERE id = '".$res_1['serie']."'");
          while ($res = mysqli_fetch_array($sql)) {
            $curso = $res['curso'];
          }
          echo $curso;

        ?></h4></td>
        <td></td>
        <td>
        <a class="a" href="estudantes.php?pg=todos&func=deleta&id=<?php echo $res_1['id']; ?>&code=<?php echo $res_1['code']; ?>"><img title="Excluir Aluno(a)" src="../img/deletar.png" width="18" height="18" border="0"></a>
        <a class="a" href="estudantes.php?pg=todos&func=editar&id=<?php echo $res_1['id']; ?>&code=<?php echo $res_1['code']; ?>"><img title="Editar Aluno(a)" src="../img/editar.png" width="18" height="18" border="0"></a>
        <?php if($res_1['status'] == 'Inativo'){ ?>
        <a class="a" href="estudantes.php?pg=todos&func=ativa&id=<?php echo $res_1['id']; ?>&code=<?php echo $res_1['code']; ?>"><img title="Ativar novamente Aluno(a)" src="../img/correto.png" width="20" height="20" border="0"></a>
        <?php } ?>
        <?php if($res_1['status'] == 'Ativo'){?>
        <a class="a" href="estudantes.php?pg=todos&func=inativa&id=<?php echo $res_1['id']; ?>&code=<?php echo $res_1['code']; ?>"><img title="Inativar Aluno(a)" src="../img/ico_bloqueado.png" width="18" height="18" border="0"></a>
        <?php } ?>
        <a class="a" rel='superbox[iframe][800x600]' href="mostrar_resultado.php?q=<?php echo $res_1['code']; ?>&s=aluno&curso=<?php echo $res_1['serie']; ?>"><img title="Informacoes detalhada deste aluno(a)" src="../img/olhar.png" width="18" height="18" border="0"></a>
        </td>
      </tr>
      <?php } ?>
    </table>
    <br /> 
<?php } // aui fecha a sql_1 ?>
</div>
</div><!-- box_aluno -->


<?php if(@$_GET['func'] == 'deleta'){

$id = $_GET['id'];
$code = $_GET['code'];

mysqli_query($db,"DELETE FROM estudantes WHERE id = '$id'");
mysqli_query($db,"DELETE FROM acesso_ao_sistema WHERE code = '$code'");
echo "<script language='javascript'>window.location='estudantes.php?pg=todos';</script>";
}?>


<?php if(@$_GET['func'] == 'ativa'){

$id = $_GET['id'];
$code = $_GET['code'];

mysqli_query($db,"UPDATE estudantes SET status = 'Ativo' WHERE id = '$id'");
mysqli_query($db,"UPDATE acesso_ao_sistema SET status = 'Ativo' WHERE code = '$code'");
echo "<script language='javascript'>window.location='estudantes.php?pg=todos';</script>";
}?>


<?php if(@$_GET['func'] == 'inativa'){

$id = $_GET['id'];
$code = $_GET['code'];

mysqli_query($db,"UPDATE estudantes SET status = 'Inativo' WHERE id = '$id'");
mysqli_query($db,"UPDATE acesso_ao_sistema SET status = 'Inativo' WHERE code = '$code'");
echo "<script language='javascript'>window.location='estudantes.php?pg=todos';</script>";
}?>


<?php if(@$_GET['func'] == 'editar'){

$id = $_GET['id'];
$code = $_GET['code'];

         $sql_1 = mysqli_query($db,"SELECT * FROM estudantes WHERE id = '$id' AND code = '$code' ");
        while($res = mysqli_fetch_array($sql_1)){  ?>

<div id="cadastra_estudante">
 <h1>Dados do aluno <?php echo $res['nome']; ?></h1>
 
<form name="form1" method="post" action="">
  <table width="900" border="0">
  <tr>
     <td colspan="2"><h3>Matricula do aluno: </h3></td>
     <td></td>
     <td></td>
  </tr>
  <tr>

      <td><input type="text" name="code" id="campo" disabled="disabled" value="<?php echo $res['code']; ?>"></td>
      <input type="hidden" name="code" value="<?php echo $res['code']; ?>" />
      
       <td></td>
  </tr>    
  <tr>
      <td>Nome:</td>
      <td>CPF:</td>
      <td>RG:</td>
  </tr>
  <tr>
      <td><label for="nome"></label>
      <input type="text" name="nome" id="campo" value="<?php echo $res['nome']; ?>" required="" ></td>
      <td><label for="cpf"></label>
      <input type="text" name="cpf" id="campo" value="<?php echo $res['cpf']; ?>"  required=""></td>
      <td><label for="rg"></label>
      <input type="text" name="rg" id="campo" value="<?php echo $res['rg']; ?>" required=""></td>
  </tr>
  <tr>
      <td>Data de nascimento:</td>
      <td>Nome da mae:</td>
      <td>Nome do Pai:</td>
  </tr>
  <tr>
      <td><label for="nascimento"></label>
      <input type="text" name="nascimento" id="campo" value="<?php echo $res['nascimento']; ?>" required=""></td>
      <td><label for="mae"></label>
      <input type="text" name="mae" id="campo" value="<?php echo $res['mae']; ?>" required=""></td>
      <td><label for="pai"></label>
      <input type="text" name="pai" id="campo" value="<?php echo $res['pai']; ?>" required=""></td>
  </tr>
  <tr>
      <td>Estado:</td>
      <td>Cidade:</td>
      <td>Bairro:</td>
  </tr>
  <tr>
      <td><input type="text" name="estado" id="campo" value="<?php echo $res['estado']; ?>" required=""></td>
      <td><input type="text" name="cidade" id="campo" value="<?php echo $res['cidade']; ?>" required=""></td>
      <td><input type="text" name="bairro" id="campo" value="<?php echo $res['bairro']; ?>" required=""></td>
  </tr>
  <tr>
      <td>Endereco:</td>
      <td>Complemento:</td>
      <td>Cep:</td>
  </tr>
  <tr>
      <td><input type="text" name="endereco" id="campo" value="<?php echo $res['endereco']; ?>" required=""></td>
      <td><input type="text" name="complemento" id="campo" value="<?php echo $res['complemento']; ?>" ></td>
      <td><input type="text" name="cep" id="campo" value="<?php echo $res['cep']; ?>" ></td>
  </tr>
  <tr>
      <td>Telefone residencial:</td>
      <td>Telefone Celular:</td>
      <td>Telefone de um amigo:</td>
  </tr>
  <tr>
      <td><input type="text" name="tel_residencial" id="campo" value="<?php echo $res['tel_residencial']; ?>"></td>
      <td><input type="text" name="celular" id="campo" value="<?php echo $res['celular']; ?>" required=""></td>
      <td><input type="text" name="tel_amigo" id="campo" value="<?php echo $res['tel_amigo']; ?>"></td>
  </tr>

  <tr>
      <td>E-mail:</td>
  </tr>
  <tr>
      <td><input type="email" name="email" id="campo" value="<?php echo $res['email']; ?>" placeholder="Necessario para recuperar senha"></td>
  </tr>
  
  <tr>
      <td>Serie:</td>
      <td>Turno:</td>
      <td>Cuidado Especial</td>
  </tr>

    <tr>

      <td><label for="serie"></label>
        <select name="serie" size="1" id="serie">
          <?php
            $sql_1 = mysqli_query($db,"SELECT * FROM cursos");
            while($res_1 = mysqli_fetch_array($sql_1)){
            ?>  
        <option value="<?php echo $res_1['id'];?>" <?php if($res_1['curso'] == $res['serie']){ echo "selected"; }  ?> > <?php echo $res_1['curso']; ?> </option>
          <?php 
          } 
          ?>
        </select></td>

      <td><label for="turno"></label>
        <select name="turno" size="1" id="turno">
          <?php if($res['turno'] == "Manha"){ ?>
              <option value="Manha" selected="">Manha</option>
              <option value="Tarde">Tarde</option>
              <option value="Noite">Noite</option>
          <?php }elseif ($res['turno'] == "Tarde") {  ?>
              <option value="Manha">Manha</option>
              <option value="Tarde" selected="">Tarde</option>
              <option value="Noite">Noite</option>
            <?php }elseif ($res['turno'] == "Noite") { ?>
              <option value="Manha">Manha</option>
              <option value="Tarde">Tarde</option>
              <option value="Noite" selected="">Noite</option>
            <?php } ?>
      </select></td>

      <td><label for="cuidado_especial"></label>
        <select name="cuidado_especial" size="1" id="cuidado_especial">
        <?php if($res['atendimento_especial'] == "NAO"){ ?>
          <option value="NAO" selected="">NAO</option>
          <option value="SIM">SIM</option>
        <?php }elseif ($res['atendimento_especial'] == "SIM") { ?>
          <option value="NAO">NAO</option>
          <option value="SIM" selected="">SIM</option>
        <?php } ?>
      </select></td>
    </tr>

    <tr>
      <td>Observacoes para este(a) aluno(a)</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
    <td colspan="3"><label for="obs"></label>
      <textarea name="obs" id="obs"  cols="60" rows="5" maxlength="60" ><?php echo $res['obs']; ?></textarea></td>
    </tr>
    <tr>
      <td><input class="input" type="submit" name="buttonAtt" id="buttonAtt" value="Atualizar dados"></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>
<br /> 
 
</div><!-- Atualizar -->

<?php  }  ?>
<?php }?>


<?php 

    if(isset($_POST['buttonAtt'])){

      $id = $_GET['id'];

    $code = isset($_POST['code']) ? $_POST['code'] : "Não informado";
    $nome = isset($_POST['nome']) ? $_POST['nome'] : "Não informado";
    $cpf = isset($_POST['cpf']) ? $_POST['cpf'] : "Não informado";
    $rg = isset($_POST['rg']) ? $_POST['rg'] : "Não informado";
    $nascimento = isset($_POST['nascimento']) ? $_POST['nascimento'] : "Não informado";
    $mae = isset($_POST['mae']) ? $_POST['mae'] : "Não informado";
    $pai = isset($_POST['pai']) ? $_POST['pai'] : "Não informado";
    $estado = isset($_POST['estado']) ? $_POST['estado'] : "Não informado";
    $cidade = isset($_POST['cidade']) ? $_POST['cidade'] : "Não informado";
    $bairro = isset($_POST['bairro']) ? $_POST['bairro'] : "Não informado";
    $endereco = isset($_POST['endereco']) ? $_POST['endereco'] : "Não informado";
    $complemento = isset($_POST['complemento']) ? $_POST['complemento'] : "Não informado";
    $cep = isset($_POST['cep']) ? $_POST['cep'] : "Não informado";
    $tel_residencial = isset($_POST['tel_residencial']) ? $_POST['tel_residencial'] : "Não informado";
    $celular = isset($_POST['celular']) ? $_POST['celular'] : "Não informado";
    $tel_amigo = isset($_POST['tel_amigo']) ? $_POST['tel_amigo'] : "Não informado";

    $email = isset($_POST['email']) ? $_POST['email'] : "Não informado";
    

    $serie = isset($_POST['serie']) ? $_POST['serie'] : "Não informado";
    $turno = isset($_POST['turno']) ? $_POST['turno'] : "Não informado";
    $cuidado_especial = isset($_POST['cuidado_especial']) ? $_POST['cuidado_especial'] : "Não informado";
    $obs = isset($_POST['obs']) ? $_POST['obs'] : "Não informado";


    mysqli_query($db,"UPDATE estudantes SET nome = '$nome', cpf = '$cpf', rg = '$rg', nascimento = '$nascimento', mae = '$mae', pai = '$pai', estado = '$estado', cidade = '$cidade', bairro = '$bairro', endereco = '$endereco', complemento = '$complemento', cep = '$cep', tel_residencial = '$tel_residencial', celular = '$celular', tel_amigo = '$tel_amigo', serie = '$serie', turno = '$turno', atendimento_especial = '$cuidado_especial', obs = '$obs', email = '$email' WHERE id = $id");


    echo "<script language='javascript'>window.location='estudantes.php?pg=cadastra&bloco=4&aluno=$nome';</script>";

}

?>


<?php }// aqui fecha a PG todos ?>





<?php if(@$_GET['pg'] == 'cadastra'){ ?> 
<?php if(@$_GET['bloco'] == '1'){ ?>
<div id="cadastra_estudante">
 <h1>Cadastre os dados pessoais</h1>
 
<form name="form1" method="post" action="">
  <table width="900" border="0">
  <tr>
     <td colspan="2"><h3>Matricula do aluno: </h3></td>
     <td></td>
     <td></td>
  </tr>
  <tr>
    <?php 
         $sql_1 = mysqli_query($db,"SELECT * FROM estudantes ORDER BY id DESC LIMIT 1");
         if(mysqli_num_rows($sql_1) == ''){
           $novo_code = date("Y").'B.'.rand(0, 100).'.'.'1';
       ?>
        <td><input type="text" name="code" id="campo disabled="disabled" value="<?php echo $novo_code; ?>"></td><td></td>
        <input type="hidden" name="code" value="<?php echo $novo_code; ?>" />    
      <?php
         }else{
     
        while($res_1 = mysqli_fetch_array($sql_1)){
          //o codigo é gerado pegando o ano + um numero aleatorio + o ultimo id mais 1. 
          $novo_code = date("Y").'B.'.rand(0, 100).'.'.++$res_1['id'];
       ?>
        <td><input type="text" name="code" id="campo" disabled="disabled" value="<?php echo $novo_code; ?>"></td>
        <input type="hidden" name="code" value="<?php echo $novo_code; ?>" />
       <?php } 
      } ?>
       <td></td>
  </tr>    
  <tr>
      <td>Nome:</td>
      <td>CPF:</td>
      <td>RG:</td>
  </tr>
  <tr>
      <td><label for="nome"></label>
      <input type="text" name="nome" id="campo" required="" ></td>
      <td><label for="cpf"></label>
      <input type="text" name="cpf" id="campo" required=""></td>
      <td><label for="rg"></label>
      <input type="text" name="rg" id="campo" required=""></td>
  </tr>
  <tr>
      <td>Data de nascimento:</td>
      <td>Nome da mae:</td>
      <td>Nome do Pai:</td>
  </tr>
  <tr>
      <td><label for="nascimento"></label>
      <input type="text" name="nascimento" id="campo" required=""></td>
      <td><label for="mae"></label>
      <input type="text" name="mae" id="campo" required=""></td>
      <td><label for="pai"></label>
      <input type="text" name="pai" id="campo" required=""></td>
  </tr>
  <tr>
      <td>Estado:</td>
      <td>Cidade:</td>
      <td>Bairro:</td>
  </tr>
  <tr>
      <td><input type="text" name="estado" id="campo" required=""></td>
      <td><input type="text" name="cidade" id="campo" required=""></td>
      <td><input type="text" name="bairro" id="campo" required=""></td>
  </tr>
  <tr>
      <td>Endereco:</td>
      <td>Complemento:</td>
      <td>Cep:</td>
  </tr>
  <tr>
      <td><input type="text" name="endereco" id="campo" required=""></td>
      <td><input type="text" name="complemento" id="campo" ></td>
      <td><input type="text" name="cep" id="campo" ></td>
  </tr>
  <tr>
      <td>Telefone residencial:</td>
      <td>Telefone Celular:</td>
      <td>Telefone de um amigo:</td>
  </tr>
  <tr>
      <td><input type="text" name="tel_residencial" id="campo"></td>
      <td><input type="text" name="celular" id="campo" required=""></td>
      <td><input type="text" name="tel_amigo" id="campo"></td>
  </tr>

  <tr>
      <td>E-mail:</td>
  </tr>
  <tr>
      <td><input type="email" name="email" id="campo" placeholder="Necessario para recuperar senha"></td>
  </tr>
  
  <tr>
      <td>Serie que este aluno vai se matricular:</td>
      <td>Turno:</td>
      <td>Cuidado Especial</td>
  </tr>

    <tr>

      <td><label for="serie"></label>
        <select name="serie" size="1" id="campo">
          <?php
            $sql_1 = mysqli_query($db,"SELECT * FROM cursos");
            while($res_1 = mysqli_fetch_array($sql_1)){
            ?>  
            <option value="<?php echo $res_1['id'];?>"> <?php echo $res_1['curso']; ?> </option>
          <?php 
          } 
          ?>
        </select></td>

      <td><label for="turno"></label>
        <select name="turno" size="1" id="campo">
          <option value="Manha">Manha</option>
          <option value="Tarde">Tarde</option>
          <option value="Noite">Noite</option>
      </select></td>

      <td><label for="cuidado_especial"></label>
        <select name="cuidado_especial" size="1" id="campo">
          <option value="NAO">NAO</option>
          <option value="SIM">SIM</option>
      </select></td>
    </tr>

    <tr>
      <td>Observacoes para este(a) aluno(a)</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3"><label for="obs"></label>
      <textarea name="obs" id="campo" cols="50" rows="5"></textarea></td>
    </tr>
    <tr>
      <td><input class="botao" type="submit" name="button" id="botao" value="Finalizar"></td>

      <td>&nbsp;</td>
      <td>&nbsp;</td>
  </tr>
  </table>
</form>
<br /> 
 
</div><!-- cadastra_estudante -->

    
    <?php 

    if(isset($_POST['button'])){

    $code = isset($_POST['code']) ? $_POST['code'] : "Não informado";
    $nome = isset($_POST['nome']) ? $_POST['nome'] : "Não informado";
    $cpf = isset($_POST['cpf']) ? $_POST['cpf'] : "Não informado";
    $rg = isset($_POST['rg']) ? $_POST['rg'] : "Não informado";
    $nascimento = isset($_POST['nascimento']) ? $_POST['nascimento'] : "Não informado";
    $mae = isset($_POST['mae']) ? $_POST['mae'] : "Não informado";
    $pai = isset($_POST['pai']) ? $_POST['pai'] : "Não informado";
    $estado = isset($_POST['estado']) ? $_POST['estado'] : "Não informado";
    $cidade = isset($_POST['cidade']) ? $_POST['cidade'] : "Não informado";
    $bairro = isset($_POST['bairro']) ? $_POST['bairro'] : "Não informado";
    $endereco = isset($_POST['endereco']) ? $_POST['endereco'] : "Não informado";
    $complemento = isset($_POST['complemento']) ? $_POST['complemento'] : "Não informado";
    $cep = isset($_POST['cep']) ? $_POST['cep'] : "Não informado";
    $tel_residencial = isset($_POST['tel_residencial']) ? $_POST['tel_residencial'] : "Não informado";
    $celular = isset($_POST['celular']) ? $_POST['celular'] : "Não informado";
    $tel_amigo = isset($_POST['tel_amigo']) ? $_POST['tel_amigo'] : "Não informado";

    $email = isset($_POST['email']) ? $_POST['email'] : "Não informado";
    

    $serie = isset($_POST['serie']) ? $_POST['serie'] : "Não informado";
    $turno = isset($_POST['turno']) ? $_POST['turno'] : "Não informado";
    $cuidado_especial = isset($_POST['cuidado_especial']) ? $_POST['cuidado_especial'] : "Não informado";
    $obs = isset($_POST['obs']) ? $_POST['obs'] : "Não informado";


   mysqli_query($db,"INSERT INTO acesso_ao_sistema (status, code, senha, nome, painel) VALUES ('Ativo', '$code', '$cpf', '$nome', 'Aluno')");

    $inserir  = mysqli_query($db,"INSERT INTO estudantes (`code`, `status`, `nome`, `cpf`, `rg`, `nascimento`, `mae`, `pai`, `estado`, `cidade`, `bairro`, `endereco`, `complemento`, `cep`, `tel_residencial`, `celular`, `tel_amigo`, `serie`, `turno`, `atendimento_especial`, `obs`,`email`) VALUES ('$code', 'Ativo', '$nome', '$cpf', '$rg', '$nascimento', '$mae', '$pai', '$estado', '$cidade', '$bairro', '$endereco', '$complemento', '$cep', '$tel_residencial', '$celular', '$tel_amigo', '$serie', '$turno', '$cuidado_especial', '$obs','$email')");

    if($inserir){
        echo "<script language='javascript'>window.location='estudantes.php?pg=cadastra&bloco=3&aluno=$nome&codigo=$code&cpf=$cpf';</script>";
    }else{
      echo "Erro ao inseir dados: ".mysql_error();
    }


    
   
}

?>


<?php  } // aqui fecha o bloco 1 ?>


<?php if(@$_GET['bloco'] == '4'){ 

    $aluno = @$_GET['aluno'];

  ?>
<div id="cadastra_estudante">
 <h1>Tudo certo</h1>
 <table>
<tr>
<td>
<h4><h3>Dados atualizado com sucesso!!!</h3>
<ul>
 <li>Os dados do estudande <h3><?php echo $aluno ?></h3> foram atualizados com sucesso</li>
</ul>
<a href="estudantes.php?pg=todos">Clique aqui para voltar para pagina inicial</a>
</h4>
</td>
</tr>
</table>
<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
</div><!-- cadastra_estudante -->


<?php }// aqui fecha o bloco 4 ?>

<?php if(@$_GET['bloco'] == '3'){ 

    $aluno = @$_GET['aluno'];
    $codigo = @$_GET['codigo'];
    $cpf_aluno = @$_GET['cpf'];

  ?>
<div id="cadastra_estudante">
 <h1>Tudo certo</h1>
 <table>
<tr>
<td>
<h4>O Estudante <h3><?php echo $aluno ?></h3> foi cadastrado perfeitamente no sistema!
<ul>
 <li>Este estudante ja pode acessar o sistema usando sua matricula: <h3><?php echo $codigo ?></h3>  e seu CPF: <h3><?php echo $cpf_aluno ?></h3> como senha!</li>
</ul>
<a href="estudantes.php?pg=todos">Clique aqui para voltar para pagina inicial</a>
</h4>
</td>
</tr>
</table>
<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
</div><!-- cadastra_estudante -->


<?php }// aqui fecha o bloco 3 ?>


<?php }// aqui fecha a PG cadastra ?>





<?php require "rodape.php"; ?>
</body>
</html>