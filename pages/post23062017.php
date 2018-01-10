<?php 
include $diretorio.'/includes/includes.php';
include 'classes/dados/post.php';
include 'classes/dados/imagem.php';
include 'classes/dados/tag.php';

$postNeg = new PostDados();
$imgNeg = new ImagemDados();
$tagNeg = new TagDados();

if(is_numeric($url[1])):
	$lerPost[1] = (is_numeric($url[2]))?$url[2]:'';	
	$lerPost[2] = (is_numeric($url[3]))?$url[3]:'';	
	$lerPost[3] = $funcao->retirarAcento($url[4]);	
	//print_r($lerPost);
	$postId = $postNeg->ler_id($lerPost);		
	$postA = $postNeg->ler($postId->id_post);	
	$categoriaA = $catNeg->listar('f.id_post='.$postId->id_post,'c.nome','relaciona');
	$categoria_pg = '<a href="'.URL.$url[0].'">'.$categoriaA[0]->nome.'</a>';
	$imagemA = $imgNeg->listar('id_post="'.$postId->id_post.'"','destaque');
	//print_r($postId);
	if($imagemA[0]->id_imagem!=0):
	$img_pg = URL.'data/post/'.$funcao->adicionar_sufixo($imagemA[0]->imagem,'_home');
	endif;
	$titulo_pg=$postA->titulo;	
	$lead_pg=$postA->lead;
	$txt_pg=$postA->texto;
	$autor_pg=$postA->autor;
	$data_pg=$postA->data;
	$url_pg=URL.$url[0].'/'.$funcao->dataBr($postA->data).'/'.$postA->slug;
	
	$data_completa = $funcao->dataParte($data_pg,'dia'). ' de '.$funcao->mes($funcao->dataParte($data_pg,'mes'),'extenso');
	
	$tags = $tagNeg->listar('f.id_post='.$postId->id_post,'','relaciona','post','c.id_tag');
	//echo $tags;
	$post = $postNeg->listar("p.id_post!='".$postId->id_post."' AND p.status='Publicado' AND c.slug='".$url[0]."'","p.data_atualizacao DESC LIMIT 3","categoria");
	
else:
	//echo 'aqui';
	//listagem
	//Pegar a página atual por GET 
	//echo "p.id_sessao='".$_sessao[0]->id_sessao."' AND c.nome LIKE '".$url[0]."'";
	$pg = ($url[0]!='tag')?$url[1]:$url[3]; 
	//echo $pg;
	//Verifica se a variável tá declarada, senão deixa na primeira página como padrão 
	if(isset($pg)) { $pg = $pg; } else { $pg = 1; } 
	
	//Defina aqui a quantidade máxima de registros por página. 
	$qnt = 30; 
	//O sistema calcula o início da seleção calculando: 
	//(página atual * quantidade por página) - quantidade por página 
	$comeco = ($pg*$qnt) - $qnt;
	
	$query = ($url[0]!='tag')?"c.slug='".$url[0]."'":"t.slug='".$url[1]."'";
	$tipo = ($url[0]!='tag')?"categoria":"busca";
	$slug_pg = ($url[0]!='tag')?$url[0]:$url[1];
	//echo $query;
	$postTotal = $postNeg->listar($query,"data_atualizacao DESC",$tipo);
	$total = count($postTotal);
	
	$post = $postNeg->listar("p.status='Publicado' AND ".$query,"p.data_atualizacao DESC LIMIT ".$comeco.", ".$qnt,$tipo,'p.id_post');
	
	//print_r($post);
	if($url[0]!='tag'):
		$categoria_pg = ($post[0]->id_post!=0)?$post[0]->categoria_nome:'';
		$titulo_pg = $categoria_pg;
	else:
		$tag = $tagNeg->listar("slug='".$url[1]."'",'');
		$categoria_pg = $tag[0]->nome;
		$titulo_pg = 'Tag: '.$categoria_pg;
	endif;
endif;
?>
<!doctype html>
<html class="no-<?php echo ROOT?>js/" lang="en">

  <?php include $diretorio.'/includes/header.php';?>
  <body>
	
	<?php include $diretorio.'/includes/topo.php';?>
   
   <div class="row collapse">
   		<div id="conteudo">

           <div class="row">
                <div class="small-12 medium-8 medium-centered columns">
                    <article>
                        <div class="intro">
                            <div class="tag"><?php echo $categoria_pg?></div>
        <?php if(is_numeric($url[1])):?>
                            <h1><?php echo $titulo_pg?></h1>
                            <span class="autor"><?php echo $data_completa?> | <?php echo $autor_pg?></span>
		<?php endif;?>							
                        </div>
        <?php if(is_numeric($url[1])):?>						
                        <div class="texto">
                        	<?php echo $txt_pg?>
                        </div>
                        <div class="midias">
                        	<div class="row collapse">
                            	<div class="small-12 medium-8 columns">
                                	<ul>
										<li><?php echo $categoria_pg?></li>
										<?php 
										if($tags[0]->id_tag!=0):
										foreach($tags as $tag): 
										?>
										<li><a href="<?php echo URL.'tag/'.$tag->slug?>"><?php echo $tag->nome?></a></li>
										<?php 
										endforeach; 
										endif;
										?> 
                                    </ul>
                                </div>
                            	<div class="small-12 medium-4 columns">
                                	<ul class="share">
                                    	<li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $url_pg?>" class="popup"><img src="<?php echo ROOT?>img/ico-facebook-share.png" alt="Compartilhe no Facebook" /></a></li>
                                        <li><a href="http://twitter.com/home?status=<?php echo $titulo_pg?> by @hoop78 <?php echo $url_pg?>" class="popup"><img src="<?php echo ROOT?>img/ico-twitter-share.png" alt="Compartilhe no Twitter" /></a></li>
                                    </ul>
                                </div>                                
                            </div>
                        </div>
                        
                        
                        <div id="facebook">
							<div class="row">
								<div class="small-12 columns text-center">
									<p>Curta a Hoop78 no Facebook</p>
									<div class="fb-like" data-href="https://www.facebook.com/hoop78/" data-layout="button" data-action="like" data-size="large" data-show-faces="false" data-share="true"></div>
                    		 	</div>	
                     		 </div>
                       </div>
                       
<!--                       <div class="hide-for-small">
							<div class="row collapse">
								<div class="medium-12 columns" style="margin-bottom:30px;">
									<a href="http://www.nobones.com.br" onclick="trackOutboundLink('http://www.nobones.com.br');return false;"><img src="<?php echo ROOT?>img/banner/banner-hoop-desk.jpg" /></a>
								</div>
							</div>
						</div>
                       
                       <div class="show-for-small only">
							<div class="row collapse">
								<div class="medium-12 columns" style="margin:20px 0;">
									<a href="http://www.nobones.com.br" onclick="trackOutboundLink('http://www.nobones.com.br');return false;"><img src="<?php echo ROOT?>img/banner/banner-hoop-mob.jpg" /></a>
								</div>
							</div>
						</div>       -->                
                        
                        <div class="comentarios">
                        	<div class="row">
                            	<div class="small-12 columns">
                                	<div id="disqus_thread"></div>
									<script>

									/**
									*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
									*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
									/*
									var disqus_config = function () {
									this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
									this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
									};
									*/
									(function() { // DON'T EDIT BELOW THIS LINE
									var d = document, s = d.createElement('script');
									s.src = '//hoop78.disqus.com/embed.js';
									s.setAttribute('data-timestamp', +new Date());
									(d.head || d.body).appendChild(s);
									})();
									</script>
									<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
																	



									<script id="dsq-count-scr" src="//hoop78.disqus.com/count.js" async></script>
                                </div>
                            </div>
                        </div>
		<?php endif;?>						
                    </article>					
                </div>
           </div> 
            <div class="bloco-3">
				<div id="lista-post"> 
				<div class="row">
					<?php 
					if($post[0]->id_post!=0):
					$pi=0;
					foreach($post as $p):
					$pii=$pi++;
					$imagem = $imgNeg->listar('id_post="'.$p->id_post.'"','destaque DESC');
					$dataP = $funcao->dataParte($p->data,'dia'). ' de '.$funcao->mes($funcao->dataParte($p->data,'mes'),'extenso');
					?>
                    <div class="medium-4 columns <?php echo (is_numeric($url[1]))?> end">
                    	<div class="pad">
                        	<a href="<?php echo URL.$p->categoria_slug.'/'.$funcao->dataBr($p->data).'/'.$p->slug?>">
                                <img src="<?php echo URL.'data/post/'.$funcao->adicionar_sufixo($imagem[0]->imagem,'_home');?>" alt="titulo">
                                <span class="autor"><?php echo $dataP?> | <?php echo $p->autor?></span>
                                <h2><?php echo $p->titulo?></h2>
                                <h3><?php echo $p->lead?></h3>
                    		</a>
                        </div>
                    </div>
                    <?php 
					if(is_numeric($url[1])==false):
						if(($pii%3)==2):
							echo '</div><div class="row">';
						endif;
					endif;
					endforeach;
					else:
					echo (is_numeric($url[1]))?'':'Breve posts fresquinhos.';
					endif;
					?>   
				</div>
				</div>
				<?php
				if(is_numeric($url[1])==false):
						if(count($post) < $total):
							echo '<div class="row"><div class="medium-12 columns text-center"><button id="mais">MAIS POSTS</button></div></div>'; 
						endif;
				endif;	
				?>
			</div>
            <?php
			
			if($url[0]!='design' && $url[0]!='musica' && $url[0]!='relaxando'):
			$blocoDMR = $postNeg->listar("p.status='Publicado' AND p.destaque='bloco-DMR'","p.data_atualizacao DESC LIMIT 2","categoria");
			?>
             <div class="bloco-2">   
             	<div class="row">
                    <?php
					foreach($blocoDMR as $dmr):
						$imagemDMR = $imgNeg->listar('id_post="'.$dmr->id_post.'"','destaque DESC');
						$img_DMR = URL.'data/post/'.$funcao->adicionar_sufixo($imagemDMR[0]->imagem,'_quadradoG');
					?>
                    <div class="medium-6 columns text-center">
                    	<div class="pad">
                        	<a href="<?php echo URL.$dmr->categoria_slug.'/'.$funcao->dataBr($dmr->data).'/'.$dmr->slug?>">
								<img src="<?php echo $img_DMR ?>" alt="titulo">
                                <span class="autor"><?php echo $dmr->categoria_nome?></span>
                                <h2><?php echo $dmr->titulo?></h2>
                    		</a>
                        </div>
                    </div>  
					<?php
					endforeach;
					?>  
				</div>
            </div>                     
                
            <?php
			endif;
			if($url[0]!='estilo'):
			$blocoEstilo = $postNeg->listar("p.status='Publicado' AND p.destaque='bloco-estiloso'","p.data_atualizacao DESC LIMIT 3","categoria");
			?>
             <div class="bloco-3-alt">
             	<div class="row">
                	<?php
					foreach($blocoEstilo as $estilo):
						$imagemEstilo = $imgNeg->listar('id_post="'.$estilo->id_post.'"','destaque DESC');
						$img_estilo = URL.'data/post/'.$funcao->adicionar_sufixo($imagemEstilo[0]->imagem,'_quadrado');
					?>
                	<div class="medium-4 columns text-center">
                    	<div class="pad">
                        	<a href="<?php echo URL.$estilo->categoria_slug.'/'.$funcao->dataBr($estilo->data).'/'.$estilo->slug?>">
                            <img src="<?php echo $img_estilo?>">
                            <h2><?php echo $estilo->titulo?></h2>
                            </a>
                            <a href="<?php echo URL.$estilo->categoria_slug.'/'.$funcao->dataBr($estilo->data).'/'.$estilo->slug?>" class="link">Quero ver mais</a>                              	
                        </div>
                    </div> 
					<?php
					endforeach;
					?>                                        
                </div>
             </div>
            <?php
			endif;
			if($url[0]!='artigos'):
			$blocao = $postNeg->listar("p.status='Publicado' AND p.destaque='blocao'","p.data_atualizacao DESC LIMIT 1","categoria");
			$imagemBL = $imgNeg->listar('id_post="'.$blocao[0]->id_post.'"','destaque');
			$img_blocao = URL.'data/post/'.$funcao->adicionar_sufixo($imagemBL[0]->imagem,'_bloco');
			if($blocao[0]->id_post!=0):?>
             <div class="bloco-1">
                <div class="row">
                	<div class="medium-12 columns text-center">
                    	<div class="pad">
                        	<a href="<?php echo URL.$blocao[0]->categoria_slug.'/'.$funcao->dataBr($blocao[0]->data).'/'.$blocao[0]->slug?>">
                    		<img src="<?php echo $img_blocao?>">
                            <div class="row">
                                <div class="medium-5 medium-centered columns text-center">
                                    <h2><?php echo $blocao[0]->titulo?></h2>      
                            	</div>
							</div>
                            </a>
						</div>                    
					</div>			             
             	</div>
             </div>
             
			   <!--MENU INDEX-->

			   <div class="menu-body show-for-small-only">
				   <div class="row">
						<ul>
							<li><a href="http://hoop78.com/artigos">Artigos</a></li>
							<li><a href="http://hoop78.com/estilo">Estilo</a></li>
							<li><a href="http://hoop78.com/musica">Música</a></li>
							<li><a href="http://hoop78.com/design">Design</a></li>
							<li><a href="http://hoop78.com/para_comprar">Para Comprar</a></li>
							<li><a href="http://hoop78.com/relaxando">Relaxando</a></li>
					   </ul>
				   </div>
				</div>

			   <!--FIM MENU INDEX-->                  
             
             
             <?php 
			 endif; 
			 endif;
			 include $diretorio.'/includes/rodape.php';
			 ?>

   		</div>
   </div>
	
    <?php include $diretorio.'/includes/rodape-script.php';?>

  </body>
</html>
