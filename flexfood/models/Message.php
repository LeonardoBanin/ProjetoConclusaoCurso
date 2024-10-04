<?php

// A classe Message é utilizada para gerenciar mensagens de feedback para o usuário.
class Message {

    // URL base para redirecionamentos
    private $url;

    // Construtor recebe a URL base como parâmetro
    public function __construct($url) {
        $this->url = $url;
    }

    // Função que insere a mensagem
    // O método setMessage é responsável por definir a mensagem e o tipo no array $_SESSION e, opcionalmente, redirecionar o usuário para uma determinada página. Se o redirecionamento for definido como "back", ele volta para a página anterior usando $_SERVER["HTTP_REFERER"].
    public function setMessage($msg, $type, $redirect = "index.php") {

        // Define a mensagem e o tipo na sessão
        $_SESSION["msg"] = $msg;
        $_SESSION["type"] = $type;

        // Caso o usuário erre a senha, retorna para a mesma página   
        if ($redirect != "back") {
            // Redireciona para a página especificada
            header("Location: $this->url" . $redirect);
        } else {
            // Volta para a página anterior
            header("Location: " . $_SERVER["HTTP_REFERER"]);
        }
    }

    // Função que exibe a mensagem
    // O método getMessage retorna um array contendo a mensagem e o tipo, se existirem, caso contrário, retorna false.
    public function getMessage() {

        // Verifica se há mensagens na sessão
        if (!empty($_SESSION["msg"])) {
            // Retorna um array com a mensagem e o tipo
            return [
                "msg" => $_SESSION["msg"],
                "type" => $_SESSION["type"]
            ];
        } else {
            // Retorna false se não houver mensagem
            return false;
        }
    }

    // Função que limpa a mensagem
    // O método clearMessage limpa as mensagens armazenadas em $_SESSION["msg"] e $_SESSION["type"].
    public function clearMessage() {
        // Limpa as mensagens armazenadas na sessão
        $_SESSION["msg"] = "";
        $_SESSION["type"] = "";
    }

}
