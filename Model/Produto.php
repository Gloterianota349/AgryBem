<?php
// CRIAR PRODUTO
// OBTER TODAS AS INFORMAÇÕES DO PRODUTO

namespace Model;

use Exception;
use Model\Connection;

use PDO;
use PDOException;

class Produto {
    private $db;

    public function __construct() {
        $this->db = Connection::getInstance();
    }

    public function registerProduto ($nome, $preco, $categoria) {
        try {
            $sql = 'INSERT INTO produto (nome, preco, categoria) VALUES (:nome, :preco, :categoria)';

            $stmt = $this->db->prepare($sql);

            $stmt->bindParam(":nome", $nome, PDO::PARAM_STR);
            $stmt->bindParam(":preco", $preco, PDO::PARAM_STR);
            $stmt->bindParam(":categoria", $categoria, PDO::PARAM_STR);

            return $stmt->execute();
        }
        catch (PDOException $error) {
            echo "Erro ao executar o comando " . $error->getMessage();
            return false;
        }
    }

    public function getProdutoInfo ($id, $nome, $preco, $categoria) {
        try {
            $sql = "SELECT nome, preco, categoria FROM produto WHERE id = :id AND nome = :nome AND preco = :preco AND categoria = :categoria";

            $stmt = $this->db->prepare($sql);

            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->bindParam(":nome", $nome, PDO::PARAM_STR);
            $stmt->bindParam(":preco", $preco, PDO::PARAM_STR);
            $stmt->bindParam(":categoria", $categoria, PDO::PARAM_STR);
            
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        catch(PDOException $error) {
            echo "Erro ao buscar informações: " . $error->getMessage();
            return false;
        }
    }

    public function updateProduto ($id, $nome, $preco) {
        try {
            $sql = "UPDATE produto SET nome = :nome, preco = :preco WHERE id = :id";

            $stmt = $this->db->prepare($sql);

            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->bindParam(":nome", $nome, PDO::PARAM_STR);
            $stmt->bindParam(":preco", $preco, PDO::PARAM_STR);

            return $stmt->execute();
        }
        catch (PDOException $error) {
            echo "Erro ao executar o comando " . $error->getMessage();
            return false;
        }
    }

    public function deleteProduto ($id) {
        try {
            $sql = "DELETE FROM produto WHERE id = :id";

            $stmt = $this->db->prepare($sql);

            $stmt->bindParam(":id", $id, PDO::PARAM_INT);

            return $stmt->execute();
        }
        catch (PDOException $error) {
            echo "Erro ao executar o comando " . $error->getMessage();
            return false;
        }
    }
}

?>