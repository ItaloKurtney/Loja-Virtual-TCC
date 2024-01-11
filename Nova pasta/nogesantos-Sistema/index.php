<?php
    require_once("pdcad/servidor.php");
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
    <title>Incio</title>

<link rel="stylesheet" href="estilo.css">

<link rel="styleshee" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" crossorigin="anonymous">/>
</head>
<body>
    <header>
        <a href="" class="logo"><img src="imagens/logoss.png">

        <div class="bx bx-menu" id="menu-icon"></div>
        
        <ul class="navbar">
        <br><a href="#home"class="home-active">Inicio</a>
        <a href="#categories"class=>Produtos</a>
        <a href="#products"class=>Sobre nós</a>
        <a href="#sobre"class=>Nos Encontre aqui</a>

    </ul>

    <div class="perfill">
        <a href="logpag/paglog.php"class=></a>
    </div>

    </header>

    <section class="home swipe"id="home">
        <div class="swiper-wrapper">
            <div class="swiper-slide conteiner">
                <div class="home-text">
                <span>Melhorando Sua Vida</span>
                <h1>Limpeza Residencial<br>Comercial<br>e Industrial</h1>
                <a href="#categories" class="btn">Comece Agora</a><i class='bx bx-right-arrow-alt'></i></a>
            </div>
                <img src="imagens/inicio2.png" alt="">
        </div>

    </section>
    <!--Parte sobre nos-->
    <section class="categories" id="categories">
        <div class="heading">
            <h1>Produtos mais <br><span>Procurados</h1>
        </div>

        <!--Parte dos Produtos-->
        <div class="products-conatiner">

        <?php
    foreach($resultado as $produto){
        $codigo=$produto['codigo'];
        $nome=$produto['nome'];
        $preco=$produto['preco'];
        $id=$produto['id'];
        $arquivo=$produto['arquivo'];
        $disponibilidade=$produto['disponibilidade'];
        if($disponibilidade=="1"){
            $disponibilidade="Disponivel";
        }else{
            $disponibilidade="Indisponivel";
        }
?>
            <!--Prod1-->
            <div class="box">
                <img src="pdcad<?php echo $arquivo ?>" alt="" width="150">
                <h2><?php echo $nome; ?></h2>
                <h3 class="price"><?php echo $preco; ?><br>10x<br><?php echo $codigo; ?><span>/unidade</span></h3>
                <a href="produto.php?id=<?php echo $id ?>" target="_blank"><h4>Compre aqui</h4></a>
            </div>

            <?php } ?>
    </div>
        
        
    </section>

    <section class="products" id="products">
        <div class="heading">
            <h1>Conheça mais<br><span>Sobre nós</h1>
        </div>
        <br>
        <h3>Somos um tradicional Distribuidor de Produtos de Limpeza do Estado de São Paulo. Certamente somos especialistas em fornecimento de produtos e equipamentos de limpeza de alta performance para todos os segmentos empresariais.
            Nossa equipe conta com profissionais atuantes há mais de 25 anos no mercado, certamente uma grande distinção que gera maior assertividade em nossa consultoria. 
        </h3>
        
    </section>

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <script src="main.js"></script>
    <section class="sobre" id="sobre">
    <div class="contato">
        <div class="contact-in">
            <h1>Informações de Contato</h1>
            <h2><i class="fa fa-phone" aria-hidden="true"></i> Telefone</h2>
            <p>(11)4603-9885</p>
            <h2><i class="fa fa-envelope" aria-hidden="true"></i> Email</h2>
            <p>nogueiraesantos1@gmail.com</p>
            <h2><i class="fa fa-map-marker" aria-hidden="true"></i>Endereço</h2>
            <p>Praça Luiz Apezzato 258
            <p>Centro - Bragança Paulista SP</p>
            <ul>
        </div>
        <div class="contact-in">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3673.927650290367!2d-46.54206598503339!3d-22.95289148498852!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94cec98de67b6f9d%3A0x5a21dbfe81705976!2sPra%C3%A7a%20Luiz%20Apezzato%2C%20258%20-%20Centro%2C%20Bragan%C3%A7a%20Paulista%20-%20SP%2C%2012900-031!5e0!3m2!1spt-PT!2sbr!4v1650303552168!5m2!1spt-PT!2sbr" width="100%" height="auto" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>
    </section>
    </div>
    <div class="formcontato">
        <h1>Envie sua mensagem ou sua duvida!</h1>
        <form action="https://formsubmit.co/italokurt9@gmail.com" method="POST" class="form">
        <label for="name">Nome</label>
        <input type="text" name="name" id="name" required />
        <label for="email">E-mail</label>
        <input type="email" name="email" id="email" required />
        <label for="message">Mensagem</label>
        <textarea name="message" id="message" required></textarea>
        <input type="hidden" name="_captcha" value="false" />
        <input type="hidden" name="_next"value="https://localhost/nogesantos/obrigado.html"/>
        <button type="submit">Enviar</button>
        </form>
        </div>
    <footer>
        <div class="rodape">
            <div class="rodapelinha">
                <div class="rodapeinf">
                    <h4>Nogueira & Santos</h4>
                    <ul>
                        <li><a href="#products"> Quem somos </a></li>
                        <li><a href="#home"> nossos serviços </a></li>
                        <li><a href="#sobre"> Endereço </a></li>
                    </ul>
                </div>
                <div class="rodapeinf">
                    <h4>Obtenha ajuda</h4>
                    <ul>
                        <li><a href="">Transporte</a></li>
                        <li><a href="">Status De Pedido</a></li>
                        <li><a href="">Opções De Pagamento</a></li>
                    </ul>
                </div>
                <div class="rodapeinf">
                    <h4>PAGAMENTO</h4>
                    <ul>
                        <li><a href="">Crédito</a></li>
                        <li><a href="">Débito</a></li>
                        <li><a href="">Boleto</a></li>
                    </ul>
                </div>
                <div class="rodapeinf">
                    <h4>Fique por dentro das novidades</h4>
                    <div class="form-sub">
                        <form>
                            <input type="email" placeholder="Digite o seu e-mail" required>
                            <button>ENVIAR</button>
                        </form>
                    </div>
                    <div class="medias-socias">
                        <a href="https://www.facebook.com/nogueiraesantoscomercio/"target="_blank"> <i class="fa fa-facebook"></i> </a>
                        <a href="https://www.instagram.com/nogueiraesantosltda/"target="_blank"> <i class="fa fa-instagram"></i> </a>
                        <a href=""> <i class="fa fa-twitter"></i> </a>
                        <a href=""> <i class="fa fa-linkedin"></i> </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
