<?php
	//サムネイルサポート
	add_theme_support('post-thumbnails');
	//デフォルトjquery削除
	function my_delete_local_jquery() {
		wp_deregister_script('jquery');
	}
	add_action('wp_enqueue_scripts', 'my_delete_local_jquery');
	//絵文字削除
	remove_action('wp_head', 'print_emoji_detection_script', 7);
	remove_action('wp_print_styles', 'print_emoji_styles');
	//embeded削除
	remove_action('wp_head','wp_oembed_add_host_js');
	//イメージ属性削除
	add_filter( 'image_send_to_editor', 'remove_image_attribute', 10 );
	function remove_image_attribute( $html ){
	  $html = preg_replace( '/(width|height)="\d*"\s/', '', $html );
	  $html = preg_replace( '/class=[\'"]([^\'"]+)[\'"]/i', '', $html );
	  $html = preg_replace( '/title=[\'"]([^\'"]+)[\'"]/i', '', $html );
	  $html = preg_replace( '/<a href=".+">/', '', $html );
	  $html = preg_replace( '/<\/a>/', '', $html );
		$html = preg_replace( '/  \/>/', '>', $html );
	  return $html;
	}
	//管理バー調整
	add_theme_support('admin-bar', array('callback' => '__return_false'));
	if(is_admin_bar_showing()) {
		add_action( 'wp_head', function() {
			echo '<style>body{margin-bottom:32px;}#wpadminbar{top:auto;bottom:0; position:fixed !important;}@media screen and (max-width: 782px){body{margin-bottom:46px;}}</style>';
		} );
	}
