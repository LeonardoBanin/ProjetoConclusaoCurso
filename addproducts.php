<?php

require_once("templates/header.php");
require_once("models/message.php");

?>

<?php if ($_SESSION["email"] === "olerianoleonardo@gmail.com"): ?>

    <div class="container align-items-center justify-content-center mt-5 mb-5 createprod-container">

        <div class="mb-3 mt-3">
            <h1>Adicionar Produtos ao banco de dados</h1>
        </div>

        <form action="<?= $BASE_URL ?>config/process.php" method="POST">

            <div class="col-md-6 mb-3 mt-3">
                <label for="name">Nome</label>
                <input class="form-control" id="name" name="name" type="text" placeholder="Coxinha...">
            </div>
            <div class="col-md-6 mb-3 mt-3">
                <label for="preco">Preço</label>
                <input class="form-control" id="preco" name="preco" type="text" placeholder="123,45">
            </div>
            <div class="col-md-6 mb-3 mt-3">
                <label for="category">Categoria</label>
                <input class="form-control" id="category" name="category" type="text" placeholder="Salgados">
            </div>
            <div class="col-md-6 mb-3 mt-3">
                <label for="image">Nome da imagem</label>
                <input class="form-control" id="image" name="image" type="text" placeholder="produto (4).png">
            </div>
            <div class="col-md-6 mb-3 mt-3">
                <label for="description">Descrição</label>
                <textarea class="form-control" id="description" name="description"
                    placeholder="Com catupiry"></textarea>
            </div>

            <div class="mb-3 mt-3">
                <input type="hidden" name="type" value="createprod">

                <button type="submit">Adicionar Produto</button>
            </div>

        </form>

    </div>

    <div>
        
    </div>

<?php else: ?>

    <div class="align-items-center mt-5 mb-5">
        <h1>Access Forbidden</h1>

        <p>you are not authorized to access this page.</p>

        <a href="index.php"> click here to be redirected back to main page</a>

    </div>

<?php endif; ?>


<?php

require_once("templates/footer.php");

?>