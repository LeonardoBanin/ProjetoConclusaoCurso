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

if (!isset($_SESSION["email"])) {
    $_SESSION["email"] = "";
}

if (!file_exists("carrinho_info/carrinho_" . $_SESSION["email"] . ".txt")) {
    $filename = "carrinho_info/carrinho_" . $_SESSION["email"] . ".txt";

    $myfile = fopen($filename, "a");

}

?>

<?php if ($_SESSION["email"] != ""): ?>

    <?php

    include_once("templates/header.php");

    include_once("Controller/ProdController.php");

    function __toString($f)
    {
        return $f->foo;
    }

    $prodController = new ProdController($conn, $BASE_URL);

    $count = 1;

    if (!isset($_GET["prod"])) {

        $ProdId = 0;

    } else {

        $ProdIdSingle = $prodController->findById($_GET["prod"]);

    }

    if (!isset($_SESSION['code_has_run'])) {
        if (isset($_SESSION["email"]) && isset($_GET["prod"])) {
            $filename = "carrinho_info/carrinho_" . $_SESSION["email"] . ".txt";

            $myfile = fopen($filename, "a");

            $txt = $_GET["prod"] . " ";
            fwrite($myfile, $txt);

            fclose($myfile);

            $_SESSION['code_has_run'] = true; // Set the flag indicating the code has run
        }
    }

    if (isset($_SESSION["email"])) {
        $filename = "carrinho_info/carrinho_" . $_SESSION["email"] . ".txt";

        $fts = file_get_contents($filename);

        $teste = explode(" ", $fts);

        // Use $teste array as needed...
    }

    ?>

    <div class="align-title-center d-flex text-align-center mt-5 mb-5">
        <h1>Carrinho</h1>
    </div>

    <div class="cart-itens-container container align-items-center" id="ProdIds">


        <!-- Coluna para a seção de produtos individuais -->
        <div class="col-12 col-md-12 col-sd-12 mb-5">
            <!-- Coluna para os produtos individuais -->
            <div class="row">
                <!-- Nova linha para os produtos individuais -->
                <!-- Repetir estrutura semelhante para cada produto -->
                <div class="col-12 col-md-12">

                    <?php if (isset($teste) && $teste > 0): ?>

                        <?php

                        foreach ($teste as $productId) {

                            $id = $productId;

                            $sql = "SELECT * FROM produtos WHERE id = :id"; // Using named parameter
                
                            // Prepare the SQL query
                            $stmt = $conn->prepare($sql);

                            // Bind the parameter
                            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

                            // Execute the query
                            $stmt->execute();

                            // Fetch the results
                            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                            // $prodId_array = $stmt->fetch() or die("fuck you");
                            if ($result >= 1) {
                                foreach ($result as $row) { ?>

                                    <form method="POST" action="remove_product.php?idtodel=<?= $row["id"] ?>">
                                        <!-- Coluna para um produto -->
                                        <div class="cart-card card primary-bg-color">
                                            <!-- Cartão do produto -->
                                            <div class="cart-card-image">
                                                <img src="img/products/<?= $row["image"] ?>" class="card-img-top img-fluid" alt="Relógio">
                                                <!-- <p class="">Quantidade:</p> -->

                                                <?php $amount = 1; ?>

                                <!-- <div class="plus-minus">
                                                    <div class="plus"><button type="button" name="plus">+</button></div>
                                                    <div class="amount" name="amount">
                                                        <?= $amount ?>
                                                    </div>
                                                    <div class="plus"><button type="button" name="minus">-</button></div>
                                                </div> -->
                                            </div>

                                            <div class="cart-card-body">
                                                <p class="">
                                                    <?= $row["category"] ?>
                                                </p>
                                                <h5 class="">
                                                    <?= $row["name"] ?>
                                                </h5>
                                                <p class="">R$
                                                    <?= $row["preco"] ?>
                                                </p>


                                                <input type='hidden' name='product_id' value="'<?= $row['id'] ?>'">
                                                <input class="btn btn-primary" type='submit' value='Remover do carrinho'>
                                                <button type="button" class="mt-3 btn btn-outline-light" onclick="window.location.href='pagamento-metodos.php'">FINALIZAR COMPRA</button>


                                            </div>
                                        </div>
                                    </form>
                                <?php }

                            } else { ?>
                                <!-- Coluna para um produto -->
                                <div class="cart-card card primary-bg-color">
                                    <!-- Cartão do produto -->

                                    <div class="cart-card-body">
                                        <h5 class="">
                                            Nenhum produto aqui... por enquanto ;
                                        </h5>
                                    </div>
                                </div>

                                <?php

                                ?>

                                <?php
                            }
                            ?>

                            <?php
                        }
                        ?>

                    <?php else: ?>

                        <!-- Coluna para um produto -->
                        <div class="cart-card card primary-bg-color">
                            <!-- Cartão do produto -->

                            <div class="cart-card-body">
                                <h5 class="">
                                    Nenhum produto aqui... por enquanto ;
                                </h5>
                            </div>
                        </div>

                    <?php endif; ?>
                </div>

            </div>
        </div>
    </div>

<?php else: ?>

    <?php header("location: login.php"); ?>

<?php endif; ?>

<?php
include_once("templates/footer.php");
?>