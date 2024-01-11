<?php ob_start(); ?>
<?php
    session_start();
    /*
    $ip = "localhost";
    $login="root";
    $senha="";
    $banco="bdtcc";
    $port="3399";
    */
    $ip = "localhost";
    $login="id19926702_projetotcc";
    $senha="F%)ucW|5zef~Z]Z5";
    $banco="id19926702_bdtcc";



    $con=mysqli_connect($ip, $login, $senha, $banco);
    if($con->connect_error){
        echo "Deu ruim";
    }

if(isset($_GET['edit'])){

            $currentDirectory = getcwd(); //pega o diretório atual
            $uploadDirectory = "/imgs/"; //pasta onde será carregado os arquivos
            $uploadDirectory2 = "/imgs/"; //pasta onde será carregado os arquivos
            
            
            $errors = []; // erros de armazenamento
            
            $fileExtensionsAllowed = ['jpeg','jpg','png']; // extensões permitidas
            
            $fileName = $_FILES['arquivo']['name'];
            $fileSize = $_FILES['arquivo']['size'];
            $fileTmpName  = $_FILES['arquivo']['tmp_name'];
            $fileType = $_FILES['arquivo']['type'];
            $fileExtension1 = explode('.',$fileName);
            $fileExtension = strtolower(end($fileExtension1));
            
            
            echo $uploadPath = $currentDirectory . $uploadDirectory . basename($fileName); 
            
            echo $caminho = $uploadDirectory2 . basename($fileName); //caminho da imagem
            
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
            $p_id = $_GET['id'];
            $nomeproduto = $_POST['nomeproduto'];
            $preco = $_POST['preco'];
            $codigo = $_POST['codigo'];
            $descc = $_POST['descc'];
    
        $query = "UPDATE produtos SET nome='$nomeproduto', preco='$preco', codigo='$preco' , descc='$descc', arquivo='$caminho'  WHERE id='$p_id' ";
        $query_run = mysqli_query($con, $query);
    
        if($query_run)
        {
            $_SESSION['message'] = "user atualizado com sucesso";
            header("Location: lista.php?edit-ok");
            exit(0);
        }
        else
        {
            $_SESSION['message'] = "user não atualizado";
            header("Location: lista.php?edit-erro");
            exit(0);
        }

        }



if(isset($_GET['del']))
{
    $p_id = $_GET['id'];

    $query = "DELETE FROM produtos WHERE id='$p_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "produto excluido com sucesso";
        header("Location: lista.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Não foi possivel excluir o produto";
        header("Location: lista.php");
        exit(0);
    }


}

?>
<?php ob_end_flush(); ?>