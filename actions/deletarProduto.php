<?php
require_once '../Conexao.php';
require_once '../classes/ProdutoDAO.php';

$produto = new ProdutoDAO($pdo);

$id = filter_input(INPUT_GET, 'id');

if($id){
    $produto->deletar($id);
}

header('Location: ../pages/products.php');
exit;