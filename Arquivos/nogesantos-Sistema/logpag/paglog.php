<?php ob_start(); ?>
<?php
require_once 'Classes/usuarios.php';
$u = new Usuario;
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="estilolog.css">
    
</head>
<body>
<div id="corpo-form">
    <h1>Realize seu login</h1>
    <form method="POST">
        <input type="email" placeholder="Usuário" name="email">
        <input type="password" placeholder="Senha" name="senha">
        <input type="submit" value="ACESSAR">
        <a href="cadastrar.php"><strong>NÃO POSSUI CADASTRO?<br>Cadastre-se aqui!</strong></a>
    </form>
</div>
<?php

if (isset($_POST['email']))
{
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);
    if(!empty($email) && !empty($senha));
    {
        $u->conectar("bdtcc","localhost","root","");
        /*$u->conectar("id19926702_bdtcc","localhost","id19926702_projetotcc","F%)ucW|5zef~Z]Z5");*/
        
        if($u->msgErro == "")
        {
        if($u->Logar($email,$senha))
        {
            header("location: areaPrivada.php");
        }
        else
        {
            ?>
            <div class="msg-erro">
            Email e/ou senha incorretos!
            </div>
            <?php
        }
    }
    else
    {
        ?>
            <div class="msg-erro">
            <?php echo "Erro:".$u->msgErro; ?>
            </div>
            <?php
    }
    {
        ?>
            <div class="msg-erro">
            Preencha todos os campos!
            </div>
            <?php
    }
}
}
?>
</body>
</html>
<?php ob_end_flush(); ?>