<?php
    require_once("servidor.php");
    $comando= "SELECT * FROM produtos ORDER BY id DESC ";
    $enviar= mysqli_query($con, $comando);
    $resultado=mysqli_fetch_all($enviar, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de produtos</title>
    <link rel="stylesheet" href="estilotab.css">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" crossorigin="anonymous">

    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>

<table>
    <tr>
        <th>  Foto</th>
        <th>  Código</th>
        <th>  Nome</th>
        <th>  Preço Atacado</th>
        <th>  Disponibilidade</th>
        <th>  Editar</th>
        <th>  Excluir</th>
    </tr>
</div>
<?php
foreach($resultado as $produto){
    $id=$produto['id'];
    $codigo=$produto['codigo'];
    $nome=$produto['nome'];
    $preco=$produto['preco'];
    $arquivo=$produto['arquivo'];
    $disponibilidade=$produto['disponibilidade'];
    if($disponibilidade=="1"){
        $disponibilidade="Disponivel";
    }else{
        $disponibilidade="Indisponivel";
    }
?>
<tr>
        <td><img src=".<?php echo $arquivo ?>" alt="" width="150"></td>
        <td><?=$codigo?></td>
        <td><?=$nome?></td>
        <td><?=$preco?></td>
        <td><?=$disponibilidade?></td>
        <td><a href="editarprod.php?id=<?php echo $id ?>"><i class='bx bx-edit'></a></td>
        <td><a href="prod.php?del&id=<?php echo $id ?>"><i class='bx bx-trash'></i></a>

    </tr>
<?php
}
?>

</table>
</body>
</html>