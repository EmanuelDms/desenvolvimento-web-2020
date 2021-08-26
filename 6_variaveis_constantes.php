<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Variáveis Constantes</title>
</head>

<body>
  <?php
  // método para criação de constantes
  // define (string constant_name, $value)
  // para constantes, é boa prática LETRAS MAIÚSCULAS
  define('BD_URL', 'endereco_bd_dev');
  echo BD_URL;
  ?>
</body>

</html>