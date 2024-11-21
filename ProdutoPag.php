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

    <!-- LINK DO CSS NO BODY??? -->
    <!-- <link rel="stylesheet" href="css/prostyle.css"> -->

    <!-- CONTAINER GERAL DA PÁGINA -->
    <main>
        <section id="container_primario row">
            
            <!-- PRIMEIRA SECTION COM OS ANGULOS DO PRODUTO -->
            <section id="coluna_side col">

                <!-- DIVS COM IMAGENS -->
                
                <div class="div_side" style="margin-top: 10px;">
                    <img src="img/products/<?= $ProdId["image"] ?>" alt="" class="img_side">
                </div>
                <div class="div_side" style="margin-top: 200px;">
                    <img src="img/products/<?= $ProdId["image"] ?>" alt="" class="img_side">
                </div>
                <div class="div_side" style="margin-top: 390px;">
                    <img src="img/products/<?= $ProdId["image"] ?>" alt="" class="img_side">
                </div>
            </section>

            <!-- SECTION COM A IMAGEM PRINCIPAL DO PRODUTO -->
            <section class="principal col-2 col-lg-6">
                <div class="w-100 top-50 start-0">
                    <img src="img/products/<?= $ProdId["image"] ?>" alt="" id="img_principal">
                </div>

            </section>

            <!-- SECTION COM INFORMAÇÕES DO PRODUTO E BOTÕES DE FINALIZAÇÃO -->
            <section class="texto col-10 w-100 col-lg-4">

                <!-- INFORMAÇÕES -->
                <p class="nome_produto fs-1 p-4">
                    <?= $ProdId["name"] ?> <br>
                </p>
                <!-- DESCONTO -->
                <p class="desconto p-0">
                    30% desconto
                </p>
                <p class="p-4 fs-6"><?= $ProdId["description"] ?></p>

                <!-- PREÇO -->
                <p class="preco">
                    R$
                    <?= $ProdId["preco"] ?>
                </p>         
                
                <!-- ENVIAR -->
                <div>
                    <a id="enviar" class="btn btn-outline-danger" style="width:250px;"href="carrinho.php?prod=<?php echo $ProdId["id"]; ?>">Adicionar ao carrinho</a>
                </div>
                <div>
                    <a id="voltar" class="btn btn-outline-danger mb-4" style="width:250px;"href="index.php">Voltar a loja</a>
                </div>
                
            </section>
        </section>

        

        <!-- DIVISÃO DE TELA -->
        <hr class="meia_tela">
        <br>


        <!-- TITULO SECUNDÁRIO -->
        <p id="titulo_secundario">Você também pode gostar</p>

        <!-- SECTION CONTAINER -->
        <section class="secundaria p-0">
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