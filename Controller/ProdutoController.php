<?php

namespace Controller;

use Model\Produto;

class ProdutoController{
    private $produtoModel;
    public function __construct(){
        $this->produtoModel = new Produto();
    }

    //Cadastro de produto
    public function cadastroProduto($nome, $preco, $categoria){
        if(empty($nome) or empty($preco) or empty($categoria)){
            return false;
        }

        return $this->produtoModel->registerProduto($nome, $preco, $categoria);
    }

    // Buscar informações do produto (pelo produto)
    public function getProdutoInfo($id, $nome, $preco, $categoria){
        return $this->produtoModel->getprodutoInfo($id, $nome, $preco, $categoria);
    }

    //Atualizar informações de cadastro do produto
    public function updateproduto($id, $nome, $preco){
        if(empty($nome) or empty($preco)){
            return false;
        }

        return $this->produtoModel->updateProduto($id, $nome, $preco);
    }

    //Excluir cadastro do produto
    public function deleteProduto($id){
        if(empty($id)){
            return false;
        }
        return $this->produtoModel->deleteProduto($id);
    }

}
?>