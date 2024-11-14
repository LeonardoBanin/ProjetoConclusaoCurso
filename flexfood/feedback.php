<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback - FlexFood</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="path/to/your/styles.css"> <!-- Insira o caminho correto para seus estilos -->
</head>
<body>

<?php
include_once("templates/header.php");
?>

<!-- HEADER -->
<header id="header">
    <!-- Adicione seu código de cabeçalho aqui -->
</header>

<!-- CONTEÚDO PRINCIPAL -->
<div class="container my-5">
    <h1>Feedback</h1>
    <p>Seu feedback é muito importante para nós. Preencha o formulário abaixo:</p>
    
    <form>
        <div class="form-group">
            <label for="name">Nome:</label>
            <input type="text" class="form-control" id="name" placeholder="Seu nome">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" placeholder="Seu email">
        </div>
        <div class="form-group">
            <label for="message">Mensagem:</label>
            <textarea class="form-control" id="message" rows="5" placeholder="Sua mensagem"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</div>

<!-- FOOTER -->
<footer id="footer">
    <!-- Copie o código do seu footer aqui -->
</footer>

<!-- BOOTSTRAP JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/js/bootstrap.js"></script>

</body>
</html>


<?php
include_once("templates/footer.php");
?>