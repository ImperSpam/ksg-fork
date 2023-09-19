<?php get_header(); ?>
<div id="content">
  <div class="container">
    <div class="title clearfix">
      <h1>Поиск по: "<?php echo $_GET['s'];?>"</h1>
    </div>
    <div class="search_c">
    	<h1>Поиск по: "<?php echo $_GET['s'];?>"</h1>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="search_post-item">
<a href="<?php the_permalink();?>" №№№><?php the_title(); ?></a>
<?php 
#the_content('');
the_excerpt();
 ?>
</div>

<?php endwhile; else: ?>
<p>Поиск не дал результатов.</p>
<?php endif;?>
    </div>

  </div>
</div>
<?php get_footer(); ?>
