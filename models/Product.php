<?php

// A classe Prod representa um usuário com propriedades como id, nome, email, etc.
class Prod {

    // Propriedades do usuário
    public $id;
    public $name;
    public $preco;
    public $category;
    public $image;
    public $userId;
    public $description;

    // Método para obter o nome completo do usuário
    public function getFullName($Prod) {
        return $Prod->name . " ";
    }

}

// A interface ProdInterface define os métodos que uma classe ProdController deve implementar
interface ProdInterface {

    // Método para construir um objeto Prod a partir de dados
    public function buildProd($data, $userId);

    // Métodos para criar, atualizar, verificar token, etc.
    public function create(Prod $Prod, $authProd = false);
    public function update(Prod $Prod, $redirect = true);
    public function verifyId($protected = false);
    public function findByName($name);
    public function findById($id);

}
