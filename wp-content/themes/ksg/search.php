<?php get_header(); ?>
<div id="content">
  <div class="container">
    <div class="title clearfix">
      <h1>Поиск по: "<?php echo $_GET['s'];?>"</h1>
    </div>
    <div class="search_c">
    	<h1>Поиск по: "<?php echo $_GET['s'];?>"</h1>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="post-item">
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
<style>
  .search_c a{
    color: #fff;
    font-size: 27px;
    text-decoration: underline;
  }
  .search_c p{
    font-size: 16px !important;
    color: #fff !important;
    margin-top: 15px !important;
  }
  .post-item{
    padding-bottom: 20px;
    margin-bottom: 20px;
    border-bottom: 1px solid #fff;
  }
</style>
<?php get_footer(); ?>
