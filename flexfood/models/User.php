<?php

// A classe User representa um usuário com propriedades como id, nome, email, etc.
class User {

    // Propriedades do usuário
    public $id;
    public $name;
    public $lastname;
    public $email;
    public $passw;
    public $image;
    public $bio;
    public $token;

    // Método para obter o nome completo do usuário
    public function getFullName($user) {
        return $user->name . " " . $user->lastname;
    }

    // Método para gerar um token aleatório
    public function generateToken() {
        return bin2hex(random_bytes(50));
    }

    // Método para gerar uma senha hash usando criptografia
    public function generatePassword($passw) {
        return password_hash($passw, PASSWORD_DEFAULT);
    }

    // Método para gerar um nome único para imagens
    public function imageGenerateName() {
        return bin2hex(random_bytes(60)) . ".jpg";
    }   
}

// A interface UserInterface define os métodos que uma classe UserController deve implementar
interface UserInterface {

    // Método para construir um objeto User a partir de dados
    public function buildUser($data);

    // Métodos para criar, atualizar, verificar token, etc.
    public function create(User $user, $authUser = false);
    public function update(User $user, $redirect = true);
    public function verifyToken($protected = false);
    public function setTokenToSession($token, $redirect = true);
    public function authenticateUser($email, $passw);
    public function findByEmail($email);
    public function findById($id);
    public function findByToken($token);
    public function destroyToken();
    public function changePassword(User $user);

}
