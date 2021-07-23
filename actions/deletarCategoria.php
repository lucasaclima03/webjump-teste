<?php
require_once '../Conexao.php';
require_once '../classes/CategoriaDAO.php';

$categoria = new CategoriaDAO($pdo);

$id = filter_input(INPUT_GET, 'id');

if($id){
    $categoria->deletar($id);
}

header('Location: ../pages/categories.php');
exit;