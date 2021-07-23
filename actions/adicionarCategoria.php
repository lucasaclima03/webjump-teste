<?php
require_once '../Conexao.php';
require_once '../classes/CategoriaDAO.php';
require_once '../classes/Categoria.php';

$categoriaDAO = new CategoriaDAO($pdo);

$nome = filter_input(INPUT_POST, 'nome');
$codigo = filter_input(INPUT_POST, 'codigo');


if($nome && $codigo) {
    if($categoriaDAO->validarCategoria($nome,$codigo) === true) {
        $categoria = new Categoria();

        $categoria->setNome($nome);
        $categoria->setCodigo($codigo);
    
        $categoriaDAO->adicionar($categoria);
        
        header('Location: ../pages/categories.php');
        exit;      
    } else {
        echo "Erro! Nome/código já existem no banco de dados" ;
    }    
    
} else {
    echo "Erro! Verifique se todos os campos foram preenchidos." ;
} ?>
<a href="../pages/addCategory.php"> Voltar ao cadastro</a>
