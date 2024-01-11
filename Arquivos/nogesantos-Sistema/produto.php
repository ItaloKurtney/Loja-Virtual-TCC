<?php
    require_once("pdcad/servidor.php");
    $id = $_GET['id'];
    $comando= "SELECT * FROM produtos WHERE id='$id' ";
    $enviar= mysqli_query($con, $comando);
    $resultado=mysqli_fetch_all($enviar, MYSQLI_ASSOC);
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>

    <link rel="stylesheet" href="produto.css">

    
</head>
<body>
    <header>
        <a class="logo"><img src="imagens/logoss.png">            
            <ul class="navbar"
            >
            <a href="https://api.whatsapp.com/send?phone=5511995705605&text=Olá,estou interessado(a) nos produtos! "target="_blank"class="home-active">Compre pelo WhatsApp</a>
        </ul>
    </header>
</body>
<div class="boxproduto">
<?php
    foreach($resultado as $produto){
        $codigo=$produto['codigo'];
        $nome=$produto['nome'];
        $preco=$produto['preco'];
        $descc=$produto['descc'];
        $id=$produto['id'];
        $arquivo=$produto['arquivo'];
        $disponibilidade=$produto['disponibilidade'];
        if($disponibilidade=="1"){
            $disponibilidade="Disponivel";
        }else{
            $disponibilidade="Indisponivel";
        }
?>

            <?php } ?>
    <!--Prod1-->
    <div class="box">
        <h2><?php echo $nome ?></h2>
        <img src="pdcad<?php echo $arquivo ?>" alt="">
        <h3 class="boxdesc">Descrição do produto</h3>
        <p class="box"><?php echo $descc; ?>
        <br><br><br>Valor unitário do produto:
        <br><br><?php echo $codigo ?></p>
    <!--Botao de compra-->
    <div class="compra">
        <h2>COMPRE AGORA</h2>
    </div>
    <div id="smart-button-container">
        <div style="text-align: center;">
          <div id="paypal-button-container"></div>
        </div>
      </div>
    <script src="https://www.paypal.com/sdk/js?client-id=sb&enable-funding=venmo&currency=BRL" data-sdk-integration-source="button-factory"></script>
    <script>
      function initPayPalButton() {
        paypal.Buttons({
          style: {
            shape: 'rect',
            color: 'gold',
            layout: 'vertical',
            label: 'paypal',
            
          },
  
          createOrder: function(data, actions) {
            return actions.order.create({
              purchase_units: [{"amount":{"currency_code":"BRL","value":91.8}}]
            });
          },
  
          onApprove: function(data, actions) {
            return actions.order.capture().then(function(orderData) {
              
              // Full available details
              console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
  
              // Show a success message within this page, e.g.
              const element = document.getElementById('paypal-button-container');
              element.innerHTML = '';
              element.innerHTML = '<h3>Thank you for your payment!</h3>';
  
              // Or go to another URL:  actions.redirect('thank_you.html');
              
            });
          },
  
          onError: function(err) {
            console.log(err);
          }
        }).render('#paypal-button-container');
      }
      initPayPalButton();
    </script> 
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
                </div>
            </div>
        </div>
    </footer>
    <div class="direitos">
        <p>&#169; Nogueira&Santos Todos Direitos Reservados.</p>
    </div>
</html>