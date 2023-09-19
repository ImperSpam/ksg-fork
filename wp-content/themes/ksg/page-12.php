<?php get_header(); ?>

<?php get_sidebar('short-advantages'); ?>

    <div id="content">
    	<div class="container ideas-hover pageb">
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
                    	<div class="blocokid-<?=$post->ID;?> blog_blk red5 clearfix animated" data-animation="rollIn">
                            
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

    <style>
        #content .blog_blk .blog_desc p{
            font-size: 20px;
            
        }
        body{
            font-size: 20px;
        }
        .ksg-h2 {
            margin: 20px;
        }

        .gallery{
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
        .gallery-item{
            width:  calc(50% - 25px) !important;
            height: 250px;
        }
        dt{
            height: 100%;
            width: 100%;
        }
        dt img{
            height: 100%;
            width: 100%;
            object-fit: cover;
        }
    </style>

<?php get_sidebar('additional-services') ?>

<?php get_footer(); ?>