<?php
require_once 'Categoria.php';
class CategoriaDAO { 
    private $pdo;

    public function __construct(PDO $pdo){
        $this->pdo = $pdo;
    }

    public function adicionar(Categoria $categoria){
        $sql = $this->pdo->prepare("INSERT INTO categorias (nome, codigo) VALUES (:nome, :codigo)");
        $sql->bindValue(':nome', $categoria->getNome());
        $sql->bindValue(':codigo', $categoria->getCodigo());
        $sql->execute();        
    }

    public function listar(){
        $array = [];
        $sql = $this->pdo->query("SELECT * FROM categorias");
        if($sql->rowCount()>0) {
            $data = $sql->fetchAll();
            foreach ($data as $item) {
                $categoria = new Categoria();
                $categoria->setId($item['id']);
                $categoria->setNome($item['nome']);
                $categoria->setCodigo($item['codigo']);

                $array [] = $categoria;
                
            }
        }
        return $array;
    }

    public function pegarPeloId($id){
        $sql = $this->pdo->prepare("SELECT * FROM categorias WHERE id= :id");
        $sql->bindValue(':id', $id);
        $sql->execute();
        if($sql->rowCount()>0){
            $item = $sql->fetch();
            
            $categoria = new Categoria();

            $categoria->setId($item['id']);
            $categoria->setNome($item['nome']);
            $categoria->setCodigo($item['codigo']);
           

            return $categoria;
        } else {
            return false;
        }
    }
    
    public function deletar($id){
        $sql = $this->pdo->prepare("DELETE FROM categorias WHERE id= :id");
        $sql->bindValue(':id', $id);
        $sql->execute();
    }

    public function atualizar($categoria){
        $sql = $this->pdo->prepare("UPDATE categorias SET nome = :nome, codigo = :codigo WHERE id = :id ");
        $sql->bindValue(':id',$categoria->getId());
        $sql->bindValue(':nome', $categoria->getNome());
        $sql->bindValue(':codigo', $categoria->getCodigo());                
        $sql->execute();

        return true;
    }

    public function validarCategoria($nome, $codigo){
        $sql = $this->pdo->prepare("SELECT * FROM categorias WHERE nome = :nome, codigo = :codigo");
        $sql->bindValue(':nome', $nome);
        $sql->bindValue(':codigo', $codigo);
        $sql->execute();
        if($sql->rowCount()>0){
            $data = $sql->fetch();

            $categoria = new Categoria();
            $categoria->setId($data['id']);
            $categoria->setNome($data['nome']);
            $categoria->setCodigo($data['codigo']);

            return $categoria;
        } else {
            return true;
        }
    }
    
}