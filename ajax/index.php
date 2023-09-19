<?
define( 'DOING_AJAX', true );
if ( ! defined( 'WP_ADMIN' ) ) {
	define( 'WP_ADMIN', true );
}

require_once dirname( __DIR__ ) . '/wp-load.php';

$data = explode("\n", file_get_contents("urls.csv"));

$data = array_filter($data, function($str){
	$arr = explode("/", $str);
	return $arr[1] === 'c';
});

global $wpdb;

$urlMap = [];

$customReplace = [
	'/vgp-elektrosvarnye-truby-truby-metalloprokat/' => '/vgp-elektro-truby/',
	'/listovoj-prokat-metalloprokat/' 				 => '/listovoj-prokat/'
];
echo '<pre>';
foreach($data AS $url){
	$arr = explode("/", $url);
	foreach(array_reverse($arr) AS $code){
		if(strlen($code) < 30){
			continue;
		}
		$name = $code;
		break;
	}
	
	// $post = $wpdb->get_row( 'SELECT * FROM wp_terms WHERE `slug`="'.$name.'"' );
	// if(!$post){
		// continue;
	// }
	
	$newName = mb_substr($name, 0, ceil(mb_strlen($name) / 2.5));
	$newName = trim($newName);
	if(mb_substr($newName, 0, 1) === '-'){
		$newName = mb_substr($newName, 1);
	}
	if(mb_substr($newName, -1, 0) === '-'){
		$newName = mb_substr($newName, 1);
	}
	
	
	if(in_array($newName, array_values($urlMap))){
		var_Dump('Error $url exists');
		continue;
	}
	
	$newUrl = str_replace($name, $newName, $url);
	$newUrl = str_replace(array_keys($customReplace), array_values($customReplace), $newUrl);
	$urlMap[$url] = $newUrl;
	
	
	// $result = $wpdb->update( 'wp_terms', [ 'slug' => $newName ], [ 'term_id' => $post->term_id ] );
	// var_Dump($result);
	
	
	var_Dump(strlen('https://ksg-group.ru'.$newUrl) . ' ' . 'https://ksg-group.ru'.$newUrl);
	
}

$redirects = [];
foreach($urlMap AS $url => $newUrl){
	$redirects[] = 'Redirect 301 ' . trim($url) . " https://ksg-group.ru" . trim($newUrl);
}

file_put_contents('redirects.txt', implode("\n", $redirects));