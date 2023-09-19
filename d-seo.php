<?php
/**
 * Оптимизаторский файл. Подключать только include_once!!! Не забываем global $aSEOData, где нужно.
 *
 * if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/d-seo.php')) {
 *   include_once($_SERVER['DOCUMENT_ROOT'] . '/d-seo.php');
 * }
 *
 * Изменяемые параметры массива $aSEOData (квадратными скобками выделены неактивные)
 * title             - title страницы
 * descr             - meta descr
 * keywr             - meta keywords
 *
 */

//Глобальные значения (по умолчанию)
  $aSEOData['title'] = '';
  $aSEOData['descr'] = '';
  $aSEOData['keywr'] = '';

$noseo = array( //внесено в админке
'/c/metalloprokat/shveller/alyuminievyj-profil/',
'/c/metalloprokat/armatura/',
'/c/metalloprokat/truby/',
'/c/metalloprokat/ugolok/',
'/c/metalloprokat/listy/',
'/c/metalloprokat/shveller/',
'/c/metalloprokat/truby/profilnye-nerzhaveyushhie/',
'/c/nerzhavejka/truby-nerzhaveyushhie/',
'/c/nerzhavejka/',
'/c/metalloprokat/balka/',
'/c/metalloprokat/truby/mednaya/',
'/c/metalloprokat/listy/alyuminievyj-listy/',
'/c/metalloprokat/provoloka/',
'/c/nerzhavejka/listy-nerzhaeyushhie/',
'/c/metalloprokat/balka/dvutavrovye/',
'/abrazivnaya-rezka-metalla/',
'/finishnaya-obrabotka-metalla/',
'/gazovaya-i-plamennaya-rezka/',
'/gibka-metalla/',
'/gibka-gilotinoj/',
'/cynkovanie-chyornogo-metalloprokata/',
'/otmotka-buhtovoj-armatury-i-rulonov/',
'/sverlenie-metalloprokata/',
'/c/metalloprokat/polosa/',
'/c/cvetnoj-prokat/alyuminij/profil/',
'/c/metalloprokat/provoloka/stalnaya/',
'/c/metalloprokat/shveller/10/',
'/c/metalloprokat/shveller/kvadratnyj/',
'/c/metalloprokat/shveller/23/',
);
if (preg_match('#<h1[^>]*>(.*)</h1>#siU',$sContent,$h1) && !in_array($_SERVER['REQUEST_URI'],$noseo)){
	$h1 = $aSEOData['h1']?$aSEOData['h1']:$h1[1];
	$aSEOData['title'] = $h1.' | АО «КомплектСтройГрупп»';
	$aSEOData['descr'] = $h1. '. Компания «КомплектСтройГрупп» - крупнейшая металлобаза страны. Наш телефон в Москве: +7(495) 664-90-14';
}



//генерации
$nogetmet = array(
'/c/metalloprokat/shveller/',
'/c/metalloprokat/truby/profilnye-nerzhaveyushhie/',
'/c/metalloprokat/balka/',
'/c/metalloprokat/truby/mednaya/',
'/c/metalloprokat/listy/alyuminievyj-listy/',
'/c/metalloprokat/provoloka/',
'/c/metalloprokat/balka/dvutavrovye/',
'/c/metalloprokat/polosa/',
'/c/metalloprokat/provoloka/stalnaya/',
'/c/metalloprokat/shveller/10/',
'/c/metalloprokat/shveller/kvadratnyj/',
'/c/metalloprokat/shveller/23/',
);

preg_match('#<h1[^>]*>(.*)</h1>#siU',$sContent,$h1);

if (strpos($_SERVER['REQUEST_URI'],'c/metalloprokat/') && $_SERVER['REQUEST_URI']!='/c/metalloprokat/' && $h1!=false && !in_array($_SERVER['REQUEST_URI'],$nogetmet))
{
	$h1 = $aSEOData['h1']?$aSEOData['h1']:$h1[1];
	$aSEOData['title'] = $h1.' | Металлопрокат по доступным ценам в «КоплектСтройГрупп»';
        $aSEOData['descr'] = $h1.' от компании «КоплектСтройГрупп». Мы осуществляет продажу металлопродукции по доступным ценам. Гарантируем оперативную обработку заказов и индивидуальный подход к каждому клиенту. Наш телефон в Москве: +7 (495) 664-90-14.';
        $aSEOData['keywr'] = mb_strtolower($h1);
}

$nogetnerz = array(
'/c/nerzhavejka/truby-nerzhaveyushhie/',
'/c/nerzhavejka/listy-nerzhaeyushhie/',
);

if (strpos($_SERVER['REQUEST_URI'],'c/nerzhavejka/') && $_SERVER['REQUEST_URI']!='/c/nerzhavejka/' && $h1!=false && !in_array($_SERVER['REQUEST_URI'],$nogetnerz))
{
	$h1 = $aSEOData['h1']?$aSEOData['h1']:$h1[1];
	$aSEOData['title'] = $h1.' | Купить нержавейку по доступным ценам в «КоплектСтройГрупп»';
        $aSEOData['descr'] = $h1.' от компании «КоплектСтройГрупп». Мы осуществляет продажу металлопродукции по доступным ценам. Гарантируем оперативную обработку заказов и индивидуальный подход к каждому клиенту. Наш телефон в Москве: +7 (495) 664-90-14.';
        $aSEOData['keywr'] = mb_strtolower($h1);
}
if (strpos($_SERVER['REQUEST_URI'],'c/ocinkovka/') && $_SERVER['REQUEST_URI']!='/c/ocinkovka/' && $h1!=false)
{
	$h1 = $aSEOData['h1']?$aSEOData['h1']:$h1[1];
	$aSEOData['title'] = $h1.' | Купить оцинковку по доступным ценам в «КоплектСтройГрупп»';
        $aSEOData['descr'] = $h1.' от компании «КоплектСтройГрупп». Мы осуществляет продажу металлопродукции по доступным ценам. Гарантируем оперативную обработку заказов и индивидуальный подход к каждому клиенту. Наш телефон в Москве: +7 (495) 664-90-14.';
        $aSEOData['keywr'] = mb_strtolower($h1);
}

$nogencvetn = array(
'/c/cvetnoj-prokat/alyuminij/profil/',
);

if (strpos($_SERVER['REQUEST_URI'],'c/cvetnoj-prokat/') && $_SERVER['REQUEST_URI']!='/c/cvetnoj-prokat/' && $h1!=false && !in_array($_SERVER['REQUEST_URI'],$nogencvetn))
{
	$h1 = $aSEOData['h1']?$aSEOData['h1']:$h1[1];
	$aSEOData['title'] = $h1.' | Цветной металлопрокат в «КоплектСтройГрупп»';
        $aSEOData['descr'] = $h1.' от компании «КоплектСтройГрупп». Мы осуществляет продажу металлопродукции по доступным ценам. Гарантируем оперативную обработку заказов и индивидуальный подход к каждому клиенту. Наш телефон в Москве: +7 (495) 664-90-14.';
        $aSEOData['keywr'] = mb_strtolower($h1);
}



//Определяем адрес (REQUEST_URI есть не всегда)
  $sSEOUrl = $_SERVER['REQUEST_URI'];
//Собственно вариации для страниц
  switch ($sSEOUrl) {
  case '/c/cvetnoj-prokat/latun/':
 $aSEOData['h1']='Латунный прокат'; 
break; 
case '/c/cvetnoj-prokat/med/':
 $aSEOData['h1']='Медный прокат'; 
break; 
case '/c/metalloprokat/':
 $aSEOData['h1']='Металлопрокат'; 
  $aSEOData['title'] = 'Металлопрокат | Купить металлопродукцию в «КоплектСтройГрупп»';
        $aSEOData['descr'] = 'Металлопрокат от компании «КоплектСтройГрупп». Мы осуществляет продажу металлопродукции по доступным ценам. Гарантируем оперативную обработку заказов и индивидуальный подход к каждому клиенту. Наш телефон в Москве: +7(495) 664-90-14.';
        $aSEOData['keywr'] = 'металлопрокат купить';
break; 


case '/c/metalloprokat/krug/':
 $aSEOData['h1']='Круги'; 
break; 
case '/c/metalloprokat/kvadrat/':
 $aSEOData['h1']='Квадраты'; 
break; 
case '/c/metalloprokat/lenta/':
 $aSEOData['h1']='Летны'; 
break; 

case '/c/metalloprokat/page/2/':
 $aSEOData['h1']='Металлопрокат стр.2'; 
break; 
case '/c/metalloprokat/page/3/':
 $aSEOData['h1']='Металлопрокат стр.3'; 
break; 
case '/c/metalloprokat/page/4/':
 $aSEOData['h1']='Металлопрокат стр.4'; 
break; 
case '/c/metalloprokat/page/49/':
 $aSEOData['h1']='Металлопрокат стр.49'; 
break; 
case '/c/metalloprokat/page/5/':
 $aSEOData['h1']='Металлопрокат стр.5'; 
break; 
case '/c/metalloprokat/page/50/':
 $aSEOData['h1']='Металлопрокат стр.50'; 
break; 
case '/c/metalloprokat/page/51/':
 $aSEOData['h1']='Металлопрокат стр.51'; 
break; 

case '/c/metalloprokat/polosa/goryachekatanaya/':
 $aSEOData['h1']='Горячекатаная полоса'; 
break; 
case '/c/metalloprokat/polosa/goryachekatanaya/page/2/':
 $aSEOData['h1']='Горячекатаная полоса стр.2'; 
break; 
case '/c/metalloprokat/polosa/instrumentalnaya-bystrorezhushhaya/':
 $aSEOData['h1']='Полоса быстрорежущая'; 
break; 
case '/c/metalloprokat/polosa/nerzhaveyushhaya-nikelsoderzhashhaya/':
 $aSEOData['h1']='Полоса никелесодержащая'; 
break; 
case '/c/metalloprokat/polosa/page/2/':
 $aSEOData['h1']='Полоса стр.2'; 
break; 

case '/c/metalloprokat/provoloka/latunnaya-provoloka/':
 $aSEOData['h1']='Латунная проволока'; 
break; 
case '/c/metalloprokat/provoloka/nerzhaveyushhaya/':
 $aSEOData['h1']='Нержавеющая проволока'; 
break; 
case '/c/metalloprokat/setka/':
 $aSEOData['h1']='Сетка'; 
break; 
case '/c/metalloprokat/shestigrannik/':
 $aSEOData['h1']='Шестигранники'; 
break; 


case '/c/metalloprokat/truby/elektrosvarnaya-kruglaya/':
 $aSEOData['h1']='Труба электросварная круглая'; 
break; 
case '/c/metalloprokat/truby/elektrosvarnye-kvadratnye/':
 $aSEOData['h1']='Труба электросварная квадратная'; 
break; 
case '/c/metalloprokat/truby/elektrosvarnye-pryamougolnye/':
 $aSEOData['h1']='Труба электросварная прямоугольная'; 
break; 
case '/c/metalloprokat/truby/latunnaya/':
 $aSEOData['h1']='Латунные трубы'; 
break; 
case '/c/metalloprokat/truby/nerzhaveyushhie-besshovnye/':
 $aSEOData['h1']='Трубы нержавеющие бесшовные'; 
break; 
case '/c/metalloprokat/truby/nerzhaveyushhie-elektrosvarnye-aisi/':
 $aSEOData['h1']='Трубы нержавеющие электросварные'; 
break; 
case '/c/metalloprokat/truby/page/17/':
 $aSEOData['h1']='Трубы стр.17'; 
break; 
case '/c/metalloprokat/truby/page/18/':
 $aSEOData['h1']='Трубы стр.18'; 
break; 
case '/c/metalloprokat/truby/page/19/':
 $aSEOData['h1']='Трубы стр.19'; 
break; 
case '/c/metalloprokat/truby/page/2/':
 $aSEOData['h1']='Трубы стр.2'; 
break; 
case '/c/metalloprokat/truby/page/2/':
 $aSEOData['h1']='Латунные трубы стр.2'; 
break; 
case '/c/metalloprokat/truby/page/3/':
 $aSEOData['h1']='Трубы стр.3'; 
break; 
case '/c/metalloprokat/truby/page/3/':
 $aSEOData['h1']='Латунные трубы стр.3'; 
break; 
case '/c/metalloprokat/truby/page/4/':
 $aSEOData['h1']='Трубы стр.4'; 
break; 

case '/c/metalloprokat/truby/truby-gd/':
 $aSEOData['h1']='Трубы Г/Д'; 
break; 
case '/c/metalloprokat/truby/truby-xd/':
 $aSEOData['h1']='Трубы Х/Д'; 
break; 
case '/c/metalloprokat/truby/vgp-ocinkovannye/':
 $aSEOData['h1']='Трубы оцинкованные ВГП'; 
break; 
 
/*case '/c/nerzhavejka/':
 $aSEOData['h1']='Нержавейка'; 
   $aSEOData['title'] = 'Нержавейка | Купить металлопродукцию в «КоплектСтройГрупп»';
        $aSEOData['descr'] = 'Нержавейка от компании «КоплектСтройГрупп». Мы осуществляет продажу металлопродукции по доступным ценам. Гарантируем оперативную обработку заказов и индивидуальный подход к каждому клиенту. Наш телефон в Москве: +7(495) 664-90-14.';
        $aSEOData['keywr'] = 'нержавейка купить';
break; */
case '/c/nerzhavejka/krug-nerzhaveyushhij/':
 $aSEOData['h1']='Круг нержавеющий'; 
break; 
case '/c/nerzhavejka/krug-nerzhaveyushhij/page/2/':
 $aSEOData['h1']='Круг нержавеющий стр.2'; 
break; 
case '/c/nerzhavejka/krug-nerzhaveyushhij/page/3/':
 $aSEOData['h1']='Круг нержавеющий стр.3'; 
break; 
case '/c/nerzhavejka/kvadrat-nerzhaveyushhij/':
 $aSEOData['h1']='Квадрат нержавеющий'; 
break; 

case '/c/nerzhavejka/polosa-nerzhaveyushhaya/':
 $aSEOData['h1']='Полоса нержавеющая'; 
break; 
case '/c/nerzhavejka/provoloka-nerzhaveyushhaya/':
 $aSEOData['h1']='Проволока нержавеющая'; 
break; 
case '/c/nerzhavejka/setka-nerzhaveyushhaya/':
 $aSEOData['h1']='Сетка нержавеющая'; 
break; 
case '/c/nerzhavejka/shveller-nerzhaveyushhij/':
 $aSEOData['h1']='Швеллер нержавеющий'; 
break; 

case '/c/nerzhavejka/ugolok-nerzhaveyushhij/':
 $aSEOData['h1']='Уголок нержавеющий'; 
break; 
case '/c/ocinkovka/':
 $aSEOData['h1']='Оцинковка'; 
    $aSEOData['title'] = 'Оцинковка | Купить металлопродукцию в «КоплектСтройГрупп»';
        $aSEOData['descr'] = 'Оцинковка от компании «КоплектСтройГрупп». Мы осуществляет продажу металлопродукции по доступным ценам. Гарантируем оперативную обработку заказов и индивидуальный подход к каждому клиенту. Наш телефон в Москве: +7(495) 664-90-14.';
        $aSEOData['keywr'] = 'оцинковка купить';
break; 
case '/c/ocinkovka/balka-ocinkovannaya/':
 $aSEOData['h1']='Балка оцинкованная'; 
break; 
case '/c/ocinkovka/krug-ocinkovannyj/':
 $aSEOData['h1']='Круг оцинкованный'; 
break; 
case '/c/ocinkovka/listy-ocinkovannye/':
 $aSEOData['h1']='Листы оцинкованные'; 
break; 
case '/c/ocinkovka/polosa-ocinkovannaya/':
 $aSEOData['h1']='Полоса оцинкованная'; 
break; 
case '/c/ocinkovka/profnastil-ocinkovannyj-ocinkovka/':
 $aSEOData['h1']='Профнастил оцинкованный'; 
break; 
case '/c/ocinkovka/provoloka-ocinkovannaya/':
 $aSEOData['h1']='Проволока оцинкованная'; 
break; 
case '/c/ocinkovka/setka-ocinkovannaya/':
 $aSEOData['h1']='Сетка оцинкованная'; 
break; 
case '/c/ocinkovka/shveller-ocinkovannyj/':
 $aSEOData['h1']='Швеллер оцинкованный'; 
break; 
case '/c/ocinkovka/truby-ocinkovannye/':
 $aSEOData['h1']='Трубы оцинкованные'; 
break; 
case '/c/ocinkovka/ugolok-ocinkovannyj/':
 $aSEOData['h1']='Уголок оцинкованный'; 
break; 

case '/kontakty/':
 $aSEOData['h1']='Контакты'; 
   $aSEOData['title'] = 'Контакты - КомплектСтройГрупп';
        $aSEOData['descr'] = 'Контакты компании «КоплектСтройГрупп». Мы осуществляет продажу металлопродукции по доступным ценам. Гарантируем оперативную обработку заказов и индивидуальный подход к каждому клиенту. Наш телефон в Москве: +7(495) 664-90-14.';
        $aSEOData['keywr'] = 'контакты';
break; 
case '/o-kompanii/':
 $aSEOData['h1']='О компании'; 
   $aSEOData['title'] = 'О компании - КомплектСтройГрупп';
        $aSEOData['descr'] = 'О компании «КоплектСтройГрупп». Мы осуществляет продажу металлопродукции по доступным ценам. Гарантируем оперативную обработку заказов и индивидуальный подход к каждому клиенту. Наш телефон в Москве: +7(495) 664-90-14.';
        $aSEOData['keywr'] = 'о компании';
break; 
case '/o-kompanii/10-let-uspeshnoj-raboty/':
 $aSEOData['h1']='10 лет успешной работы'; 
    $aSEOData['title'] = '10 лет успешной работы - КомплектСтройГрупп';
        $aSEOData['descr'] = '10 лет успешной работы. Компания «КоплектСтройГрупп» осуществляет продажу металлопродукции по доступным ценам. Гарантируем оперативную обработку заказов и индивидуальный подход к каждому клиенту. Наш телефон в Москве: +7(495) 664-90-14.';
        $aSEOData['keywr'] = '10 лет успешной работы';
break; 
case '/o-kompanii/dostavka-po-rossii/':
 $aSEOData['h1']='Доставка по России'; 
   $aSEOData['title'] = 'Доставка по России - КомплектСтройГрупп';
        $aSEOData['descr'] = 'Доставка по России. Компания «КоплектСтройГрупп» осуществляет продажу металлопродукции по доступным ценам. Гарантируем оперативную обработку заказов и индивидуальный подход к каждому клиенту. Наш телефон в Москве: +7(495) 664-90-14.';
        $aSEOData['keywr'] = 'доставка по России';
break; 
case '/o-kompanii/dostavka-v-den-oplaty/':
 $aSEOData['h1']='Доставка в день оплаты'; 
 $aSEOData['title'] = 'Доставка в день оплаты - КомплектСтройГрупп';
        $aSEOData['descr'] = 'Доставка в день оплаты. Компания «КоплектСтройГрупп» осуществляет продажу металлопродукции по доступным ценам. Гарантируем оперативную обработку заказов и индивидуальный подход к каждому клиенту. Наш телефон в Москве: +7(495) 664-90-14.';
        $aSEOData['keywr'] = 'доставка в день оплаты';
break; 
case '/o-kompanii/nam-doveryayut/':
 $aSEOData['h1']='Нам доверяют'; 
   $aSEOData['title'] = 'Нам доверяют - КомплектСтройГрупп';
        $aSEOData['descr'] = 'Нам доверяют. Компания «КоплектСтройГрупп» осуществляет продажу металлопродукции по доступным ценам. Гарантируем оперативную обработку заказов и индивидуальный подход к каждому клиенту. Наш телефон в Москве: +7(495) 664-90-14.';
        $aSEOData['keywr'] = 'нам доверяют';
break; 
case '/o-kompanii/onlajn-katalog/':
 $aSEOData['h1']='Онлайн-каталог'; 
     $aSEOData['title'] = 'Онлайн каталог - КомплектСтройГрупп';
        $aSEOData['descr'] = 'Онлайн-каталог. Компания «КоплектСтройГрупп» осуществляет продажу металлопродукции по доступным ценам. Гарантируем оперативную обработку заказов и индивидуальный подход к каждому клиенту. Наш телефон в Москве: +7(495) 664-90-14.';
        $aSEOData['keywr'] = 'онлайн-каталог';
break; 
case '/o-kompanii/razgruzka-zakaza/':
 $aSEOData['h1']='Разгрузка материала'; 
  $aSEOData['title'] = 'Разгрузка заказа - КомплектСтройГрупп';
        $aSEOData['descr'] = 'Разгрузка материала. Компания «КоплектСтройГрупп» осуществляет продажу металлопродукции по доступным ценам. Гарантируем оперативную обработку заказов и индивидуальный подход к каждому клиенту. Наш телефон в Москве: +7(495) 664-90-14.';
        $aSEOData['keywr'] = 'разгрузка материала';
break; 
case '/p/lenta-latunnaya-tv-marka-l63-4/':
 $aSEOData['h1']='Лента латунная ТВ марка: Л63 вариант 2'; 
break; 
case '/prezentaciya/':
 $aSEOData['h1']='Презентация'; 
  $aSEOData['title'] = 'Презентация - КомплектСтройГрупп';
        $aSEOData['descr'] = 'Презентация компании «КоплектСтройГрупп». Мы осуществляет продажу металлопродукции по доступным ценам. Гарантируем оперативную обработку заказов и индивидуальный подход к каждому клиенту. Наш телефон в Москве: +7(495) 664-90-14.';
        $aSEOData['keywr'] = 'презентация';
break; 
case '/shop/':
 $aSEOData['h1']='Каталог'; 
break; 
case '/c/cvetnoj-prokat/alyuminij/page/2/':
 $aSEOData['h1']='Алюминиевый прокат стр.2'; 
break; 
case '/c/cvetnoj-prokat/alyuminij/page/3/':
 $aSEOData['h1']='Алюминиевый прокат стр.3'; 
break; 
case '/c/cvetnoj-prokat/alyuminij/page/4/':
 $aSEOData['h1']='Алюминиевый прокат стр.4'; 
break; 
    case '/':     // Добавлено 17 January 2018 в  15:52
        #$aSEOData['title'] = 'Крупнейшая металлобаза страны | АО «КомплектСтройГрупп»';
        #$aSEOData['descr'] = 'Компания «КоплектСтройГрупп» осуществляет продажу металлопродукции по доступным ценам. Гарантируем оперативную обработку заказов и индивидуальный подход к каждому клиенту. Наш телефон в Москве: +7(495) 664-90-14.';
    #    $aSEOData['keywr'] = 'металлопродукция по выгодным ценам';
      break;
    case '/c/cvetnoj-prokat/':     // Добавлено 17 January 2018 в  15:52
        $aSEOData['title'] = 'Цветной прокат | Купить металлопродукцию в «КоплектСтройГрупп»';
        $aSEOData['descr'] = 'Цветной прокат от компании «КоплектСтройГрупп». Мы осуществляет продажу металлопродукции по доступным ценам. Гарантируем оперативную обработку заказов и индивидуальный подход к каждому клиенту. Наш телефон в Москве: +7(495) 664-90-14.';
        $aSEOData['keywr'] = 'цветной прокат купить';
      break;
    case '/karta-sajta/':     // Добавлено 17 January 2018 в  15:52
        $aSEOData['title'] = 'Карта сайта - КомплектСтройГрупп';
        $aSEOData['descr'] = 'Карта сайта. Компания «КоплектСтройГрупп» осуществляет продажу металлопродукции по доступным ценам. Гарантируем оперативную обработку заказов и индивидуальный подход к каждому клиенту. Наш телефон в Москве: +7(495) 664-90-14.';
        $aSEOData['keywr'] = 'карта сайта';
      break;

/////////////////
    case '/c/cvetnye-metally/latun/provoloka-latun-cvetnye-metally/':     // Добавлено 31 May 2018 в  15:42
        $aSEOData['title'] = 'Латунная проволока | Цветной прокат по доступным ценам в «КоплектСтройГрупп»';
        $aSEOData['descr'] = 'Латунная проволока от компании «КоплектСтройГрупп». Мы осуществляет продажу металлопродукции по доступным ценам. Гарантируем оперативную обработку заказов и индивидуальный подход к каждому клиенту. Наш телефон в Москве: +7 (495) 664-90-14.';
        $aSEOData['keywr'] = 'купить латунную проволоку в розницу и оптом цена москва интернет магазин цена';
      break;

    case '/c/cvetnye-metally/':     // Добавлено 31 May 2018 в  15:42
        $aSEOData['title'] = 'Цветной прокат | АО «КомплектСтройГрупп»';
        $aSEOData['descr'] = 'Цветной прокат. Компания «КомплектСтройГрупп» - крупнейшая металлобаза страны. Наш телефон в Москве: +7(495) 664-90-14';
        $aSEOData['keywr'] = 'лист металлопрокат цветной цены в москве купить оптом в розницу';
      break;

    case '/c/cvetnye-metally/med/lenta-med/':     // Добавлено 31 May 2018 в  15:42
        $aSEOData['title'] = 'Медная лента | Металлопрокат по доступным ценам в «КоплектСтройГрупп»';
        $aSEOData['descr'] = 'Медная лента от компании «КоплектСтройГрупп». Мы осуществляет продажу металлопродукции по доступным ценам. Гарантируем оперативную обработку заказов и индивидуальный подход к каждому клиенту. Наш телефон в Москве: +7 (495) 664-90-14.';
        $aSEOData['keywr'] = 'медная лента купить в розницу отпом москва купить интернет магазин м1 цена';
      break;

    case '/c/metalloprokat/metsyre/setka/':     // Добавлено 31 May 2018 в  15:42

        $aSEOData['keywr'] = 'металлическая сетка в москве стальная цена купить мелкой ячейкой';
      break;

    case '/c/nerzhaveyushhaya-stal/krug-nerzhaveyushhij/':     // Добавлено 31 May 2018 в  15:42

        $aSEOData['keywr'] = 'круг нержавейка нержавеющая сталь цена купить в москве';
      break;

    case '/c/ocinkovka/polosa-ocinkovka/':     // Добавлено 31 May 2018 в  15:42
        
        $aSEOData['keywr'] = 'оцинкованная полоса';
      break;

    case '/c/metalloprokat/sortovoj-prokat/ugolok/neravnopolochnyj/':     // Добавлено 31 May 2018 в  15:42
        $aSEOData['title'] = 'Неравнополочный уголок | Металлопрокат по доступным ценам в «КоплектСтройГрупп»';
        $aSEOData['descr'] = 'Неравнополочный уголок от компании «КоплектСтройГрупп». Мы осуществляет продажу металлопродукции по доступным ценам. Гарантируем оперативную обработку заказов и индивидуальный подход к каждому клиенту. Наш телефон в Москве: +7 (495) 664-90-14.';
        $aSEOData['keywr'] = 'уголок неравнополочный сортамент цена купить металлический';
      break;

    case '/c/metalloprokat/sortovoj-prokat/kvadrat/':     // Добавлено 31 May 2018 в  15:42
        $aSEOData['title'] = 'Металлический квадрат – купить оптом и в розницу по доступной цене в «КоплектСтройГрупп»';
        $aSEOData['descr'] = 'Металлические квадраты от компании «КоплектСтройГрупп». Мы осуществляет продажу металлопродукции по доступным ценам. Гарантируем оперативную обработку заказов и индивидуальный подход к каждому клиенту. Наш телефон в Москве: +7 (495) 664-90-14.';
        $aSEOData['keywr'] = 'квадратный металлопрокат цена квадрат металлический оптом и в розницу купить стальной в москве';
      break;

    case '/c/nerzhaveyushhaya-stal/polosa-nerzhaveyushhaya/':     // Добавлено 31 May 2018 в  15:42
        $aSEOData['title'] = 'Нержавеющие полосы – купить оптом и в розницу по доступной цене в Москве | Металлопрокат от компании «КоплектСтройГрупп»';
        $aSEOData['descr'] = 'Нержавеющие полосы от компании «КоплектСтройГрупп». Мы осуществляет продажу металлопродукции по доступным ценам. Гарантируем оперативную обработку заказов и индивидуальный подход к каждому клиенту. Наш телефон в Москве: +7 (495) 664-90-14.';
        $aSEOData['keywr'] = 'нержавеющая полоса оптом и в розницу стали цена купить в москве металлопрокат';
      break;

    case '/c/metalloprokat/kachestvennye-stali/konstrukcionnaya/':     // Добавлено 31 May 2018 в  15:42
        $aSEOData['title'] = 'Конструкционная сталь – купить по доступной цене в Москве от компании «КомплектСтройГрупп»';
        $aSEOData['descr'] = 'Конструкционная сталь от компании «КомплектСтройГрупп». Мы осуществляет продажу металлопродукции по доступным ценам. Гарантируем оперативную обработку заказов и индивидуальный подход к каждому клиенту. Наш телефон в Москве: +7 (495) 664-90-14.';
        $aSEOData['keywr'] = 'сталь конструкционная цена купить москва';
      break;

    case '/c/metalloprokat/kachestvennye-stali/instrumentalnaya/':     // Добавлено 31 May 2018 в  15:42
        $aSEOData['title'] = 'Высококачественная инструментальная сталь, нержавеющая инструментальная сталь, купить легированную инструментальную сталь от компании «КомплектСтройГрупп»';
        $aSEOData['descr'] = 'Инструментальная сталь от компании «КомплектСтройГрупп». Мы осуществляет продажу металлопродукции по доступным ценам. Гарантируем оперативную обработку заказов и индивидуальный подход к каждому клиенту. Наш телефон в Москве: +7 (495) 664-90-14.';
        $aSEOData['keywr'] = 'инструментальная нержавеющая сталь высококачественная легированная купить в москве цена';
      break;

  

    case '/c/metalloprokat/listovoj-prokat/profnastil/ocinkovannyj-profnastil/':     // Добавлено 31 May 2018 в  15:42
        $aSEOData['title'] = 'Оцинкованный профнастил – купить по доступной цене в «КоплектСтройГрупп»';
        $aSEOData['descr'] = 'Оцинкованный профнастил от компании «КоплектСтройГрупп». Мы осуществляет продажу металлопродукции по доступным ценам. Гарантируем оперативную обработку заказов и индивидуальный подход к каждому клиенту. Наш телефон в Москве: +7 (495) 664-90-14.';
        $aSEOData['keywr'] = 'профнастил оцинкованный цена купить лист стоимость в москве';
      break;



    case '/c/metalloprokat/sortovoj-prokat/shveller/gnutyj/':     // Добавлено 31 May 2018 в  15:42
        $aSEOData['title'] = 'Стальной тонкостенный равнополочный гнутый швеллер – купить оптом и в розницу в Москве | Продажа металлопроката от компании «КоплектСтройГрупп»';
        $aSEOData['descr'] = 'Стальной тонкостенный равнополочный гнутый швеллер от компании «КоплектСтройГрупп». Мы осуществляет продажу металлопродукции по доступным ценам. Гарантируем оперативную обработку заказов и индивидуальный подход к каждому клиенту. Наш телефон в Москве: +7 (495) 664-90-14.';
        $aSEOData['keywr'] = 'швеллер гнутый розница опт прайс лист тонкостенный продажа москва стальной равнополочный купить';
      break;




  }  






// для товаров
if (strpos($sContent,'<!--gen--product--meta-->') && $h1!=false ){
	$aSEOData['title'] = $h1[1].' | Купить металопродукцию по доступным ценам в «КоплектСтройГрупп»';
	$aSEOData['descr'] = $h1[1].' от компании «КоплектСтройГрупп». Мы осуществляет продажу металлопродукции по доступным ценам. Гарантируем оперативную обработку заказов и индивидуальный подход к каждому клиенту. Наш телефон в Москве: +7 (495) 664-90-14.';
	    $aSEOData['keywr'] = mb_strtolower($h1[1]).' купить';
}






//Обработка
  function changeHeadBlock ($sContent, $sRegExp, $sBlock) {
    if (preg_match($sRegExp, $sContent)) {
      return preg_replace($sRegExp, $sBlock, $sContent, 1);
    }
    else {
      return str_replace('<head>', '<head>' . $sBlock, $sContent);
    }
  }
  if (isset($aSEOData['title']) && !empty($aSEOData['title'])) {
    $aSEOData['title'] = htmlspecialchars($aSEOData['title']);
    $sContent = changeHeadBlock($sContent, '#<title>.*</title>#siU', '<title>' . $aSEOData['title'] . '</title>');
  }
  if (isset($aSEOData['descr']) && !empty($aSEOData['descr'])) {
    $aSEOData['descr'] = htmlspecialchars($aSEOData['descr']);
    $sContent = changeHeadBlock($sContent, '#<meta[^>]+name[^>]{1,7}description[^>]*>#siU', '<meta name="description" content="' . $aSEOData['descr'] . '" />');
  }
  if (isset($aSEOData['keywr']) && !empty($aSEOData['keywr'])) {
    $aSEOData['keywr'] = htmlspecialchars($aSEOData['keywr']);
    $sContent = changeHeadBlock($sContent, '#<meta[^>]+name[^>]{1,7}keywords[^>]*>#siU', '<meta name="keywords" content="' . $aSEOData['keywr'] . '" />');
  }
  if (isset($aSEOData['h1']) && !empty($aSEOData['h1'])) {
  $sContent = preg_replace('#(<h1[^>]*>).*(</h1>)#siU', '${1}'.$aSEOData['h1'].'${2}', $sContent);
  }
  if(isset($_SERVER['X_DUSYA']) || isset($_SERVER['HTTP_X_DUSYA'])) {
  $sContent = str_replace('<head>', '<head><!--origUrl="' . $sSEOUrl . '"-->' , $sContent);
  }

?>
