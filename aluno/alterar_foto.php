<?php 
require "topo1.php";
?>
<!DOCTYPE html>
<html>
<head>

  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="alterar_foto/style.css">
</head>

<body class="template active">
	

      <div class="container">

          <div class="upload-area">
                <strong>Solte a imagem aqui!</strong>
          </div>

          <br>
          <div class='input-wrapper'>
            
              <label for='input-file'>
                Selecione o arquivo
              </label>

              <form action="" method="post" enctype="multipart/form-data">
                        <input id='input-file'  type="file" name="arquivo[0]" required="" value="Escolher">
                        <button class="button21 button211" type="submit" name="salvar" >Salvar</button>
              </form>

              <span id='file-name'></span>
          
          </div>

  
      </div>

      <div class="container">
        

        <div id="uploaded-files">
              
              <?php 
  
    
        if(isset($_POST['salvar'])){

        if(isset($_FILES['arquivo'])){
          

            $extensao = strtolower(substr($_FILES['arquivo']['name'][0], -4));//pega a extensao do arquivo
            $nome_novo = md5(time()) . $extensao;//dou um novo nome ao arquivo, impedindo  que um sobreescreva  outro

            $diretorio = "fotos/";

            $mover = move_uploaded_file($_FILES['arquivo']['tmp_name'][0], $diretorio.$nome_novo);
            if($mover){
              echo "<h3><center>Foto alterada com sucesso!!!</center></h3>";
              //antes de alterar, eu verfico se ja tem ua foto la, se tiver, apenas altero a foto
              $sql = mysqli_query($db,"SELECT * FROM fotos WHERE code_aluno = '$code'");
              $quant = mysqli_num_rows($sql);

              if($quant>0){
                //pego o nome do arquivo atual que ta la para poder apagar o arquivo
                while ($res_1 = mysqli_fetch_array($sql)) {
                  $nome_atual = $res_1['nome'];
                }
                unlink($diretorio.$nome_atual);//aqui eu apago o arquivo


                $sql1 = "UPDATE fotos SET nome = '$nome_novo' WHERE code_aluno = '$code';";
              }else{
                $sql1 = "INSERT INTO fotos (nome, code_aluno) VALUES ('$nome_novo','$code')";
              }


            $sql_code = mysqli_query($db,$sql1);
            if($sql_code){
               // echo "Foto alterada com sucesso!!!";
              echo "<div class='image'> <img src = 'fotos/$nome_novo' /> </div>";
            }else{
                echo "Falha ao alterar a foto!!!";
            }

          }else{
            echo "Erro ao mover foto!!!";
          }

      }
    }

  ?>


          </div>

      </div>

<!--

        <div class="box">
            <div class="tituloNo"><h2>Alterar Foto</h2></div>
            <div class="texto">
              <?php
                //$foto = "not_found.png";
                //$sql = mysqli_query($db,"SELECT * FROM fotos WHERE code_aluno = '$code'");
                //while($res_1 = mysqli_fetch_array($sql)){
                //  $foto = $res_1['nome'];
                //} 
              ?>
              <img src="fotos/<?php// echo $foto ?>" height="100" width="100" >
                    
              <form action="" method="post" enctype="multipart/form-data">
                      <input type="file" name="arquivo" required="">
                      <input type="submit" name="salvar" value="Salvar">
              </form>

            </div>
        </div>

-->
</body>
  
  <script type="text/javascript">
    
       var $input    = document.getElementById('input-file'),
        $fileName = document.getElementById('file-name');

        $input.addEventListener('change', function(){
          $fileName.textContent = this.value;
        });

  </script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script type="text/javascript">
    
    jQuery(document).ready(function($){
        $('.upload-area').on('dragover', function(event){
            event.preventDefault();
            event.stopPropagation();
            $(this).addClass('upload-area-hover');
        })
        $('.upload-area').on('dragleave', function(event){
            event.preventDefault();
            event.stopPropagation();
            $(this).removeClass('upload-area-hover');
        })
        $('.upload-area').on('drop', function(event){
            event.preventDefault();
            event.stopPropagation();
            $(this).removeClass('upload-area-hover');
            var data = new FormData();
            var files = event.originalEvent.dataTransfer.files;
            for(var i = 0; i<files.length; i++){
                data.append('file[]',files[i]);
            }
            $.ajax({
              url:'upload_foto.php',
              method: 'POST',
              data: data,
              contentType: false,
              cache: false,
              processData:false,
              success:function(result){
                $('#uploaded-files').html(result);
              }
            })
        })
    });

</script>

</html>