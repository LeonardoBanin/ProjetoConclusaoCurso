<?php

  // Inicia a sessão
  // inicia ou resume uma sessão existente. Isso é necessário para utilizar variáveis de sessão no PHP.
  session_start();

  // Definição da URL base
  // é definido como a URL base do projeto. Isso pode ser útil para criar URLs absolutas ao invés de URLs relativas, facilitando a navegação entre páginas.
  $BASE_URL = "http://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI'] . '?') . '/';

