<?php 
require_once("config/config.php");
require_once("classes/funcoes.php");
require_once("classes/dados/categoria.php");

$funcao = new Funcoes();
$catNeg = new CategoriaDados();

$menu = $catNeg->listar("","");
?>