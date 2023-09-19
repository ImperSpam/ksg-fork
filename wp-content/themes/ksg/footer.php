<!-- FOOTER -->
<footer class="ksg-footer">
  <div class="ksg-footer__top">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-sm-12">
          <div class="ksg-footer-about">
            <img src="<?=pixel();?>" class="lazy ksg-footer-about__images" data-src="<?php bloginfo('template_url'); ?>/images/ksg/about.webp" alt="О компании" >
            <span class="ksg-footer-about__title">База металлопроката</span>
            <div class="ksg-footer-about__text">
            <p class="rekvizit"><span class="strong">Реквизиты:</span><br>
			ООО «МОНОЛИТСТРОЙ»<br>
			Инн: 7743935769<br>
			ОГРН: 1147746911300<br>
			КПП: 774301001<br>
			</p>
            </div>
          </div>
        </div>
        <div class="col-md-2 col-sm-4">
          <span class="ksg-footer-about__title">Информация</span>
          <?php wp_nav_menu( array( 'menu' => 'Меню в футере 1', 'container' => '', 'container_class' => '', 'container_id' => '', 'menu_id' => '', 'menu_class' => 'ksg-footer-menu' ) ); ?>
        </div>
        <div class="col-md-2 col-sm-4">
          <span class="ksg-footer-about__title">Каталог</span>
          <?php wp_nav_menu( array( 'menu' => 'Меню в футере 2', 'container' => '', 'container_class' => '', 'container_id' => '', 'menu_id' => '', 'menu_class' => 'ksg-footer-menu' ) ); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="ksg-footer__bottom">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <p class="ksg-footer-copy">© 2020 ГК «КомплектСтройГрупп» <a href="/karta-sajta/">Карта сайта</a></p>
          
        </div>
        <div class="col-md-6">
        <div class="float-right">
            
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>

<!-- GET BACK CALL POPUP-->
<div class="get-back-call-popup get-back-call-popup_js default-popup">
  <div class="default-popup__aligner">
<div class="popup-form"><a class="popup-close close-popup_js" href="#"><img alt="close icon" src="https://ksg-group.ru/wp-content/themes/ksg/images/ksg/icons/close.png"></a><span class="popup-form__title">Заказать<br>обратный звонок</span>
<?=do_shortcode('[contact-form-7 id="16382" title="Pop-up"]');?>
<div class="popup-form__conf"><img alt="secure icon" src="https://ksg-group.ru/wp-content/themes/ksg/images/ksg/icons/secure.png"><span>Конфиденциальность персональных данных</span></div>
</div>
  </div>
</div>
<!-- <div class="trubka JS-open-get-call-popup">
<img src="<?php bloginfo('template_url'); ?>/images/trubka.png">
</div> -->
<div class="trubka">
    <div class="circlephone" style="transform-origin: center;"></div>
    <div class="circle-fill" style="transform-origin: center;"></div>
    <div class="img-circle" style="transform-origin: center;">
        <div class="img-circleblock" style="transform-origin: center;"></div>
    </div>
</div>

<script src="<?php bloginfo('template_url'); ?>/js/jquery.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/lazyload.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/masonry.pkgd.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/bootstrap.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/jquery.icheck.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/package.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/jquery.flexslider.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/bxslider/jquery.bxslider.min.js"></script> 
<script src="<?php bloginfo('template_url'); ?>/js/jquery.cycle.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/slick/slick.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/scripts.min.js?v=1.02"></script>
<script src="/d-goals.js"></script>


<?php wp_footer(); ?>
<?if(!IsIndexBot()):?>
<!-- Yandex.Metrika counter -->
<script>
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(65656384, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/65656384" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
<?endif;?>
<script src="<?php bloginfo('template_url'); ?>/js/ya-params.js"></script>
<div class="hidden">
  <div id="webform_feedback">
    <?echo do_shortcode('[contact-form-7 id="16931" title="Экспресс заявка"]');?>
  </div>
</div>
</body>
</html>
