<?php

// Inclui arquivos externos necessários
require_once("config/url.php");
require_once("config/connection.php");
require_once("models/Message.php");
require_once("Controller/UserController.php");

// Cria uma instância da classe Message para exibir mensagens do sistema
$message = new Message($BASE_URL);

// Obtém mensagens flash (mensagens temporárias exibidas uma única vez)
$flassMessage = $message->getMessage();

// Limpa a mensagem flash após exibi-la
if (!empty($flassMessage["msg"])) {
    $message->clearMessage();
}

// Cria uma instância da classe UserController para gerenciar operações relacionadas a usuários
$userController = new UserController($conn, $BASE_URL);

// Verifica se o usuário está autenticado
$userData = $userController->verifyToken(false);

if (!isset($_SESSION["email"])) {
    $_SESSION["email"] = "";
}

?>

<?php if ($_SESSION["email"] != ""): ?>

    <?php
    include_once("templates/header.php");
    ?>

<div class="container mt-5 mb-5">
    <h1 class="text-center">Formas de Pagamento</h1>
    <p class="text-center text-muted">Escolha a forma de pagamento e preencha os dados necessários.</p>
</div>

<div class="payment-options container align-items-center">
    <div class="row">

        <!-- Cartão de Crédito -->
        <div class="col-12 col-md-6 mb-4">
            <div class="card border-danger shadow">
                <div class="card-body">
                    <h5 class="card-title text-danger text-center">Cartão de Crédito</h5>
                    <form action="process_credit_payment.php" method="POST">
                        <div class="mb-3">
                            <label for="creditCardNumber" class="form-label">Número do Cartão</label>
                            <input type="text" class="form-control" id="creditCardNumber" name="creditCardNumber" maxlength="16" placeholder="0000 Número do Cartão" required>
                        </div>
                        <div class="mb-3">
                            <label for="creditExpiryDate" class="form-label">Data de Validade</label>
                            <input type="month" class="form-control" id="creditExpiryDate" name="creditExpiryDate" required>
                        </div>
                        <div class="mb-3">
                            <label for="creditCVV" class="form-label">Código de Segurança (CVV)</label>
                            <input type="text" class="form-control" id="creditCVV" name="creditCVV" maxlength="3" placeholder="Código de Segurança (CVV)" required>
                        </div>
                        <div class="mb-3">
                            <label for="creditCardName" class="form-label">Nome Completo do Titular</label>
                            <input type="text" class="form-control" id="creditCardName" name="creditCardName" placeholder="Nome Completo do Titular" required>
                        </div>
                        <div class="mb-3">
                            <label for="creditCardCPF" class="form-label">CPF do Titular</label>
                            <input type="text" class="form-control" id="creditCardCPF" name="creditCardCPF" maxlength="14" placeholder="CPF do Titular" required>
                        </div>
                        <button type="button" 
                            class="btn btn-text-white fw-bold w-100" 
                            onclick="window.location.href='finalizado.php'">
                        Cartão de Credito 
                    </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Cartão de Débito -->
        <div class="col-12 col-md-6 mb-4">
            <div class="card border-danger shadow">
                <div class="card-body">
                    <h5 class="card-title text-danger text-center">Cartão de Débito</h5>
                    <form action="process_debit_payment.php" method="POST">
                        <div class="mb-3">
                            <label for="debitCardNumber" class="form-label">Número do Cartão</label>
                            <input type="text" class="form-control" id="debitCardNumber" name="debitCardNumber" maxlength="16" placeholder="Número do Cartão" required>
                        </div>
                        <div class="mb-3">
                            <label for="debitExpiryDate" class="form-label">Data de Validade</label>
                            <input type="month" class="form-control" id="debitExpiryDate" name="debitExpiryDate" required>
                        </div>
                        <div class="mb-3">
                            <label for="debitCVV" class="form-label">Código de Segurança (CVV)</label>
                            <input type="text" class="form-control" id="debitCVV" name="debitCVV" maxlength="3" placeholder="Código de Segurança (CVV)" required>
                        </div>
                        <div class="mb-3">
                            <label for="debitCardName" class="form-label">Nome Completo do Titular</label>
                            <input type="text" class="form-control" id="debitCardName" name="debitCardName" placeholder="Nome Completo do Titular" required>
                        </div>
                        <div class="mb-3">
                            <label for="debitCardCPF" class="form-label">CPF do Titular</label>
                            <input type="text" class="form-control" id="debitCardCPF" name="debitCardCPF" maxlength="14" placeholder="CPF do Titular" required>
                        </div>
                        <button type="button" 
                            class="btn btn-text-white fw-bold w-100"
                            onclick="window.location.href='finalizado.php'">
                        Cartão de Debito
                    </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Pix -->
        <div class="col-12">
            <div class="card border-danger shadow">
                <div class="card-body text-center">
                    <h5 class="card-title text-danger">Pague com Pix</h5>
                    <p class="text-muted">Clique no botão abaixo para ser redirecionado para a página de pagamento via Pix.</p>
                    <button type="button" 
                            class="btn btn-text-white fw-bold w-100" 
                            onclick="window.location.href='pagamento.php'">
                        Pagar com Pix
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>





<br>
<br>

<?php else: ?>

    <?php header("location: login.php"); ?>

<?php endif; ?>

<?php
include_once("templates/footer.php");
?>
