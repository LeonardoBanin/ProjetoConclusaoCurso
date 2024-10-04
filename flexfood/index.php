<?php
include_once("templates/header.php");
?>


<video class="container-fluid" src="img/videos/video fundo site.mp4" muted autoplay loop width="min-content"></video>

<!-- Banner principal -->
<div class="container" id="banners-container">


  <div class="container" id="mini-banners">
    <div class="row justify-content-around">
      <div class="col-12 dark-bg-color" id="mini-banner-1">
        <h2>Bebidas</h2>
        <img src="img/products/produto (1).png" alt="Relógio 1">
        <a href="#">Compre Agora</a>
      </div>
      <div class="col-12 secondary-bg-color" id="mini-banner-2">
        <h2>Salgados</h2>
        <img src="img/products/produto (2).png" alt="Relógio 2">
        <a href="#">Compre Agora</a>
      </div>
      <div class="col-12 light-bg-color" id="mini-banner-3">
        <h2 class="secondary-color">Outros</h2>
        <img src="img/products/produto (3).png" alt="Relógio 3">
        <a href="#">Compre Agora</a>
      </div>
    </div>
  </div>
</div>

<!-- BEST SELLERS -->

<div class="container" id="best-sellers">
  <h2 class="title primary-color">Mais Pedidos</h2>
  <div class="row">

    <?php

    $count = 0;

    $stmt = $conn->prepare("SELECT * FROM produtos");

    $stmt->execute();

    ?>

    <?php foreach ($stmt as $produtos): ?>

      <?php if ($count < 4): ?>

        <div class="col-12 col-md-3">
          <div class="card primary-bg-color">
            <img src="img/products/<?= $produtos["image"] ?>" class="card-img-top img-fluid" alt="Relógio 1">
            <div class="card-body">
              <p class="card-category secondary-color">
                <?= $produtos["category"] ?>
              </p>
              <h5 class="card-title white-color">
                <?= $produtos["name"] ?>
              </h5>
              <p class="card-text primary-color">R$
                <?= $produtos["preco"] ?>
              </p>
              <a href="ProdutoPag.php?sessionid=<?php echo $produtos["id"]; ?>" class="btn btn-primary">Comprar</a>
            </div>
          </div>
        </div>

        <?php $count++; ?>

      <?php endif; ?>

    <?php endforeach; ?>
  </div>

  <!-- BANNER DESTAQUE -->

  <div class="container-fluid" id="bottom-banner">
    <div class="row">
      <div class="col-12 col-md-8">
        <p class="primary-color offer-subtitle"></p>
        <h2 class="light-color">Promoção</h2>
        <p class="secondary-color">Os melhores laches da cantina para você com desconto de até 50%</p>
        <a href="#" class="btn btn-primary">Comprar agora</a>
      </div>
      <div class="col-12 col-md-4">
        <img src="img/products/produto (6).png" alt="Relógio 6">
      </div>
    </div>
  </div>

  <!-- PRODUTOS -->

  <div class="container" id="products">
    <h2 class="title primary-color">Cantina</h2>
    <div class="row">
      <div class="col-12 col-md-3 d-none d-md-flex" id="products-banner">
        <img src="" alt="">
        <p class="secondary-color">Os melhores</p>
        <h3>Lanches</h3>
        <p class="primary-color">com os melhores preços</p>
      </div>
      <div class="col-12 col-md-9">
        <div class="row">

          <?php

          $count = 0;

          $stmt = $conn->prepare("SELECT * FROM produtos");

          $stmt->execute();

          ?>

          <?php foreach ($stmt as $produtos): ?>

            <?php if ($count < 8): ?>

              <?php $count++; ?>

              <div class="col-12 col-md-4">
                <div class="card primary-bg-color">
                  <img src="img/products/<?= $produtos["image"] ?>" class="card-img-top img-fluid" alt="Relógio">
                  <div class="card-body">
                    <p class="card-category">
                      <?= $produtos["category"] ?>
                    </p>
                    <h5 class="card-title white-color">
                      <?= $produtos["name"] ?>
                    </h5>
                    <p class="card-text primary-color"> R$
                      <?= $produtos["preco"] ?>
                    </p>
                    <a href="ProdutoPag.php?sessionid=<?php echo $produtos["id"]; ?>" class="btn btn-primary">Comprar</a>
                  </div>
                </div>
              </div>

            <?php endif; ?>

          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
include_once("templates/footer.php");
?>