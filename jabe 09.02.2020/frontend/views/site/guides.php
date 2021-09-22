<?php $this->title = Yii::t('app', 'Гиды');
include 'header.php';?>
<span style="display: none;" class="page_name"><?=Yii::t('app', 'Гиды')?></span>
<!DOCTYPE html>
<html lang="en">    
    <body>        
        <!-- <img src="гиды.jpg" class="test"> -->
        <section class="noInMob" id="guides-1">
            
            
            <div class="guidesBanner">
                
                <img src="/img/guidesBannerDekor.png" alt="баннер">

                <div class="guidesTitle">
                    <div class="guidesBannerTitle">
                        <h1><?=Yii::t('app', 'ВЫБЕРИТЕ ГИДА,')?></h1>
                        <h3><?=Yii::t('app', 'С КОТОРЫМ ХОТИТЕ ПРОВЕСТИ СВОЁ ПУТЕШЕСТВИЕ!')?></h3>
                    </div>

                    <div class="guidesHelloFrame" data-aos="fade-left" data-aos-duration="700">                      
                    </div>

                    <div class="guidesBannerForm" data-aos="fade-right" data-aos-duration="700">
                        <div class="formDekorText" data-aos="zoom-in" data-aos-delay="300">                            
                            <div style="right: 54%;top: -1.4em;transform: rotate(180deg);" class="lines_right">
                                <hr class="line_sm">
                                <div class="line_dots">
                                    <div class="myTripsSqr op1"></div>
                                    <div class="myTripsSqr op2"></div>
                                    <div class="myTripsSqr op3"></div>
                                </div>
                                <hr class="line_long">
                            </div>

                            <div style="right: -43%;top: 1.8em;" class="lines_right">
                                <hr class="line_sm line_sm-2">
                                <div class="line_dots">
                                    <div class="myTripsSqr op1"></div>
                                    <div class="myTripsSqr op2"></div>
                                    <div class="myTripsSqr op3"></div>
                                </div>
                                <hr class="line_long">
                            </div>
                        </div>
                        <img src="/img/guidesDekor.png" alt="img">
                        <p class="guidesBannerFormTop"><?=Yii::t('app', 'ВСЕМ САЛЮТ!')?></p>
                        <p class="guidesBannerFormBottom">
                            <?=Yii::t('app', '<b>Вам скучно? Вы не знаете город?</b>
                            Не знаете где развлечься, нужна мульти
                            языковая мега крутая экскурсия?
                            Тогда Bам именно к Нам Jabe Сoncierge.')?>
                            
                        </p>
                    </div>

                </div>

            </div>
            
        </section>

        
        <div class="newTitle noInMob">
            <div class="newTitleLine"></div>
            <div class="newTitleText">
                <?=Yii::t('app', 'Гиды')?>
                <div class="newTitleFlareWrap" data-aos="zoom-in" data-aos-delay="300" data-aos-once="false">
                    <div class="flareImg">
                        <img src="/img/flare.png" alt="img">
                    </div>

                </div>
            </div>
            <div class="newTitleLine"></div>
        </div>
        <section class="noInMob" id="guides-2">
            <div class="container">
                <div class="guidesItems">                    
<!------------------------------------------------------------------------------------------------------------------->
                    <?php if ($gids != null): $data_count = count($gids); $count = 1; ?>
                        <?php foreach ($gids as $gid): ?>
                            <?php if ($count == 1 || $count == 4 || $count == 7): ?>
                                <div class="guidesRow">
                            <?php endif; ?>
                            <?php if ($count == 2 || $count == 4 || $count == 6 || $count == 8): ?>
                                <div class="guideItem redBack">
                                    <div class="guideInfo" data-aos="zoom-in" data-aos-delay="50">
                                        <div class="guidePhoto">
                                            <img src="/img/guideFrame-2.png" alt="img">
                                            <div class="guidePhotoImg">
                                                <img class="guideImgMain" src="<?=$gid->img_sad?>" alt="img">
                                                <img class="guideImgHover" src="<?=$gid->img_smile?>" alt="img">
                                            </div>
                                        </div>
                                        <div class="guideTextTop">
                                            <div><span><?=$gid->name?></span></div>
                                            <div><span>☆ <?=$gid->rating?></span></div>
                                        </div>
                                        <div class="guideTextBottom">
                                            <div><span><?=$gid->city->city?></span></div>
                                            <div><span>|</span></div>
                                            <?php if ($gid->lang != null): ?>
                                                <?php $gid->lang = json_decode($gid->lang); ?>                            
                                                <?php foreach ($gid->lang as $lang): ?>
                                                    <div><span><?=$lang?></span></div>
                                                <?php endforeach; ?>                                                
                                            <?php endif; ?>                                                                                
                                        </div>
                                    </div>
                                    <div class="guideButton">
                                        <div style="display: none;" class="ChoosedGid" data-id="<?=$gid->name?>" data-img="<?=$gid->img_smile?>"></div>
                                        <button class="borderAdd openPopupGuide"><?=Yii::t('app', 'Выбрать')?></button>
                                    </div>
                                </div>
                            <?php else:?>                                
                                <div class="guideItem">
                                    <div class="guideInfo" data-aos="zoom-in" data-aos-delay="50">
                                        <div class="guidePhoto">
                                            <img src="/img/guideFrame-1.png" alt="img">
                                            <div class="guidePhotoImg">
                                                <img class="guideImgMain" src="<?=$gid->img_sad?>" alt="img">
                                                <img class="guideImgHover" src="<?=$gid->img_smile?>" alt="img">
                                            </div>
                                        </div>
                                        <div class="guideTextTop">
                                            <div><span><?=$gid->name?></span></div>
                                            <div><span>☆ <?=$gid->rating?></span></div>                            
                                        </div>
                                        <div class="guideTextBottom">
                                            <div><span><?=$gid->city->city?></span></div>
                                            <div><span>|</span></div>
                                            <?php if ($gid->lang != null): ?>
                                                <?php $gid->lang = json_decode($gid->lang); ?>                            
                                                <?php foreach ($gid->lang as $lang): ?>
                                                    <div><span><?=$lang?></span></div>
                                                <?php endforeach; ?>                                                
                                            <?php endif; ?>                                            
                                        </div>
                                    </div>
                                    <div class="guideButton">
                                        <div style="display: none;" class="ChoosedGid" data-id="<?=$gid->name?>" data-img="<?=$gid->img_smile?>"></div>
                                        <button class="borderAdd openPopupGuide"><?=Yii::t('app', 'Выбрать')?></button>
                                    </div>
                                </div> 
                            <?php endif; ?>  
                        <?php if ($count == 3 || $count == 6 || $count == 9 || $count == $data_count): ?>           
                            </div>              
                        <?php endif; ?>
                        <?php $count++; endforeach; ?>
                    <?php endif; ?>    
                    <?php if ($pageNumber > 1): ?>                                                                                        
                        <div class="guidesNav">
                            <nav>
                                <ul class="pagination guidesPagination">
                                    <li>
                                        <a href="<?=1 <= ($current-1) ? "/site/guides/".($current-1) : 'javascript:void(0)' ?>"><img src="/img/row-left.png" alt="row-left"></a>
                                    </li>
                                    <?php for ($i = 1; $i <= $pageNumber; $i++) { ?>
                                        <li class="<?=$current == $i ? "activePagination" : ""?>" style="width:2em;height:2em;">
                                            <a href="/site/guides/<?=$i?>"><?=$i?></a>
                                        </li>
                                        <?php if ($pageNumber > 5 && $i == 2):?>
                                            <li class="dots">
                                                <a href="javascript:void(0)"><span>...</span></a>
                                            </li>
                                            <li style="width:2em;height:2em;" class="<?=$current == $pageNumber ? "activePagination" : ""?>">
                                                <a href="/site/guides/<?=$pageNumber?>"><?=$pageNumber?></a>
                                            </li>        
                                        <?php break; endif; ?>
                                    <?php } ?>                                                                
                                    <li>
                                        <a href="<?=$pageNumber >= ($current+1) ? "/site/guides/".($current+1) : 'javascript:void(0)' ?>"><img src="/img/row-left.png" alt="row-right"></a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    <?php endif; ?>
                </div>                
            </div>            
        </section>
        <!-------------->
        <div class="popupGuide popupGuideAzamat">
            <div class="popupGuideCloseBtn">
                <img src="/img/popupGuideCloseBtn.png" alt="img">
            </div>
            <div class="popupGuideImg">
                <img id="img_smile" src="/img/popupGuideAzamat.jpg" alt="img">
            </div>
            <div class="popupGuideName">
                <span class="gradient-title GuideName">
                    АЗАМАТ
                </span>
            </div>
            <div class="popupGuideText">                                    
                <div class="popupGuideTextBottom">
                    <p class="gradient-title">
                        <?=Yii::t('app', 'Пожалуйста, оставьте контакты, чтобы
                        мы могли подтвердить Ваш выбор')?>
                        
                    </p>
                </div>
            </div>
            <div class="popupGuideForm">
                <form action="#" method="post" id="formGuide">
                    <div>
                        <input name="name" placeholder="<?=Yii::t('app', 'Имя')?>" type="text">
                    </div>
                    <div>
                        <input name="phone" placeholder="<?=Yii::t('app', 'Телефон')?>" type="tel">
                    </div>
                    <input name="gid" id="choosedGid" type="hidden">
                    <button type="submit" class="borderAdd submitGid openGuide"><?=Yii::t('app', 'Отправить')?></button>
                </form>
            </div>
        </div>
        <!-------------->
        <div class="popupGuideBack"></div>

        <div class="toursBannerM guidesBannerM"> <!-- TOURS BANNER MOBILE -->
            <div class="toursBannerImgM">
                <img class="toursBannerImgMImg" src="/img/mobile/guidesBannerImgM.png" alt="img">
            </div>
            <div class="toursBannerDekorM">
                <img class="toursBannerDekorMImg" src="/img/mobile/guidesBannerDekorM.png" alt="img">
            </div>
            <div class="guidesBannerFormM">
                <div class="toursBannerFormMImg">
                    <img class="toursBannerFormMBack" src="/img/mobile/toursBannerFormMBack.png" alt="img">
                </div>                    
                <div class="guidesBannerTitleM">
                    <h1><?=Yii::t('app', 'ВЫБЕРИТЕ ГИДА,')?></h1>
                    <h3><?=Yii::t('app', 'С КОТОРЫМ ХОТИТЕ ПРОВЕСТИ СВОЁ ПУТЕШЕСТВИЕ!')?></h3>
                </div>
                <div class="guidesBannerFormTextM">
                    <div class="guidesBannerFormTextMTop">
                        <p>
                            <?=Yii::t('app', 'ВСЕМ САЛЮТ!')?>
                        </p>
                    </div>
                    <div class="guidesBannerFormTextMBottom">
                        <p>
                        <?=Yii::t('app', '<b>Вам скучно? Вы не знаете город?</b>
                            Не знаете где развлечься, нужна мульти
                            языковая мега крутая экскурсия?
                            Тогда Bам именно к Нам Jabe Сoncierge.')?>
                        </p>
                    </div>
                </div>
                <div class="toursBannerFormTextBtn">
                    <button class="btnM borderAddM">
                        <span>
                            <?=Yii::t('app', 'СКАЧАТЬ')?>
                        </span>
                    </button>
                </div>
            </div>
        </div>
        <div class="titleM">  <!-- TOURS TITLE MOBILE -->
            <div class="hr"><hr></div>
            <div class="titleMSpan gradient-title"><span><?=Yii::t('app', 'Гиды')?></span></div>
            <div class="hr"><hr></div>
        </div>
        <div class="guidesSliderBoxM">
            <?php if ($gids != null): ?>                             
                <div class="owl-slider owlSliderSub-tourReviewsM">
                    <div id="carousel_guidesM" class="owl-carousel owl-carouselSub-tours">
                        <!----------------------------------------------------------------------------------->
                        <?php foreach ($gids as $gid): ?>                    
                            <div class="guidesGuidesSliderItemM">
                                <div class="guidesSliderFrameM">
                                    <img class="guidesSliderFrameImgM" src="/img/mobile/guidesSliderFrameM.png" alt="img">
                                </div>
                                <div class="guidePhotoM">
                                    <img class="guidesSliderPhotoImgM" src="<?=$gid->img_sad?>" alt="img">
                                </div>
                                <div class="guideTextTopM">
                                    <div><span><?=$gid->name?></span></div>
                                    <div><span>☆ <?=$gid->rating?></span></div>                            
                                </div>
                                <div class="guideTextBottomM">
                                    <div><span><?=$gid->city->city?></span></div>
                                    <div><span>|</span></div>   
                                    <?php if ($gid->lang != null): ?>                                        
                                        <?php foreach ($gid->lang as $lang): ?>
                                            <div><span><?=$lang?></span></div>
                                        <?php endforeach;?>
                                    <?php endif;?>                         
                                    <!-- <div><span>RU</span></div>                            
                                    <div><span>EN</span></div>                            
                                    <div><span>DE</span></div>                            
                                    <div><span>CHE</span></div>                             -->
                                </div>
                                <div style="display: none;" class="ChoosedGid" data-id="<?=$gid->name?>" data-img="<?=$gid->img_smile?>"></div>
                            </div>                            
                        <?php endforeach;?>
                        <!----------------------------------------------------------------------------------->                        
                    </div>

                    </div class="sub-toursPhotosSliderBtnsM">
                        <div class="guideSelectBtnM">
                            <button class="btnM borderAddM openPopupGuideM">
                                <span>
                                    <?=Yii::t('app', 'Выбрать')?>
                                </span>
                            </button>
                        </div>
                        <div class="next_owl_guidesM">
                            <a href="#"><img src="/img/mobile/sub-tourSliderRow1.png" alt="img"></a>
                        </div>
                        <div class="prev_owl_guidesM">
                            <a href="#"><img src="/img/mobile/sub-tourSliderRow.png" alt="img"></a>
                        </div>
                    </div>
                </div>   
            <?php endif; ?>
        </div>

    </body>
</html>

<?php include 'footer.php';?>