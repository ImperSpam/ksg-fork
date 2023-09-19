<?php get_header(); ?>

<?php get_sidebar('short-advantages'); ?>

    <div id="content">
    	<div class="container">
            <?php
                // Start the loop.
                while ( have_posts() ) : the_post();
            ?>
            <div class="title clearfix">
                <h2><?php the_title(); ?></h2>
                <div class="title_right cart_list">
                    <ul>
                        <li class="active"><span>1</span></li>
                        <li><span>2</span></li>
                    </ul>
                </div>
            </div>
            <div class="cart_c">
                <div class="cart_bot">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="ship_frm_c">
                                <div class="frm ship_frm">
                                    <?php the_content(); ?>
                                </div>
                                <div class="cart_btn clearfix">
                                    <!--a href="/cart/" class="back_btn"><span class="fa fa-chevron-left"></span>Back</a>
                                    <a href="#" class="next_btn">Next step<span class="fa fa-chevron-right"></span></a-->
                                </div>        
                            </div>
                        </div>
                    </div>
               </div>     
            </div>
            <?php // End of the loop.
                endwhile;
            ?>
    	</div>
    </div>

<?php get_sidebar('additional-services') ?>

<?php get_footer(); ?>
