<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Casting</title>
</head>

<body>
  <?php
  // gettype => retorna o tipo da variável
  $valor = 1;
  // double, float
  // int, integer
  // string
  $valor2 = (bool) $valor;

  echo gettype($valor);
  echo '<br>' . $valor2 . ' ' . gettype($valor2);
  ?>
</body>

</html>