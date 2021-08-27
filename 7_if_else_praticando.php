<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./style.css">
  <title>E-commerce</title>
  <style>
    .rtx {
      height: 320px;
      background-attachment: fixed;
      background-image: url(https://images.kabum.com.br/produtos/fotos/128377/placa-de-video-evga-nvidia-geforce-rtx-3090-24gb-gddr6x-24g-p5-3987-kr_1600785254_gg.jpg);
    }

    main {
      padding: 10rem;
      align-items: center;
    }
  </style>
</head>

<body>
  <div class="rtx"></div>
  <?php
  function ternaryYesNoTextOutput($condition)
  {
    return ($condition) ? 'Sim' : 'Não';
  }

  $usuario_possui_cartao_loja = true;
  $valor_compra = 17750;

  $valor_frete = 50;
  $recebeu_desconto_frete = false;

  if ($usuario_possui_cartao_loja && $valor_compra >= 100) {
    $valor_frete = 0;
    $recebeu_desconto_frete = true;
  }
  ?>

  <main>
    <h1>Detalhes do pedido</h1>
    <p><strong>Possui cartão da loja?</strong> <?= ternaryYesNoTextOutput($usuario_possui_cartao_loja); ?></p>

    <p><strong>Valor da compra:</strong> R$<?= number_format($valor_compra, 2, ',', ''); ?></p>

    <p><strong>Recebeu desconto no frete?</strong> <?= ternaryYesNoTextOutput($recebeu_desconto_frete);  ?></p>
  </main>

  <div class="rtx"></div>
</body>

</html>