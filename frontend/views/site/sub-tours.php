<?php $this->title = $sub_tour->name; include 'header.php';?>
    <span style="display: none;" class="page_name"><?=$sub_tour->name?></span>
    <!DOCTYPE html>
    <html lang="en">
    
    <body>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- <img src="sub-tours .jpg" class="test"> -->
        <section class="noInMob" id="sub-tours-1">

            <div class="sub-tours__bannerBlock">
                <div class="bannerBlockImg">
                    <img src="/img/bigAlmatyLake.png" alt="">
                </div>
                <div class="sub-tours__title">
                    <h1><?=$sub_tour->name?></h1>
                </div>
                <div class="basketForm">
                    <div class="rating">
                        <div class="ratingText"><span><?=Yii::t('app', 'Рейтинг')?></span></div>
                        <div class="js-rating" style="cursor: pointer;">
                            <?php for ($i=1; $i <= 5; $i++) { ?>
                                <?php if ($sub_tour->rating >= $i): ?>
                                    <i data-value="<?=$i?>" style="color: #580000 !important" class="fa fa-star fa-fw text-warning"></i>
                                <?php else: ?>
                                    <i data-value="<?=$i?>" class="fa fa-star fa-fw text-warning"></i>
                                <?php endif; ?>
                            <?php } ?>
                            <input name="score" type="hidden" value="5">
                        </div>
                    </div>
                    <div class="basketFormDekor"><img src="/img/basketFormDekor.png" alt="img"></div>
                    <div class="basketFormPrice">
                        <div class="basketFormPriceItem">
                            <div class="priceItem">
                                <div class="priceFrom upper">
                                    <div><span><?=Yii::t('app', 'ЦЕНА')?></span></div>
                                    <div class="priceFromPrice noBack"><span><?=Yii::t('app', 'ОТ')?> <?=$sub_tour->cost?>$</span></div>
                                </div>
                                <div class="priceBefore upper">
                                    <div>
                                        <div><span class="priceBeforeSpan"><?=Yii::t('app', 'Предоплата')?></span></div>
                                        <div class="priceFromPrice colorWhite <?=$sub_tour->prepayment == 1 ? 'activePagination' : ''?>"><span>15%</span></div>
                                    </div>
                                    <div>
                                        <div class="transp">_</div>
                                        <div class="priceFromPrice colorWhite top_0_1emPlus <?=$sub_tour->prepayment == 2 ? 'activePagination' : ''?>"><span>20%</span></div>
                                    </div>
                                    <div>
                                        <div class="transp">_</div>
                                        <div class="priceFromPrice colorWhite top_0_1emPlus <?=$sub_tour->prepayment == 3 ? 'activePagination' : ''?>"><span>30%</span></div>                                                                        
                                    </div>
                                </div>
                                <div class="basketAddRating">
                                    <a href="/site/basket" onclick="addStorage('<?=$sub_tour->id?>', event)">
                                        <img src="/img/basket.png" alt="img">
                                    </a>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </section>
        <section class = "noInMob" id="sub-tours-2">

            <div class="myTrips">
                <div class="myTripsTop">
                    <div class="myTripsTopTitle">
                        <div class="lines_left">
                            <hr class="line_sm">
                            <div class="line_dots">
                                <div class="myTripsSqr op3"></div>
                                <div class="myTripsSqr op2"></div>
                                <div class="myTripsSqr op1"></div>
                            </div>
                            <hr class="line_long">
                        </div>
                        <div class="lines_right">
                            <hr class="line_sm">
                            <div class="line_dots">
                                <div class="myTripsSqr op1"></div>
                                <div class="myTripsSqr op2"></div>
                                <div class="myTripsSqr op3"></div>
                            </div>
                            <hr class="line_long">
                        </div>
                        <div class="myTripsTopH2"><h2><?=Yii::t('app', 'МОИ ЭКСКЛЮЗИВНЫЕ ПОЕЗДКИ С JABE')?></h2></div>
                    </div>
                </div>
                <div class="myTripsMid"><span><?=Yii::t('app', 'Те же локации, но красочнее эмоции.')?></span></div>
                <div class="myTripsBottom">
                    <button class="borderAdd openForm">
                        <span><?=Yii::t('app', 'ОТПРАВИТЬСЯ В ПОЕЗДКУ')?></span>
                    </button>
                </div>
            </div>
        </section>
        <section class = "noInMob" id="sub-tours-3">
            <div class="title noBack BlackHr">
                <div class="hr"><hr></div>
                <div class="titleSpan gradient-title-2"><span><?=$sub_tour->name?></span></div>
                <div class="hr"><hr></div>
            </div>
            <div class="container">
                <div class="sub-tourInfo">
                    <div class="sub-tourInfoLeft">
                        <div class="sub-tourInfoLeftH3"><h3><?=$sub_tour->name?> </h3></div>
                        <div class="sub-tourInfoLeftText">
                            <p>
                                <?=$sub_tour->body?>
                                <!-- Большое Алматинское озеро - естественное альпийское водохранилище,
                                появившееся из-за землетрясения в горах Заилийского Алатау, окружено
                                тремя впечатляющими красотой горами. Именно ледники, тающие на
                                верхушках этих гор и создают Озеро. Талая природная вода является
                                основным источником питьевой воды для верхней части города Алматы.
                                Резервуар строго охраняется, туристам запрещается приближаться к
                                воде ближе чем за несколько метров, купание запрещено. Озеро условно
                                пролегает на границе между горами Кыргызстана и Казахстана, объект
                                охраняется, всем навестившим озеро требуется иметь при себе паспорт. -->
                            </p>
                        </div>
                        <div class="sub-tourInfoLine"></div>
                        <div class="sub-tourInfoTegs">                            
                            <?php $hashes = json_decode($sub_tour->has_tags); foreach ($hashes as $has_tag): ?>
                                <div class="sub-tourInfoTeg"><span><?=$has_tag->hash?></span></div>
                            <?php endforeach; ?>
                            <!-- <span>#алматы</span>
                            <span style="font-size: 0.89em;">#активныйотдых</span>
                            <span style="font-size: 0.89em;">#озеро</span>
                            <span style="font-size: 0.89em;">#бао</span><br>
                            <span style="font-size: 0.89em;">#большоеалматинскоеозеро</span>
                            <span style="font-size: 0.89em;">#туризмалматы</span> -->
                        </div>
                    </div>

                    <div class="sub-tourInfoRight">
                        <div class="sub-tourInfoRightTop">
                        <?php if ($requirements != null): ?>
                            <div class="sub-tourInfoRightTopCol">
                                <div class="sub-tourInfoItem">
                                    <div class="sub-tourInfoItemLeft sub-tourInfoItemLeftR"><img src="/img/stupDekoItemLeft.png" alt="img"></div>
                                    <div class="sub-tourInfoItemRight">
                                        <div class="s-tourInfoItemTitle"><span><?=Yii::t('app', 'Подходит:')?></span></div>
                                        <div class="s-tourInfoItemText s-tourInfoItemTextStup"><?=$requirements->suit?></div>
                                    </div>
                                </div>
                                <div class="sub-tourInfoItem">
                                    <div class="sub-tourInfoItemLeft sub-tourInfoItemLeftR"><img src="/img/stupDekoItemLeft.png" alt="img"></div>
                                    <div class="sub-tourInfoItemRight">
                                        <div class="s-tourInfoItemTitle"><span><?=Yii::t('app', 'Продолжительность:')?></span></div>
                                        <div class="s-tourInfoItemText"><?=$requirements->duration_time?></div>
                                    </div>
                                </div>
                                <div class="sub-tourInfoItem">
                                    <div class="sub-tourInfoItemLeft sub-tourInfoItemLeftR"><img src="/img/stupDekoItemLeft.png" alt="img"></div>
                                    <div class="sub-tourInfoItemRight">
                                        <div class="s-tourInfoItemTitle"><span><?=Yii::t('app', 'Рекомендации:')?></span></div>
                                        <div class="s-tourInfoItemText"><?=$requirements->recommendation?></div>
                                    </div>
                                </div>

                            </div>
                            <div class="sub-tourInfoRightTopCol">
                                <div class="sub-tourInfoItem sub-tourInfoItemR">
                                    <div class="sub-tourInfoItemRight sub-tourInfoItemRightR">
                                        <div class="s-tourInfoItemTitle"><span><?=Yii::t('app', 'Сезон:')?></span></div>
                                        <div class="s-tourInfoItemText"><?=$requirements->season?></div>
                                    </div>
                                    <div class="sub-tourInfoItemLeft"><img src="/img/stupDekoItemRight.png" alt="img"></div>
                                </div>
                                <div class="sub-tourInfoItem sub-tourInfoItemR">
                                    <div class="sub-tourInfoItemRight sub-tourInfoItemRightR">
                                        <div class="s-tourInfoItemTitle"><span><?=Yii::t('app', 'Максимальное количество людей:')?></span></div>
                                        <div class="s-tourInfoItemText"><?=$requirements->count_people?></div>
                                    </div>
                                    <div class="sub-tourInfoItemLeft"><img src="/img/stupDekoItemRight.png" alt="img"></div>
                                </div>
                                <div class="sub-tourInfoItem sub-tourInfoItemR">
                                    <div class="sub-tourInfoItemRight sub-tourInfoItemRightR">
                                        <div class="s-tourInfoItemTitle"><span><?=Yii::t('app', 'Обязательно иметь c собой:')?></span></div>
                                        <div class="s-tourInfoItemText"><?=$requirements->necessarily?></div>
                                    </div>
                                    <div class="sub-tourInfoItemLeft"><img src="/img/stupDekoItemRight.png" alt="img"></div>
                                </div>
                            </div>
                        <?php endif; ?>
                        </div>
                        <div class="sub-tourInfoRightBottom">
                            <?php if ($requirements != null): ?>
                            <div class="sub-tourInfoItem">                            
                                <div class="sub-tourInfoItemLeft  sub-tourInfoItemLeftR"><img src="/img/stupDekoItemLeft.png" alt="img"></div>                                
                                <div class="sub-tourInfoItemRight">                                    
                                    <div class="s-tourInfoItemTitle gradient-title-2"><?=Yii::t('app', 'В зимнее время рекомендуем взять:')?></div>
                                    <div class="s-tourInfoItemInfo">                                        
                                            <?php $winder = json_decode($requirements->winter_recommend); foreach ($winder as $wint): ?>
                                                <div class="s-tourInfoItemText s-tourInfoItemTextB"><span><?=$wint?></span></div>
                                            <?php endforeach; ?>                                        
                                    </div>                                    
                                </div>                                
                            </div>    
                            <?php endif; ?>                        
                        </div>
                    </div>
                </div>
                <div class="tourPartsBox">
                    <div class="tourPartsBoxItemInclude">
                        <div class="partsItemTitle">
                            <span  class="gradient-title-2"><?=Yii::t('app', 'Включено:')?></span>
                        </div>
                        <div class="partsItemContent">
                            <?php if($inc_services != null && $inc_services->included != null): $includeds = json_decode($inc_services->included); ?>
                                    <?php $count=0; foreach ($includeds as $included): ?>
                                            <div class="partsItemImg">
                                                <div class="tourPartsImg partsImgAnimation <?=$count>0 ? 'animateDot-'.$count : ''?>">
                                                    <span class="dotAnimate"></span>
                                                    <img src="<?=$included->img?>" alt="img">
                                                </div>
                                                <div class="tourPartsInfo"><?=Yii::$app->language == 'ru' ? $included->name_rus : $included->name_eng?></div>
                                            </div>            
                                    <?php endforeach; ?>
                            <?php endif; ?>                       
                        </div>
                    </div>

                    <div class="tourPartsBoxItemNotInclude">
                        <div class="partsItemTitle">
                            <span  class="gradient-title-2"><?=Yii::t('app', 'Не включено:')?></span>
                        </div>
                        <div class="partsItemContent left_0em">
                            <?php if($inc_services != null && $inc_services->not_included != null): $not_includeds = json_decode($inc_services->not_included); ?>
                                    <?php $count=0; foreach ($not_includeds as $not_included): ?>
                                        <div class="partsItemImg partsItemImgWidth35 <?=$count==0 ? 'noMarginLeft' : ''?>">
                                            <div class="tourPartsImg partsImgAnimationBrown animateDot-4"><span class="dotAnimate"></span><img src="<?=$not_included->img?>" alt="img"></div>
                                            <div class="tourPartsInfo"><?=$not_included->name_rus?></div>
                                        </div>
                                    <?php endforeach; ?>
                            <?php endif; ?>                            
                        </div>
                    </div>
                </div>
            </div>

            <div class="inBasket">
                <div class="inBasketLine"></div>
                <div class="inBasketDot"></div>
                <div class="inBasketText marginSideAdd"><?=Yii::t('app', 'В корзину')?></div>
                <div class="basketAdd marginSideAdd" style="bottom: 0">
                    <a href="#" onclick="addStorage('<?=$sub_tour->id?>', event)">
                        <img src="/img/basket.png" alt="img">
                    </a>
                </div>
                <div class="inBasketDot"></div>
                <div class="inBasketLine"></div>
            </div>

            <div class="photoGallery">
                <?php $photos = json_decode($sub_tour->photos); foreach ($photos as $photo): ?>
                <div class="photoGallery_item">
                    <img src="<?=$photo?>" alt="img">
                </div>
                <?php endforeach; ?>                
            </div>
        </section>

        <section class = "noInMob" id="sub-tours-4">
            <div class="newTitle noInMob">
                <div class="newTitleLine"></div>
                <div class="newTitleText">
                    <?=Yii::t('app', 'Изучи больше дизайнов путешествия')?>
                    <div class="newTitleFlareWrap" data-aos="zoom-in" data-aos-delay="300" data-aos-once="false">
                        <div class="flareImg">
                            <img src="/img/flare.png" alt="img">
                        </div>

                    </div>
                </div>
                <div class="newTitleLine"></div>
            </div>
            <div class="moreToursSliderBox">
                <?php if ($all_sub_tours != null): ?>
                    <div class="owl-slider owlSliderTourDesign">                    
                        <div class="prev_owl"><a href="#"><img src="/img/rowToLeft.png" alt="img"></a></div>
                        <div id="carousel_tours" class="owl-carousel">                        
                            <?php foreach ($all_sub_tours as $all_sub): ?>
                                <!----------------------------------------------------------------------------------->
                                <div class="toursSliderItem">
                                    <!-- <div class="reviewsSliderItemWrap"> -->
                                        <div class="tourDesignBack"><img src="/img/tourDesignBack.png" alt="img"></div>
                                        <div class="tourDesignImg"><img src="<?=$all_sub->img?>" alt="img"></div>
                                        <div class="tourDesignInfo">
                                            <div class="tourDesignTitle" onclick="location.href = '/site/sub_tours/<?=$all_sub->id?>'"><?=$all_sub->name?></div>
                                            <div class="tourDesignText">
                                                <p>
                                                    <?=$all_sub->body?>                                                
                                                </p>
                                            </div>
                                            <div class="tourDesignBasket">
                                                <div class="tourDesignBasketText"><?=Yii::t('app', 'В корзину')?></div>
                                                <div class="tourDesignBasketImg">                                                
                                                    <div class="basketAdd marginSideAdd" style="bottom: 0">
                                                        <a href="#" onclick="addStorage('<?=$all_sub->id?>', event)" data-id="<?=$all_sub->id?>">
                                                            <img src="/img/basket.png" alt="img">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="tourDesignBasketDekor">
                                                    <img src="/img/tourDesignBasketDekor.png" alt="img">
                                                </div>
                                                <!-- <div class="tourDesignBasketDekor"><img style="width: 130%;" src="/img/tourDesignBasketDekor.png" alt="img"></div> -->
                                            </div>
                                        </div>
                                    <!-- </div> -->
                                </div>
                                <!----------------------------------------------------------------------------------->
                            <?php endforeach; ?>                                                                                                                       
                    </div>
                        <div class="next_owl" ><a href="#"><img src="/img/rowToRight.png" alt="img"></a></div>
                    </div>
                <?php endif; ?>
            </div>

            <div class="tourDesignForm">
                <img src="/img/sub-tourFormBack.png" alt="фон">
                <div class="form">
                    <div class="formDekorText" data-aos="zoom-in" data-aos-delay="500" data-aos-once="true">
                        <div style="right: 95%;width: 35em;top: 0.5em;" class="lines_left">
                            <hr style="right: 84%;" class="line_sm">
                            <div class="line_dots">
                                <div class="myTripsSqr op3"></div>
                                <div class="myTripsSqr op2"></div>
                                <div class="myTripsSqr op1"></div>
                            </div>
                            <hr style="right: 3%;" class="line_long">
                        </div>
                        <div style="top:7.5em; right: -5.5em;" class="lines_right">
                            <hr class="line_sm">
                            <div class="line_dots">
                                <div class="myTripsSqr op1"></div>
                                <div class="myTripsSqr op2"></div>
                                <div class="myTripsSqr op3"></div>
                            </div>
                            <hr class="line_long">
                        </div>
                            <?=Yii::t('app', 'Узнать больше')?>
                    </div>
                    <div class = "formText2"><span><?=Yii::t('app', 'Получить обратный звонок')?></span></div>
                    <div class="formText3"><span><?=Yii::t('app', 'от вашего персонального дизайнера путешествий JABE CONCIERGE')?></span></div>
                    <button class="borderAdd openForm"><?=Yii::t('app', 'ОТПРАВИТЬСЯ В ПОЕЗДКУ')?></button>
                </div>
            </div>

        </section>
        <section class = "noInMob" id="sub-tours-5">
            <div class="titlePartners">
                <div class="hrPartners"></div>
                <div class="titleSpan"><span class="gradient-title-2"><?=Yii::t('app', 'ОТЗЫВЫ')?></span></div>
                <div class="hrPartners"></div>
            </div>


            
                <div class="reviewsSliderBox">
                    <div class="owl-slider owlSliderReviews">
                            <div class="prev_owl blackBorder"><a href="#"><img src="/img/rowToLeft.png" alt="img"></a></div>
                            <div id="carousel_reviews" class="owl-carousel">
                                <?php if (!empty($feedbacks)): ?>
                                    <?php foreach ($feedbacks as $feedback): ?>
                                        <!----------------------------------------------------------------------------------->
                                        <div class="reviewsSliderItem">                                           
                                            <div class="reviewsSliderItem_dekor_1"> 
                                                <img src="/img/reviewsSliderItem_dekor_1.png" alt="img">
                                            </div>
                                            <div class="reviewsSliderItem_dekor_2">
                                                <img src="/img/reviewsSliderItem_dekor_2.png" alt="img">
                                            </div>
                                            <div class="reviewsSliderItem_shell">
                                                <div class="reviewsSliderItem_shell_1">                        
                                                    <div class="reviewsTitle"><?=$feedback->name?></div>
                                                    <div class="reviewsText">
                                                        <p>
                                                            <?= $feedback->comment ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>                                            
                                        </div>
                                        <!----------------------------------------------------------------------------------->
                                    <?php endforeach; ?>
                                <?php endif; ?>                                                                          
                            </div>
                                <div class="next_owl blackBorder" ><a href="#"><img src="/img/rowToRight.png" alt="img"></a></div>
                            </div>
                    </div>
                </div>    
        </section>
        

        
        <!------------------------------------------------MOBILE-------------------------------------------------------->
        <div class="sub-toursBoxM">
            <div class="sub-toursBannerM"> <!-- SUB-TOURS BANNER MOBILE -->
                <div class="sub-toursBannerImgM">
                    <img class="sub-toursBannerImgMImg" src="/img/mobile/sub-toursBannerImgM.png" alt="img">
                </div>
                <div class="sub-toursBannerDekorM">
                    <img class="sub-toursBannerDekorMImg" src="/img/mobile/sub-toursBannerDekorM.png" alt="img">
                </div>
                <div class="sub-toursBannerFormM">                   
                    <div class="sub-toursBannerTitleM">
                        <h1><?=$sub_tour->name?></h1>
                    </div>
                </div>
                <div class="basketFormM">
                    <div class="ratingM">
                        <div class="ratingTextM"><span><?=Yii::t('app', 'Рейтинг')?></span></div>
                        <div class="js-rating" style="cursor: pointer;">
                            <?php for ($i=1; $i <= 5; $i++) { ?>
                                <?php if ($sub_tour->rating >= $i): ?>
                                    <i style="color: #580000 !important" class="fa fa-star fa-fw text-warning"></i>&nbsp;
                                <?php else: ?>
                                    <i class="fa fa-star fa-fw text-warning"></i>&nbsp;
                                <?php endif; ?>
                            <?php } ?>                            
                        </div>
                    </div>
                    <div class="basketFormPriceM">
                        <div class="basketFormPriceTopM">
                            <div class="priceFromM upper ">
                                <span class="fw1_6em basketFormTextM"><?=Yii::t('app', 'ЦЕНА')?></span>
                            </div>
                            <div class="priceBeforeTextM upper">
                                <span class="basketFormTextM">
                                <?=Yii::t('app', 'Предоплата')?>
                                </span>
                            </div>
                        </div>
                        <div class="basketFormPriceBottomM">
                            <div class="priceFromPriceM priceFromM noBack">
                                <span class="gradientBannerSlider basketFormTextM">
                                <?=Yii::t('app', 'ОТ')?>
                                </span>
                                <span class="basketFormDigitsM">
                                    <?=$sub_tour->cost?> $
                                </span>
                            </div>
                            <div class="priceFromPriceM colorWhite m_r1_em <?=$sub_tour->prepayment == 1 ? 'activePagination' : ''?>">
                                <span class = "basketFormDigitsM">
                                    15%
                                </span>
                            </div>
                            <div class="priceFromPriceM colorWhite m_r1_em <?=$sub_tour->prepayment == 2 ? 'activePagination' : ''?>">
                                <span class = "basketFormDigitsM">
                                    20%
                                </span>
                            </div>
                            <div class="priceFromPriceM colorWhite m_r1_em <?=$sub_tour->prepayment == 3 ? 'activePagination' : ''?>">
                                <span class = "basketFormDigitsM">
                                    30%
                                </span>
                            </div>
                            <div class="basketAddM">
                                <a onclick="addStorage('<?=$sub_tour->id?>', event)">
                                    <img src="/img/basket.png" alt="img">
                                </a>
                            </div>
                        </div>                   
                    </div>
                </div>
            </div>
            <div class="sub-toursTitleM">
                <div class="sub-toursTitleBackM">
                    <img src="/img/mobile/sub-toursTitleBackM.png" alt="img">
                </div>
                <div class="sub-toursTitleTextM">
                    <p class="upper"><span><?=Yii::t('app', 'МОИ ЭКСКЛЮЗИВНЫЕ ПОЕЗДКИ С JABE')?></span></p>
                    <p><?=Yii::t('app', 'с')?> <span>JABE.</span><?=Yii::t('app', 'Те же локации, но красочнее эмоции.')?></p>
                </div>
                <div class="sub-toursTitleBtnM">
                    <button class="btnM borderAddM openFormM">
                        <span>
                            <?=Yii::t('app', 'ОТПРАВИТЬСЯ В ПОЕЗДКУ')?>
                        </span>
                    </button>
                </div>
            </div>
            <div class="sub-toursInfoM">
                <div class="sub-toursInfoTitleM">
                    <div class="hr"><hr></div>
                    <div class="titleMSpan gradient-title-2"><span><?=$sub_tour->name?></span></div>
                    <div class="hr"><hr></div>
                </div>
                <div class="sub-toursInfoAboutM">
                    <div class="sub-toursInfoTextM">
                        <p>
                            <?=$sub_tour->body?>
                            <!-- <b>Большое Алматинское озеро</b> - естественное альпийское водохранилище, 
                            появившееся из-за землетрясения в горах Заилийского Алатау, окружено 
                            тремя впечатляющими красотой горами. Именно ледники, тающие на верхушках 
                            этих гор и создают Озеро. Талая природная вода является основным 
                            источником питьевой воды для верхней части города Алматы. Резервуар 
                            строго охраняется, туристам запрещается приближаться к воде ближе 
                            чем за несколько метров, купание запрещено. Озеро условно пролегает на 
                            границе между горами Кыргызстана и Казахстана, объект охраняется, всем 
                            навестившим озеро требуется иметь при себе паспорт. -->
                        </p>
                    </div>
                    <div class="sub-toursInfoLineM"></div>
                    <div class="sub-tourInfoTegsM">
                        <?php $hashes = json_decode($sub_tour->has_tags);foreach ($hashes as $has_tag): ?>
                            <span><?=$has_tag->hash?></span>
                        <?php endforeach;?>
                        <!-- <span>#алматы</span>
                        <span style="font-size: 0.89em;">#активныйотдых</span>
                        <span style="font-size: 0.92em;">#озеро</span>
                        <span style="font-size: 0.92em;">#бао</span><br>
                        <span style="font-size: 0.85em;">#большоеалматинскоеозеро</span>
                        <span style="font-size: 0.86em;">#туризмалматы</span> -->
                    </div>
                    <div class="sub-toursInfoLine_2M"></div>
                    <div class="sub-tourInfoRecomendationsM">
                        <?php if ($requirements != null): ?>
                            <div class="mb1em">
                                <span class="recomendationsGradientTextM gradient-title-2"><?=Yii::t('app', 'Подходит:')?></span>
                                <span class="recomendationsBrownTextM"><?=$requirements->suit?></span>
                            </div>
                            <div class="mb1em">
                                <span class="recomendationsGradientTextM gradient-title-2"><?=Yii::t('app', 'Продолжительность:')?></span>
                                <span class="recomendationsBrownTextM"><?=$requirements->duration_time?></span>
                            </div>
                            <div class="mb1em">
                                <span class="recomendationsGradientTextM gradient-title-2"><?=Yii::t('app', 'Рекомендации:')?></span>
                                <span class="recomendationsBrownTextM"><?=$requirements->recommendation?></span>
                            </div>
                            <div class="mb1em">
                                <span class="recomendationsGradientTextM gradient-title-2"><?=Yii::t('app', 'Сезон:')?></span>
                                <span class="recomendationsBrownTextM"><?=$requirements->season?></span>
                            </div>
                            <div class="mb1em">
                                <span class="recomendationsGradientTextM gradient-title-2"><?=Yii::t('app', 'Максимальное количество людей:')?></span>
                                <span class="recomendationsBrownTextM"><?=$requirements->count_people?></span>
                            </div>
                            <div class="mb1em">
                                <span class="recomendationsGradientTextM gradient-title-2"><?=Yii::t('app', 'Обязательно иметь c собой:')?></span>
                                <span class="recomendationsBrownTextM"><?=$requirements->necessarily?></span>
                            </div>
                            <div class="mb1em">
                                <span class="recomendationsGradientTextM gradient-title-2"><?=Yii::t('app', 'В зимнее время рекомендуем взять:')?></span>
                                <span class="recomendationsBrownTextM">
                                    <?php $winder = json_decode($requirements->winter_recommend);foreach ($winder as $wint): ?>
                                        <?=$wint ?> /
                                    <?php endforeach;?>
                                    <!-- Шапку / Перчатки / Теплую одежду / Плед / Солнцезащитный крем / Очки -->
                                </span>
                            </div>
                        <?php endif; ?>                                                
                    </div>
                </div>
                <div class="includeBoxM">
                    <div class="includeTitleM gradient-title-2">
                        <span><?=Yii::t('app', 'Включено:')?></span>
                    </div>                    
                    <div class="includeBoxItemsM">
                         <?php if ($inc_services != null && $inc_services->included != null): $includeds = json_decode($inc_services->included);?>
                                        <?php $count = 0;foreach ($includeds as $included): ?>	                                           
                                            <div class="partsItemImg">
                                                <div class="tourPartsImg partsImgAnimation"><span class="dotAnimate"></span><img src="<?=$included->img?>" alt="img"></div>
                                                <div class="tourPartsInfo"><?=Yii::$app->language == 'ru' ? $included->name_rus : $included->name_eng?></div>
                                            </div>
	                                    <?php endforeach;?>
                            <?php endif;?>
                        
                    </div>             
                    
                </div>

                <div class="notIncludeBoxM">
                    <div class="includeTitleM gradient-title-2">
                        <span><?=Yii::t('app', 'Не включено:')?></span>
                    </div>
                    <div class="includeBoxItemsM">
                        <?php if ($inc_services != null && $inc_services->not_included != null): $not_includeds = json_decode($inc_services->not_included);?>
                                <?php $count = 0;foreach ($not_includeds as $not_included): ?>
                                    <div class="partsItemImg">
                                        <div class="tourPartsImg partsImgAnimation partsImgAnimationNotInclude"><span class="dotAnimate"></span><img src="<?=$not_included->img?>" alt="img"></div>
                                        <div class="tourPartsInfo"><?=Yii::$app->language == 'ru' ? $not_included->name_rus : $not_included->name_eng?></div>
                                    </div>
                                <?php endforeach;?>
                        <?php endif;?>
                       
                        
                    </div>    
                </div>
                <div class="inBasketM inBasketM_1">
                    <div class="inBasketLineM"></div>
                    <div class="inBasketDotM"></div>
                    <div class="inBasketTextM marginSideAddM"><p><?=Yii::t('app', 'В корзину')?></p></div>
                    <div class="inBasketAddM ">
                        <a href="#" onclick="addStorage('<?=$sub_tour->id?>', event)">
                            <img src="/img/mobile/basketM.png" alt="img">
                        </a>
                    </div>
                    <div class="inBasketDotM"></div>
                    <div class="inBasketLineM"></div>
                </div>



                <div class="sub-toursPhotosSliderBoxM">
                    <div class="owl-slider owlSliderSub-tourPhotos">
                        <div id="carousel_sub-toursPhotos" class="owl-carousel">
                            <?php $photos = json_decode($sub_tour->photos); foreach ($photos as $photo): ?>
                                <!----------------------------------------------------------------------------------->
                                <div class="sub-toursPhotosSliderItem">                            
                                    <div class="sub-toursPhotoFrameM">
                                        <div class="sub-toursPhotoImgM">
                                            <img src="<?=$photo?>" alt="img">
                                        </div>
                                    </div>
                                </div>
                            <!----------------------------------------------------------------------------------->
                            <?php endforeach; ?>                            
                            
                        </div>
                    </div>
                    <div class="sub-toursPhotosSliderBtnsM">
                        <div class="next_owl_sub-toursPhotos">
                            <a href="#"><img src="/img/mobile/sub-tourSliderRow1.png" alt="img"></a>
                        </div>
                        <div class="prev_owl_sub-toursPhotos">
                            <a href="#"><img src="/img/mobile/sub-tourSliderRow.png" alt="img"></a>
                        </div>
                    </div>
                </div>
                <div class="title1M">  <!-- TOURS TITLE MOBILE -->
                    <div class="hr"><hr></div>
                    <div class="titleMSpan gradient-title"><span><?=Yii::t('app', 'Изучи больше дизайнов путешествия')?></span></div>
                    <div class="hr"><hr></div>
                </div>

                <div class="sub-toursDesignSliderBoxM">
                    <div class="owl-slider owlSliderSub-tourDesign">
                        <div id="carousel_sub-toursDesign" class="owl-carousel owl-carouselSub-tours">
                            <?php if ($all_sub_tours != null): ?>
                                <?php foreach ($all_sub_tours as $all_sub): ?>
                                    <!----------------------------------------------------------------------------------->
                                    <div class="sub-toursDesignSliderItem">                            
                                        <div class="sub-toursDesignAboutM">
                                            <div class="sub-toursDesignAboutImgM">
                                                <img src="<?=$all_sub->img?>" alt="img">
                                            </div>
                                            <div class="sub-toursDesignAboutInfoM">
                                                <p class="sub-toursDesignInfoTitleM">
                                                    <!-- каинды -->
                                                    <?=$all_sub->name?>
                                                </p>
                                                <p class="sub-toursDesignInfoTextM">
                                                    <?=$all_sub->body?>
                                                </p>
                                            </div>
                                            <div class="sub-toursDesignAboutBasketM">
                                                <div class="inBasketToursDesignM">
                                                    <div class="inBasketToursDesignLineM"></div>
                                                    <div class="inBasketToursDesignDotM"></div>
                                                    <div class="inBasketToursDesignTextM marginSideAddM"><p><?=Yii::t('app', 'В корзину')?></p></div>
                                                    <div class="inBasketToursDesignAddM ">
                                                        <a href="#" onclick="addStorage('<?=$all_sub->id?>', event)">
                                                            <img style="width:60%" src="/img/mobile/basketM.png" alt="img">
                                                        </a>
                                                    </div>
                                                    <div class="inBasketToursDesignDotM"></div>
                                                    <div class="inBasketToursDesignLineM"></div>
                                                </div>                                        
                                            </div>
                                        </div>
                                    </div>
                                    <!----------------------------------------------------------------------------------->        
                                <?php endforeach; ?>
                            <?php endif; ?>
                                                       
                        </div>
                        </div class="sub-toursPhotosSliderBtnsM">
                            <div class="next_owl next_owl_sub-toursDesign">
                                <a href="#"><img src="/img/mobile/sub-tourSliderRow1.png" alt="img"></a>
                            </div>
                            <div class="prev_owl prev_owl_sub-toursDesign">
                                <a href="#"><img src="/img/mobile/sub-tourSliderRow.png" alt="img"></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="toursFormM">
                    <div class="toursFormImgM">
                        <img class="toursFormImgMImg" src="/img/mobile/toursFormImgM.png" alt="img">
                    </div>
                    <div class="toursFormDekorM">
                        <img class="toursFormDekorMImg" src="/img/mobile/toursFormDekorM.png" alt="img">
                    </div>
                    <div class="toursFormFormM">
                        <div class="sub-toursFormTitleM">
                            <h4>
                                <?=Yii::t('app', 'Получить обратный звонок')?>
                            </h4>
                            <span><?=Yii::t('app', 'от вашего персонального дизайнера путешествий JABE CONCIERGE')?></span>
                        </div>
                        <div class="toursFormBtn">
                            <button class="btnM borderAddM openFormM">
                                <span>
                                <?=Yii::t('app', 'ОТПРАВИТЬСЯ В ПУТЕШЕСТВИЕ С JABE')?>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="reviewsSliderBoxM">
                    <div class="sub-toursInfoTitleM">
                        <div class="hr"><hr></div>
                        <div class="titleMSpan gradient-title-2"><span><?=Yii::t('app', 'ОТЗЫВЫ')?></span></div>
                        <div class="hr"><hr></div>
                    </div>
                    <div class="owl-slider owlSliderSub-tourReviewsM">
                        <div id="carousel_sub-toursReviewsM" class="owl-carousel owl-carouselSub-tours">
                            <!----------------------------------------------------------------------------------->
                            <?php if ($feedbacks != null): ?>
                                <?php foreach ($feedbacks as $feedback): ?>
                                    <div class="sub-toursReviewsSliderItemM">
                                        <div class="sub-toursReviewsSliderItemBoxM">
                                            <div class="sub-toursReviewsTitleM">
                                                <p><?=$feedback->name?></p>
                                            </div>
                                            <div class="sub-toursReviewsTextM">
                                                <p>
                                                    <?=$feedback->comment?>
                                                    <!-- Вы потеряете очень много, если побываете в Алмате, 
                                                    но не съездите на БАО. Потрясающий цвет воды - он 
                                                    меняется от светло-зеленого до бирюзового, в 
                                                    зависимости от погоды и времени суток. Да, 
                                                    одобраться к нему тяжело – но оно того стоит! -->
                                                </p>
                                            </div>
                                        </div>                                
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>                                                      
                        </div>
                        </div class="sub-toursPhotosSliderBtnsM">
                            <div class="next_owl_sub-toursReviews">
                                <a href="#"><img src="/img/mobile/sub-tourSliderRow1.png" alt="img"></a>
                            </div>
                            <div class="prev_owl_sub-toursReviews">
                                <a href="#"><img src="/img/mobile/sub-tourSliderRow.png" alt="img"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>           
<script src="/js/basket.js"></script>
<?php include 'footer.php'; ?>