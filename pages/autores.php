<?php 
include $diretorio.'/includes/includes.php';
include 'classes/dados/post.php';

include 'classes/dados/autor.php';

$postNeg = new PostDados();
$autorNeg = new AutorDados();
$autor = $autorNeg->listar('','nome');
foreach($autor as $au):
	$post = $postNeg->listar("autor='".$au->nome."'","data_atualizacao DESC",'');
	if($post[0]->id_post!=0):
		foreach($post as $p):
			$_item = new STDClass();
			$_item->id_autor = $au->id_autor;
			$_item->id_post = $p->id_post;
			//$autorNeg->gravar_relaciona($_item);
			echo $au->nome.' '.$p->titulo.'<br/>';
		endforeach;
	endif;
endforeach;
?>