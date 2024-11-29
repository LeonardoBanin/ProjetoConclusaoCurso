<?php

require_once("templates/header_logout.php");

if ($userController) {
  $_SESSION["email"] = "";

  $userController->destroyToken();
} else {

  $_SESSION["email"] = "";
  header("location: index.php");
}