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
<div id="corpo-form-Cad">
    <h1>Realize seu cadastro</h1>
    <form method="POST">
        <input type="text" name="nome" placeholder="Nome Completo" maxlenght="30">
        <input type="text" name="telefone" placeholder="Telefone"maxlenght="30">
        <input type="email" name="email" placeholder="Email"maxlenght="40">
        <input type="password" name="senha" placeholder="Digite sua senha"maxlenght="15">
        <input type="password" name="confSenha" placeholder="Confirmar Senha"maxlenght="15">
        <input type="submit" value="CADASTRAR">
        <a href="paglog.php"><strong>Possui uma conta?<br>Entre aqui!</strong></a>
    </form>
</div>
<?php
//verificar se a pessoa clicou no botao
if (isset($_POST['nome']))
{
    $nome = addslashes($_POST['nome']);
    $telefone = addslashes($_POST['telefone']);
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);
    $confirmarSenha = addslashes($_POST['confSenha']);
    //verifica se esta preenchido
    if(!empty($nome) && !empty($telefone) && !empty($email) && !empty($senha) && !empty($confirmarSenha))
    {
        $u->conectar("bdtcc","localhost","root","");
        /*$u->conectar("id19926702_bdtcc","localhost","id19926702_projetotcc","F%)ucW|5zef~Z]Z5");*/
        if($u->msgErro == "")//se esta tudo ok
        {
            if($senha == $confirmarSenha)
            {
                if($u->cadastrar($nome,$telefone,$email,$senha))
                {
                    ?>
                <div id="msg-sucesso">
                        cadastrado com sucesso! Acesse para entrar!
                </div>
                    <?php
                }
                else
                {
                    ?>
                <div class="msg-erro">
                    email ja cadastrado!
                </div>
                    <?php
                }
            }
            else
            {
                ?>
                <div class="msg-erro">
                    Senha e confirmar senha não correspondem
                </div>
                    <?php
            }
        }
        else{
            ?>
            <div class="msg-erro">
            <?php echo "Erro :" .$u->msgErro;?>
            </div>
            <?php
        }
    }else
    {
        ?>
            <div class="msg-erro">
                Preencha todos os campos  
            </div>
            <?php
    }
}


?>

</body>
</html>