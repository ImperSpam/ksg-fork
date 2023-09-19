<?php get_header(); ?>

<?php get_sidebar('short-advantages'); ?>

    <div id="content">
    	<div class="container ideas-hover pageb">
            <?php
                // Start the loop.
                while ( have_posts() ) : the_post();
            ?>
            <div class="title clearfix">
                <h1><?php the_title(); ?></h1>
                
            </div>
            <div class="blog_c">
            	<div class="row">
                	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    	<div class="blog_blk red5 clearfix animated" data-animation="rollIn">
                            
                            <div class="blog_desc">
                            	<?php the_content(); ?>
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
