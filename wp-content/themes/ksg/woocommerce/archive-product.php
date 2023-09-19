<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
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
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

// get_header( 'shop' ); ?>

<div id="content">
  <div class="container">
    <div class="catelog_c">
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
<?php


  $cat_id = get_queried_object()->term_id;
  $taxonomy = get_queried_object()->taxonomy;
  $h1 = get_field("h1", $taxonomy . '_' . $cat_id);
  $bottomtext = get_field("bottomtext", $taxonomy . '_' . $cat_id);
  


/* $category = get_queried_object()->term_id;
 $h1 = get_field('h1','product_cat_'.$category);*/
 
if ( !empty($h1) ){
	echo    '<h1>'.$h1.'</h1>';
}else 
{?>
	 <h1><?php woocommerce_page_title(); ?></h1>
<?}

?>
      </div>
      <div class="row">
        <!--<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 ">
          <div class="sidebar sidebar_1 " >
          <?php $thumbnail_id = get_woocommerce_term_meta( get_queried_object()->term_id, 'thumbnail_id', true );
          if($thumbnail_id && have_posts()){
                 $term_img = wp_get_attachment_url($thumbnail_id);
                    ?>
                      <span class="curr_cat_image">
                      <?php  } ?>
                  <?php dynamic_sidebar( 'filter' ); ?>
        <?php  if($thumbnail_id){   ?>
                  </span>
                  <?php } ?>
                  
        <!--<div class="side_box">
              <div class="h5"><a href="#" class="tgl_btn">Цена</a></div>
              <div class="price tgl_c">
                <div class="clearfix">
                  <input type="text" class="txtbox" placeholder="100р.">
                  <span class="to">-</span>
                  <input type="text" class="txtbox" placeholder="1000р.">
                </div>
                <div class="price_bar"> 
                <!-- Slider -->
        <!--        <div id="slider"></div>
                </div>
                
              </div>
            </div>-->
            <?php 
              $categories = get_terms( array(
                'taxonomy' => 'product_cat',
                'hide_empty' => false,
              ) );
             ?>
             <?php /*foreach ($categories as $category) { ?>
             <?php if($category->parent == 175) { ?>
            <div class="side_box side_box_1 red5">
              <div class="h5"><a href="#" class="tgl_btn"><?= $category->name ?></a></div>
              <ul class="tgl_c">
                <?php foreach ($categories as $sub_category) { ?>
                <?php if($category->term_id == $sub_category->parent) { ?>
                <li><a href="<?= get_term_link($sub_category); ?>"><?= $sub_category->name ?></a></li>
              <?php } ?>
              <?php } ?>
              </ul>
            </div>
            <?php } ?>
            <?php }*/ ?>
          </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-8 col-xs-12">
          <div class="product_c">
<!--            <div class="filter_c">
              <span>Сортировать по:</span>
              <div class="select_box sel_2">
                <?php woocommerce_catalog_ordering(); ?>
              </div>
            </div>-->
            <div class="row view-grid animated  fadeInUp" data-animation="fadeInUp" >
                 <?php   if (function_exists('wp_get_terms_meta') && is_product_category())    {
                        $cate = get_queried_object();
                        $category_id = $cate->term_id;
                        $MetaValue = wp_get_terms_meta($category_id, 'category_slider' ,true);
                        if(strlen($MetaValue) > 2){
                        if (preg_match_all('/<img(?:\\s[^<>]*?)?\\bsrc\\s*=\\s*(?|"([^"]*)"|\'([^\']*)\'|([^<>\'"\\s]*))[^<>]*>/i', $MetaValue, $imgs)){
                            $cat_slider_imgs = array();
                            foreach ($imgs[1] as $image_url){
                                $image = wp_get_image_editor( $image_url );
                                
                                // обрабатываем картинку
                                if ( ! is_wp_error( $image ) ) {
                                	// уменьшим её до размеров 80х80
                                	$image->resize( 240, 240, true );
                                	// сохраним в корне сайта под названием new_image.png
                                 	$cat_slider_imgs[] = $filename = $image->generate_filename( );
                                 	$filename_path = $_SERVER['DOCUMENT_ROOT'].substr($filename, strpos($filename,'group.ru/')+8, strlen($filename) - 8);
                                 	$image->save($filename_path);
                                }
                             }
                       }
                        ?>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                        <div class="category_slider">
                        <?php
                            foreach ($cat_slider_imgs as $img)
                            { ?>
                              <img src="<?=$img;?>">
                          <?php  }
                        ?>
                        </div></div>
                        <?php
                        }
                    } ?>
             <?php if(term_description()){ ?>
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                <div class="default-text">
                  <?php do_action( 'woocommerce_archive_description' ); ?>
                </div>
              </div>
              <?php } ?>
              <?php $current_category_id = get_queried_object()->term_id; ?>
              <?php foreach ($categories as $category) { ?>
               <?php if($category->parent == $current_category_id) { 
                      $thumbnail_id = get_woocommerce_term_meta( $category->term_id, 'thumbnail_id', true );
               ?>
              <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 ">
                <a href="<?= get_term_link($category); ?>" class="main_box main_box--category <?=(!$thumbnail_id)?'noimgcategory':'';?>">
                             <?php     
                    if ( $thumbnail_id ) { ?>    
                    <div class="box_1">
                  <?php woocommerce_subcategory_thumbnail( $category ); ?>
                  </div>
                     <?php } ?>
                  <div class="desc">
                    <div class="h5"><?= $category->name ?></div>
                  </div>
                </a>
              </div>
               <?php } ?>
              <?php } ?>
 <?php 
global $post;
?>

              <?php if ( have_posts() ) : ?>
                <?php while ( have_posts() ) : the_post(); ?>
               <?php
$terms = get_the_terms( $post->ID, 'product_cat' );
$product_cat_id = array();
foreach ($terms as $term) {
   $product_cat_id[] = $term->term_id;
}
if(in_array($current_category_id, $product_cat_id)){

               ?>
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="single-product-in-row">
                  <?php if(has_post_thumbnail()){ ?>
                  <div class="single-product-in-row__photo">
                    <?php //woocommerce_template_loop_product_thumbnail(); ?>
                    <img src="<?php the_post_thumbnail_url(); ?>" alt="img" style="border:none!important;outline:none!important;">
                  </div>
                  <?php } ?>
                  <span class="single-product-in-row__name"><a href="<?=get_post_permalink();?>"><?php woocommerce_template_loop_product_title(); ?> </a></span> <?=woocommerce_template_loop_price();?>
                 
                 
                  <a class="single-product-in-row-counter__order-btn" href="<?=get_post_permalink();?>">Подробнее...</a>
                  <?//php woocommerce_template_loop_add_to_cart(); ?>
                </div>
              </div>
              <?php 
 }
unset($product_cat_id);
              endwhile; // end of the loop. ?>
              <?php endif;

              ?>

            </div>
            
            <div class="page_c clearfix red5">
				
				
              <?php woocommerce_pagination(); ?>
            </div>
            <div class="cat_bot_text">
				<?if (isset($bottomtext) && !empty($bottomtext)){echo $bottomtext;}?>
			</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
