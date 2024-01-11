<?php


$ip = "localhost";
$login="root";
$senha="";
$banco="bdtcc";
$port="3399";
/*
$ip = "localhost";
$login="id19926702_projetotcc";
$senha="F%)ucW|5zef~Z]Z5";
$banco="id19926702_bdtcc";
*/
$con=mysqli_connect($ip, $login, $senha, $banco);
if($con->connect_error){
    echo "Deu ruim";
}
?>