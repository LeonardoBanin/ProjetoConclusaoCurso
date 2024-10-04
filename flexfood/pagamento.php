<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Resumo do Pedido </title>
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

  <
<body>
    <div class="container">
        <header>
            <img src="Logo/1-removebg-preview.png" alt="Logo" class="logo">
            <img src="Logo/1-removebg-preview.png" alt="Logo no canto direito" class="logo-right">
        </header>
        <main>
            <h1>Resumo do Pedido</h1>
            <div class="pedido">
                <p><strong>Refrigerante</strong><br>1x Coca Cola <span>R$ 4,99</span></p>
            </div>
            <hr>
            <div class="total">
                <p>Valor total <span>R$ 4,99</span></p>
            </div>
            <hr>
            <button class="btn-pagamento" disabled>Formas de Pagamento</button>
            <form method="POST" action="">
                <div class="formas-pagamento">
                    <button type="submit" name="forma_pagamento" value="Pix" class="forma-pagamento pix">Pix</button>
                    <button type="submit" name="forma_pagamento" value="Débito" class="forma-pagamento debito">Débito</button>
                    <button type="submit" name="forma_pagamento" value="Crédito" class="forma-pagamento credito">Crédito</button>
                </div>
            </form>

            <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['forma_pagamento'])) {
                    $forma_pagamento = $_POST['forma_pagamento'];
                    echo '<div class="qr-code-section">';
                    echo '<p>Código QR Code gerado com sucesso</p>';
                    echo '<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/fa/Link_pra_pagina_principal_da_Wikipedia-PT_em_codigo_QR_b.svg/1200px-Link_pra_pagina_principal_da_Wikipedia-PT_em_codigo_QR_b.svg.png" alt="QR Code" class="qr-code">';
                    echo '<p class="codigo">0000212636001...***630F49B</p>';
                    echo '</div>';
                    echo '<a href="/FlexFood-Site/tela-pagamentoaprovado-finalizada/index.html" class="btn-processando">Processando pagamento via ' . htmlspecialchars($forma_pagamento) . ', aguarde...</a>';
                }
            ?>
        </main>
    </div>

    <script>
        const formaPagamentos = document.querySelectorAll('.forma-pagamento');
        formaPagamentos.forEach(button => {
            button.addEventListener('click', function () {
                formaPagamentos.forEach(btn => btn.classList.remove('selected'));
                this.classList.add('selected');
            });
        });
    </script>
</body>
</html>
