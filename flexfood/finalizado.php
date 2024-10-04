<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Finalizar compra </title>
  <!-- Incluir o favicon -->
  <link rel="shortcut icon" href="<?= $BASE_URL ?>img/favicon.png" type="image/x-icon">
  <!-- CSS do bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
  <!-- Ícones do Bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <!-- CSS personalizado-->
  <link rel="stylesheet" href="<?= $BASE_URL ?>css/style.css">

  <body>

    <div class="container">
        <div class="logo-container">
            <img src=".img/logo/1.png" alt="Logo Flex Food">
        </div>
        <!-- Texto abaixo da logo -->
        <div class="payment-approved">
            <p>PAGAMENTO APROVADO</p>
            <p>Agora é só você colocar o código<br>abaixo em nosso token, volte sempre...</p>
            <!-- Código gerado dinamicamente com PHP -->
            <p class="code">CÓDIGO: <?php echo 'KX9D2E'; ?></p> 
        </div>
        <!-- Botão para redirecionar -->
        <div class="button-container">
            <button onclick="goToHomePage()">IR PARA A HOME</button>
        </div>
    </div>

    <script src="script.js"></script> <!-- Vincula ao arquivo JavaScript externo -->

</body>
</html>