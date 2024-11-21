<?php

  // Definição das credenciais do banco de dados
  // $host, $dbname, $user, e $pass são as variáveis que armazenam as informações de conexão    (hostname, nome do banco de dados, nome de usuário e senha, respectivamente).
  $host = "localhost";
  $dbname = "flexfood";
  $user = "root";
  $pass = "";

  // Criação de uma nova instância do PDO para estabelecer a conexão 
  // A linha $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass); cria uma nova instância da classe PDO para conectar ao banco de dados MySQL usando as informações fornecidas.
  $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

  // Configurações adicionais para gerenciar erros e preparação de instruções SQL
  // As configurações $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); e $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); ajustam o modo de erro e a emulação de instruções preparadas, respectivamente.
  
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

 