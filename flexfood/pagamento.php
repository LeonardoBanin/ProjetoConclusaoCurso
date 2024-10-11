<?php
// Inclui arquivos necessários
require_once("config/url.php");
require_once("config/connection.php");
require_once("models/Message.php");
require_once("Controller/UserController.php");

$message = new Message($BASE_URL);
$flassMessage = $message->getMessage();
if (!empty($flassMessage["msg"])) {
    $message->clearMessage();
}

$userController = new UserController($conn, $BASE_URL);
$userData = $userController->verifyToken(false);

if (!isset($_SESSION["email"])) {
    header("location: login.php");
    exit();
}

// Lógica para calcular o total do carrinho
$total = 0; // Inicializa o total como zero

if (isset($_SESSION["email"])) {
    $filename = "carrinho_info/carrinho_" . $_SESSION["email"] . ".txt";

    if (file_exists($filename)) {
        $fts = file_get_contents($filename);
        $productIds = explode(" ", trim($fts)); // Obtém os IDs dos produtos no carrinho

        // Consulta para obter os preços dos produtos
        foreach ($productIds as $productId) {
            if (!empty($productId)) {
                $sql = "SELECT preco FROM produtos WHERE id = :id";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':id', $productId, PDO::PARAM_INT);
                $stmt->execute();
                $product = $stmt->fetch(PDO::FETCH_ASSOC);
                
                // Adiciona o preço do produto ao total
                if ($product) {
                    $total += $product['preco'];
                }
            }
        }
    }
}

// Caminho para o QR code PIX (exemplo)
$qrCodeImage = "img/qrcode_pix.png"; // Caminho para o QR code PIX
?>

<?php include_once("templates/header.php"); ?>

<body>
    <div class="container mt-5">
        <h1 class="text-center">Pagamento via PIX</h1>
        <p class="text-center">Por favor, escaneie o QR Code abaixo para finalizar o pagamento:</p>

        <div class="text-center">
            <img src="img/pix/pix.png" alt="QR Code PIX" class="img-fluid" style="max-width: 300px;"/>
        </div>

        <div class="mt-4 text-center">
            <h3>Total a Pagar: R$ <?= number_format($total, 2, ',', '.') ?></h3> <!-- Exibe o total formatado -->
            <a class="btn btn-outline-danger">Aguarde Processando Pagamento</a>
            <br><br>
        </div>

    </div>

    <script>
        // Redireciona para a página "finalizado.php" após 30 segundos (30000 milissegundos)
        setTimeout(function() {
            window.location.href = "finalizado.php";
        }, 15000);
    </script>

</body>

<?php include_once("templates/footer.php"); ?>
