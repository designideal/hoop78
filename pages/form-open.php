<?php
if($_GET[id]=='Contato'):
?>
		<div class="large-12 columns" id="contato">
        	<div class="row">
            	<div class="large-12 columns"><h2>Um papo é sempre bem vindo!</h2></div>
            </div>
        	<div class="row">
            	<div class="large-12 columns">
                    <form id="Form_contato" name="contato" method="post" onsubmit="return enviaForm(this)" action="">
						<div class="aviso"></div>
                        <label>Nome: </label>
                        <input type="text" name="nome" value="" title="Nome*">
                        <label>E-Mail:</label>  
                        <input type="text" name="email" value="" title="E-mail*" class="email">
                        <label>Mensagem:</label> 
                        <textarea placeholder="" name="mensagem" rows="6" title="Mensagem*"></textarea>	
						<button type="submit" class="expand">ENVIAR</button>
					</form>                       
				</div>                         
			</div>
        	
        </div>

<?php 
else:
?>
		<div class="large-12 columns" id="cadastro">
        	<div class="row">
            	<div class="large-12 columns"><h2>Faça parte da Nação Lakers Brasil!</h2></div>
            </div>
        	<div class="row">
            	<div class="large-12 columns">
					<div class="aviso"></div>
                    <form id="Form_cadastro" name="cadastro" method="post" onsubmit="return enviaForm(this)" action="">              	
                        <label>Nome: </label>
                        <input type="text" name="nome" value="" title="Nome*">
                        <label>E-Mail:</label>  
                        <input type="text" name="email" value="" title="E-mail*" class="email">
						<button type="submit" class="expand">GO LAKERS!</button>
					</form>                       
				</div>                         
			</div>
        	
        </div>

<?php 
endif;
?>