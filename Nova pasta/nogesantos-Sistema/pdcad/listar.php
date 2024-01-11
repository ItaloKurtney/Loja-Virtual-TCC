<?php ob_start(); ?>
<?php

session_start();
    require_once("servidor.php");
    if(isset($_POST['enviar'])){
        if(!empty($_POST['nomeproduto']) || !empty($_POST['preco']) || !empty($_POST['codigo'])){
            $nome=$_POST['nomeproduto'];
            $preco=$_POST['preco'];
            $codigo=$_POST['codigo'];
            $descc=$_POST['descc'];
            $arquivo=$_POST['arquivo'];

          /*INICIO FILE UPLOAD*/
          $currentDirectory = getcwd(); //pega o diretório atual
          $uploadDirectory = "/imgs/"; //pasta onde será carregado os arquivos
      
          $errors = []; // erros de armazenamento
      
          $fileExtensionsAllowed = ['jpeg','jpg','png']; // extensões permitidas
      
          $fileName = $_FILES['arquivo']['name'];
          $fileSize = $_FILES['arquivo']['size'];
          $fileTmpName  = $_FILES['arquivo']['tmp_name'];
          $fileType = $_FILES['arquivo']['type'];
          $fileExtension = strtolower(end(explode('.',$fileName)));
      
          $uploadPath = $currentDirectory . $uploadDirectory . basename($fileName); 
          
          echo $caminho = $uploadDirectory . basename($fileName); //caminho da imagem
      
          if (isset($_POST['enviar'])) {
      
            if (! in_array($fileExtension,$fileExtensionsAllowed)) {
              $errors[] = " | A extensão desse arquivo não é aceita. Carregue um arquivo JPEG, JPG ou PNG.";
            }
      
            if ($fileSize > 4000000) {
              $errors[] = " | O arquivo excede o tamanho máximo de 4MB";
            }
      
            if (empty($errors)) {
              $didUpload = move_uploaded_file($fileTmpName, $uploadPath);
      
              if ($didUpload) {
                echo " | O arquivo " . basename($fileName) . " foi carregado com sucesso!";
              } else {
                echo " | Erro no carregamento do arquivo.";
            }
            } else {
            foreach ($errors as $error) {
                echo $error . "\n";
            }
            }
        }

          /*FIM FILE UPLOAD*/
            $comando="INSERT INTO produtos(nome,preco,codigo,arquivo,descc) VALUES ('$nome', '$preco', '$codigo', '$caminho','$descc')";
            $enviar=mysqli_query($con, $comando);
            
            if($enviar){
                $_SESSION['mensagem']="O produto foi cadastrado";
                header("location:formcad.php");
                exit;
            }else{
                $_SESSION['mensagem']="Erro ao cadastar o produto";
                header("location:formcad.php");
                exit;
            }
        }
    }

?>
<?php ob_end_flush(); ?>