<!DOCTYPE HTML>
<html class="noIE" lang="ru">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title><?php wp_title(''); ?></title>
<?php wp_head(); ?>
<?if(!IsIndexBot()):?>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/fonts/lato/stylesheet.css">
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/fonts/font-awesome/css/font-awesome.min.css">
<?endif;?>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/master.css">
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/color9.css">
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/js/slick/slick-theme.css"/>

<? googlebot();?>
<meta name="yandex-verification" content="66d5cc613f78f297" >
<meta name="google-site-verification" content="_eqfoN659zJTx9q1KZw3bVExgeMaxL6I_jwNZTHwPC8" >
<?if(!IsIndexBot()):?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.js"></script>
<?endif;?>
</head>
<body itemscope itemtype="http://schema.org/WebPage">
<?if(!IsIndexBot()):?>
<!-- Yandex.Metrika counter -->
<script>
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter47243199 = new Ya.Metrika({
                    id:47243199,
                    clickmap:true,
                    trackLinks:true,
                    triggerEvent:true,
                    accurateTrackBounce:true,
                    webvisor:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
</script>
<?endif;?>
<noscript><div><img src="https://mc.yandex.ru/watch/47243199" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<?if(!IsIndexBot()):?>
<!-- /Yandex.Metrika counter -->
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-112174196-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-112174196-1');
</script>
<?endif;?>
<!-- HEADER -->
<div id="header">
  <div class="header_top">
    <div class="container">
      <div class="top_menu">
        <?php wp_nav_menu_extended( array( 'menu' => 'Верхнее меню', 'container' => '', 'container_class' => '', 'container_id' => '', 'menu_id' => '', 'menu_class' => '' ) ); ?>
      </div>
      <div class="hed_right">
        <ul>
          <li class="header_phone"><p style="display:block;"><span class="fa fa-phone"></span><a style="display:inline-block;" href="tel:+74956649014">+7 (495) 664-90-14</a></p><p style="display:block;"><span class="fa fa-phone"></span><a style="display:inline-block;" href="tel:+79266074688">+7 (926)-607-46-88</a></p></li>
          <li><a href="mailto:info@ksg-group.ru"><img alt="envelop" src="<?php bloginfo('template_url'); ?>/images/ksg/envelop.gif" width="27" height="20">&nbsp;<p>info@ksg-group.ru</p></a>
          <a class="webformbtnheader" data-fancybox="webform" href="#webform_feedback">Оставить заявку</a>
          </li>
          <li><? echo cart_link(); ?></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="header_bot">
    <div class="container">

      <!-- Logo -->
      <div class="logo">
        <?php
        if (get_page_uri() == 'glavnaya'):
        ?>
        <div class="header-logo">
          <img alt="alt" src="<?php bloginfo('template_url'); ?>/images/ksg/logo3fix_4727027.png" class="header-logo__img">
        </div>
        <?php else: ?>
        <a href="/" class="header-logo">
          <img alt="alt" src="<?php bloginfo('template_url'); ?>/images/ksg/logo3fix_4727027.png" class="header-logo__img">
        </a>
        <?php
        endif;
        ?>
      </div>

      <div id="nav" class="yamm">
        <button type="button" data-toggle="collapse" data-target="#navbar-collapse-1" class="navbar-toggle"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        <nav id="navbar-collapse-1" class="navbar-collapse collapse">
        <?php 
          $categories = get_terms( array(
            'taxonomy' => 'product_cat',
            'hide_empty' => false,
          ) );
         ?>
          <ul class="nav navbar-nav">
            <?php foreach ($categories as $category) { ?>
            <?php if($category->parent == 0) {?>
            <li class="dropdown"><a href="/c/<?=$category->slug;?>/" data-toggle="dropdown" class="dropdown-toggle"><?= $category->name ?><span class="caret strong"></span></a>
              <ul class="dropdown-menu">
                <li>
                  <div class="yamm-content">
                      <div class="row">
                        <?php foreach ($categories as $sub_category) { ?>
                        <?php if($category->term_id == $sub_category->parent) { ?>
                     
                     <a href="<?= get_term_link($sub_category); ?>"><?= $sub_category->name ?></a>

                       
                        <?php } ?>
                        <?php } ?>
                      </div>
                  </div>
                </li>
              </ul>
            </li>
            <?php } ?>
            <?php } ?>
          </ul>
        </nav>
      </div>
      <div class="right_menu">
        <ul>
          <li class="menubtn">
            <div class="menu_c search_menu">
              <form action="<?php bloginfo( 'url' ); ?>" class="search_box" method="get">
                
                <input type="search" class="txtbox" name="s" placeholder="Поиск..." value="<?php if(!empty($_GET['s'])){echo $_GET['s'];}?>">
                <input alt="search" type="image" src="<?php bloginfo('template_url'); ?>/images/ksg/search.webp">
              </form>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>

<div class="header-mobile">
  <div class="container header-mobile__c">
    <div class="logo-m">
          <?php
          if (get_page_uri() == 'glavnaya'):
          ?>
          <div class="header-logo-m">
            <img alt="alt" src="<?php bloginfo('template_url'); ?>/images/ksg/logo3fix_4727027.png" style="height: 35px;" class="header-logo__img">
          </div>
          <?php else: ?>
          <a href="/" class="header-logo-m">
            <img alt="alt" src="<?php bloginfo('template_url'); ?>/images/ksg/logo3fix_4727027.png" style="height: 35px;" class="header-logo__img">
          </a>
          <?php
          endif;
          ?>
    </div>
   <? echo cart_link(); ?>
   <button type="button" class="navbar-toggle burger-tgl"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        </div>
</div>

<div class="burger-m">
<div class="burger-close"></div>
  <div class="container">
          <div class="burger-m__contacts">
            <div class="header_phone"><p style="display:block;"><span class="fa fa-phone"></span><a style="display:inline-block;" href="tel:+74956649014">+7 (495) 664-90-14</a></p><p style="display:block;"><span class="fa fa-phone"></span><a style="display:inline-block;" href="tel:+79266074688">+7 (926)-607-46-88</a></p></div>
            <div>
              <a style="" class="burger-m__mail" href="mailto:info@ksg-group.ru"><img src="<?php bloginfo('template_url'); ?>/images/ksg/envelop.gif" height="20" >&nbsp;<span>info@ksg-group.ru</span></a>
            </div>
          </div>
          <ul class="burger-menu">
          <?php $m2 = wp_get_nav_menu_items(15);
                if ($m2):
                    foreach($m2 as $itm):
                ?>
                <li><a href="<?php echo $itm->url ?>"><?php echo $itm->title ?></a></li>
                <?php
                    endforeach;
                endif;?>
                <?php foreach ($categories as $category): ?>
            <?php if($category->parent == 0):?>
            <li class=""><a href="/c/<?php echo $category->slug;?>/"><?php echo $category->name ?></a>
            <?php endif; endforeach;  ?>
          </ul>
            </div>
  </div>