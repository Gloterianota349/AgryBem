<?php

namespace Controller;

use Model\Comentario;

class comentarioController{
    private $comentarioModel;
    public function __construct(){
        $this->comentarioModel = new Comentario();
    }

    //Cadastro de comentário
    public function cadastroComentario($comentario){
        if(empty($comentario)){
            return false;
        }

        return $this->comentarioModel->registerComentario($comentario);
    }

    // Buscar comentário
    public function getComentario($id, $comentario){
        return $this->comentarioModel->getComentarioInfo($id, $comentario);
    }

    //Atualizar comentário
    public function updateComentario($id, $comentario){
        if(empty($comentario)){
            return false;
        }

        return $this->comentarioModel->updateComentario($id, $comentario);
    }

    //Excluir cadastro do comentario
    public function deleteComentario($id){
        if(empty($id)){
            return false;
        }
        return $this->comentarioModel->deleteComentario($id);
    }

}
?>