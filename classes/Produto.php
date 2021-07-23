<?php

class Produto {
    
    private $id;
    private $sku;
    private $nome;
    private $preco;
    private $descricao;
    private $quantidade;
    private $categoria;

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = trim($id);
    }

    public function getSku(){
        return $this->sku;
    }

    public function setSku($sku){
        $this->sku = trim($sku);
    }

    public function getNome(){
        return $this->nome;
    }

    public function setNome($nome){
        $this->nome = ucwords(trim($nome));
    }

    public function getPreco(){
        return $this->preco;
    }

    public function setPreco($preco){
        $this->preco = trim($preco);
    }

    public function getDescricao(){
        return $this->descricao;
    }

    public function setDescricao($descricao){
        $this->descricao = $descricao;
    }
    
    public function getQuantidade(){
        return $this->quantidade;
    }

    public function setQuantidade($quantidade){
        $this->quantidade = trim($quantidade);
    }

    public function getCategoria(){
        return $this->categoria;
    }

    public function setCategoria($categoria){
        $this->categoria = ucwords(trim($categoria));
    }
    
    


}