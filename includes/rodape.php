			
			<footer>
<!--				 <div class="row top30 hide-for-medium-up">
					<div class="small-12 columns text-left topo-mobile">
						<a href="#">Voltar ao topo</a>
					</div>  
				</div>-->
				<div class="hide-for-small" id="botao-voltar">
					<input type="button" id="btnVoltar" class="voltarTopo" onclick="$j('html,body').animate({scrollTop: $j('#voltarTopo').offset().top}, 1000);" value="topo" >
				</div>
				<div id="form-holder" class="reveal-modal" data-reveal>
			
				</div>
            	           	
            	
            	
             	<div class="row">
                	<div class="pad">
                        <div class="medium-4 columns">
                            <div class="spacer"></div>
                        </div>
                        <div class="medium-4 columns text-center">
							<a href="http://www.hoop78.com" target="_self"><img src="<?php echo ROOT ?>img/logo-rodape.png" alt="Hoop78" /></a>
                        </div>
                        <div class="medium-4 columns hide-for-small">
                            <div class="spacer"></div>
                        </div>                    
                    </div>
                </div>
                <div class="row">
					<div class="pad">
                	<div class="medium-12 columns">
                        <ul>
                            <?php foreach($menu as $m):?>
							<li><a href="<?php echo URL.$m->slug?>"><?php echo $m->nome?></a></li>
							<?php endforeach;?>
                            <!--li><a href="javascript:;" class="link-email" rel="Contato">Contato</a></li-->
                        </ul>
                    </div>
					</div>
                </div>
				
				<div class="row">
					<div class="pad">
						<div class="medium-12 columns">
							<ul id="social">
								<li><a href="http://www.twitter.com/hoop78oficial" target="_blank"><img src="<?php echo ROOT ?>img/ico-tt.png" alt="Twitter" /></a></li>
								<li><a href="http://www.instagram.com/hoop78oficial" target="_blank"><img src="<?php echo ROOT ?>img/ico-igram.png" alt="Instagram" /></a></li>
								<li><a href="http://www.facebook.com/hoop78" target="_blank"><img src="<?php echo ROOT ?>img/ico-fbook.png" alt="Facebook" /></a></li>
							</ul>
						</div>
					</div>
					
				</div>
				
				
<!--                <div class="row">
                	<div class="small-8 medium-3 small-centered columns midias">
                    	<ul>
                        	<li><a href="https://www.facebook.com/hoop78/?fref=ts" target="_blank"><img src="<?php echo ROOT ?>img/ico-facebook-g.png" alt="Facebook" /></a></li>
                            <li><a href="http://www.instagram.com/hoop78oficial" target="_blank"><img src="<?php echo ROOT ?>img/ico-instagram-g.png" alt="Instagram" /></a></li>
                            <li><a href="https://twitter.com/Hoop78Oficial" target="_blank"><img src="<?php echo ROOT ?>img/ico-twitter-g.png" alt="Twitter" /></a></li>
                        </ul>
                    </div>
                </div>-->
				
                


				</div>
                
                
                
             </footer>          
             
            
                 
                           