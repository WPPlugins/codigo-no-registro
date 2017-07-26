<?php
/*
Plugin Name: Codigo no Registro
Plugin URI: http://fazer-site.net/plugin-wordpress-codigo-capcha-no-registro/
Description: Exiba uma imagem com código de segurança na página de registro do seu blog
Author: Anderson Makiyama
Version: 1.0
Author URI: http://fazer-site.net
*/

class Anderson_Makiyama_Codigo_No_Registro{

	const CLASS_NAME = 'Anderson_Makiyama_Codigo_No_Registro';
	public static $CLASS_NAME = self::CLASS_NAME;
	const PLUGIN_ID = 2;
	public static $PLUGIN_ID = self::PLUGIN_ID;
	const PLUGIN_NAME = 'Codigo No Registro';
	public static $PLUGIN_NAME = self::PLUGIN_NAME;
	const PLUGIN_PAGE = 'http://fazer-site.net/plugin-wordpress-codigo-capcha-no-registro';
	public static $PLUGIN_PAGE = self::PLUGIN_PAGE;
	const PLUGIN_VERSION = '1.0';
	public static $PLUGIN_VERSION = self::PLUGIN_VERSION;
	public $plugin_basename;
	public $plugin_path;
	public $plugin_url;
	
	public function get_static_var($var) {

        return self::$$var;

    }
	
	public function activation(){
		
		$options = get_option(self::CLASS_NAME . "_options");

		if(!isset($options['length'])) $options['length'] = 5;
		if(!isset($options['background'])) $options['background'] = 0;
		if(!isset($options['font_color'])) $options['font_color'] = array('0','0','0');
		if(!isset($options['tentativas'])) $options['tentativas'] = 5;

		update_option(self::CLASS_NAME . "_options", $options);
		
	}
	
	public function Anderson_Makiyama_Codigo_No_Registro(){ //__construct()

		$this->plugin_basename = plugin_basename(__FILE__);
		$this->plugin_path = dirname(__FILE__) . "/";
		$this->plugin_url = WP_PLUGIN_URL . "/" . basename(dirname(__FILE__)) . "/";
		
		load_plugin_textdomain( self::CLASS_NAME, '', strtolower(str_replace(" ","-",self::PLUGIN_NAME)) . '/lang' );	

	}
	

	public function settings_link($links) { 
		global $anderson_makiyama;
	  
		$settings_link = '<a href="options-general.php?page='. self::CLASS_NAME .'">'. __('Configurações',self::CLASS_NAME). '</a>'; 
		array_unshift($links, $settings_link); 
		return $links; 
	}	
	

	public function options(){

		global $anderson_makiyama;

		global $user_level;

		get_currentuserinfo();


		if (function_exists('add_options_page')) { //Adiciona pagina na seção Configurações
			
			add_options_page(self::PLUGIN_NAME, self::PLUGIN_NAME, 1, self::CLASS_NAME, array(self::CLASS_NAME,'options_page'));
		
		}
		if (function_exists('add_submenu_page')){ //Adiciona pagina na seção plugins
			
			add_submenu_page( "plugins.php",self::PLUGIN_NAME,self::PLUGIN_NAME,1, self::CLASS_NAME, array(self::CLASS_NAME,'options_page'));			  
		}

  		 add_menu_page(self::PLUGIN_NAME, self::PLUGIN_NAME,1, self::CLASS_NAME,array(self::CLASS_NAME,'options_page'), plugins_url('/images/icon.png', __FILE__));
		 
		 add_submenu_page(self::CLASS_NAME, self::PLUGIN_NAME,__('Ajuda',self::CLASS_NAME),1, self::CLASS_NAME . "_Help", array(self::CLASS_NAME,'help_page'));

		 global $submenu;
		 if ( isset( $submenu[self::CLASS_NAME] ) )
			$submenu[self::CLASS_NAME][0][0] = __('Configurações',self::CLASS_NAME);
	}	

	

	public function options_page(){

		global $anderson_makiyama;

		global $user_level;

		get_currentuserinfo();

		if ($user_level < 10) { //Limita acesso para somente administradores

			return;

		}

		$options = get_option(self::CLASS_NAME . "_options");
		
		if ($_POST['submit']) {

			if(!wp_verify_nonce( $_POST[self::CLASS_NAME], 'update' ) ){
				
				print 'Sorry, your nonce did not verify.';
  				exit;
   
			}
			
			$options['length'] = $_POST['length'];
			$options['background'] = $_POST['background'];
			$options['font_color'] = $_POST['font_color'];
			$options['tentativas'] = $_POST['tentativas'];

			update_option(self::CLASS_NAME . "_options", $options);
			
			echo '<div id="message" class="updated">';
			echo '<p><strong>'. __('Configurações salvas com sucesso!',self::CLASS_NAME) . '</strong></p>';
			echo '</div>';			

		}
		
		//Compatibilidade com a versão Antiga do plugin
		if('0x00000000' == $options["font_color"]) $options["font_color"] = '000000';
		if('0x00ffffff' == $options["font_color"]) $options["font_color"] = 'ffffff';
		if('0x000099cc' == $options["font_color"]) $options["font_color"] = '00f000';
		if('0x00f00000' == $options["font_color"]) $options["font_color"] = 'f00000';
		if('0x0000f000' == $options["font_color"]) $options["font_color"] = '060000';
		//
		
		include("templates/options.php");

	}		


	public function help_page(){

		global $anderson_makiyama;

		include("templates/help.php");

	}	
	

	public function my_js($hook) {
		
		global $anderson_makiyama;
		
		if(strpos($hook,self::CLASS_NAME) === false ) return;
		
		wp_register_script( self::CLASS_NAME . "_js_admin", $anderson_makiyama[self::PLUGIN_ID]->plugin_url . 'jscolor/jscolor.js' );
	 
		wp_enqueue_script( self::CLASS_NAME . "_js_admin", $anderson_makiyama[self::PLUGIN_ID]->plugin_url . 'jscolor/jscolor.js' );
	 
	}
	
	public static function add_to_register_form(){
		global $anderson_makiyama;
		
		if(!isset($_SESSION)) session_start();
		
		//Compatibilidade com a versão Antiga do plugin
		if('0x00000000' == $options["font_color"]) $options["font_color"] = '000000';
		if('0x00ffffff' == $options["font_color"]) $options["font_color"] = 'ffffff';
		if('0x000099cc' == $options["font_color"]) $options["font_color"] = '00f000';
		if('0x00f00000' == $options["font_color"]) $options["font_color"] = 'f00000';
		if('0x0000f000' == $options["font_color"]) $options["font_color"] = '060000';
		//
		
		$options = get_option(self::CLASS_NAME . "_options");
		
		$length = isset($options['length'])?$options['length']:5;
		
		$options["font_color"] = self::hex2rgb($options["font_color"]);
		
		$_SESSION[self::CLASS_NAME . "_code"] = self::get_code($length);
		$_SESSION[self::CLASS_NAME . "_font_color"] = $options["font_color"];
		$_SESSION[self::CLASS_NAME . "_background"] = $options["background"];
		
		echo
				'<p>
					<label>
						<img style="width:160px !important;" src="'. $anderson_makiyama[self::PLUGIN_ID]->plugin_url.'get_image.php" /><br/>
						'. __('Digite o Código da Imagem',self::CLASS_NAME) . '
						<input type="text" name="codigo" class="input" value="" size="20" tabindex="1000"><br/>
					</label>
				</p>';
				
	}
	
	
	public function check_code($login, $email, $errors){
		
		global $anderson_makiyama; 
		
		if(!isset($_SESSION)) session_start();

		$total_error_code = isset($_SESSION[self::CLASS_NAME . "_total_error_code"])?$_SESSION[self::CLASS_NAME . "_total_error_code"]:0;
		
		$options = get_option(self::CLASS_NAME . "_options");


		//Verifica se IP foi bloqueado
		$ip = $_SERVER['REMOTE_ADDR'];
		
		$today = date("Y-m-d");
		
		$day_ips = array();
		
		$bloqueado = false;

		if(!isset($options["ips"])){
						   
			$ips = array();
			
		}else{
			
			$ips = $options["ips"];	
			
		}
		
		for($i=0;$i<count($ips);$i++){
			
			if($ips[$i][1] == $today){
				
				$day_ips[] = $ips[$i];
				if($ips[$i][0] == $ip) $bloqueado = true;
				
			}
			
		}
		
		$options["ips"] = $day_ips;
		
		update_option(self::CLASS_NAME . "_options",$options);
		
		
		//
		
		if($bloqueado){
			
			
			$errors->add(self::CLASS_NAME,__('<strong>ERRO</strong>: Seu IP foi bloqueado. Tente novamente amanhã!',self::CLASS_NAME));
			
		}elseif($_SESSION[self::CLASS_NAME . "_total_error_code"] >= $options["tentativas"]){
			
			$anderson_makiyama[self::PLUGIN_ID]->block_ip();

			$errors->add(self::CLASS_NAME,__('<strong>ERRO</strong>: Seu IP foi bloqueado. Tente novamente amanhã!',self::CLASS_NAME));
			
		}elseif(!isset($_SESSION[self::CLASS_NAME . "_code"]) || empty($_POST['codigo']) || strtolower($_SESSION[self::CLASS_NAME . "_code"]) != strtolower($_POST['codigo'])){
			
			$errors->add(self::CLASS_NAME,__('<strong>ERRO</strong>: O Código da imagem está Incorreto. Tente novamente!',self::CLASS_NAME));
           
		    $total_error_code++; $_SESSION[self::CLASS_NAME . "_total_error_code"] = $total_error_code;
			
			
		}else{
			
			unset($_SESSION[self::CLASS_NAME . "_code"]);
			
			unset($_SESSION[self::CLASS_NAME . "_total_error_code"]);
			
		}
			
	}
	

	public static function get_code($length){
	
		$code = str_split("23456789bcdfghjkmnpqrstvwxyzBCDFGHJKMNPQRSTVWXYZ");
		
		$final_code = "";
		$count_code = count($code);
		
		for($i=0;$i<$length;$i++){
			$final_code.= $code[mt_rand(0,($count_code -1))];
		}
		
		return $final_code;
	}

	public function block_ip(){
			
		$options = get_option(self::CLASS_NAME . "_options");
		
		if(!isset($options["ips"])){
						   
			$ips = array();
			
		}else{
			
			$ips = $options["ips"];	
			
		}
			
		$ip = $_SERVER['REMOTE_ADDR'];
		
		$today = date("Y-m-d");
			
		$ips[] = array($ip, $today);
		
		$options["ips"] = $ips;
		
		update_option(self::CLASS_NAME . "_options",$options);
		
	}
	
	
	//Funções Gerais	
	
	public static function hex2rgb($hex) {
	   $hex = str_replace("#", "", $hex);
	
	   if(strlen($hex) == 3) {
		  $r = hexdec(substr($hex,0,1).substr($hex,0,1));
		  $g = hexdec(substr($hex,1,1).substr($hex,1,1));
		  $b = hexdec(substr($hex,2,1).substr($hex,2,1));
	   } else {
		  $r = hexdec(substr($hex,0,2));
		  $g = hexdec(substr($hex,2,2));
		  $b = hexdec(substr($hex,4,2));
	   }
	   $rgb = array($r, $g, $b);
	   //return implode(",", $rgb); // returns the rgb values separated by commas
	   return $rgb; // returns an array with the rgb values
	}

	public static function make_data($data, $anoConta,$mesConta,$diaConta){

	   $ano = substr($data,0,4);
	   $mes = substr($data,5,2);
	   $dia = substr($data,8,2);

	   return date('Y-m-d',mktime (0, 0, 0, $mes+($mesConta), $dia+($diaConta), $ano+($anoConta)));	

	}
		
	public static function get_data_array($data,$part=''){

	   $data_ = array();
	   $data_["ano"] = substr($data,0,4);
	   $data_["mes"] = substr($data,5,2);
	   $data_["dia"] = substr($data,8,2);
	   
	   if(empty($part))return $data_;

	   return $data_[$part];

	}	
	

}

if(!isset($anderson_makiyama)) $anderson_makiyama = array();

$anderson_makiyama_indice = Anderson_Makiyama_Codigo_No_Registro::PLUGIN_ID;

$anderson_makiyama[$anderson_makiyama_indice] = new Anderson_Makiyama_Codigo_No_Registro();

add_filter("plugin_action_links_". $anderson_makiyama[$anderson_makiyama_indice]->plugin_basename, array($anderson_makiyama[$anderson_makiyama_indice]->get_static_var('CLASS_NAME'), 'settings_link') );

add_filter("admin_menu", array($anderson_makiyama[$anderson_makiyama_indice]->get_static_var('CLASS_NAME'), 'options'),30);

add_action('register_form', array($anderson_makiyama[$anderson_makiyama_indice]->get_static_var('CLASS_NAME'), 'add_to_register_form'));

add_action('register_post', array($anderson_makiyama[$anderson_makiyama_indice]->get_static_var('CLASS_NAME'), 'check_code'),10,3);

register_activation_hook( __FILE__, array($anderson_makiyama[$anderson_makiyama_indice]->get_static_var('CLASS_NAME'), 'activation') );

add_action( 'admin_enqueue_scripts', array($anderson_makiyama[$anderson_makiyama_indice]->get_static_var('CLASS_NAME'), 'my_js') );
?>