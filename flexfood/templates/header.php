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

// Obtém dados do usuário com base no token (verifica se o usuário está autenticado)
$userData = $userController->verifyToken(false);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> FlexFood </title>
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

  <header>

    <!-- Inserindo a navbar -->
    <nav class="navbar navbar-expand-lg primary-bg-color py-4 px-2" id="navbar">
      <div class="container ">
        <!-- marca da loja -->
        <a class="navbar-brand" href="<?= $BASE_URL ?>index.php"> <img src="./img/logo/1.png" alt="logo1">
        </a>
        <div id="navbar-items">
          <!-- insere a div para limitar o espaço -->
          <div></div>
          <!-- formulario com display flex -->
          <form class="d-flex" id="search-form">
            <!-- ícone da lupa -->
            <i class="bi bi-search primary-color"></i>
            <input class="form-control me-2" type="search" placeholder="Encontre sua escola" aria-label="Search">
            <button class="btn secondary-bg-color" type="submit">SESI-166, Santo André - SP</button>
          </form>
          <ul class="navbar-nav">
            <?php if ($userData): ?>
              <li class="nav-item">
                <a href="<?= $BASE_URL ?>profile.php" class="nav-link bold"><i class="bi bi-person-circle"></i>
                  <?= $userData->name ?>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= $BASE_URL ?>editprofile.php" class="nav-link bold"><i class="bi bi-pencil"></i>
                  Editar
                </a>
              </li>

              <?php if ($_SESSION["email"] === "olerianoleonardo@gmail.com"): ?>
                <li class="nav-item">
                  <a href="<?= $BASE_URL ?>addproducts.php" class="nav-link bold"><i class="bi bi-bag-plus"></i>
                    newprod
                  </a>
                </li>
              <?php endif; ?>

              <li class="nav-item">
                <a href="<?= $BASE_URL ?>carrinho.php" class="nav-link bold"><i class="bi bi-cart"></i>
                  Carrinho
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= $BASE_URL ?>logout.php" class="nav-link"><i class="bi bi-door-open"></i> Sair</a>
              </li>
            <?php else: ?>
              <li class="nav-item">
                <a href="<?= $BASE_URL ?>cadastro.php" class="nav-link"><i class="bi bi-person-plus"></i> Cadastrar
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= $BASE_URL ?>login.php" class="nav-link"> <i class="bi bi-person"></i> Entrar</a>
              </li>
              <li class="nav-item">
                <a href="<?= $BASE_URL ?>carrinho.php" class="nav-link bold"><i class="bi bi-cart"></i>
                  Carrinho
                </a>
              </li>
            <?php endif; ?>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Segunda navbar -->

    <nav class="navbar navbar-expand-lg secondary-bg-color p-2" id="bottom-navbar-container">
      <div class="container ">
        <!-- menu hamburguer em mobile -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#bottom-navbar"
          aria-controls="bottom-navbar" aria-expanded="false" aria-label="Toggle navigation">
          <i class="bi bi-list"></i>
        </button>
        <ul class="navbar-nav mb-2 mb-lg-0 collapse navbar-collapse" id="bottom-navbar">
          <li class="nav-item">
            <a class="nav-link" href="index.php">
              Home
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php#best-sellers">
              Mais vendidos
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php#bottom-banner">
              Promoções
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php#products">
              Produtos
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#gallery">
              Contato
            </a>
          </li>
        </ul>
      </div>
    </nav>
    <!-- FIM NAVBAR -->
  </header>

  <!-- Mensagens do sistema -->
  <?php if (!empty($flassMessage["msg"])): ?>
    <div class="msg-container">
      <p class="msg <?= $flassMessage["type"] ?>">
        <?= $flassMessage["msg"] ?>
      </p>
    </div>
  <?php endif; ?>