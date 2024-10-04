<?php

require_once("url.php");
require_once("connection.php");
include_once("../models/User.php");
require_once("../models/Message.php");
require_once("../models/Product.php");

require_once("../Controller/UserController.php");
require_once("../Controller/ProdController.php");


$message = new Message($BASE_URL);

$userController = new UserController($conn, $BASE_URL);

$prodController = new prodController($conn, $BASE_URL);

// Resgata o tipo do formulário
$type = filter_input(INPUT_POST, "type");

// Verificação do tipo de formulário
if ($type === "register") {

  $name = filter_input(INPUT_POST, "name");
  $lastname = filter_input(INPUT_POST, "lastname");
  $email = filter_input(INPUT_POST, "email");
  $passw = filter_input(INPUT_POST, "passw");
  $confirmpassw = filter_input(INPUT_POST, "confirmpassw");

  // Verificação de dados mínimos 
  if ($name && $lastname && $email && $passw) {

    // Verificar se as senhas batem
    if ($passw === $confirmpassw) {

      // Verificar se o e-mail já está cadastrado no sistema
      if ($userController->findByEmail($email) === false) {

        $user = new User();

        // Criação de token e senha
        $userToken = $user->generateToken();
        $finalPassword = $user->generatePassword($passw);

        $user->name = $name;
        $user->lastname = $lastname;
        $user->email = $email;
        $user->passw = $finalPassword;
        $user->token = $userToken;

        $auth = true;

        $userController->create($user, $auth);

        // $stmt = $conn->prepare("SELECT * FROM cadastro WHERE name = :name");

        // $stmt->bindParam(":name", $name);

        // $stmt->execute(); 

        // $userassign = $stmt->fetch();

        if ($userController->authenticateUser($email, $passw)) {

          $message->setMessage("Seja bem-vindo!", "success", "../profile.php");

          $_SESSION["email"] = $email;

          // Redireciona o usuário, caso não conseguir autenticar
        }

      } else {

        // Enviar uma msg de erro, usuário já existe
        $message->setMessage("Usuário já cadastrado, tente outro e-mail.", "error", "back");

      }

    } else {

      // Enviar uma msg de erro, de senhas não batem
      $message->setMessage("As senhas não são iguais.", "error", "back");

    }

  } else {

    // Enviar uma msg de erro, de dados faltantes
    $message->setMessage("Por favor, preencha todos os campos.", "error", "back");

  }

} else if ($type === "login") {

  $email = filter_input(INPUT_POST, "email");
  $passw = filter_input(INPUT_POST, "passw");

  // Tenta autenticar usuário
  if ($userController->authenticateUser($email, $passw)) {

    $_SESSION["email"] = $email;

    $message->setMessage("Seja bem-vindo!", "success", "../profile.php");

    // Redireciona o usuário, caso não conseguir autenticar
  } else {

    $message->setMessage("Usuário e/ou senha incorretos.", "error", "back");

  }

}

// Atualizar usuário
if ($type === "update") {

  // Resgata dados do usuário
  $userData = $userController->verifyToken();

  // Receber dados do post
  $name = filter_input(INPUT_POST, "name");
  $lastname = filter_input(INPUT_POST, "lastname");
  $email = filter_input(INPUT_POST, "email");
  $bio = filter_input(INPUT_POST, "bio");

  // Criar um novo objeto de usuário
  $user = new User();

  // Preencher os dados do usuário
  $userData->name = $name;
  $userData->lastname = $lastname;
  $userData->email = $email;
  $userData->bio = $bio;

  // Upload da imagem
  if (isset($_FILES["image"]) && !empty($_FILES["image"]["tmp_name"])) {

    $image = $_FILES["image"];
    $imageTypes = ["image/jpeg", "image/jpg", "image/png"];
    $jpgArray = ["image/jpeg", "image/jpg"];

    // Checagem de tipo de imagem
    if (in_array($image["type"], $imageTypes)) {

      // Checar se jpg
      if (in_array($image, $jpgArray)) {

        $imageFile = imagecreatefromjpeg($image["tmp_name"]);

        // Imagem é png
      } else {

        $imageFile = imagecreatefrompng($image["tmp_name"]);

      }

      $imageName = $user->imageGenerateName();

      imagejpeg($imageFile, "./img/users/" . $imageName, 100);

      $userData->image = $imageName;

    } else {

      $message->setMessage("Tipo inválido de imagem, insira png ou jpg!", "error", "back");

    }

  }

  $userController->update($userData);

  if ($userController->authenticateUser($email, $passw)) {

    $message->setMessage("informações alteradas com sucesso!", "success", "../profile.php");

    // Redireciona o usuário, caso não conseguir autenticar
  }

  // Atualizar senha do usuário
} else if ($type === "changepassword") {

  // Receber dados do post
  $passw = filter_input(INPUT_POST, "passw");
  $confirmpassw = filter_input(INPUT_POST, "confirmpassw");

  // Resgata dados do usuário
  $userData = $userController->verifyToken();

  $id = $userData->id;

  if ($passw == $confirmpassw) {

    // Criar um novo objeto de usuário
    $user = new User();

    $finalPassword = $user->generatePassword($passw);

    $user->passw = $finalPassword;
    $user->id = $id;

    $userController->changePassword($user);

  } else {
    $message->setMessage("As senhas não são iguais!", "error", "back");
  }

}

if ($type === "createprod") {

  $name = filter_input(INPUT_POST, "name");
  $description = filter_input(INPUT_POST, "description");
  $preco = filter_input(INPUT_POST, "preco");
  $category = filter_input(INPUT_POST, "category");
  $image = filter_input(INPUT_POST, "image");

  // Verificação de dados mínimos 
  if ($name && $description && $category && $preco) {

    // Verificar se o e-mail já está cadastrado no sistema

    $prod = new Prod();

    $prod->name = $name;
    $prod->description = $description;
    $prod->preco = $preco;
    $prod->category = $category;
    $prod->image = $image;

    $auth = true;

    $prodController->create($prod, $auth);


    $message->setMessage("Produto criado", "success", "../addproducts.php");

  } else {

    // Enviar uma msg de erro, de dados faltantes
    $message->setMessage("Por favor, preencha todos os campos.", "error", "back");

  }

}