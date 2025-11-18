<?php

namespace Model;

use Exception;
use Model\Connection;

use PDO;
use PDOException;

class Comentario {
    private $db;

    public function __construct() {
        $this->db = Connection::getInstance();
    }

    public function registerComentario ($comentario) {
        try {
            $sql = 'INSERT INTO comentario (comentario) VALUES (:comentario)';

            $stmt = $this->db->prepare($sql);

            $stmt->bindParam(":comentario", $comentario, PDO::PARAM_STR);

            return $stmt->execute();
        }
        catch (PDOException $error) {
            echo "Erro ao executar o comando " . $error->getMessage();
            return false;
        }
    }

    public function getComentarioInfo ($id, $comentario) {
        try {
            $sql = "SELECT comentario FROM comentario WHERE id = :id AND comentario = :comentario";

            $stmt = $this->db->prepare($sql);

            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->bindParam(":comentario", $comentario, PDO::PARAM_STR);
            
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        catch(PDOException $error) {
            echo "Erro ao buscar informações: " . $error->getMessage();
            return false;
        }
    }

    public function updateComentario ($id, $comentario) {
        try {
            $sql = "UPDATE comentario SET comentario = :comentario WHERE id = :id";

            $stmt = $this->db->prepare($sql);

            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->bindParam(":comentario", $comentario, PDO::PARAM_STR);

            return $stmt->execute();
        }
        catch (PDOException $error) {
            echo "Erro ao executar o comando " . $error->getMessage();
            return false;
        }
    }

    public function deleteComentario ($id) {
        try {
            $sql = "DELETE FROM comentario WHERE id = :id";

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