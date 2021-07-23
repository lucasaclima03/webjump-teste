<?php
require_once 'Produto.php';

class ProdutoDAO {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function adicionar(Produto $produto){
        $sql = $this->pdo->prepare("INSERT INTO produtos (sku, nome, preco, descricao, quantidade, categoria) VALUES (:sku, :nome, :preco, :descricao, :quantidade, :categoria)");
        $sql->bindValue(':sku', $produto->getSku());
        $sql->bindValue(':nome', $produto->getNome());
        $sql->bindValue(':preco', $produto->getPreco());
        $sql->bindValue(':descricao', $produto->getDescricao());
        $sql->bindValue(':quantidade', $produto->getQuantidade());
        $sql->bindValue(':categoria', $produto->getCategoria());
        $sql->execute();

        $produto->setId($this->pdo->lastInsertId());
        return $produto;
        
    
    }

    public function listar(){
        $array = [];
        $sql = $this->pdo->query("SELECT * FROM produtos");        
        if ($sql->rowCount()>0) {
            $data = $sql->fetchAll();
            foreach($data as $item){
                $produto = new Produto();
                $produto->setId($item['id']);
                $produto->setSku($item['sku']);
                $produto->setNome($item['nome']);
                $produto->setPreco($item['preco']);
                $produto->setDescricao($item['descricao']);
                $produto->setQuantidade($item['quantidade']);
                $produto->setCategoria($item['categoria']);

                $array[] = $produto;
            }
        }
           
        return $array;
    }

    public function pegarPeloId($id){
        $sql = $this->pdo->prepare("SELECT * FROM produtos WHERE id= :id");
        $sql->bindValue(':id', $id);
        $sql->execute();
        if($sql->rowCount()>0){
            $item = $sql->fetch();
            
            $produto = new Produto();

            $produto->setId($item['id']);
            $produto->setSku($item['sku']);
            $produto->setNome($item['nome']);
            $produto->setPreco($item['preco']);
            $produto->setDescricao($item['descricao']);
            $produto->setQuantidade($item['quantidade']);
            $produto->setCategoria($item['categoria']);

            return $produto;
        } else {
            return false;
        }

    }   

    public function deletar($id){
        $sql = $this->pdo->prepare("DELETE FROM produtos WHERE id= :id");
        $sql->bindValue(':id', $id);
        $sql->execute();
    }

    public function atualizar($produto){
        $sql = $this->pdo->prepare("UPDATE produtos SET sku = :sku, nome = :nome, preco = :preco, descricao = :descricao, quantidade = :quantidade, categoria = :categoria WHERE id = :id ");
        $sql->bindValue(':sku', $produto->getSku());
        $sql->bindValue(':nome', $produto->getNome());
        $sql->bindValue(':preco', $produto->getPreco());
        $sql->bindValue(':descricao', $produto->getDescricao());
        $sql->bindValue(':quantidade', $produto->getQuantidade());
        $sql->bindValue(':categoria', $produto->getCategoria());
        $sql->bindValue(':id',$produto->getId());
        $sql->execute();

        return true;
    }
    
}