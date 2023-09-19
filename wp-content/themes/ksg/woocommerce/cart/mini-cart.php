<?php
/**
 * Mini-cart
 *
 * Contains the markup for the mini-cart, used by the cart widget.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/mini-cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.1.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_mini_cart' ); ?>

<?php if ( ! WC()->cart->is_empty() ) : ?>
	
  <div class="cart_row">
    <?php foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
        $_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
        $product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

        $categories = get_the_terms( $product_id, 'product_cat' );

        if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
          $product_name      = apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key );
          $thumbnail         = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
          $product_price     = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
          $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
          ?>
      <ul>
        <li>
          <div class="pro_img"><span><?= $thumbnail ?></span></div>
        </li>
        <li>
          <h5><a href="<?= $product_permalink ?>"><?= $product_name ?></a></h5>
          <p><?= $categories[0]->name ?></p>
        </li>
        <li>
          <div class="price"><?= $product_price ?></div>
          <?php
              echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
                '<a href="%s" class="remove del_btn" aria-label="%s" data-product_id="%s" data-product_sku="%s"></a>',
                esc_url( WC()->cart->get_remove_url( $cart_item_key ) ),
                __( 'Remove this item', 'woocommerce' ),
                esc_attr( $product_id ),
                esc_attr( $_product->get_sku() )
              ), $cart_item_key );
              ?></li>
      </ul>
      <?php } ?>
    <?php } ?>
  </div>
  <div class="cheout_row clearfix">
    <p><span class="fa fa-clock-o"></span>Все заявки обрабатываются в рабочее время.</p>
    <a href="/cart/" class="checkout_btn">Оформить заказ</a> </div>

<?php else : ?>

  <div class="cheout_row clearfix">
    <p class="woocommerce-mini-cart__empty-message"><?php _e( 'пуста', 'woocommerce' ); ?></p>
  </div>

<?php endif; ?>

<?php do_action( 'woocommerce_after_mini_cart' ); ?>
