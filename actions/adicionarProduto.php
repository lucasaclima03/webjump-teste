<?php
require_once '../classes/Produto.php';
require_once '../classes/ProdutoDAO.php';
require_once '../Conexao.php';
$produtoDAO = new ProdutoDAO($pdo);


$sku = filter_input(INPUT_POST, 'sku');
$nome = filter_input(INPUT_POST, 'nome');
$preco = filter_input(INPUT_POST, 'preco');
$descricao = filter_input(INPUT_POST, 'descricao');
$quantidade = filter_input(INPUT_POST, 'quantidade');
$categoria = filter_input(INPUT_POST, 'categoria');

if($sku && $nome && $preco && $descricao && $quantidade && $categoria) {
   
        
    $produto = new Produto();

    $produto->setSku($sku);
    $produto->setNome($nome);
    $produto->setPreco($preco);
    $produto->setDescricao($descricao);
    $produto->setQuantidade($quantidade);
    $produto->setCategoria($categoria);

    $produtoDAO->adicionar($produto);     

    header('Location: ../pages/addProduct.php'); 
    exit;         

} else {
    echo "Erro! Verifique todos os campos."; 
    }?> 
    <a href="../pages/addProduct.php"> Voltar ao cadastro</a>


