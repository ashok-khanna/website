<?php $this->title = Yii::t('app', 'Jabe Журнал'); include 'header.php';?>
    <!DOCTYPE html>
    <html lang="en">
    
    <body>
        <!-- <img src="articleOpen.jpg" class="test"> -->
        <section id="article" class = "noInMob">

            <div class="topImg">
                <img src="/img/articleTop.png" alt="верхняя картинка">
            </div>

            <div class="newTitle noInMob">
                <div class="newTitleLine"></div>
                <div class="newTitleText">
                    <?=Yii::t('app', 'Jabe Журнал')?>
                    <div class="newTitleFlareWrap" data-aos="zoom-in" data-aos-delay="300" data-aos-once="false">
                        <div class="flareImg">
                            <img src="/img/flare.png" alt="img">
                        </div>

                    </div>
                </div>
                <div class="newTitleLine"></div>
            </div>

            <div class="container">
                <div class="articleBox"> <!--  flex column ai cent jc cent -->
                    
                    <div class="goBack">
                    <a href="/site/articles">
                        <img src="/img/rowBack.png" alt="стрелочка назад">
                        <span>Назад</span>
                    </a>
                    </div>

                    <div class="articleInfo">
                    
                        <div class="date">
                            <div class="dateLeft"><span>01.01.2019 </span></div>
                            <div class="dateRight"> <span>■</span><hr></div>
                        </div>

                        <div class="info">
                        <!-- rel -->
                            <div class="infoText">
                                <div class="articleCategory">                                    
                                    <?php if ($news->category_news == 0) {?>
                                        <p><?=Yii::t('app', 'Роскошная Жизнь')?></p>
                                    <?php } else if ($news->category_news == 1) { ?>
                                        <p>Gentleman Quality</p>
                                    <?php } else if ($news->category_news == 2) { ?>
                                        <p><?=Yii::t('app', 'Новости Компании Jabe Concierge')?></p>
                                    <?php } else if ($news->category_news == 3) { ?>
                                        <p><?=Yii::t('app', 'Стиль Жизни')?></p>
                                    <?php } else if ($news->category_news == 4) { ?>
                                        <p><?=Yii::t('app', 'Гольф')?></p>
                                    <?php } else if ($news->category_news == 5) { ?>
                                        <p><?=Yii::t('app', 'Ночная Жизнь')?></p>
                                    <?php } else if ($news->category_news == 6) { ?>
                                        <p><?=Yii::t('app', 'Вэлнес и СПА')?></p>
                                    <?php } ?>
                                </div>
                                
                               <div>
                                    <img src="<?=$news->img?>" alt="иллюстрация">
                                    
                                    <h1><?=$news->name?></h1>
                               </div>
                               
                               <div class="openArticleDiv"> 
                                    <p>
                                        <?=$news->body?>
                                        <!-- Джэбе (джебе, джабе) — одна из старейших пород казахских лошадей, самые крупные представители казахской породы, 
                                        выведенной на территории современного Казахстана и разводимой в настоящее время в Республике Казахстан и прилегающих 
                                        к ней территориях. Джэбе (джебе, джабе) — одна из старейших пород казахских лошадей, самые крупные представители 
                                        казахской породы, выведенной на территории современного Казахстана и разводимой в настоящее время в Республике 
                                        Казахстан и прилегающих к ней территориях. Джэбе (джебе, джабе) — одна из старейших пород казахских лошадей, 
                                        самые крупные представители казахской породы, выведенной на территории современного Казахстана и разводимой в 
                                        настоящее время в Республике Казахстан и прилегающих к ней территориях. Джэбе (джебе, джабе) — одна из старейших 
                                        пород казахских лошадей, самые крупные представители казахской породы, выведенной на территории современного 
                                        Казахстана и разводимой в настоящее время в Республике Казахстан и прилегающих к ней территориях. Джэбе 
                                        (джебе, джабе) — одна из старейших пород казахских лошадей, самые крупные представители казахской породы, 
                                        выведенной на территории современного Казахстана и разводимой в настоящее время в Республике Казахстан и 
                                        прилегающих к ней территориях. Джэбе (джебе, джабе) — одна из старейших пород казахских лошадей, самые крупные 
                                        представители казахской породы, выведенной на территории современного Казахстана и разводимой в настоящее время в 
                                        Республике Казахстан и прилегающих к ней территориях. Джэбе (джебе, джабе) — одна из старейших пород казахских 
                                        лошадей, самые крупные представители казахской породы, выведенной на территории современного Казахстана и разводимой 
                                        в настоящее время в Республике Казахстан и прилегающих к ней территориях. Джэбе (джебе, джабе) — одна из старейших 
                                        пород казахских лошадей, самые крупные представители казахской породы, выведенной на территории современного 
                                        Казахстана и разводимой в настоящее время в Республике Казахстан и прилегающих к ней территориях. <br> Джэбе (джебе, джабе) — одна из старейших пород казахских лошадей, самые крупные представители казахской породы, 
                                        выведенной на территории современного Казахстана и разводимой в настоящее время в Республике Казахстан и прилегающих 
                                        к ней территориях. Джэбе (джебе, джабе) — одна из старейших пород казахских лошадей, самые крупные представители 
                                        казахской породы, выведенной на территории современного Казахстана и разводимой в настоящее время в Республике 
                                        Казахстан и прилегающих к ней территориях. Джэбе (джебе, джабе) — одна из старейших пород казахских лошадей, 
                                        самые крупные представители казахской породы, выведенной на территории современного Казахстана и разводимой 
                                        в настоящее время в Республике Казахстан и прилегающих к ней территориях.  -->
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                                                <div class="tourDesignBasketText">В корзину</div>
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
                            <?php endforeach;?>                                                                                                          -->
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
                        Узнать больше
                    </div>
                    <div class = "formText2"><span>Получить обратный звонок</span></div>
                    <div class="formText3"><span>от вашего персонального дизайнера путешествий JABE CONCIERGE</span></div>
                    <button class="borderAdd openForm">ОТПРАВИТЬСЯ В ПОЕЗДКУ</button>
                </div>
            </div>

            
        </section>
        <div class="articleOpenM">
            <div class="topImgM">
                <img src="/img/mobile/aboutTopImgM.png" alt="img">
                <div></div>
            </div>
            <div class="titleM">  <!-- TOURS TITLE MOBILE -->
                <div class="hr"><hr></div>
                <div class="titleMSpan gradient-title"><span>jabe журнал</span></div>
                <div class="hr"><hr></div>
            </div>
            <div class="articleBoxM">
                <div class="goBackM">
                    <a class="goBackM" href="/site/articles">                       
                        <img class="goBackImgM" src="/img/mobile/goBackImgM.png" alt="img">
                        <span>Назад</span>
                    </a>
                </div>
                <div class="articleImgM">
                    <img class="articleImgImgM" src="<?=$news->img?>" alt="img">
                </div>
                <div class="articleDateM">
                    <div><span>01.01.2019</span></div>
                </div>
                <div class="articleCategoryM">
                    <?php if ($news->category_news == 0) { ?>
                        <p><?=Yii::t('app', 'Роскошная Жизнь')?></p>
                    <?php } else if ($news->category_news == 1) { ?>
                        <p>Gentleman Quality</p>
                    <?php } else if ($news->category_news == 2) { ?>
                        <p><?=Yii::t('app', 'Новости Компании Jabe Concierge')?></p>
                    <?php } else if ($news->category_news == 3) { ?>
                        <p><?=Yii::t('app', 'Стиль Жизни')?></p>
                    <?php } else if ($news->category_news == 4) { ?>
                        <p><?=Yii::t('app', 'Гольф')?></p>
                    <?php } else if ($news->category_news == 5) { ?>
                        <p><?=Yii::t('app', 'Ночная Жизнь')?></p>
                    <?php } else if ($news->category_news == 6) { ?>
                        <p><?=Yii::t('app', 'Вэлнес и СПА')?></p>
                    <?php } ?>
                </div>
                <div class="articleTitleM">
                    <div class="articleTitleTextM">
                        <span class = "gradient-title"><?=$news->name?></span>
                    </div>
                    <div class="articleTitleDekorM">
                        <img class="articleDot" src="/img/mobile/articleDot.png" alt="img">
                        <div class="articleLine"></div>
                    </div>
                </div>
                <div class="articleBoxTextM">
                    <p>
                        <?=$news->body?>
                        <!-- Джэбе (джебе, джабе) — одна из старейших пород казахских лошадей,
                        самые крупные представители казахской породы, выведенной на территории
                        современного Казахстана и разводимой в настоящее время в Республике
                        Казахстан и прилегающих к ней территориях. Джэбе (джебе, джабе) — одна из 
                        старейших пород казахских лошадей, самые крупные представители казахской породы,
                        выведенной на территории современного Казахстана и разводимой в настоящее время в
                        Республике Казахстан и прилегающих к ней территориях. Джэбе (джебе, джабе) — одна
                        из старейших пород казахских лошадей, самые крупные представители казахской породы,
                        выведенной на территории современного Казахстана и разводимой в настоящее время в
                        Республике Казахстан и прилегающих к ней территориях. Джэбе (джебе, джабе) — одна из
                        старейших пород казахских лошадей, самые крупные представители казахской породы, выведенной
                        на территории современного Казахстана и разводимой в настоящее время в Республике
                        Казахстан и прилегающих к ней территориях.  -->
                    </p>
                </div>
            </div>   
                     
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
                                                    <div class="inBasketToursDesignTextM marginSideAddM"><p>В корзину</p></div>
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
                                <?php endforeach;?>
                            <?php endif;?>                                            
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
                                Получить обратный звонок
                            </h4>
                            <span>от вашего персонального дизайнера путешествий JABE CONCIERGE</span>
                        </div>
                        <div class="toursFormBtn">
                            <button class="btnM borderAddM openFormM">
                                <span>
                                    отправиться в путешествие с jabe
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
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
                        <input placeholder="Имя" type="text">
                    </div>
                    <div>
                        <input placeholder="Телефон" type="tel">
                    </div>
                    <div class="popupFormBtn">
                        <button type="submit" class="borderAdd openForm"><?=Yii::t('app','ОТПРАВИТЬ')?></button>
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
                        <input placeholder="Имя" type="text">
                    </div>
                    <div>
                        <input placeholder="Телефон" type="tel">
                    </div>
                    <div class="popupFormBtnM">
                        <button type="submit" class="borderAdd openFormM basket"><?=Yii::t('app','ОТПРАВИТЬ')?></button>
                    </div>
                </form>
            </div>
        </div>
        <div class="popupFormBack"></div>                
    </body>
    </html>
<?php include 'footer.php';?>