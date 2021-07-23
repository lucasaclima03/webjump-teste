<?php
$db_host = 'COLOQUE AQUI O SEU HOST';
$db_name = 'COLOQUE AQUI O NOME DO SEU BANCO DE DADOS';
$db_user = 'COLOQUE AQUI O SEU USUARIO';
$db_pass = 'COLOQUE AQUI A SUA SENHA';

$pdo = new PDO ("mysql:host=$db_host;dbname=$db_name",$db_user, $db_pass);