<?php
session_start();
    require_once("servidor.php");
    if(!empty($_SESSION['mensagem'])){
        echo $_SESSION['mensagem'];
        unset($_SESSION['mensagem']);
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de produtos</title>

    <link rel="stylesheet" href="formcad.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" crossorigin="anonymous">

</head>
<body>
    <div id="estilo">
    <h1>Cadastro de Produtos</h1><br>
    <h2>
    <form action="listar.php" method="post" accept-charset="utf-8" enctype="multipart/form-data">
    Nome do Produto<input type="text" placeholder="Digite o nome do produto"name="nomeproduto"><br>

    Preço Total<input type="text" placeholder="Digite o preço total do produto" name="preco"><br>
    
    Valor Unitário<input type="text" placeholder="Digite o valor unitário do produto" name="codigo"><br>

    Descrição do Produto<textarea class ="descricao"  name="descc" rows="5" cols="50"></textarea>

    Adicione a imagem do produto<input class="arquivo" type="file" name="arquivo" id="fileToUpload">
    

</h2>
    <input type="submit" name="enviar" value="Enviar">
</form>

    <a href="lista.php">Lista de Produtos Cadastrados</a>
    </body>
</html>