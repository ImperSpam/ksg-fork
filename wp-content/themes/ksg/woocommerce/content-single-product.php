<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
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
	exit; // Exit if accessed directly
}
global $product;
?>

<?php
	/**
	 * woocommerce_before_single_product hook.
	 *
	 * @hooked wc_print_notices - 10
	 */
	 do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }
?>

<div id="content">
  <div class="container productb">
	  <div class="breadcrams" itemprop="breadcrumb">
	  <?php
			  if(function_exists('bcn_display'))
					{
					bcn_display();
					}
					
					
					
					
					?>
					
					<?php
if ( function_exists('yoast_breadcrumb') ) {
yoast_breadcrumb('
<p id="breadcrumbs">','</p>
');
}
?>
	</div>
    <div class="title clearfix">
      <?php woocommerce_template_single_title(); ?>
      <div class="title_right"> <a href="/shop/" class="backtocate"><img src="<?php bloginfo('template_url'); ?>/images/select_left_arr.png" alt="icon">Вернуться в каталог</a> </div>
    </div>
    <script> window.isProductPage = true</script>
    <!--gen--product--meta-->
    <?
  /* $categories = get_the_terms( $post->ID, 'product_cat' );
	$cat_ids = array();
	foreach ($categories as $category) {	
		$cat_ids[] = $category->name.' '; //Может быть в нескольких категориях  
	}	*/
	?>

<div style="display:none;">
<div class="namecategor"><?=$cat_ids[0];?></div>
</div>
    <div class="pro_main_c">
      <div class="row">
        <div class="col-lg-5 col-md-4 col-sm-12 col-xs-12 animated  animation-done bounceInLeft" data-animation="bounceInLeft">
          <div class="slider_1 clearfix">
            <div class="clearfix" id="image-block">
              <?php woocommerce_show_product_images(); ?>
            </div>
          </div>
        </div>
        <div class="col-lg-7 col-md-8 col-sm-12 col-xs-12 animated animation-done  bounceInRight" data-animation="bounceInRight">
          <div class="desc_blk">
            <div class="desc_blk_inn">
              <div class="default-text">
                <div class="price_block col-md-4">
                                <!-- <?php woocommerce_template_single_add_to_cart(); ?> -->
                                <button type="button" class="button alt modalka"><img class="cart_img" src="/images/cart.png">Купить</button>
                                <?php woocommerce_template_single_price(); ?> 
                                <div class="podrob">Подробности по телефону: <span class="strong">+7(495) 664-90-14</span></div>
                                <div class="wze">Чем больше покупка, тем выгоднее цена.</div>
                              </div>
              <div class="attributes_block col-md-8">
                <div class="hdr_title">Характеристики:</div>
                <?php echo $product->list_attributes(); ?>
              </div>

              </div>
            </div>
<!--            <div class="desc_blk_bot clearfix">
              <div class="single-text-char">
                <input type="text" value="" class="single-text-char__input">
                <span class="single-text-char__text">тонн</span>
              </div>
              <div class="single-text-char">
                <input type="text" value="" class="single-text-char__input">
                <span class="single-text-char__text">метров<sup>2</sup></span>
              </div>
            </div>
-->
<!--            <div class="review_row clearfix">
              <span class="product-card-price">
                <?php woocommerce_template_single_price(); ?>  
              </span>
              <?php woocommerce_template_single_add_to_cart(); ?>
            </div>-->
          </div>
        </div>
<div class="col-md-12 opisanie_des">
  <div class="opisanie">
                  <?php the_content(); ?>
</div>      
</div>  
      </div>

      <?php woocommerce_output_related_products(); ?>
      
    </div>
  </div>
</div>

<div id="myModal" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <? the_title( '<div class="titl">', '</div>' );?>
      </div>
 
      <div class="modal-body">
        <div class="container-fluid">
          <div class="row">
            <div class="col-modal">
              <label>Количество, т</label>
              <input type="text" class="quantity-count" data-price="<?=round($product->get_price())?>">
            </div>
            <div class="col-modal">
              <label>Цена за тонну</label>
              <input type="text" class="quantity-price">
            </div>
            <div class="col-modal">
              <label>Сумма</label>
              <input type="text" class="quantity-sum">
            </div>
            <div class="col-modal">
              <?php woocommerce_template_single_add_to_cart(); ?>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
            <div class="count-error"></div>
          </div>
          <div class="row">
            <div class="col-md-12">
            <div class="jop">Чем больше покупка, тем выгоднее цена.</div>
          </div>
          <div class="col-md-12">
            <div class="mop">Количество метров указано с погрешностью согласно ГОСТа</div>
          </div>
          </div>
      </div>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
</div>
 

<script>
jQuery(document).ready(function(){

  jQuery(".modalka").click(function() {

    jQuery("#myModal").modal('show');
  });
});
</script>