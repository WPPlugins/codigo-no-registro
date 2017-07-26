<div class="wrap">
<div class="icon32"><img src='<?php echo plugins_url('/images/icon-32.png', dirname(__FILE__))?>' /></div>
        
<h2><?php _e('Configurações',self::CLASS_NAME)?>:</h2>
    
  		<table width="100%"><tr>
        <td style="vertical-align:top">
 
 		<form action="" method="post">
        <?php
		 wp_nonce_field('update',self::CLASS_NAME);
		?>        
        <div class="metabox-holder">         
		<div class="postbox" >
        
        	<h3><?php _e('Configurações Globais',self::CLASS_NAME)?></h3>
        
        	<div class="inside">
                <p>
                <label ><?php _e('Quantidade de Caracteres',self::CLASS_NAME)?></label>
                <select name="length" >
                	<option value="1" <?php selected(1,$options["length"])?>>1</option>
                    <option value="2" <?php selected(2,$options["length"])?>>2</option>
                    <option value="3" <?php selected(3,$options["length"])?>>3</option>
                    <option value="4" <?php selected(4,$options["length"])?>>4</option>
                    <option value="5" <?php selected(5,$options["length"])?>>5</option>
                </select>
                </p>

                 <p>
                <label><?php _e('Quantas tentativas antes de Bloquear o IP?',self::CLASS_NAME)?></label>
                <select name="tentativas" >
                	<option value="3" <?php selected(3,$options["tentativas"])?>>3</option>
                    <option value="4" <?php selected(4,$options["tentativas"])?>>4</option>
                    <option value="5" <?php selected(5,$options["tentativas"])?>>5</option>
                    <option value="6" <?php selected(6,$options["tentativas"])?>>6</option>
                    <option value="7" <?php selected(7,$options["tentativas"])?>>7</option>
                    <option value="8" <?php selected(8,$options["tentativas"])?>>8</option>
                    <option value="9" <?php selected(9,$options["tentativas"])?>>9</option>
                    <option value="10" <?php selected(10,$options["tentativas"])?>>10</option>
                </select>
                <small>( <?php _e('Ficará bloqueado durante o dia atual',self::CLASS_NAME)?> )</small>
                </p>                  
                
                <p>
                <input type="submit" name="submit" value="<?php _e('Salvar Alterações',self::CLASS_NAME)?>" class="button-primary" />
				</p>

			</div>
		</div>
        </div>
 
 
 		<div class="metabox-holder">
 		<div class="postbox">
        
        	<h3><?php _e('Configurações de Visual',self::CLASS_NAME)?></h3>
        
        	<div class="inside">
            	<p>
                	<strong><?php _e('Selecione a Cor da Fonte',self::CLASS_NAME)?>:</strong> <input type="text" name="font_color" class="color" size="4" value="<?php echo $options["font_color"];?>"/>
                </p>
            
                <p>
                <h4><?php _e('Selecione a Imagem de Fundo',self::CLASS_NAME)?></h4>
                <?php
                	for($i=1;$i<9;$i++){
						echo '<input type="radio" name="background" value="'.$i.'" ' . checked($i,$options["background"],false) . '><img src="'. $anderson_makiyama[self::PLUGIN_ID]->plugin_url . 'images/'. $i .'.jpg">';
						if($i%3 ==0) echo "<br>";
                    }
					echo "<input type='radio' name='background' value='0' " . checked(0,$options["background"],false) . ">". __('Aleatório <small>Muda a cada vez</small>',self::CLASS_NAME) . "<br>";
                ?>
                </p>
                <p>
                <input type="submit" name="submit" value="<?php _e('Salvar Alterações',self::CLASS_NAME)?>" class="button-primary" />
				</p>

			</div>
		</div>
        </div>
        
        </form>
          
   		</td>
        <td style="vertical-align:top; width:410px">

        

        <div class="metabox-holder">

		<div class="postbox" >

        

        	<h3 style="font-size:24px; text-transform:uppercase;color:#F00;">

        	<?php _e('Dê uma Olhada!',self::CLASS_NAME);?>

            </h3>

            

             <h3><?php _e('Melhores Temas Wordpress',self::CLASS_NAME)?>: <a href="http://plugin-wp.net/elegantthemes" target="_blank">Elegant Themes</a></h3>

             

        	<div class="inside">

                <p>

                <a href="http://plugin-wp.net/elegantthemes" target="_blank"><img src="<?php echo $anderson_makiyama[self::PLUGIN_ID]->plugin_url?>images/elegantthemes.jpg" ></a>

				</p>



			</div>

 
 		</div>
        </div>
        
         <div class="metabox-holder">

		<div class="postbox" >           

            <h3><?php _e('Melhor Autoresponder para Email Marketing',self::CLASS_NAME)?>: <a href="http://plugin-wp.net/trafficwave" target="_blank">TrafficWave</a></h3>

            

        	<div class="inside">

                <p>

                <a href="http://plugin-wp.net/trafficwave" target="_blank"><img src="<?php echo $anderson_makiyama[self::PLUGIN_ID]->plugin_url?>images/trafficwave.jpg"></a>

				</p>



			</div> 

                        

		</div>

        </div>

              
       </td>
       </tr>
       </table>


<hr />


<table>
<tr>
<td>
<img src="<?php echo $anderson_makiyama[self::PLUGIN_ID]->plugin_url?>images/anderson-makiyama.png" />
</td>
<td>
<ul>

<li><?php _e('Autor:',self::CLASS_NAME);?> <strong>Anderson Makiyama</strong>

</li>

<li><?php _e('Email do Autor:',self::CLASS_NAME);?> <a href="mailto:andersonmaki@gmail.com" target="_blank">andersonmaki@gmail.com</a>

</li>

<li><?php _e('Visite a Página do Plugin:',self::CLASS_NAME);?> <a href="<?php echo self::PLUGIN_PAGE?>" target="_blank"><?php echo self::PLUGIN_PAGE?></a>

</li>

<li>

<?php _e('Visite a Página do Autor:',self::CLASS_NAME);?> <a href="http://comocriar.blog.br" target="_blank">Como Criar um Blog</a>

</li>

</ul>
</td>
</tr>
</table>

</div>