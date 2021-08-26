<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Variáveis - Prática</title>
</head>

<body>
  <?php
  // string
  $username = 'Emanuel';

  // int
  $age = 29;

  // float
  $pounds = 82.5;

  // boolean
  $fumante_sn = false;
  ?>

  <h1>Ficha cadastral</h1>
  <p><b>Nome</b> <?= $username; ?></p>
  <p><b>Idade</b> <?= $age; ?></p>
  <p><b>Peso:</b> <?= $pounds; ?></p>
  <p><b>Fumante:</b> <?= ($fumante_sn) ? 'Sim' : 'Não';  ?></p>
</body>

</html>