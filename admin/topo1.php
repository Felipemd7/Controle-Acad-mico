<?php 
      @session_start();
      $painel_atual = "admin";
      $code = isset($_SESSION['code']) ? $_SESSION['code'] : "";
?>
<!DOCTYPE html>
<html lang="pt" >

<head>
  <meta charset="utf-8"/>


  <?php 
  require "../config.php";
  require "../conexao.php";
  
 $sql_ve = mysqli_num_rows(mysqli_query($db,"SELECT * FROM acesso_ao_sistema where code = '$code' AND painel = 'admin' "));
  if($sql_ve == 0){
    session_destroy();
    echo "<script language='javascript'>window.location='../index.php';</script>";
  }
  

 ?> 



  <title>SISA</title>
  <link rel="stylesheet" href="css_topo/style.css">
  <script src='js_topo/jquery.min.js'></script>
  <script  src="js_topo/index.js"></script>

  <link href="../modal/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <script src='../modal/jquery.min.js'></script>
  <script src='../modal/bootstrap.min.js'></script>

  
</head>

<body>

  <?php if(isset($_POST['search'])){
   
       $key = $_POST['key'];
       if($key == ''){
         echo "<script language='javascript'>window.alert('Digite algo para fazer a pesquisa');</script>";
       }else{
         echo "<script language='javascript'>window.location='resultado_da_pesquisa.php?q=$key';</script>";     
       }}
 ?>

  
<nav id='cssmenu'>
<div class="logo" ><a href="index.php">Seja Bem Vindo</a></div>
<div id="head-mobile"></div>
<div class="button"></div>
<ul>
<li class='active'><a href="index.php" type="home">HOME</a></li>

<li><a href="cursos_e_disciplinas.php?pg=curso">CURSOS E DISCIPLINAS</a>
   <ul>
      <li><a href="cursos_e_disciplinas.php?pg=curso">Cursos</a></li>
      <li><a href="cursos_e_disciplinas.php?pg=disciplina">Disciplinas</a></li>
      <li><a href="cursos_e_disciplinas.php?pg=cursoedisciplinas">Cursos & Disciplinas</a></li>
   </ul>
</li>

<li><a href="professores.php?pg=todos">PROFESSORES</a></li>
<li><a href="estudantes.php?pg=todos">ESTUDANTES</a></li>




<!--

<li><a href="">EXTRAS</a>
      <ul>
    <li><a href="funcionarios.php?pg=todos">Funcionários</a></li>
    </ul>
</li>-->
<li><a  class="category" href="" data-toggle="modal" data-target="#myModal" >BUSCAR</a></li>
<li><a href='../config.php?pg=sair' type="close">SAIR</a></li>

</ul>
</nav>


</body>

  <!------------------------------------MODAL-------------------------------------->

        <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4>Realizar pesquisa</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <form role="form" name="" method="post" action="" enctype="multipart/form-data">
            <div class="form-group">
              <label for="usrname"></span> Pesquise por um professor ou aluno!</label>
              <input type="text" class="form-control" name="key" placeholder="Digite seu nome aqui..." required="">
            </div>
              <button type="submit" name="search" class="btn btn-success btn-block">Pesquisar</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="submit"  class="btn btn-danger btn-default pull-left" data-dismiss="modal">Cancelar</button>
          
        </div>
      </div>
      
    </div>
  </div> 
  <!------------------------------------MODAL-------------------------------------->


</html>
