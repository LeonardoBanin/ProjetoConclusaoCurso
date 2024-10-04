  <!-- FOOTER -->
  
  <footer id="footer">

    <!-- Imagens das Redes Sociais -->
    <div class="container-fluid" id="gallery">
        <!-- Container de largura total para a galeria de imagens -->
        <div class="row">
        <!-- Linha que contém seis colunas para as imagens -->
            <div class="col-6 col-md-2 image-container" id="insta1">
                <!-- Coluna para a imagem 1 -->
            </div>
            <div class="col-6 col-md-2 image-container" id="insta2">
                <!-- Coluna para a imagem 2 -->
            </div>
            <div class="col-6 col-md-2 image-container" id="insta3">
                <!-- Coluna para a imagem 3 -->
            </div>
            <div class="col-6 col-md-2 image-container" id="insta4">
                <!-- Coluna para a imagem 4 -->
            </div>
            <div class="col-6 col-md-2 image-container" id="insta5">
                <!-- Coluna para a imagem 5 -->
            </div>
            <div class="col-6 col-md-2 image-container" id="insta6">
                <!-- Coluna para a imagem 6 -->
            </div>
        </div>
    </div>
  <!-- Seção do rodapé -->
  
    <div class="container-fluid" id="footer-links-container">
        <!-- Container para os links do rodapé -->
        <div class="row">
        <!-- Linha que contém três colunas de links -->
            <div class="col-12 col-md-4 footer-column">
            <!-- Coluna para os links de páginas -->
                <h3>Páginas</h3>
                <!-- Título da seção de links -->
                <ul class="list-unstyled">
                    <!-- Lista não ordenada de links -->
                    <li class="mb-2"><a href="<?=$BASE_URL ?>index.php" class="secondary-color">Home</a></li>
                    <li class="mb-2"><a href="#" class="secondary-color">Categorias</a></li>
                    <li class="mb-2"><a href="#" class="secondary-color">Promoções</a></li>
                    <li class="mb-2"><a href="#" class="secondary-color">Contato</a></li>
                </ul>
            </div>
            <!-- Coluna central para informações da loja -->
            <div class="col-12 col-md-4 footer-column" id="footer-center">
                <h3>FlexFood</h3>
                <p class="secondary-color">Alguma dúvida? Ligue para nós</p>
                <p class="store-phone"><i class="bi bi-telephone"></i> (11) 98765-4321</p>
            </div>
            <!-- Coluna para os links de informações adicionais -->
            <div class="col-12 col-md-4 footer-column">
                <h3>Informações</h3>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="#" class="secondary-color">Política de Privacidade</a></li>
                    <li class="mb-2"><a href="#" class="secondary-color">Sobre nós</a></li>
                    <li class="mb-2"><a href="#" class="secondary-color">Feedback</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Seção de inscrição na newsletter e ícones de redes sociais -->
    <div class="container-fluid" id="newsletter-container">
        <div class="col-12">
            <div class="row">
                <p class="secondary-color">Fale conosco abaixo:</p>
                <form class="d-flex" id="news-form">
                    <i class="bi bi-envelope primary-color"></i>
                    <input class="form-control me-2" placeholder="Insira sua duvida">
                    <button class="btn secondary-bg-color" type="submit">Enviar</button>
                </form>
            </div>
        </div>
        <div class="col-12" id="social-container">
            <i class="bi bi-facebook"></i>
            <i class="bi bi-instagram"></i>
            <i class="bi bi-youtube"></i>
            <i class="bi bi-twitter"></i>
        </div>
    </div>
    <!-- Seção com informações de direitos autorais -->
    <div class="container" id="copy-container">
        <p>Todos os direitos reservados @2024 <span class="primary-color">FlexFood</span> - A melhor cantina online</p>
    </div>
</footer>

<!-- BOOTSTRAP JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/js/bootstrap.js" integrity="sha512-KCgUnRzizZDFYoNEYmnqlo0PRE6rQkek9dE/oyIiCExStQ72O7GwIFfmPdkzk4OvZ/sbHKSLVeR4Gl3s7s679g==" crossorigin="anonymous"></script>


</body>
</html>