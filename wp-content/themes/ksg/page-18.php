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
    </div>
    <div class="contact_c">
      <div class="box contact-box animated  rollIn" data-animation="rollIn" >
        <?php the_field('map-code'); ?>
      </div>
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 bounceInLeft animated animation-done " data-animation="bounceInLeft">
          <div class="infor_c">
            <h5>Информация</h5>
            <div class="infor_c_inn">
              <?php the_content(); ?>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 animated bounceInRight animation-done" data-animation="bounceInRight">
          <div class="con_frm">
            <h5>Контактная форма</h5>
              <div class="frm con_frm_inn">
              <?= do_shortcode('[contact-form-7 id="35" title="Контактная форма"]'); ?>
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
