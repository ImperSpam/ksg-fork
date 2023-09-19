<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( $related_products ) : ?>

	<!--section class="related products">

		<h2><?php esc_html_e( 'Related products', 'woocommerce' ); ?></h2>

		<?php woocommerce_product_loop_start(); ?>

			<?php foreach ( $related_products as $related_product ) : ?>

				<?php
				 	$post_object = get_post( $related_product->get_id() );

					setup_postdata( $GLOBALS['post'] =& $post_object );

					wc_get_template_part( 'content', 'product' ); ?>

			<?php endforeach; ?>

		<?php woocommerce_product_loop_end(); ?>

	</section-->

	<div class=" animated  fadeInUp popular-products" data-animation="fadeInUp">
        <div class="clearfix">
          <div class="kakh3 acenter">Популярные товары</div>
        </div>
        <div class="carosel product_c">
          <div class="row"> 
            <!-- Place somewhere in the <body> of your page -->
            <div >
              <ul class="bxcarousel" >
              <?php foreach ( $related_products as $related_product ) : ?>
                <li>
                  <div class="main_box">
                    <div class="box_1">
                    <?php woocommerce_template_loop_product_thumbnail(); ?>
                    
                    <div class="overlay"> <a class="btn_c cart_btn_1" href="<?php the_permalink(); ?>">Подробнее</a><!--<a class="btn_c info_btn" href="<?php the_permalink(); ?>">Подробнее</a> --></div>
                    
                    </div>
                    <div class="desc">
                      <div class="h5"><?=get_the_title(); ?></div>
                     <!-- <p>Подкатегория 1</p>
                      <div class="price">10250р.</div>-->
                    </div>
                  </div>
                </li>
                <?php endforeach; ?>
              </ul>
            </div>
          </div>
        </div>
      </div>

<?php endif;

wp_reset_postdata();
