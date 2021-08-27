<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Exercício de Fixação</title>
  <link rel="stylesheet" href="./style.css">
  <style>
    body {
      background-image: url(./donation-blood.jpg);
      background-repeat: no-repeat;
      background-size: cover;
      color: black;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
  </style>
</head>

<body>
  <h1>Doação de Sangue!</h1>
  <?php
  $age = 18;
  $weight = 62;

  // Check is the valid age and weight
  $isValidAge = $age >= 16 &&  $age <= 69;
  $isValidWeight = $weight >= 50.00;

  // Output message
  $msgOutput = '';

  if ($isValidAge && $isValidWeight) {
    $msgOutput = 'Atende aos requisitos!';
  } else {
    $msgOutput = 'Não atende aos requisitos';
  }
  ?>
  <h2><?= $msgOutput; ?></h2>
  <h3>Idade: <?= $age; ?> anos</h3>
  <h3>Peso: <?= $weight; ?> kg</h3>
</body>

</html>