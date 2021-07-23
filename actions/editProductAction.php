<?php
require_once '../classes/Produto.php';
require_once '../classes/ProdutoDAO.php';
require_once '../Conexao.php';

$produtoDAO = new ProdutoDAO($pdo);

$id = filter_input(INPUT_POST, 'id');
$sku = filter_input(INPUT_POST, 'sku');
$nome = filter_input(INPUT_POST, 'nome');
$preco = filter_input(INPUT_POST, 'preco');
$descricao = filter_input(INPUT_POST, 'descricao');
$quantidade = filter_input(INPUT_POST, 'quantidade');
$categoria = filter_input(INPUT_POST, 'categoria');

if($id && $sku && $nome && $preco && $descricao && $quantidade && $categoria) {
    
    $produto = new Produto();

    $produto->setId($id); 
    $produto->setSku($sku);
    $produto->setNome($nome);
    $produto->setPreco($preco);
    $produto->setDescricao($descricao);
    $produto->setQuantidade($quantidade);
    $produto->setCategoria($categoria);
    
    $produtoDAO->atualizar($produto);

    header('Location: products.php');
    exit;

} else {
    
    echo "Erro ao cadastrar, verifique se todos os campos estão preenchidos corretamente!";
    
}

