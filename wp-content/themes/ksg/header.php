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
        <a href="/" class="header-logo">
          <img alt="logo" src="<?php bloginfo('template_url'); ?>/images/ksg/logo3fix_4727027.webp" class="header-logo__img">
        </a>
      </div>

      <div id="nav" class="yamm">
        <button type="button" data-toggle="collapse" data-target="#navbar-collapse-1" class="navbar-toggle"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        <nav id="navbar-collapse-1" class="navbar-collapse collapse">
        <?php 
          $categories = get_terms( array(
            'taxonomy' => 'product_cat',
            // 'orderby' => 'term_id',
            // 'order' => 'DESC',
            // 'number' => '7',
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
                        <?php /*  <ul>
                            <?php foreach ($categories as $sub_sub_category) { ?>
                            <?php if($sub_category->term_id == $sub_sub_category->parent) { ?>
                            <li><a href="<?= get_term_link($sub_sub_category); ?>"><?= $sub_sub_category->name ?></a></li>
                            <?php } ?>
                            <?php } ?>
                          </ul> <?php */ ?>
                       
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
          <?php/* if ( is_active_sidebar( 'cart' ) && !is_cart() && !is_checkout()) : ?>
          <!--<li class="menubtn"><a href="#"><img src="<?php bloginfo('template_url'); ?>/images/ksg/icons/cart.png"></span></a>
            <div class="menu_c cart_menu">
                <?php dynamic_sidebar( 'cart' ); ?>
            </div>
          </li>
          <?php endif; ?>
          <li class="menubtn"><a href="#"><img src="<?php bloginfo('template_url'); ?>/images/ksg/icons/portrait.png"></a>
            <div class="menu_c acc_menu">
            <?php if ( !is_user_logged_in() ) { ?>
              <div class="menu_title clearfix">
                <h4>Аккаунт</h4>
                <a href="/my-account/?action=register" class="sign_up">Регистрация</a> </div>
              <form action="/my-account/" class="login_frm" method="post">
                <input type="text" class="txtbox" placeholder="Логин" name="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( $_POST['username'] ) : ''; ?>">
                <input type="password" class="txtbox" placeholder="Пароль" name="password">
                <div class="remember">
                  <input type="checkbox" name="rememberme" class="chkbox icheckbox_minimal"/>
                  Запомнить меня</div>
                <input type="submit" class="signin_btn btn_c" value="Войти">
              </form>
              <div class="forgot clearfix"> <span>Забыли: </span> <a href="<?php echo esc_url( wp_lostpassword_url() ); ?>">Пароль</a> <a href="<?php echo esc_url( wp_lostpassword_url() ); ?>" class="name">Логин</a> </div>
              <?php } else { ?>
                <div class="menu_title clearfix">
                  <a href="/my-account/">Профиль</a>
                </div>
              <?php } ?>
            </div>
          </li>--> <?php */ ?>
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

