<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product, $woocommerce_loop;

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) )
	$woocommerce_loop['loop'] = 0;

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) )
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );

// Ensure visibility
if ( ! $product || ! $product->is_visible() )
	return;

// Extra post classes
$classes = array();
$classes[] = 'entry-item';
if ( 0 == ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] || 1 == $woocommerce_loop['columns'] )
	$classes[] = 'first';
if ( 0 == $woocommerce_loop['loop'] % $woocommerce_loop['columns'] )
	$classes[] = 'last';
?>

<?php

$before_item = '<div class="kopa-row-30">';
$after_item = '</div>';

ob_start();

?>

<div class="match-height-item kopa-col mobile-fluid col-xs-6 col-md-3">
    <article itemtype="http://schema.org/Product" itemscope="" <?php post_class( $classes ); ?>>
        <div class="entry-thumb">
            <a href="<?php the_permalink(); ?>" itemprop="url" title="<?php the_title(); ?>">
                <?php echo woocommerce_get_product_thumbnail(); ?>
            </a>

            <?php if ( $product->is_on_sale() ) : ?>
                <span class="sale"><?php _e('sale!', 'trendmag'); ?></span>
            <?php endif; ?>

            <a href="<?php echo esc_url( $product->add_to_cart_url() ); ?>" class="add-cart" title="<?php the_title(); ?>" data-product_id="<?php echo esc_attr( $product->id ); ?>" data-product_sku="<?php echo esc_attr( $product->get_sku() ); ?>" data-quantity="<?php echo esc_attr( isset( $quantity ) ? $quantity : 1 ); ?>"><i class="fa fa-shopping-cart"></i></a>

        </div>
        <div class="entry-content">

            <?php
            $product_terms = get_the_terms(  get_the_ID(), 'product_cat' );
            if ( $product_terms ) {
                $count = true;
                foreach ( $product_terms as $term ) {
                    if ( $count ) { ?>

                        <a href="<?php echo esc_url(get_term_link($term->term_id, 'product_cat')); ?>" class="product-categorie" title="<?php echo esc_html($term->name); ?>" rel="category"><?php echo esc_html($term->name); ?></a>

                        <?php
                    }
                    $count = false;
                }
            }

            if ( $rating_html = $product->get_rating_html() ) {
                echo $rating_html;
            }

            ?>

            <h4 class="product-name" itemprop="name"><a href="<?php the_permalink(); ?>" itemprop="url" title="<?php the_title(); ?>"><?php the_title(); ?></a></h4>
            <div class="clearfix"></div>

            <?php if ( $price_html = $product->get_price_html() ) : ?>
                <span class="price"><?php echo $price_html; ?></span>
            <?php endif; ?>

        </div>
    </article>
    <!-- /.entry-item -->
</div>

<?php
$item_html = ob_get_clean();


if ($woocommerce_loop['loop'] % 4 == 0){
    echo $before_item;
}
echo $item_html;
if ($woocommerce_loop['loop'] % 4 == 3){
    echo $after_item;
}
$woocommerce_loop['loop']++;


