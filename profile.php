<?php
  require_once("templates/header.php");

  // Verifica se usuário está autenticado
  require_once("models/User.php");
  require_once("Controller/UserController.php");

  $user = new User();
  $userController = new UserController($conn, $BASE_URL);
  
  // Receber id do usuário
  $id = filter_input(INPUT_GET, "id");

  if(empty($id)) {

    if(!empty($userData)) {

      $id = $userData->id;

    } else {

      $message->setMessage("Usuário não encontrado!", "error", "index.php");

    }

  } else {

    $userData = $userController->findById($id);

    // Se não encontrar usuário
    if(!$userData) {
      $message->setMessage("Usuário não encontrado!", "error", "index.php");
    }

  }

  $fullName = $user->getFullName($userData);

  if($userData->image == "") {
    $userData->image = "people-avatar-green.png";
  }

?>
  <div id="main-container" class="container mt-5 ">
    <div class="col-md-8 offset-md-2">
      <div class="row profile-container">
        <div class="col-md-12 about-container">
          <h1 class="page-title secondary-bg-color rounded"><?= $fullName ?></h1>
            <div id="profile-image-container" class="profile-image" style="background-image: url('<?= $BASE_URL ?>img/users/<?= $userData->image ?>')">
            </div>
            <h3 class="about-title">Sobre:</h3>
            <?php if(!empty($userData->bio)): ?>
                <p class="profile-description"><?= $userData->bio ?></p>
            <?php else: ?>
                <p class="profile-description h5 mb-5">O usuário ainda não escreveu nada aqui...</p>
            <?php endif; ?>
        </div>        
    </div>
  </div>
  
<?php
  require_once("templates/footer.php");
?>