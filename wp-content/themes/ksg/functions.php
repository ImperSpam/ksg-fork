<?php
if (function_exists('add_theme_support')) {
	add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ) );
}

	
	//фильтр кастомный..по названию
	add_filter( 'woocommerce_get_catalog_ordering_args', 'custom_woocommerce_get_catalog_ordering_args' );
function custom_woocommerce_get_catalog_ordering_args( $args ) {
$orderby_value = isset( $_GET['orderby'] ) ? woocommerce_clean( $_GET['orderby'] ) :
apply_filters( 'woocommerce_default_catalog_orderby', get_option( 'woocommerce_default_catalog_orderby' ) );
if ( 'random_list' == $orderby_value ) {
$args['orderby'] = 'meta_value_datetime';//поле по которому сортируем
$args['order'] = 'ASC';//по возрастанию (ASC) или убыванию (DESC)
$args['meta_key'] = '';//по конкретному совпадению ключа
}
return $args;
}
add_filter( 'woocommerce_default_catalog_orderby_options', 'custom_woocommerce_catalog_orderby' );
add_filter( 'woocommerce_catalog_orderby', 'custom_woocommerce_catalog_orderby' );
function custom_woocommerce_catalog_orderby( $sortby ) {
$sortby['random_list'] = 'Сортировка по умолчанию';//название сортировки в админке и фронт энде
return $sortby;
}

if (function_exists('add_theme_support')) {
 add_theme_support('menus');
}

if ( function_exists( 'add_theme_support' ) )
	add_theme_support( 'post-thumbnails' );

if ( function_exists( 'add_image_size' ) ) {
	//add_image_size( 'service-thumb', 210, 134, true );
}

add_action( 'widgets_init', 'theme_widgets_init' );

function theme_widgets_init() {
	
	if ( function_exists('register_sidebar') ) {
		register_sidebar(array(
		 'name' => __( 'Header' ),
		 'id' => 'header',
		 'before_widget' => '',
		 'after_widget' => '',
		 'before_title' => '',
		 'after_title' => ''
		));
		
		register_sidebar(array(
		 'name' => __( 'Cart' ),
		 'id' => 'cart',
		 'before_widget' => '',
		 'after_widget' => '',
		 'before_title' => '<div class="menu_title clearfix"><h4>',
		 'after_title' => '</h4></div>'
		));
		
		register_sidebar(array(
		 'name' => __( 'Filter' ),
		 'id' => 'filter',
		 'before_widget' => '<div class="side_box side_box_1 red5">',
		 'after_widget' => '</div>',
 		 'before_title' => '<div class="h5">',
		 'after_title' => '</div>'
		));
		
		register_sidebar(array(
		 'name' => __( 'Footer' ),
		 'id' => 'footer',
		 'before_widget' => '',
		 'after_widget' => '',
		 'before_title' => '',
		 'after_title' => ''
		));
			
	}
	
}

/*
function new_excerpt_more( $more ) {
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');

function custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
*/

add_filter( 'woocommerce_subcategory_count_html', 'woo_remove_category_products_count' );
 
function woo_remove_category_products_count() {
    return;
}

add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 999;' ), 20 );




function googlebot(){
    $robots = file($_SERVER['DOCUMENT_ROOT'].'/robots.txt');
    foreach($robots as $key){
        if(preg_match('#Disallow:[\s]*(.*)\n#siU',$key,$s_match)){
            $stroka = $s_match[1];
            $stroka = trim($stroka);
            $stroka = str_replace(array('.','*','?',),array('*','.*','/?',),$stroka);
            //~ $allCont .= $stroka; //debug
            if(preg_match('#'.$stroka.'#siU',$_SERVER['REQUEST_URI'])){
                #$allCont = str_replace('<head>','<head>',$allCont);
                return '<meta name="googlebot" content="noindex">';
                
            }
        }
    }
}




add_filter( 'wpseo_canonical', '__return_false' );


function replace_text($text) {
  $text = preg_replace('#<strong>(.*)</strong>#siU', '<span class="strong">$1</span>', $text);

  return $text;
}
add_filter('the_content', 'replace_text');

remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);


add_filter('woocommerce_get_price_html', 'changeFreePriceNotice', 10, 2);
 
function changeFreePriceNotice($price, $product) {
  if ( $price == wc_price( 0.00 ) )
    return '';
  else
    return '<span class="strong">Цена за тонну: </span>'.$price;
}

function woocommerce_header_add_to_cart_fragment( $fragments ) { 
ob_start(); 
?>
<a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'Перейти в корзину' ); ?>">  
<span class="cart-ico"> <i class="fa fa-shopping-cart"></i></span>  
<span class="cart-txt">товаров: <span class="strong"><?php echo sprintf (_n( '%d', '%d', WC()->cart->cart_contents_count ), WC()->cart->cart_contents_count ); ?></span><br> на сумму: <span class="strong"><?php echo WC()->cart->get_cart_total(); ?></span></span>
</a>
<?php 

$fragments['a.cart-contents'] = ob_get_clean(); 
return $fragments;
}

//Вывод кратких данных из корзины
if ( ! function_exists( 'cart_link' ) ) {
function cart_link() { 
?><a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'Перейти в корзину' ); ?>">
<span class="cart-ico"> <i class="fa fa-shopping-cart"></i></span>
<span class="cart-txt">товаров: <span class="strong"><?php echo sprintf (_n( '%d', '%d', WC()->cart->cart_contents_count ), WC()->cart->cart_contents_count ); ?></span><br> на сумму: <span class="strong"><?php echo WC()->cart->get_cart_total(); ?></span></span>
</a>
<?php 
}
}

add_filter("script_loader_tag", "script_loader_tag_handler");

function script_loader_tag_handler($tag, $handle, $src){
	$tag = str_replace(" type='text/javascript'", '', $tag);
	
	return $tag;
}


add_action('wp_head', 'opengraph_handler', 5);

function opengraph_handler(){
	global $post;
	$title = wp_title( '-', false, '' );
	$frontend = WPSEO_Frontend::get_instance();
	$desc = $frontend->metadesc( false );
	$img_src = "https://ksg-group.ru/wp-content/themes/ksg/images/ksg/logo3fix_4727027.png";
	?>
	<meta property="og:title" content="<?=$title;?>"/>
	<meta property="og:type" content="website"/>
	<meta property="og:description" content="<?=$desc;?>"/>
	<meta property="og:url" content="<?php echo the_permalink(); ?>"/>
	<meta property="og:site_name" content="<?php echo get_bloginfo(); ?>"/>
	<meta property="og:image" content="<?php echo $img_src; ?>"/>
	<meta property="og:locale" content="ru_RU" />
	<?
}


function wp_nav_menu_extended($args = array()) {
    $_echo = array_key_exists('echo', $args) ? $args['echo'] : true;
    $args['echo'] = false;

    $menu = wp_nav_menu($args);

    // Load menu as xml
    $menu = simplexml_load_string($menu);

    // Find current menu item with xpath selector
    if (array_key_exists('xpath', $args)) {
        $xpath = $args['xpath'];
    } else {
        $xpath = '//li[contains(@class, "current-menu-item") or contains(@class, "current_page_item")]';
    }

    $current = $menu->xpath($xpath);

    // If current item exists
    if (!empty($current)) {
        $text_node = (string) $current[0]->children();

        // Remove link
        unset($current[0]->a);

        // Create required element with text from link
        $element_name = $args['replace_a_by'] ? $args['replace_a_by'] : 'span';

        $dom = dom_import_simplexml($current[0]);
        $n = $dom->insertBefore(
            $dom->ownerDocument->createElement($element_name, $text_node),
            $dom->firstChild
        );

        $current[0] = simplexml_import_dom($n);
    }

    $xml_doc = new DOMDocument('1.0', 'utf-8');
    $menu_x = $xml_doc->importNode(dom_import_simplexml($menu), true);
    $xml_doc->appendChild($menu_x);

    $menu = $xml_doc->saveXML($xml_doc->documentElement);

    if ($_echo) {
        echo $menu;
    } else {
        return $menu;
    }
}


add_action('template_redirect', 'last_mod_header');

function last_mod_header($headers) {
 if( is_singular() ) {
		$post_id = get_queried_object_id();
		$LastModified = gmdate("D, d M Y H:i:s \G\M\T", $post_id);
		$LastModified_unix = gmdate("D, d M Y H:i:s \G\M\T", $post_id);
		$IfModifiedSince = false;
		if( $post_id ) {
			if (isset($_ENV['HTTP_IF_MODIFIED_SINCE']))
				$IfModifiedSince = strtotime(substr($_ENV['HTTP_IF_MODIFIED_SINCE'], 5));  
			if (isset($_SERVER['HTTP_IF_MODIFIED_SINCE']))
				$IfModifiedSince = strtotime(substr($_SERVER['HTTP_IF_MODIFIED_SINCE'], 5));
			if ($IfModifiedSince && $IfModifiedSince >= $LastModified_unix) {
				header($_SERVER['SERVER_PROTOCOL'] . ' 304 Not Modified');
				exit;
			} 
 header("Last-Modified: " . get_the_modified_time("D, d M Y H:i:s", $post_id) );
			}
	}

}
	
function IsIndexBot(){
	$result = false;
	if($_COOKIE["BOT"]){
		$result = true;
	}

	if(!$result && stripos($_SERVER['HTTP_USER_AGENT'], 'Lighthouse') !== false){
		$result = true;
	}

	if(!$result){
		$result = (isset($_SERVER['HTTP_ACCEPT_LANGUAGE']) && strpos($_SERVER['HTTP_USER_AGENT'], 'Lighthouse') !== false);
	}

	if(!$result && isset($_SERVER['REMOTE_ADDR']) && stripos($_SERVER['REMOTE_ADDR'], '172.25') !== false){
		$result = true;
	}

	if(!$result && strpos($_SERVER['HTTP_USER_AGENT'], '90.0.4430.212') !== false){
		$result = true;
	}

	return $result;
}


add_action( 'wp', 'force_404' );
function force_404() {
	global $wp_query;
	$arr = explode('/', $_SERVER['REQUEST_URI']);
	$exist = [];
	foreach($arr AS $code){
		if(!$code)continue;
		$code = trim($code);
		if(in_array($code, $exist)){
			$wp_query->set_404();
			status_header(404);
			die();
		}
		
		
		$exist[] = $code;   
	}
	
	if($arr[1] === 'c'){
		checkSectionPath($arr);
	}
	
	if($_SERVER['REQUEST_URI'] === '/tolchina/0/'){
		$wp_query->set_404();
		status_header(404);
		die();
	}
	else if(stripos($_SERVER['REQUEST_URI'], 'index.php') !== false
	|| $_SERVER['REQUEST_URI'] !== mb_strtolower($_SERVER['REQUEST_URI'])){
		$wp_query->set_404();
		status_header(404);
		die();
	}
}

function pixel(){
	return 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==';
}

function checkSectionPath($arrPath){
	$arrPath = array_values(array_filter($arrPath, function($code){
		if($code && $code !== 'c'){
			return true;
		}
		
		return false;
	}));
	
	global $wpdb;
	global $wp_query;
	
	$lastCode = $arrPath[count($arrPath) - 1];
	$term = $wpdb->get_row( 'SELECT term_id FROM wp_terms WHERE `slug`="'.$lastCode.'"' );
	if(!$term){
		return;
	}
	
	$link = get_term_parents_list($term->term_id, '', ['format' => 'slug', 'link' => false]);
	if($link && sprintf("/c/%s", $link) !== $_SERVER['REQUEST_URI']){
		$wp_query->set_404();
		status_header(404);
		die();
	}
}


// function wpb_change_search_url() {
// 	if ( is_search() && ! empty( $_GET['s'] ) ) {
// 		wp_redirect( home_url( "/search/" ) . urlencode( get_query_var( 's' ) ) );
// 		exit();
// 	}
// }
// add_action( 'template_redirect', 'wpb_change_search_url' );