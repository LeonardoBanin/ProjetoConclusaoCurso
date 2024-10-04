<?php
// Inclui o cabeçalho da página
include_once("templates/header.php");

include_once("Controller/ProdController.php");

// include_once("Controller/connection.php");
// include_once("Controller/url.php");

$prodController = new ProdController($conn, $BASE_URL);

$count = 1;

// $stmt = $conn->prepare("SELECT * FROM produtos WHERE id = :id");

$ProdId = $prodController->findById($_GET["sessionid"]);

// $stmt->bindParam(":id", $ProdId);

// $stmt->execute();

$_SESSION['code_has_run'] = null;

?>

<body>

    <link rel="stylesheet" href="css/prostyle.css">

    <!-- CONTAINER GERAL DA PÁGINA -->
    <main>
        <section id="container_primario">
            <!-- PRIMEIRA SECTION COM OS ANGULOS DO PRODUTO -->
            <section id="coluna_side">

                <!-- DIVS COM IMAGENS -->
                <div class="div_side">
                    <img src="img/products/<?= $ProdId["image"] ?>" alt="" class="img_side">
                </div>
                <div class="div_side">
                    <label for=""><img src="img/products/<?= $ProdId["image"] ?>" alt="" class="img_side"></label>
                </div>
                <div class="div_side">
                    <label for=""><img src="img/products/<?= $ProdId["image"] ?>" alt="" class="img_side"></label>
                </div>
            </section>
            <!-- SECTION COM A IMAGEM PRINCIPAL DO PRODUTO -->
            <section class="principal">
                <div class="div_img_principal">
                    <img src="img/products/<?= $ProdId["image"] ?>" alt="" id="img_principal">
                </div>

            </section>

            <!-- SECTION COM INFORMAÇÕES DO PRODUTO E BOTÕES DE FINALIZAÇÃO -->
            <section class="texto">

                <!-- INFORMAÇÕES -->
                <p class="nome_produto">
                    <?= $ProdId["name"] ?> <br>
                </p>
                <!-- DESCONTO -->
                <p class="desconto">
                    30% desconto
                </p>

                <!-- PREÇO -->
                <p class="preco">
                    R$
                    <?= $ProdId["preco"] ?>
                </p>
                <!-- PARCELAS POSSIVEIS PARA O PRODUTO (O BOOTSTRAP NAO ESTA FUNCIONANDO)-->
                <!-- <p class="sem_juros">
                    Até 8x sem juros
                <div class="btn-group">
                    <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Parcelamento
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">1x SEM JUROS</a></li>
                        <li><a class="dropdown-item" href="#">2x SEM JUROS</a></li>
                        <li><a class="dropdown-item" href="#">3x SEM JUROS</a></li>
                        <li><a class="dropdown-item" href="#">4x SEM JUROS</a></li>
                        <li><a class="dropdown-item" href="#">5x SEM JUROS</a></li>
                        <li><a class="dropdown-item" href="#">6x SEM JUROS</a></li>
                        <li><a class="dropdown-item" href="#">7x SEM JUROS</a></li>
                        <li><a class="dropdown-item" href="#">8x SEM JUROS</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Separated link</a></li>
                    </ul>
                </div>
                </p> -->

                <br><br>
                <!-- CEP -->
                <!-- <div class="cep_enviar">
                    <div class="texto_cep">
                        Calcular frete e entrega
                        <div class="input-group mb-3">
                            <button class="btn btn-outline-danger" type="button" id="button-addon1">CEP<button>
                                    <input type="text" class="form-control" placeholder=""
                                        aria-label="Example text with button addon" aria-describedby="button-addon1">
                        </div>
                    </div> -->
                    <!-- ENVIAR -->
                    <div>
                        <a id="enviar" class="btn btn-outline-danger" style="width:250px;"
                            href="carrinho.php?prod=<?php echo $ProdId["id"]; ?>">Adicionar ao carrinho</a>
                    </div>
                </div>
            </section>
        </section>

        <br><br>

        <!-- DIVISÃO DE TELA -->
        <div >
        <?= $ProdId["description"] ?>

        </div>
        <hr class="meia_tela">
        <br><br><br>


        <!-- TITULO SECUNDÁRIO -->
        <p id="titulo_secundario">Você também pode gostar</p>

        <!-- SECTION CONTAINER -->
        <section class="secundaria">
            <?php

            $stmt = $conn->prepare("SELECT * FROM produtos");
            $stmt->execute();

            $seccount = 0;

            ?>

            <?php foreach ($stmt as $produtos): ?>
                <?php if ($seccount < 3 && $produtos["id"] != $_GET["sessionid"]): ?>
                <!--  2 -->
                <div class="produto">
                    <img src="img/products/<?= $produtos["image"] ?>" alt="">
                    <br>
                    <p><?= $produtos["name"] ?></p>

                    <br>

                    <p class="preco_secundario">R$ <?= $produtos["preco"]  ?></p>
                </div>

                <?php $seccount ++; ?>
                <?php endif; ?>
            <?php endforeach; ?>
        </section>
    </main>
</body>

</html>
<?php
include_once("templates/footer.php");
?>