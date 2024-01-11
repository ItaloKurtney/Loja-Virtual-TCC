<?php
session_start();
    require_once("servidor.php");
    if(!empty($_SESSION['mensagem'])){
        echo $_SESSION['mensagem'];
        unset($_SESSION['mensagem']);
    }

    require_once("servidor.php");
    $id = $_GET['id'];
    $result = mysqli_query($con, "SELECT * FROM produtos WHERE id='" . $id . "'");

    $row = mysqli_fetch_array($result);
  
    if (is_array($row)) {

    $nomeproduto = $row['nome'];
    $preco = $row['preco'];
    $codigo = $row['codigo'];
    $descc = $row['descc'];
  
  

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produtos</title>

    <link rel="stylesheet" href="formcad.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" crossorigin="anonymous">

</head>
<body>
    <div id="estilo">
    <h1>Editar Produtos</h1><br>
    <h2>
    <form action="prod.php?edit&id=<?php echo $id ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
    Nome do Produto<input type="text" placeholder="Digite o nome do produto"name="nomeproduto" value="<?php echo $nomeproduto ?>"><br>

    Preço Total<input type="text" placeholder="Digite o preço total do produto" name="preco" value="<?php echo $preco ?>"><br>
    
    Valor Unitário<input type="text" placeholder="Digite o valor unitário do produto" name="codigo" value="<?php echo $codigo ?>"><br>

    Descrição do Produto<textarea class ="descricao"  name="descc" rows="5" cols="50"><?php echo $descc ?></textarea>

    Adicione a imagem do produto<input class="arquivo" type="file" name="arquivo" id="fileToUpload">
    

</h2>
    <input type="submit" name="enviar" value="Enviar">
</form>
<?php } ?>
    </body>
</html>