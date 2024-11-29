<?php
    include_once("templates/header.php");     
   
?>

    <div class="container col-11 col-md-9 mt-5 mb-5" id="login-container">

        <div class="row align-items-center gx-5">
            <div class="col-md-6 order-md-2">
                <h2><i class="bi bi-door-open"></i> Faça seu login</h2>

                <form id = "login-form" action="<?= $BASE_URL ?>config/process.php" method="POST">

                    <!-- Campo oculto para indicar o tipo de operação (login de usuário) -->
                    <input type="hidden" name="type" value="login">

                    <div class="form-group">  
                        <div class="mb-3">                        
                            <label for="email">E-mail:</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="exemplo@email.com">                        
                        </div>
                    </div>
                    <div class="form-group"> 
                        <div class=" mb-3">                        
                            <label for="password">Senha:</label>
                            <input type="password" class="form-control" id="passw" name="passw">                        
                        </div>
                    </div>
                    <input type="submit" class="btn btn-outline-danger" value="Entrar">   
                                 
                </form>
            </div>
            <div class="col-md-6 order-md-1">
                <div class="col-12">
                <img src="img/logo/1.png" alt="login de usuário" class="img-fluid" style = "width: 50%; height: 50%;">
                </div>
                <div class="col-12 mt-3" id="link-container">
                <a href="<?=$BASE_URL ?>cadastro.php" class="link-danger"><i class="bi bi-exclamation-circle-fill"></i> Ainda não tenho cadastro</a>
                </div>
            </div>
        </div>
    </div>

<?php
    include_once("templates/footer.php");
?>