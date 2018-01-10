<!--TOP BAR-->
	
	<nav class="top-bar hide-for-medium-up" data-topbar="" role="navigation">
      <ul class="title-area">
        <li class="name">
          <h1><a href="#"></a></h1>
        </li>
        <li class="toggle-topbar menu-icon"><a href=""><span></span></a></li>
      </ul>

      
      <section class="top-bar-section" style="left: 0%;">
        <ul class="right">
			<?php foreach($menu as $m):?>
            <li><a href="<?php echo URL.$m->slug?>"><?php echo $m->nome?></a></li>
            <?php endforeach;?>                      
        </ul>
      </section>
	</nav>
  
  <!--FIM TOP BAR-->     
  
   <?php
		$dir = new DirectoryIterator( '/home/hoop78/public_html/modules/banner/' );
		foreach($dir as $file )
	   {
		 // verifica se o valor de $file é diferente de '.' ou '..'
		 // e é um diretório (isDir)
		 if (!$file->isDot())
		 {
			if($file->getFilename()!='banner'):
				$banner[] = $file->getFilename();
			endif;
		 }
	   }
		$rand = array_rand($banner, 1);
	?>
   <header>
		<div class="row collapse ">
			<div class="medium-12 columns">   
            	<div id="banner">
					<?php if(is_numeric($url[1]) && $imagemA[0]->id_imagem!=0):?>
					<img src="<?php echo URL.'data/post/'.$funcao->adicionar_sufixo($imagemA[0]->imagem,'_bloco');?>" alt="Banner" />
					<?php else:?>
                	<img src="<?php echo ROOT?>banner/<?php echo $banner[$rand]?>" alt="Banner" />
					<?php endif;?>
				</div>
                <div id="logo">
					<a href="<?php echo URL?>"><?php if($pagina=='index'){echo '<h1>';}?><img src="<?php echo ROOT?>img/logo.png" alt="Hoop"/><?php if($pagina=='index'){echo '</h1>';}?></a>					
                </div>
                <div id="info" class="hide-for-small">
                    <ul>
                        <?php foreach($menu as $m):?>
						<li><a href="<?php echo URL.$m->slug?>"><?php echo $m->nome?></a></li>
						<?php endforeach;?>
                    </ul>
<!--                    <ul id="midias">
                        <li><a href="https://www.facebook.com/hoop78/?fref=ts" target="_blank"><img src="<?php echo ROOT?>img/ico-facebook.png" alt="Facebook" /></a></li>
                        <li><a href="http://www.instagram.com/hoop78oficial" target="_blank"><img src="<?php echo ROOT?>img/ico-instagram.png" alt="Instagram" /></a></li>
                        <li><a href="https://twitter.com/Hoop78Oficial" target="_blank"><img src="<?php echo ROOT?>img/ico-twitter.png" alt="Twitter" /></a></li>
                    </ul> -->               
                </div>
        	</div>
        </div>
   </header>