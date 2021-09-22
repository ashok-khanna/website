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
<?php $this->beginPage()?>
<!DOCTYPE html>
<html lang="<?=Yii::$app->language?>">
<head>
    <title><?=Html::encode($this->title)?></title>
    <meta charset="<?=Yii::$app->charset?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php $this->registerCsrfMetaTags()?>
    <link rel="stylesheet" type="text/css" href="assets/css/fansybox.css"/>
    <link rel="stylesheet" type="text/css" href="assets/css/aos.css"/>
    <link rel="stylesheet" type="text/css" href="assets/css/owl.css"/>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css"/>
    <link rel="stylesheet" type="text/css" href="assets/css/responsive.css"/>
    <link rel="icon" type="image/png" href="assets/img/ico.png">
    <link rel="stylesheet" type="text/css" href="assets/css/fonts.css"/>
</head>

<body>
<?php $this->beginBody()?>
<!-- <img style="z-index: 99" src="bg.jpg" class="test">  -->
    <div class="popupMenu">
        <div class="popupMenuCloseBtn">
            <img src="assets/img/popupMenuCloseBtn.png" alt="img">
        </div>
        <div class="menu-bg">
            <img src="assets/img/menu-bg.png" alt="img">
        </div>
        <div class="menuBox">
            <div class="menuLogo"><a href="index.php"><img src="assets/img/menuLogo.png" alt="img"></a></div>
            <div class="menuLine"></div>
            <div class="menuItems">
                <div class="menuItemPart mt">
                    <div class="menuItemLeft">
                        <div class="menuItemLine">
                            <div class="itemLineDot mr"></div>
                            <div class="itemLineDot mr"></div>
                            <div class="itemLineDot mr"></div>
                            <div class="itemLine"></div>                                
                        </div>
                        <div class="menuItemText upper"><a href="about.php">О компании</a></div>
                    </div>
                    <div class="menuItemRight">
                        <div class="menuItemText upper"><a href="guides.php">Гиды</a></div>
                        <div class="menuItemLine">
                            <div class="itemLine"></div>                                
                            <div class="itemLineDot ml"></div>
                            <div class="itemLineDot ml"></div>
                            <div class="itemLineDot ml"></div>
                        </div>
                    </div>
                </div>
                <div class="menuItemPart mb">
                    <div class="menuItemLeft">
                        <div class="menuItemLine">
                            <div class="itemLineDot mr"></div>
                            <div class="itemLineDot mr"></div>
                            <div class="itemLineDot mr"></div>
                            <div class="itemLine"></div>                                
                        </div>
                        <div class="menuItemText upper"><a href="articles.php">Jabe журнал</a></div>
                    </div>
                    <div class="menuItemRight">
                        <div class="menuItemText upper"><a href="contacts.php">Контакты</a></div>
                        <div class="menuItemLine">
                            <div class="itemLine"></div>                                
                            <div class="itemLineDot ml"></div>
                            <div class="itemLineDot ml"></div>
                            <div class="itemLineDot ml"></div>
                        </div>
                    </div>                        
                </div>
            </div>
            <div class="menuLine"></div>
            <div class="menuContacts"><img src="assets/img/menuFooter.png" alt="img"></div>
        </div>
    </div>
<header>

    
    <div class="header-box">
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
                <a href="index.php" class="logo">
                    <img src="assets/img/logo.png">
                </a>
                <div class="top-menu flex start">                                   
                    <div class="dropdown dropdownCities">
                        <button class="dropbtn dropbtnCities headerDropStyle noBack">Города<img src="/assets/img/arr.png" alt="img"></button>
                            <div class="dropdown-content dropdown-contentCities">
                            <a href="#">Алматы</a>
                            <a href="#">Астана</a>
                            <a href="#">Москва</a>
                            <a href="#">Баку</a>
                        </div>
                    </div>

                    <div class="dropdown dropdownCities">
                        <button class="dropbtn dropbtnCities headerDropStyle noBack">Услуги<img src="/assets/img/arr.png" alt="img"></button>
                            <div class="dropdown-content dropdown-contentCities">
                            <a href="tours.php">Деловой туризм</a>
                            <a href="tours.php">Консьерж</a>
                            <a href="tours.php">Mice</a>
                            <a href="tours.php">Стильный туризм</a>
                        </div>
                    </div>
                    
                    <div class="search">
                        <form action="">
                        <img src="assets/img/лупа.png">
                        <input type="text" placeholder="Поиск">
                        </form>
                    </div>
                </div>
            </div>
            <div class="header-right flex end align-center">
                <div class="contacts flex">
                    <div class="phones flex column">
                        <a class="gradient-title" href="#">+ 7 (778) 888 55 99</a>
                        <a class="gradient-title" href="#">Concierge@jabe.kz</a>
                    </div>
                    <div class="phones flex column">
                        <a class="gradient-title" href="#">+ 7 (778) 888 55 99</a>
                        <a class="gradient-title" href="#">+ 7 (727) 339 07 50</a>
                    </div>
                </div>

                <div class="links flex end align-center">
                    <div class="language">
                        <a href="#">
                            <span>RU</span>
                            <img src="assets/img/arr.png">
                        </a>
                    </div>
                    <div class="link-item">
                        <a href="#">
                            <img style="width: 35%; left: 47%;" src="assets/img/share.png">
                        </a>
                    </div>
                    <div class="link-item">
                        <a href="#">
                            <img src="assets/img/WA.png">
                        </a>
                    </div>
                    <div class="link-item">
                        <a href="#">
                            <img style="left: 45%;" src="assets/img/Telegram.png">
                        </a>
                    </div>
                    <div class="link-item">
                        <a href="basket.php">
                            <img style="width: 50%; top: 45%" src="assets/img/basket.png">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</header>

<div class="wrap">
<?php
$lang = Yii::$app->language;
$ru_active = '';
$en_active = '';
$kz_active = '';
$link = (string) Yii::$app->request->getUrl();
$check = substr($link, 0, 4);
$ru_link = '/ru' . $link;
$en_link = '/en' . $link;
$kz_link = '/kz' . $link;
if ($check == "/ru/" || $check == "/kz/" || $check == "/en/") {
    $sm_link = mb_substr($link, 3);
    $ru_link = '/ru' . $sm_link;
    $en_link = '/en' . $sm_link;
    $kz_link = '/kz' . $sm_link;
}

?>
    <?php
NavBar::begin([
    'brandLabel' => Yii::$app->name,
    'brandUrl' => Yii::$app->homeUrl,
    'options' => [
        'class' => 'navbar-inverse navbar-fixed-top',
    ],
]);

$menuItems = [
    ['label' => 'Home', 'url' => ['/site/index']],
    ['label' => 'About', 'url' => ['/site/about']],
    ['label' => 'Contact', 'url' => ['/site/contact']],
];
if (Yii::$app->user->isGuest) {
    $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
    $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
} else {
    $menuItems[] = '<li>'
    . Html::beginForm(['/site/logout'], 'post')
    . Html::submitButton(
        'Logout (' . Yii::$app->user->identity->username . ')',
        ['class' => 'btn btn-link logout']
    )
    . Html::endForm()
        . '</li>';
}

$menuItems[] = [
    'label' => Yii::$app->language, 'items' => [
        [
            'label' => 'ru',
            'url' => $ru_link,
            'options' => ['class' => 'lang-switch', 'data-lang' => 'ru-RU'],
        ],
        [
            'label' => 'kz',
            'url' => $kz_link,
            'options' => ['class' => 'lang-switch', 'data-lang' => 'kz-KZ'],
        ],
        [
            'label' => 'en',
            'url' => $en_link,
            'options' => ['class' => 'lang-switch', 'data-lang' => 'en-US'],
        ],
    ],
    'options' => ['id' => 'lang'],
];

echo Nav::widget([
    'options' => ['class' => 'navbar-nav navbar-right'],
    'items' => $menuItems,
]);
NavBar::end();
?>

    <div class="container">
        <?=Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
])?>
        <?=Alert::widget()?>
        <?=$content?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?=Html::encode(Yii::$app->name)?> <?=date('Y')?></p>

        <p class="pull-right"><?=Yii::powered()?></p>
    </div>
</footer>

<?php $this->endBody()?>
</body>
</html>
<?php $this->endPage()?>
