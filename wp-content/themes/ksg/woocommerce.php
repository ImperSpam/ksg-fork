<?php get_header(); ?>

<?php get_sidebar('short-advantages'); ?>

	<?php 
		if ( is_singular( 'product' ) ) {
			woocommerce_content();
		} else {
			woocommerce_get_template( 'archive-product.php' );
		}
	?>

<?php get_sidebar('additional-services') ?>

<?php get_footer(); ?>