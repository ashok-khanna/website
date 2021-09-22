<?php

/* @var $this \yii\web\View */
/* @var $content string */

use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

AppAsset::register($this);

$js = <<< JS
$(function () {
    // $('html').attr('lang','kz');
});
$('.lang-switch').on('click', function(){
    var lang = $(this).attr('data-lang');
    setLang(lang);
});

function setLang(lang) {
    $.ajax({
         url:'/site/switch-lang',
         data:{language:lang},
         success: function(response) {
            console.log(response);
            response = JSON.parse(response);
            // location.reload();
            window._CURLANG = response.language;
        }
    });
}
JS;
$this->registerJs($js);
?>
<!DOCTYPE html>
<html lang="<?=Yii::$app->language?>">
<head>
    <title><?=Html::encode($this->title)?></title>
    <meta charset="<?=Yii::$app->charset?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/css/fansybox.css"/>
    <link rel="stylesheet" type="text/css" href="/css/aos.css"/>
    <link rel="stylesheet" type="text/css" href="/css/owl.css"/>
    <link rel="stylesheet" type="text/css" href="/css/swiper.css"/>
    <link rel="stylesheet" type="text/css" href="/css/style.css"/>
    <link rel="stylesheet" type="text/css" href="/css/responsive.css"/>
    <!-- <link rel="icon" type="image/png" href="/img/ico.png"> -->
    <link rel="stylesheet" type="text/css" href="/css/fonts.css"/>
    <meta property="og:url" content="[URL]">
    <meta property="og:title" content="[TITLE]">
    <meta property="og:description" content="[DESC]">
    <meta property="og:image" content="[IMAGE]">    
    <script src="/js/jquery.js"></script>
</head>

<body>
<main class="main" style="overflow-y: hidden;">   

    <div id="preloader" class="preloader">
        <img src="/img/jabe_preloader.png" alt="gif">
    </div>
<?php
    $lang = Yii::$app->language;
    $ru_active = '';
    $en_active = '';
    $ch_active = '';
    $link = (string) Yii::$app->request->getUrl();
    $check = substr($link, 0, 3);
    $ru_link = '/ru' . $link;
    $en_link = '/en' . $link;
    $ch_link = '/ch' . $link;
    if ($check == "/ru" || $check == "/ch" || $check == "/en") {
        $sm_link = mb_substr($link, 3);
        $ru_link = '/ru' . $sm_link;
        $en_link = '/en' . $sm_link;
        $ch_link = '/ch' . $sm_link;
    }
?>
<!-- <img style="z-index: 99" src="bg.jpg" class="test">  -->
    <div class="popupMenu">
        <div class="menuBox">
            <div class="menuLogo"><a href="/site/index"><img src="/img/конь.png" alt="img"></a></div>
            <div class="menuLine"></div>
            <div class="menuItems">
                <div class="menuItemPart mt">
                    <div class="menuItemLeft">
                        <div class="menuItemLine">
                            <div class="itemLineDot mr menuLinkHoverBack"></div>
                            <div class="itemLineDot mr menuLinkHoverBack"></div>
                            <div class="itemLineDot mr menuLinkHoverBack"></div>
                            <div class="itemLine menuLinkHoverBack"></div>                                
                        </div>
                        <div class="menuItemText upper"><a class="gradient-title menuLinkHover"  href="/site/about"><?=Yii::t('app', 'О компании')?></a></div>
                    </div>
                    <div class="menuItemRight">
                        <div class="menuItemText upper"><a class="gradient-title menuLinkHover" href="/site/guides/1"><?=Yii::t('app', 'Гиды')?></a></div>
                        <div class="menuItemLine">
                            <div class="itemLine menuLinkHoverBack"></div>                                
                            <div class="itemLineDot ml menuLinkHoverBack"></div>
                            <div class="itemLineDot ml menuLinkHoverBack"></div>
                            <div class="itemLineDot ml menuLinkHoverBack"></div>
                        </div>
                    </div>
                </div>
                <div class="menuItemPart mb">
                    <div class="menuItemLeft">
                        <div class="menuItemLine">
                            <div class="itemLineDot mr menuLinkHoverBack"></div>
                            <div class="itemLineDot mr menuLinkHoverBack"></div>
                            <div class="itemLineDot mr menuLinkHoverBack"></div>
                            <div class="itemLine menuLinkHoverBack"></div>                                
                        </div>
                        <div class="menuItemText upper"><a class="gradient-title menuLinkHover" href="/site/articles/1"><?=Yii::t('app', 'Jabe журнал')?></a></div>
                    </div>
                    <div class="menuItemRight">
                        <div class="menuItemText upper"><a class="gradient-title menuLinkHover" href="/site/contacts"><?=Yii::t('app', 'Контакты')?></a></div>
                        <div class="menuItemLine">
                            <div class="itemLine menuLinkHoverBack"></div>                                
                            <div class="itemLineDot ml menuLinkHoverBack"></div>
                            <div class="itemLineDot ml menuLinkHoverBack"></div>
                            <div class="itemLineDot ml menuLinkHoverBack"></div>
                        </div>
                    </div>                        
                </div>
            </div>
        </div>

        
        <div class="menuBox-mob hide">
            <div class="closeMenu">
                <a href="#"><img src="/img/mobile/exit_menu.png" alt="close"></a>
            </div>
            <div class="menuLogo">
                <a href="">
                    <img src="/img/конь.png" alt="">
                </a>
            </div>
            <div class="menuItems">
                <div class="menuItem-mob">
                    <h3 class="upper"><a href="/site/about"><?=Yii::t('app', 'О компании')?></a></h3>
                    <img src="/img/mobile/strelka_menu.png" alt="img">
                </div>
                <div class="menuItem-mob">
                    <h3 class="upper"><a href="/site/guides/1"><?=Yii::t('app', 'Гиды')?></a></h3>
                    <img src="/img/mobile/strelka_menu.png" alt="img">
                </div>                    
            </div>
            <div class="menuItems">
                <div class="menuItem-mob">
                    <h3 class="upper"><a href="/site/articles/1"><?=Yii::t('app', 'Jabe журнал')?></a></h3>
                    <img src="/img/mobile/strelka_menu.png" alt="img">
                </div>
                <div class="menuItem-mob">
                    <h3 class="upper"><a href="/site/contacts"><?=Yii::t('app', 'Контакты')?></a></h3>
                    <img src="/img/mobile/strelka_menu.png" alt="img">
                </div>                    
            </div>
            <div class="menuItems">
                <div class="menuItem-mob citiesMobOpen">
                    <h3 class="upper"><a href="#"><?=Yii::t('app', 'Города')?></a></h3>
                    <img src="/img/mobile/strelka_menu.png" alt="img">
                </div>
                <div class="menuItem-mob toursMobOpen">
                    <h3 class="upper">
                        <a href="#"><?=Yii::t('app', 'Услуги')?>
                    </a></h3>
                    <img src="/img/mobile/strelka_menu.png" alt="img">
                </div>                    
            </div>
            <div class="citiesItemOpenM">
                <div class="citiesItemOpenBackM">
                    <p>< назад</p>
                </div>
                <?php if ($cities != null): ?>
                    <?php foreach ($cities as $city): ?>
                        <div class="citiesItemOpen_itemM">                   
                            <div>
                                <p>
                                    <a data-id="<?=$city->id?>" href="/site/cities/<?=$city->id?>">
                                        <?=$city->city?>
                                    </a>
                                </p>
                            </div>
                            <div>
                                <a href="/site/cities/<?=$city->id?>">
                                    <img src="/img/citiesItemOpen_rowM.png" alt="img">
                                </a>                    
                            </div>                
                        </div>
                    <?php endforeach;?>
                <?php endif;?>
                
               
            </div>
            <div class="toursItemOpenM">
                <div class="toursItemOpenBackM">
                    <p>< назад</p>
                </div>
                <?php foreach ($all_services as $service): ?>                                              
                    <div class="citiesItemOpen_itemM">
                        <div>
                            <p>
                                <a href="/site/tours/<?=$service->id?>"><?=$service->name?></a>
                            </p>
                        </div>
                        <div>
                            <a href="/site/tours/<?=$service->id?>">
                                <img src="/img/citiesItemOpen_rowM.png" alt="img">
                            </a>                    
                        </div>
                    </div>
                <?php endforeach; ?>              
               
            </div>            
            <div class="footerMenu">
                <div class="langs">
                    <div class="langIcon">
                        <a href="<?=$ru_link?>" class="lang-switch" data-lang="ru-RU">
                            RU
                        </a>
                    </div>
                    <div class="langIcon langIconActive">
                        <a href="<?=$en_link?>" class="lang-switch" data-lang="en-US">
                            EN
                        </a>
                    </div>
                    <div class="langIcon" class="lang-switch" data-lang="en-US">
                        <a href="<?=$ch_link?>">
                            CH
                        </a>
                    </div>
                </div>
                <div class="social_icons">
                    <img src="/img/mobile/telegramIcon.png" alt="">
                    <img class="width_3em" src="/img/mobile/facebookIcon.png" alt="">
                    <img src="/img/mobile/instagremIcon.png" alt="">
                </div>
            </div>    
        </div>    
    </div>
<div class="popupGuideBack"></div>
<header id="header">

    
    <div class="header-box">
        <div class="popupMenuCloseBtn">
            <a href="#">
                <img src="/img/popupMenuCloseBtn.png" alt="img">
            </a>
        </div>
        <div class="menu openMenu">
            <a href="#">
                <div class="menuItem"></div>
                <div class="menuItem"></div>
                <div class="menuItem"></div>
            </a>
        </div>
    <div class="container">
        <div class="flex">
            <div class="header-left flex start align-center">
                <div class="header-left-mob hide">
                    <a href="/site/index" class="logo">
                        <img src="/img/конь.png">
                    </a>
                </div>
                <div class="logo logoHeaderNew noInMob">
                    <div class="logoHeaderNewWrap">
                        <div class="logoHeaderNewWrap_bg"></div>
                        <a href="/site/index">
                            <img src="/img/конь.png">
                        </a>
                    </div>
                </div>
                <div class="top-menu flex start">                                   
                    <div class="dropdown dropdownCities dropbtnCitiesChoice">
                        <button class="dropbtn dropbtnCities headerDropStyle noBack"><?php if (Yii::$app->language == 'en' && isset($_SESSION['city_eng'])) {echo $_SESSION['city_eng']; } else if (Yii::$app->language == 'ru' && isset($_SESSION['city_rus'])) {echo $_SESSION['city_rus']; } else {echo Yii::t('app','Выберите город'); } ?><img src="/img/arr.png" alt="img"></button>
                        <div class="dropdown-content dropdown-contentCities dropdownCitiesChoice">
                            <?php if ($cities != null): ?>
                                <?php foreach ($cities as $city): ?>
                                    <a data-id="<?=$city->id?>" href="/site/cities/<?=$city->id?>"><?=$city->city?></a>
                                <?php endforeach; ?>
                            <?php endif; ?>
                            
                            <!-- <a href="#">Нур-Султан</a>
                            <a href="#">Москва</a>
                            <a href="#">Баку</a> -->
                        </div>
                    </div>

                    <div class="dropdown dropdownCities">
                        <button class="dropbtn dropbtnCities headerDropStyle noBack"><?=Yii::t('app', 'Услуги')?><img src="/img/arr.png" alt="img"></button>
                            <div class="dropdown-content dropdown-contentCities">
                            <?php foreach ($all_services as $service): ?>
                                <a href="/site/tours/<?=$service->id?>"><?=$service->name?></a>
                            <?php endforeach; ?>                        
                            <!-- <a href="/site/tours">Консьерж</a>
                            <a href="/site/tours">Mice</a>
                            <a href="/site/tours">Стильный туризм</a> -->
                        </div>
                    </div>
                    
                    <div class="search">
                        <div class="searchdropdown">
                            <div><a href="#">Ничего не найдено</a></div>                            
                        </div>
                        <form action="">
                            <img src="/img/лупа.png">
                            <input type="text" placeholder=<?=Yii::t('app', 'Поиск')?>>
                        </form>
                    </div>
                </div>
            </div>
            <div class="header-right flex end align-center">
                <div class="contacts flex">
                    <div class="phones flex column hide">
                        <a href="tel:+ 7 (778) 888 55 99">+ 7 (778) 888 55 99</a>
                    </div>
                    <div class="phones flex column show">
                        <a class="gradient-title phone_1" href="tel:+7 (778) 888 55 99">+ 7 (778) 888 55 99</a>
                        <a class="gradient-title phone_2" href="mailto:Concierge@jabe.kz">Concierge@jabe.kz</a>
                    </div>
                    <div class="phones flex column show">
                        <a class="gradient-title phone_3" href="tel:+7 (778) 888 55 99">+ 7 (778) 888 55 99</a>
                        <a class="gradient-title phone_4" href="tel:+7 (727) 339 07 50">+ 7 (727) 339 07 50</a>
                    </div>
                </div>

                <div class="links flex end align-center">
                    <div class="language">
                        <?php if (Yii::$app->language == 'en'): ?>                            
                            <a href="<?=$en_link?>" class="lang-switch" data-lang="en-US">
                                <span class="langEn">EN</span>
                                <img src="/img/arr.png">
                            </a>
                            <div class="languageEn">
                                <a href="<?=$ru_link?>" class="lang-switch" data-lang="ru-RU">
                                    <span class="langRu">RU</span>                                    
                                </a>    
                            </div>  
                            <div class="languageCh">
                                <a href="<?=$ch_link?>" class="lang-switch" data-lang="en-US">
                                    <span class="langCh">CH</span>
                                </a>
                            </div>
                        <?php elseif (Yii::$app->language == 'ch'): ?>
                                <a href="<?=$ch_link?>" class="lang-switch" data-lang="en-US">
                                    <span class="langCh">CH</span>
                                    <img src="/img/arr.png">
                                </a>
                                <div class="languageEn">
                                    <a href="<?=$en_link?>" class="lang-switch" data-lang="en-US">
                                        <span class="langEn">EN</span>
                                    </a>
                                </div>  
                                <div class="languageCh">
                                    <a href="<?=$ru_link?>" class="lang-switch" data-lang="ru-RU">
                                        <span class="langRu">RU</span>                                    
                                    </a>    
                                </div>
                        <?php else: ?>
                                <a href="<?=$ru_link?>" class="lang-switch" data-lang="ru-RU">
                                    <span class="langRu">RU</span>
                                    <img src="/img/arr.png">                                    
                                </a>    
                                <div class="languageEn">
                                    <a href="<?=$en_link?>" class="lang-switch" data-lang="en-US">
                                        <span class="langEn">EN</span>
                                    </a>
                                </div>  
                                <div class="languageCh">
                                    <a href="<?=$ch_link?>" class="lang-switch" data-lang="en-US">
                                        <span class="langCh">CH</span>
                                    </a>
                                </div>
                        <?php endif; ?>
                                                                  

                    </div>
                    <div id="share" class="link-item share show">
                        <a href="#">
                            <img style="width: 35%; left: 47%;" src="/img/share.png">
                        </a>
                        <div id="insta" class="insta">
                            <a href="#">
                                <img src="/img/insta.png">
                            </a>
                        </div>
                        <div id="twitter" class="twitter">
                            <a href="https://twitter.com/intent/tweet?url=http://jabeconcierge.com/">
                                <img src="/img/twitter.png">
                            </a>
                        </div>
                        <div id="facebook" class="facebook">
                            <a href="https://www.facebook.com/sharer/sharer.php?u=http://jabeconcierge.com/&title=Jabe Concierge">
                                <img src="/img/facebook.png">
                            </a>
                        </div>
                        <div id="viber" class="viber">
                            <a href="viber://chat?number=+ 7 (778) 888 55 99">
                                <img src="/img/viber.png">
                            </a>
                        </div>
                    </div>
                    <div class="mob-search link-item hide">
                        <div class="searchdropdownM">
                        </div>
                        <img src="/img/лупа.png">
                        <input type="text" placeholder="Поиск">
                    </div>  
                    
                    <div class="link-item headerWA">
                        <a href="#">
                            <img src="/img/WA.png">
                        </a>
                    </div>
                    <?php if (Yii::$app->language == 'ru'): ?>
                        <div class="link-item show">
                            <a href="#">
                                <img style="left: 45%;" src="/img/telega.png">
                            </a>
                        </div>
                    <?php endif; ?>
                    <?php if (Yii::$app->language == 'en'): ?>
                        <div class="link-item noInMob">
                            <a href="#">
                                <img src="/img/facebook.png">
                            </a>
                        </div>
                        <div class="link-item noInMob">
                            <a href="#">
                                <img src="/img/viber.png">
                            </a>
                        </div>
                    <?php endif; ?>
                    <div class="link-item headerBasket">
                        <a href="/site/basket">
                            <img style= "top:45%;" src="/img/basket.png">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</header>
<div class="popupForm">
    <div class="popupGuideCloseBtn">
        <img src="/img/popupGuideCloseBtn.png" alt="img">
    </div>
    
    <div class="popupFormText">                                    
        <div class="popupFormTextBottom">
            <p class="gradient-title"> 
                <?=Yii::t('app', 'Пожалуйста, оставьте контакты, чтобы мы могли связаться с Вами')?>
            </p>
        </div>
    </div>
    <div class="popupFormForm">
        <form action="#" method="post">
            <div>
                <input name="name" placeholder="<?=Yii::t('app','Имя')?>" type="text">
            </div>
            <div>
                <input name="phone" placeholder="<?=Yii::t('app','Телефон')?>" type="tel">
            </div>
            <input name="page" id="page_name" style="display: none;" type="text" placeholder="">
            <input name="btn" id="btn_name" style="display: none;" type="text" placeholder="">
            <div class="popupFormBtn">
                <button type="submit" class="borderAdd submitForm openForm"><?=Yii::t('app','ОТПРАВИТЬ')?></button>
            </div>
        </form>
    </div>
</div>
<div class="popupFormM">
    <div class="popupGuideCloseBtn">
        <img src="/img/popupGuideCloseBtn.png" alt="img">
    </div>
    
    <div class="popupFormTextM">                                    
        <div class="popupFormTextBottomM">
            <p class="gradient-title"> 
                <?=Yii::t('app', 'Пожалуйста, оставьте контакты, чтобы мы могли связаться с Вами')?>
            </p>
        </div>
    </div>
    <div class="popupFormFormM">
        <form action="#" method="post">
            <div>
                <input name="name" placeholder="<?=Yii::t('app','Имя')?>" type="text">
            </div>
            <div>
                <input name="phone" placeholder="<?=Yii::t('app','Телефон')?>" type="tel">
            </div>                
            <input name="page" id="page_nameM" style="display: none;" type="text" placeholder="">
            <input name="btn" id="btn_name" style="display: none;" type="text" placeholder="">
            <div class="popupFormBtnM">
                <button type="submit" class="borderAdd submitForm openFormM"><?=Yii::t('app','ОТПРАВИТЬ')?></button>
            </div>
        </form>
    </div>
</div>
<div class="popupFormBack"></div>