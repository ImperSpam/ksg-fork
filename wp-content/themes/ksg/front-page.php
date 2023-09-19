<?php get_header(); ?>

<!-- HOME SLIDE -->
<div class="ksg-home-slider" id="ksg-home-slider">
    <!-- slide1 -->
        <div class="ksg-home-slider ksg-home-slide1 lazy" data-bg="/wp-content/themes/ksg/images/ksg/slide1.webp">
              <div class="col-md-12">
                <div class="ksg-home-slider-logo">
                  <img src="<?=pixel();?>" data-src="<?php bloginfo('template_url'); ?>/images/ksg/slider_title.webp" width="500" height="93" alt="logo" class="ksg-home-slider-logo__img lazy">
                </div>
              </div>
        </div>
        
    <!-- slide2 -->
        <div class="ksg-home-slider ksg-home-slide2 lazy" data-bg="/wp-content/themes/ksg/images/ksg/slide2.webp">
              <div class="col-md-12">
                <div class="ksg-home-slider-logo">
                  <img src="<?=pixel();?>" data-src="<?php bloginfo('template_url'); ?>/images/ksg/slider_title.webp" width="500" height="93" alt="logo" class="ksg-home-slider-logo__img lazy">
                </div>
              </div>
        </div>
        
    <!-- slide3 -->
        <div class="ksg-home-slider ksg-home-slide3 lazy" data-bg="/wp-content/themes/ksg/images/ksg/slide3.webp">
              <div class="col-md-12">
                <div class="ksg-home-slider-logo">
                  <img src="<?=pixel();?>" data-src="<?php bloginfo('template_url'); ?>/images/ksg/slider_title.webp" width="500" height="93" alt="logo" class="ksg-home-slider-logo__img lazy">
                </div>
              </div>
        </div>
        
        
    <!-- slide4 -->
        <div class="ksg-home-slider ksg-home-slide4 lazy" data-bg="/wp-content/themes/ksg/images/ksg/slide4.webp">
              <div class="col-md-12">
                <div class="ksg-home-slider-logo">
                  <img src="<?=pixel();?>" data-src="<?php bloginfo('template_url'); ?>/images/ksg/slider_title.webp" width="500" height="93" alt="logo" class="ksg-home-slider-logo__img lazy">
                </div>
              </div>
        </div>
        
        
    <!-- slide5 -->
        <div class="ksg-home-slider ksg-home-slide5 lazy" data-bg="/wp-content/themes/ksg/images/ksg/slide5.webp">
              <div class="col-md-12">
                <div class="ksg-home-slider-logo">
                  <img src="<?=pixel();?>" data-src="<?php bloginfo('template_url'); ?>/images/ksg/slider_title.webp" width="500" height="93" alt="logo" class="ksg-home-slider-logo__img lazy">
                </div>
              </div>
        </div>
</div>

<section class="ksg-categories">
  <div class="container">
    <h1>Крупнейшая металлобаза страны</h1>
    <div class="row">
      <div class="col-md-12">
<?php 
          $categories = get_terms( array(
            'taxonomy' => 'product_cat',
            // 'orderby' => 'term_id',
            //'slug'=>,
            //'slug'=>['chernyj-metall','ocinkovka','nerzhaveyushhaya-stal','cvetnye-metally'],
            //'include'=>[867,994,941,966],
             //'orderby' => 'description',
             //'order' => 'ASC',
             
             
            // 'number' => '7',
            'hide_empty' => false,
          ) );

         ?>
            <?php

            $mainCats = array(867,994,941,966);
            $tmpTree = array(); 
            
            foreach ($categories as $category)
            {
                $parent = $category->parent;
                $id = $category->term_id;
                if(in_array($id, $mainCats))
                {
                    if(!isset($tmpTree[$id]))
                    {
                        $tmpTree[$id] = array('element' => $category, 'children'=> array());
                    }
                    else
                    {
                        $tmpTree[$id]['element'] = $category;
                    }
                }
                else if(in_array($parent, $mainCats))
                {
                    if(!isset($tmpTree[$parent]))
                    {
                        $tmpTree[$parent] = array('children'=> array());
                    }

                    $children = $tmpTree[$parent]['children'];
                    $children[] = $category;
                    $tmpTree[$parent]['children'] = $children;
                }

            }

            $catTree = array();

            foreach($mainCats as $cat_id)
            {
                $catTree[] = $tmpTree[$cat_id];
            }
            

             foreach ($catTree as $item) { ?>
            <?php
                $category = $item['element'];
                $subCats = $item['children'];
              ?>

            <ul class="cat_index">
            <li>
            <a href="/c/<?=$category->slug;?>/">
            <?php
            $first_letter = mb_substr($category->name, 0, 1);
            switch ($first_letter)
            {
				#/wp-content/themes/ksg/images/ksg/
                case 'М': echo '<img src="'.pixel().'" alt="буква М" class="lazy" data-src="',bloginfo('template_url'),'/images/ksg/letter-m.png">';break;
                case 'Н': echo '<img src="'.pixel().'" alt="буква Н" class="lazy" data-src="',bloginfo('template_url'),'/images/ksg/letter-n.png">';break;
                case 'О': echo '<img src="'.pixel().'" alt="буква О" class="lazy" data-src="',bloginfo('template_url'),'/images/ksg/letter-o.png">';break;
                case 'Ц': echo '<img src="'.pixel().'" alt="буква Ц" class="lazy" data-src="',bloginfo('template_url'),'/images/ksg/letter-c.png">';break;
                
            }
            ?>
            <?= mb_substr($category->name, 1, strlen($category->name) - 1); ?></a></li>
            
              <?php  ?><li class="sub_categories"><ul class="cat_sub_index">
                    <?php foreach ($subCats as $sub_category) { ?>    
                    <?php
                        $thumb_id = get_woocommerce_term_meta( $sub_category->term_id, 'thumbnail_id', true );
                        $term_img = wp_get_attachment_url(  $thumb_id );
                    ?>
                <li>
                      <a href="<?= get_term_link($sub_category); ?>">
                      <img alt="<?=htmlspecialchars($sub_category->name);?>" src="<?=pixel();?>" class="lazy" data-src="<?=$term_img. '.webp';?>" width="60">

                      <?= (strpos($sub_category->name, ' '))?preg_replace('# #', '<sub>', $sub_category->name,1).'</sub>': $sub_category->name; ?></a>
                </li>
                  
                    <?php } ?>
              </ul></li><?php  ?>
          </ul>
            <?php } ?>
      </div>
    </div>
  </div>
</section>



<!-- COOPERATION -->
<section class="ksg-cooperation">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2 class="ksg-h2">Сотрудничать с <span class="strong">ГК "КомплектСтройГрупп"</span> выгодно!</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-md-2 col-sm-12"></div>
      <div class="col-md-4 col-sm-6">
        <div class="ksg-cooperation-list">
          <span class="ksg-cooperation-list__single" data-n="1">Информационное обеспечение</span>
          <span class="ksg-cooperation-list__single" data-n="2">Консультирование</span>
          <span class="ksg-cooperation-list__single" data-n="3">Подбор продукции</span>
          <span class="ksg-cooperation-list__single" data-n="4">Резка</span>
          <span class="ksg-cooperation-list__single" data-n="5">Фасовка</span>
          <span class="ksg-cooperation-list__single" data-n="6">Доставка</span>
          <span class="ksg-cooperation-list__single" data-n="7">Экспедирование</span>
        </div>
      </div>
      <div class="col-md-4 col-sm-6">
        <div class="ksg-cooperation__text cp_0">
          <p class="">АО «КомплектСтройГрупп» специализируется на оптовой и розничной продаже стального металлопроката по приемлемой стоимости. Мы работаем с 2008 года. На складе всегда в наличии черный, цветной и нержавеющий металлопрокат, весь сортамент – от круглых и профильных труб до арматуры и швеллеров. Продукция удовлетворяет всем требованиям стандартов ГОСТ, ISO и EN, что подтверждается соответствующими сертификатами. Кроме больших складских запасов наше предприятие имеет свой цех металлообработки и парк грузовой техники. Дополнительно предоставляем комплекс услуг, таких как:</p>
        </div>

        <div class="ksg-cooperation__text coop_text cp_">
          
        </div>
        <div class="ksg-cooperation__text coop_text cp_2">
          <p> Менеджеры нашей фирмы ответят на все Ваши вопросы и дадут квалифицированные рекомендации по интересующим товарам, подберут аналоги, сделают проверку сметных расчетов.</p>
        </div>
        <div class="ksg-cooperation__text coop_text cp_3">
          <p>ГК «КомплектСтройГрупп» – крупнейший торгово-складской комплекс по хранению и переработке металлопродукции, а так же – это современная складская инфраструктура, самый большой ассортимент (5000 наименований) и гарантированное наличие товара на складе (в совокупности объёмом до 100 000 тонн). Что позволяет обеспечивать потребителей металлопродукцией, в пределах территории одной базы, за счёт полного ассортимента, и комплектовать фактически любые заказы.</p>
        </div>
        <div class="ksg-cooperation__text coop_text cp_">
          
        </div>
        <div class="ksg-cooperation__text coop_text cp_5">
           <p>Упаковка металлопроката</p>
<p>Компания АО «КомплектСтройГрупп» предлагает на реализацию качественный металлопрокат напрямую с заводов-изготовителей и комбинатов в упаковке от производителя. Оцинкованные листы приходят с комбинатов уже в пачках. Пачки обвязаны стальной лентой. При вскрытии пачки и отгрузки клиенту части металла из неё — прокат отгружается россыпью. С целью сохранности металла при транспортировке наша компания предлагает платную услугу упаковка листов и полосы - металла, который наиболее подвержен деформации. При отгрузке открытой пачки листы снаружи дополнительно мягким листом (упаковка из металла) упакованы не будут. Поэтому, если необходим большой тоннаж листового проката, важно выяснить у своего менеджера, есть ли на складе закрытые пачки, и каким весом они имеются. Мы заинтересованы в отгрузке и выгрузке нашего металлопроката целым и невредимым, позаботиться о грузе помогут и квалифицированные работники склада, и водители, и отдел сбыта компании. АО «КомплектСтройГрупп» ценит долгосрочное сотрудничество с нашими покупателями!</p>
        </div>
        <div class="ksg-cooperation__text coop_text cp_6">
          <p>Для удобства наших клиентов доставка металлопроката и строительных материалов осуществляется без выходных - 7 дней в неделю.</p>
<p>Вы можете выбрать удобную для Вас систему доставки:</p>
<ul style="list-style-type:disc">
<li>по специальным тарифам в ряд населенных пунктов Московской области и городов РФ</li>
<li>с почасовой оплатой</li>
<li>зональную для Москвы и Московской область.</li>
</ul>
<p>Подробнее на странице: <a href="/dostavka/">http://ksg-group.ru/dostavka/</a></p>
        </div>
        <div class="ksg-cooperation__text coop_text cp_7">
         <p>Автомобильная доставка и экспедирование металла любых габаритов и веса</p>
<p>Департамент логистики АО "КомплектСтройГрупп" предлагает к вашим услугам автопарк грузовых автомобилей различной грузоподъемности, кроме того, при необходимости вы сможете заказать специальный транспорт: манипуляторы и краны, что позволит максимально эффективно использовать грузовое пространство автомашины.</p>
<p>Профессиональные специалисты определят подходящий вид транспорта в соответствии с объемом вашего заказа, габаритами и размерами металлопродукции, подберут наиболее оптимальный маршрут следования транспорта, чтобы минимизировать стоимость доставки.</p>
<p>Кроме того, по согласованию с клиентом мы осуществляем попутную доставку груза, и в этом случае оплата рассчитывается в одну сторону. Однако, чтобы избежать накладок в графике погрузки и доставки металла, необходимо заранее согласовать время с нашими специалистами.</p>
        </div>

      </div>
      <div class="col-md-2 col-sm-12"></div>
    </div>
  </div>
</section>
<!-- ADVANTAGES -->
<section class="ksg-advantages">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12">
         <h2 class="ksg-h2 ksg-h2_bg ksg-h2_white">Крупнейшая металлобаза страны</h2>
      </div>
    </div>
    <div class="row">
      <!-- Single Advantage -->
      <div class="col-md-4 col-sm-6">
        <div class="ksg-single-advantage">
         <a href="/o-kompanii/dostavka-v-den-oplaty/"><span class="ksg-single-advantage__text">Доставка в<br>день оплаты</span></a>
          <div class="ksg-single-advantage__icon">
            <img src="<?=pixel();?>" width="38" height="44" alt="Доставка в день оплаты" class="lazy" data-src="<?php bloginfo('template_url'); ?>/images/ksg/icons/advantages/delivery-packages-on-a-trolley.png" >
          </div>
        </div>
      </div>
      <!-- Single Advantage -->
      <div class="col-md-4 col-sm-6">
        <div class="ksg-single-advantage">
         <a href="/o-kompanii/10-let-uspeshnoj-raboty/"><span class="ksg-single-advantage__text">10 лет успешной<br>работы</span></a>
          <div class="ksg-single-advantage__icon">
            <img src="<?=pixel();?>" width="41" height="41" alt="10 лет успешной работы" class="lazy" data-src="<?php bloginfo('template_url'); ?>/images/ksg/icons/advantages/day-10-on-calendar-page.png" >
          </div>
        </div>
      </div>
      <!-- Single Advantage -->
      <div class="col-md-4 col-sm-6">
        <div class="ksg-single-advantage">
          <a href="/o-kompanii/onlajn-katalog/"><span class="ksg-single-advantage__text">Онлайн<br>каталог</span></a>
          <div class="ksg-single-advantage__icon">
            <img src="<?=pixel();?>" width="42" height="36" alt="Онлайн каталог" class="lazy" data-src="<?php bloginfo('template_url'); ?>/images/ksg/icons/advantages/list.png" >
          </div>
        </div>
      </div>
      <!-- Single Advantage -->
      <div class="col-md-4 col-sm-6">
        <div class="ksg-single-advantage">
          <a href="/o-kompanii/nam-doveryayut/"><span class="ksg-single-advantage__text">Нам<br>доверяют</span></a>
          <div class="ksg-single-advantage__icon">
            <img src="<?=pixel();?>" width="49" height="37" alt="Нам доверяют" class="lazy" data-src="<?php bloginfo('template_url'); ?>/images/ksg/icons/advantages/handshake.png" >
          </div>
        </div>
      </div>
      <!-- Single Advantage -->
      <div class="col-md-4 col-sm-6">
        <div class="ksg-single-advantage">
          <a href="/o-kompanii/dostavka-po-rossii/"><span class="ksg-single-advantage__text">Доставка по<br>России и СНГ</span></a>
          <div class="ksg-single-advantage__icon">
            <img src="<?=pixel();?>" width="42" height="32" alt="Доставка по России и СНГ" class="lazy" data-src="<?php bloginfo('template_url'); ?>/images/ksg/icons/advantages/placeholder-on-map-paper-in-perspective.png" >
          </div>
        </div>
      </div>
      <!-- Single Advantage -->
      <div class="col-md-4 col-sm-6">
        <div class="ksg-single-advantage">
          <a href="/o-kompanii/razgruzka-zakaza/"><span class="ksg-single-advantage__text">Разгрузка<br>материала</span></a>
          <div class="ksg-single-advantage__icon">
            <img src="<?=pixel();?>" width="42" height="32" alt="Разгрузка материала" class="lazy" data-src="<?php bloginfo('template_url'); ?>/images/ksg/icons/advantages/wheel-loader-tractor.png" >
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- INFO SECTION -->
<!--section class="ksg-info-section">
  <div class="container">
    <div class="row">
      <div class="col-md-1"></div>
      <div class="col-md-10">
        <div class="ksg-h2 ">Металлопрокат с доставкой за ОДИН день и с отсрочкой платежа на нашей базе металлопроката</div>
      </div>
      <div class="col-md-1"></div>
    </div>
    <div class="row">
      <div class="col-md-1"></div>
      <div class="col-md-4 ksg-info-section__img">
        <img src="<?php bloginfo('template_url'); ?>/images/ksg/metal.png" alt="meatl"">
      </div>
      <div class="col-md-6">
        <p class="ksg-info-section__text">Вы получаете только сертифицированную продукцию, качество которой соответствует ГОСТу, а также комплексные поставки черного, цветного и нержавеющего металлопроката (сортовой, фасонный, трубный, листовой) для промышленных предприятий и строительных организаций.</p>
      </div>
      <div class="col-md-1"></div>
    </div>
  </div>
</section-->

<!-- WORK STAGES -->
<div class="ksg-work-stages">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2 class="ksg-h2">ЭТАПЫ РАБОТ</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <!-- Single Work stage -->
        <div class="ksg-single-work-stage">
          <div class="ksg-single-work-stage__icon">
            <div><img src="<?=pixel();?>" width="70" height="72" class="lazy" data-src="<?php bloginfo('template_url'); ?>/images/ksg/icons/stages/headset.png" alt="icon"></div>
            <span>1</span>
          </div>
          <span class="ksg-single-work-stage__text">Звонок<br>консультанту</span>
        </div>
        <!-- Single Work stage -->
        <div class="ksg-single-work-stage">
          <div class="ksg-single-work-stage__icon">
            <div><img src="<?=pixel();?>" width="69" height="67" class="lazy" data-src="<?php bloginfo('template_url'); ?>/images/ksg/icons/stages/price-tag.png" alt="icon"></div>
            <span>2</span>
          </div>
          <span class="ksg-single-work-stage__text">Определение<br>цены</span>
        </div>
        <!-- Single Work stage -->
        <div class="ksg-single-work-stage">
          <div class="ksg-single-work-stage__icon">
            <div><img src="<?=pixel();?>" width="70" height="70" class="lazy" data-src="<?php bloginfo('template_url'); ?>/images/ksg/icons/stages/box.png" alt="icon"></div>
            <span>3</span>
          </div>
          <span class="ksg-single-work-stage__text">Комплектация<br>заказа</span>
        </div>
        <!-- Single Work stage -->
        <div class="ksg-single-work-stage">
          <div class="ksg-single-work-stage__icon">
            <div><img src="<?=pixel();?>" width="82" height="52" class="lazy" data-src="<?php bloginfo('template_url'); ?>/images/ksg/icons/stages/shipped.png" alt="icon"></div>
            <span>4</span>
          </div>
          <span class="ksg-single-work-stage__text">Условия<br>поставки</span>
        </div>
        <!-- Single Work stage -->
        <div class="ksg-single-work-stage">
          <div class="ksg-single-work-stage__icon">
            <div><img src="<?=pixel();?>" width="61" height="71"  class="lazy" data-src="<?php bloginfo('template_url'); ?>/images/ksg/icons/stages/invoice.png" alt="icon"></div>
            <span>5</span>
          </div>
          <span class="ksg-single-work-stage__text">Возможность<br>отсрочки<br>платежа</span>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- DEFERMENT OF PAYMENT -->
<div class="deferment-of-payment">
  <div class="container">
    <div class="row">
      <div class="col-md-5 col-sm-6">
        <img src="<?=pixel();?>" width="341" height="400" data-src="<?php bloginfo('template_url'); ?>/images/ksg/timer.png" alt="timer" class="lazy deferment-of-payment__img">
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="deferment-of-payment__content">
          <div class="h4">ОТСРОЧКА ПЛАТЕЖА</div>
          <p>Но и это еще не все! Мы пошли дальше, закрепив за своими клиентами право отсрочки платежа!<br>Любые варианты отсрочки действуют в двух случаях:</p>
          <p>1. для постоянных клиентов;<br>2. в случае крупного заказа (выше установленной суммы).</p>
          <p>И еще: мы гарантируем строгое соблюдение сроков поставок.<br>При небольшом объеме заказа срок —     <span>ВСЕГО ОДИН ДЕНЬ!</span></p>
        </div>
      </div> 
      <div class="col-md-1"></div>
    </div>
  </div>
</div>

<!-- BONUSES -->
<div class="ksg-bonuses">
  <div class="container">
    <div class="row">
      <div class="col-md-1 col-sm-12"></div>
      <div class="col-md-5 col-sm-6">
        <div class="ksg-bonuses__content">
          <h2 class="ksg-bonuses-title">
            <img src="<?=pixel();?>" width="48" height="48" data-src="<?php bloginfo('template_url'); ?>/images/ksg/icons/percent.png" alt="icon" class="lazy ksg-bonuses-title__img">
            <span class="ksg-bonuses-title__text">Бонусы для своих</span>
          </h2>
          <p class="ksg-bonuses-text">Становитесь нашим клиентом и получайте возможность пользоваться накопительными партнерскими скидками.</p>
          <a href="#" class="ksg-white-button JS-open-get-call-popup"><img width="23" height="29" src="<?php bloginfo('template_url'); ?>/images/ksg/icons/user.png" alt="icon"><span>Стать клиентом</span></a>
        </div>
      </div>
      <div class="col-md-5 col-sm-6">
        <img src="<?=pixel();?>" width="329" height="257" data-src="<?php bloginfo('template_url'); ?>/images/ksg/bonus.webp" alt="bonus" class="lazy ksg-bonuses__img">
      </div>
      <div class="col-md-1"></div>
    </div>
  </div>
</div>

<!-- INFO SECTION -->
<div class="ksg-info-section ksg-info-section_without-title ksg-info-section_check">
  <div class="container">
    <div class="row">
      <div class="col-md-5 col-sm-5 ksg-info-section__img">
        <img src="<?=pixel();?>" class="lazy" width="232" height="255" data-src="<?php bloginfo('template_url'); ?>/images/ksg/check-list.png" alt="meatl">
      </div>
      <div class="col-md-7 col-sm-7 ">
        <div class="ksg-info-section__text">
      <p>При покупке оптом или в розницу в АО «КомплектСтройГрупп» вы получаете не только металлопрокат гарантированного качества по привлекательным ценам. Всем нашим заказчикам также доступны:</p>
<ul >
  <li>широкий сортамент оцинкованной и неоцинкованной металлопродукции из латуни, меди, легированной, низкоуглеродистой, инструментальной, жаропрочной стали и прочих сплавов;</li>
  <li>помощь опытных специалистов по выбору материалов для конкретных строительно-монтажных и производственных задач;</li>
  <li>дешевая доставка заказанного металлопроката в любой район Московской области и другие регионы РФ и стран СНГ. Мы располагаем собственными грузовиками «Газель», МАЗ, Hyundai, DAF, Scania, низкорамными платформами, автокранами и манипуляторами грузоподъемностью 3–25 тонн;</li>
  <li>услуги собственного заготовочного цеха по резке, газовой, плазменной и абразивной резке, рубке, цинкованию, сверлению, гибке и прочим видам металлообработки;</li>
  <li>отгрузку в любое удобное для вас время (склад работает в режиме 24/7);</li>
  <li>персональные скидки, спецпредложения и прочие бонусы.</li>
</ul>
<p >Чтобы купить металлопрокат нужного сорта с быстрой доставкой и выгрузкой, свяжитесь с нашей базой в Москве: <a href="+74956649014">+7 (495) 664-90-14.</a></p>
      </div></div>
    </div>
  </div>
</div>


<?php get_sidebar('additional-services') ?>

<?php get_footer(); ?>
