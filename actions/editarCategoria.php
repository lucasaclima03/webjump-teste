<?php
require_once '../Conexao.php';
require_once '../classes/CategoriaDAO.php';
require_once '../classes/Categoria.php';

$categoriaDAO = new CategoriaDAO($pdo);

$id = filter_input(INPUT_POST, 'id');
$nome = filter_input(INPUT_POST, 'nome');
$codigo = filter_input(INPUT_POST, 'codigo');

if($id && $nome && $codigo){
    
    $categoria = new Categoria();
    
    $categoria->setId($id);
    $categoria->setNome($nome);
    $categoria->setCodigo($codigo);

    $categoriaDAO->atualizar($categoria);

    header('Location: ../pages/categories.php');
    exit;

} else {
    echo "Erro ao cadastrar, verifique se todos os campos estão preenchidos corretamente!";
}