<?php

// Incluindo os arquivos necessários para funcionamento
include_once("models/Product.php");
include_once("models/Message.php");

// Classe ProdController implementando a interface ProdInterface
class ProdController
{

    // Propriedades da classe
    private $conn;
    private $url;
    private $message;

    // Método construtor que recebe uma instância de PDO (conexão com o banco de dados) e a URL base
    public function __construct(PDO $conn, $url)
    {
        $this->conn = $conn;
        $this->url = $url;
        $this->message = new Message($url);
    }

    // Função que constrói o objeto Usuário a partir dos dados fornecidos
    public function BuildProd($data, $userId)
    {

        $Prod = new Prod();

        $Prod->name = $data["name"];
        $Prod->description = $data["description"];
        $Prod->id = $data["id"];
        $Prod->preco = $data["preco"];
        $Prod->category = $data["category"];
        $Prod->image = $data["image"];
        $Prod->id = $userId["id"];

        return $Prod;

    }

    // Função para criar um novo usuário no banco de dados
    public function create(Prod $Prod, $authProd = false)
    {

        $stmt = $this->conn->prepare("INSERT INTO produtos( name, preco, category, id, description, image ) VALUES ( :name, :preco, :category, :id, :description, :image  )");

        $stmt->bindParam(":name", $Prod->name);
        $stmt->bindParam(":preco", $Prod->preco);
        $stmt->bindParam(":category", $Prod->category);
        $stmt->bindParam(":id", $Prod->id);
        $stmt->bindParam(":description", $Prod->description);
        $stmt->bindParam(":image", $Prod->image);

        $stmt->execute();

    }

    public function findById($id)
    {

        // Verifica se o description não está vazio
        if ($id != "") {

            // Preparando a consulta SQL para buscar um usuário pelo description
            $stmt = $this->conn->prepare("SELECT * FROM produtos WHERE id = :id");

            // Substituindo o parâmetro na consulta SQL pelo valor do description
            $stmt->bindParam(":id", $id);

            // Executando a consulta SQL
            $stmt->execute();

            return $stmt->fetch();
        } else {
            // Caso o description esteja vazio, retorna false
            return "não tem ID inserido";
        }
    }


    public function AssignProductToCart($userName, $ProdName, $ProdId)
    {

    $stmt = $this->conn->prepare("INSERT INTO carrinho(
      nomeDoProduto, IDdoProduto 
    ) VALUES (
      :nomeDoProduto, :IDdoProduto
    ) WHERE nomeDaPessoa = :nomeDaPessoa");

        $stmt->bindParam(":nomeDaPessoa", $userName->name);
        $stmt->bindParam(":nomeDoProduto", $ProdName->name);
        $stmt->bindParam(":IDdoProduto", $ProdName->id);

        $stmt->execute();

    }


}