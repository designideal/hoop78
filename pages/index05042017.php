<?php 
include $diretorio.'/includes/includes.php';
include 'classes/dados/frase.php';
include 'classes/dados/post.php';
include 'classes/dados/imagem.php';

$aspasNeg = new FraseDados();
$postNeg = new PostDados();
$imgNeg = new ImagemDados();

$aspas = $aspasNeg->listar("", "id_frase DESC");

$blocao = $postNeg->listar("p.status='Publicado' AND p.destaque='blocao'","p.data_atualizacao DESC LIMIT 2","categoria");
foreach($blocao as $bloco):
	$imagemBL = $imgNeg->listar('id_post="'.$bloco->id_post.'"','destaque');
	$img_blocao[$bloco->id_post] = URL.'data/post/'.$funcao->adicionar_sufixo($imagemBL[0]->imagem,'_bloco');
endforeach;

$bloco3 = $postNeg->listar("p.status='Publicado' AND p.destaque='bloco3'","p.data_atualizacao DESC LIMIT 6","categoria");
//print_r($bloco3);

$bloco2 = $postNeg->listar("p.status='Publicado' AND p.destaque='bloco2'","p.data_atualizacao DESC LIMIT 2","categoria");

$produto = $postNeg->listar("p.status='Publicado' AND p.destaque='bloco-produto'","p.data_atualizacao DESC LIMIT 1","categoria");

$blocoEstilo = $postNeg->listar("p.status='Publicado' AND p.destaque='bloco-estiloso'","p.data_atualizacao DESC LIMIT 3","categoria");

$blocoDMR = $postNeg->listar("p.status='Publicado' AND p.destaque='bloco-DMR'","p.data_atualizacao DESC LIMIT 2","categoria");

?>
<!doctype html>
<html class="no-js" lang="en">
  <?php include $diretorio.'/includes/header.php';?>
  <body>
  
   <?php include $diretorio.'/includes/topo.php';?>
   
   <div class="row collapse">
   		<div class="medium-12 columns text-center" style="position:relative;">
            <div id="quote">
				<div id="aspas" class="hide-for-small"><img src="<?php echo ROOT?>img/aspas.png" alt="aspas" /></div>
				<div class="row">
				<div class="medium-8 medium-centered columns"><p><?php echo $aspas[0]->texto?></p></div>
				</div>
            </div>
		</div>
   </div>
   
   <!--MENU INDEX-->
   
   <div class="menu-body" class="show-for-small-only">
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
  
   
   <div class="row collapse">
   		<div id="conteudo">
			<div class="bloco-3">
				<div class="row">
			<?php
			for($b=0;3>$b;$b++):
				if($bloco3[$b]->id_post!=''):
				$imagemBL3 = $imgNeg->listar('id_post="'.$bloco3[$b]->id_post.'"','destaque DESC');
				$img_bl3 = URL.'data/post/'.$funcao->adicionar_sufixo($imagemBL3[0]->imagem,'_home');
				$data_bl3 = $funcao->dataParte($bloco3[$b]->data,'dia'). ' de '.$funcao->mes($funcao->dataParte($bloco3[$b]->data,'mes'),'extenso');
			?>
			
                    <div class="medium-4 columns">
                    	<div class="pad">
                        	<a href="<?php echo URL.$bloco3[$b]->categoria_slug.'/'.$funcao->dataBr($bloco3[$b]->data).'/'.$bloco3[$b]->slug?>">
                                <img src="<?php echo $img_bl3 ?>" alt="titulo">
                                <span class="autor"><?php echo $data_bl3?> | <?php echo $bloco3[$b]->autor?></span>
                                <h2><?php echo $bloco3[$b]->titulo?></h2>
                                <h3><?php echo $bloco3[$b]->lead?></h3>
                    		</a>
                        </div>
                    </div>   
						
             <?php
			 endif;
			endfor;
			?>
				</div>
			</div>
             <div class="bloco-2">   
             	<div class="row">
					<?php 
					foreach($bloco2 as $bl2):
						$imagemBL2 = $imgNeg->listar('id_post="'.$bl2->id_post.'"','destaque DESC');
						$img_bl2 = URL.'data/post/'.$funcao->adicionar_sufixo($imagemBL2[0]->imagem,'_home');
						$data_bl2 = $funcao->dataParte($bl2->data,'dia'). ' de '.$funcao->mes($funcao->dataParte($bl2->data,'mes'),'extenso');
					?>
                    <div class="medium-6 columns">
                    	<div class="pad">
                        	<a href="#">
                                <a href="<?php echo URL.$bl2->categoria_slug.'/'.$funcao->dataBr($bl2->data).'/'.$bl2->slug?>">
                                <img src="<?php echo $img_bl2 ?>" alt="titulo">
                                <span class="autor"><?php echo $data_bl2?> | <?php echo $bl2->autor?></span>
                                <h2><?php echo $bl2->titulo?></h2>
                                <h3><?php echo $bl2->lead?></h3>
							</a>
                    	</div>
                    </div>
                    <?php
					endforeach;
					?>
				</div>
            </div>
                
             <?php 
			 if($blocao[0]->id_post!=0):?>
             <div class="bloco-1">
                <div class="row">
                	<div class="medium-12 columns text-center">
                    	<div class="pad">
                        	<a href="<?php echo URL.$blocao[0]->categoria_slug.'/'.$funcao->dataBr($blocao[0]->data).'/'.$blocao[0]->slug?>">
                    		<img src="<?php echo $img_blocao[$blocao[0]->id_post]?>">
                            <div class="row">
                                <div class="small-12 medium-7 medium-centered columns">
                                    <h2><?php echo $blocao[0]->titulo?></h2>      
                            	</div>
							</div>
                            </a>
						</div>                    
					</div>			             
             	</div>
             </div>
             <?php endif;?>
             
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
			 if($produto[0]->id_post!=0):
						$imagemP = $imgNeg->listar('id_post="'.$produto[0]->id_post.'"','destaque DESC');
						$img_p = URL.'data/post/'.$funcao->adicionar_sufixo($imagemP[0]->imagem,'_quadradoG');
			?>
             <div class="pad">
                 <div class="bloco-produto">
                    <div class="row">
                        <div class="medium-6 columns text-center">
                        	<h3><?php echo $produto[0]->assunto?></h3>
                            <h2><?php echo $produto[0]->titulo?></h2>
                            <h4><?php echo $produto[0]->marca?></h4>
                            <p><?php echo $produto[0]->lead?></p>
							<a href="<?php echo URL.$produto[0]->categoria_slug.'/'.$funcao->dataBr($produto[0]->data).'/'.$produto[0]->slug?>">Veja onde comprar</a>
                        </div>
                        <div class="medium-6 columns">
                        	<a href="<?php echo URL.$produto[0]->categoria_slug.'/'.$funcao->dataBr($produto[0]->data).'/'.$produto[0]->slug?>">
                        		<img src="<?php echo $img_p?>" alt="Onze Anéis: a alma do sucesso" />
                            </a>
                        </div>
                    </div>
                 </div>
             </div>
             <?php
			 endif;
			 ?>
            <div class="bloco-3">
				<div class="row">
				<?php
				for($b=3;6>$b;$b++):
					if($bloco3[$b]->id_post!=''):
					$imagemBL3 = $imgNeg->listar('id_post="'.$bloco3[$b]->id_post.'"','destaque DESC');
					$img_bl3 = URL.'data/post/'.$funcao->adicionar_sufixo($imagemBL3[0]->imagem,'_home');
					$data_bl3 = $funcao->dataParte($bloco3[$b]->data,'dia'). ' de '.$funcao->mes($funcao->dataParte($bloco3[$b]->data,'mes'),'extenso');
				?>
				
						<div class="medium-4 columns">
							<div class="pad">
								<a href="<?php echo URL.$bloco3[$b]->categoria_slug.'/'.$funcao->dataBr($bloco3[$b]->data).'/'.$bloco3[$b]->slug?>">
									<img src="<?php echo $img_bl3 ?>" alt="titulo">
									<span class="autor"><?php echo $data_bl3?> | <?php echo $bloco3[$b]->autor?></span>
									<h2><?php echo $bloco3[$b]->titulo?></h2>
									<h3><?php echo $bloco3[$b]->lead?></h3>
								</a>
							</div>
						</div>   
						
				 <?php
				 endif;
				endfor;
				?>
				</div>	
			</div>       
            
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
			 if($blocao[1]->id_post!=0):?>
             <div class="bloco-1">
                <div class="row">
                	<div class="medium-12 columns text-center">
                    	<div class="pad">
                        	<a href="<?php echo URL.$blocao[1]->categoria_slug.'/'.$funcao->dataBr($blocao[1]->data).'/'.$blocao[1]->slug?>">
                    		<img src="<?php echo $img_blocao[$blocao[1]->id_post]?>">
                            <div class="row">
                                <div class="medium-7 medium-centered columns text-center">
                                    <h2><?php echo $blocao[1]->titulo?></h2>      
                            	</div>
							</div>
                            </a>
						</div>                    
					</div>			             
             	</div>
             </div>
             <?php endif;?>           
             
			   <!--MENU INDEX-->

			   <div class="menu-body" class="show-for-small-only">
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
             
             <?php include $diretorio.'/includes/rodape.php';?>         

   		</div>
   </div>
	
    
    <?php include $diretorio.'/includes/rodape-script.php';?>
  </body>
</html>
