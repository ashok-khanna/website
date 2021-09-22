<?php $this->title = $one_service->name;
 include 'header.php'; ini_set('memory_limit', '-1'); ?>
    <span style="display: none;" class="page_name"><?=$one_service->name?></span>
    <!DOCTYPE html>
    <html lang="en">
    
    <body>
        <!-- <img src="tours.jpg" class="test"> -->
        <section id="tours-1">
            
            
            <div class="toursBanner noInMob">
                
                <img src="/img/golf.png" alt="баннер">
                <img style="height: 100%; top: 50%;" class="toursBannerDekor" src="/img/serviceBack4Banner.png" alt="img">

                <div class="tours banner">
                    <div class="toursBannerTitle">
                        <h1><?= $one_service->name ?></h1>
                        <h3><?= $one_service->header ?></h3>
                    </div>

                    <div class="toursBannerForm" data-aos="zoom-in" >
                        <div class="formDekorText" data-aos="zoom-in" data-aos-delay="300">                            
                            <div style="right: 40%;top: -4.4em;transform: rotate(180deg);" class="lines_right">
                                <hr class="line_sm">
                                <div class="line_dots">
                                    <div class="myTripsSqr op1"></div>
                                    <div class="myTripsSqr op2"></div>
                                    <div class="myTripsSqr op3"></div>
                                </div>
                                <hr class="line_long">
                            </div>

                            <div style="right: -103%;top: 7.8em;" class="lines_right">
                                <hr class="line_sm line_sm-3">
                                <div class="line_dots">
                                    <div class="myTripsSqr op1"></div>
                                    <div class="myTripsSqr op2"></div>
                                    <div class="myTripsSqr op3"></div>
                                </div>
                                <hr class="line_long">
                            </div>
                        </div>
                        <img src="/img/toursFormBack.png" alt="img">
                        <p class="toursBannerFormTop"><?=Yii::t('app', 'УЗНАЙТЕ БОЛЬШЕ')?></p>
                        <p class="toursBannerFormBottom"><?=Yii::t('app', 'о предоставляемых услугах <br> и их стоимости, скачав pdf-файл!')?></p>
                        <button onclick="window.open('<?=$file->file_path?>')" class="borderAdd">
                            <span>
                                <?=Yii::t('app', 'СКАЧАТЬ')?>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="toursBannerM"> <!-- TOURS BANNER MOBILE -->
                <div class="toursBannerImgM">
                    <img class="toursBannerImgMImg" src="/img/mobile/toursBannerImgM.png" alt="img">
                </div>
                <div class="toursBannerDekorM">
                    <img class="toursBannerDekorMImg" src="/img/mobile/toursBannerDekorM.png" alt="img">
                </div>
                <div class="toursBannerFormM">
                    <div class="toursBannerFormMImg">
                        <img class="toursBannerFormMBack" src="/img/mobile/toursBannerFormMBack.png" alt="img">
                    </div>                    
                    <div class="toursBannerTitleM">
                        <h1><?=$one_service->name?></h1>
                        <h3><?=$one_service->header?></h3>
                    </div>
                    <div class="toursBannerFormTextM">
                        <div class="toursBannerFormTextMTop"><p><?=Yii::t('app', 'УЗНАЙТЕ БОЛЬШЕ')?></p></div>
                        <div class="toursBannerFormTextMBottom"><p><?=Yii::t('app', 'о предоставляемых услугах <br> и их стоимости, скачав pdf-файл!')?></p></div>
                    </div>
                    <div class="toursBannerFormTextBtn">
                        <button onclick="window.open('<?=$file->file_path?>')" class="btnM borderAddM">
                            <span>
                                <?=Yii::t('app', 'СКАЧАТЬ')?>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <?php if ($sub_services != null): ?>
            <div class="title noInMob">
                <div class="hr"><hr></div>
                <div class="titleSpan gradient-title"><span> <?=$one_service->sub_header?> </span></div>
                <div class="hr"><hr></div>
            </div>

            <div class="titleM">  <!-- TOURS TITLE MOBILE -->
                <div class="hr"><hr></div>
                <div class="titleMSpan gradient-title"><span> <?=$one_service->sub_header?> </span></div>
                <div class="hr"><hr></div>
            </div>

            <div class="container noInMob">
                <div class="toursItems">
                    <div class="toursItemsTop">

                        <?php $count = 0; foreach ($sub_services as $sub_service): ?>                            
                            <div class="tourItem tourItemSmall" data-aos="fade-right">
                                <div  id="tourItemImg0" class="tourItemImg">
                                    <img src="<?=$sub_service->img?>" alt="img">
                                </div>
                                <div id="tourItemSlide0" class="tourItemSlide">
                                    <div>
                                        <p>
                                            <?=mb_substr($sub_service->body, 0, 150)?>                                            
                                        </p>
                                    </div>
                                    <div>
                                        <a href="/site/sub_tours/<?=$sub_service->id?>" class="qazyButton borderAdd"><?=Yii::t('app', 'Подробнее')?></a>
                                    </div>
                                </div>
                                
                                <div class="tourItemTitle">
                                    <span><?=$sub_service->name?></span>
                                </div>
                            </div>
                            <?php if ($count == 1) break; ?>
                        <?php $count++; endforeach; ?>                     


                    </div>
                    <div class="toursItemsMid">
                        <?php for ($i = 2; $i < count($sub_services); $i++) { ?>
                            <div style="left: -2.3%;" class="tourItem big" data-aos="fade-leftt">
                                <div id="tourItemImg2"  class="tourItemImg">
                                    <img src="<?=$sub_services[$i]->img?>" alt="багги">
                                </div>
                                <div id="tourItemSlide2" class="tourItemSlide tourItemSlideBig">
                                    <div>
                                        <p>
                                            <?=$sub_services[$i]->body?>
                                        </p>
                                    </div>
                                    <div>
                                        <a href="/site/sub_tours/<?=$sub_services[$i]->id?>" class="qazyButton borderAdd"><?=Yii::t('app', 'Подробнее')?></a>
                                    </div>
                                </div>

                                <div class="tourItemTitle">
                                <span><?=$sub_services[$i]->name?></span>
                                </div>
                            </div>
                        <?php break; } ?>
                        <?php if($adds != null && isset($adds[0])): ?>
                            <div class="tourItemAd" onclick="location.href = '<?=$adds[0]->link?>'">                            
                                <img src="<?=$adds[0]->file_path?>" alt="img">                            
                            </div>
                        <?php endif; ?>

                    </div>

                    <div class="toursItemBottom">

                        <?php if($adds != null && isset($adds[1])): ?>
                            <div class="tourItemAd" onclick="location.href = '<?=$adds[1]->link?>'">                            
                                <img src="<?=$adds[1]->file_path?>" alt="img">                            
                            </div>
                        <?php endif; ?>
                        <?php for ($i = 3; $i < count($sub_services); $i++) { ?>
                            <div style="left: 1.5%;" class="tourItem big" data-aos="fade-left">
                                <div id="tourItemImg3" class="tourItemImg">
                                    <img src="<?=$sub_services[$i]->img?>" alt="гольф">
                                </div>
                                <div id="tourItemSlide3" class="tourItemSlide tourItemSlideBig">
                                    <div>
                                        <p>
                                            <?=$sub_services[$i]->body?>
                                        </p>
                                    </div>
                                    <div>
                                        <a href="/site/sub_tours/<?=$sub_services[$i]->id?>" class="qazyButton borderAdd"><?=Yii::t('app', 'Подробнее')?></a>
                                    </div>
                                </div>
                                
                                <div class="tourItemTitle">
                                <span><?=$sub_services[$i]->name?></span>
                                </div>
                            </div>
                        <?php break; } ?>
                    </div>
                    <div class="toursItemsTop">
                        <?php $count = 0; for ($i = 4; $i < count($sub_services); $i++) { ?>                            
                            <div class="tourItem tourItemSmall" data-aos="fade-right">
                                <div  id="tourItemImg0" class="tourItemImg">
                                    <img src="<?=$sub_services[$i]->img?>" alt="img">
                                </div>
                                <div id="tourItemSlide0" class="tourItemSlide">
                                    <div>
                                        <p>
                                            <?=mb_substr($sub_services[$i]->body, 0, 150)?>                                            
                                        </p>
                                    </div>
                                    <div>
                                        <a href="/site/sub_tours/<?=$sub_services[$i]->id?>" class="qazyButton borderAdd"><?=Yii::t('app', 'Подробнее')?></a>
                                    </div>
                                </div>
                                
                                <div class="tourItemTitle">
                                    <span><?=$sub_services[$i]->name?></span>
                                </div>
                            </div>
                            <?php if ($count == 1) break; ?>
                        <?php $count++; } ?>                     
                    </div>
                </div>
            </div>            
            <div class="toursItemsM"> <!-- TOURS ITEMS MOBILE -->
                <?php if ($sub_services != null): ?>
                    <?php $count = 1; foreach ($sub_services as $sub_service): ?>
                        <?php if ($count%2 != 0): ?>
                            <div class="tourItemM" data-aos="fade-left">
                                <div id="tourItemImgM" class="tourItemImgM">
                                    <img src="<?=$sub_service->img?>">
                                </div>
                                <div id="tourItemSlideM" class="tourItemSlideM">
                                    <div>
                                        <p>
                                            <?=mb_substr($sub_service->body, 0, 150)?>
                                            <!-- Казино - естественное альпийское водохранилище.
                                            Оно появилось из-за землетрясения в горах Заилийского Алатау
                                            и окружено тремя впечатляющими красотой горами. Именно ледники,
                                            тающие на верхушках этих гор, и создают Озеро.  -->
                                        </p>
                                    </div>                            
                                </div>
                                
                                <div class="tourItemTitleM">
                                    <div class="tourItemTitleTextM">
                                        <span><?=$sub_service->name?></span>
                                    </div>
                                    <div class="tourItemTitleBtn">
                                        <a href="/site/sub_tours/<?=$sub_service->id?>" class="qazyButtonHugeM borderHugeAddM"><?=Yii::t('app', 'Подробнее')?></a>
                                    </div>
                                </div>
                            </div>
                        <?php else: ?>
                                <div class="tourItemReverseM" data-aos="fade-right"> <!--REVERSE-->
                                    <div class="tourItemReverseTitleM">
                                        <div class="tourItemTitleTextM">
                                            <span><?=$sub_service->name?></span>
                                        </div>
                                        <div class="tourItemTitleBtn">
                                            <a href="/site/sub_tours/<?=$sub_service->id?>" class="qazyButtonHugeM borderHugeAddM"><?=Yii::t('app', 'Подробнее')?></a>
                                        </div>
                                    </div>

                                    <div id="tourItemReverseImgM" class="tourItemReverseImgM">
                                        <img src="<?=$sub_service->img?>" alt="БАО">
                                    </div>
                                    <div id="tourItemReverseSlideM" class="tourItemReverseSlideM">
                                        <div>
                                            <p>
                                                <?=$sub_service->body?>
                                            </p>
                                        </div>                        
                                    </div> 
                                </div>
                        <?php endif; ?>
                    <?php $count++; endforeach; ?>
                <?php endif; ?>                               
                <!------------------------------------->               
            </div>
            <div class="toursFormM">
                <div class="toursFormImgM">
                    <img class="toursFormImgMImg" src="/img/mobile/toursFormImgM.png" alt="img">
                </div>
                <div class="toursFormDekorM">
                    <img class="toursFormDekorMImg" src="/img/mobile/toursFormDekorM.png" alt="img">
                </div>
                <div class="toursFormFormM">
                    <div class="toursFormTitleM">
                        <h4>
                            <?=Yii::t('app','Ваши самые изысканные и капризные запросы ждут здесь!')?>
                        </h4>
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
        </section>
        <section id="tours-2" class="noInMob">
            <div class="takeIt">
                <img src="/img/back4form.png" alt="фон для формы">
                <div class="thanksForm"> <p><?=Yii::t('app', 'СПАСИБО, ВАША ЗАЯВКА ПРИНЯТА!')?></p></div>
                <form action="" method="get">
                    <div style="color:transparent" class="formDekorText unselectable" data-aos="zoom-in" data-aos-delay="300" data-aos-once="true">
                        <div class="lines_left">
                            <hr class="line_sm">
                            <div class="line_dots">
                                <div class="myTripsSqr op3"></div>
                                <div class="myTripsSqr op2"></div>
                                <div class="myTripsSqr op1"></div>
                            </div>
                            <hr class="line_long">
                        </div>
                        <div style="right: -5.1em; top: 9.3em;" class="lines_right">
                            <hr class="line_sm">
                            <div class="line_dots">
                                <div class="myTripsSqr op1"></div>
                                <div class="myTripsSqr op2"></div>
                                <div class="myTripsSqr op3"></div>
                            </div>
                            <hr class="line_long">
                        </div>
                        Нет времени на организацию поездки?
                    </div>
                    <span><?=Yii::t('app','Ваши самые изысканные и капризные запросы ждут здесь!')?></span>
                    <div class="input-form">
                        <input name="name" style="width: 50%;" placeholder="<?=Yii::t('app','Имя')?>" type="text">
                        <input name="phone" style="width: 50%;" placeholder="<?=Yii::t('app','Телефон')?>" type="tel">
                    </div>
                    <input name="page" id="page_nameM" style="display: none;" type="text" placeholder="">
                    <input name="btn" id="btn_name" style="display: none;" type="text" placeholder="">
                    <button class="borderAdd submitForm2"><?=Yii::t('app', 'ОТПРАВИТЬСЯ В ПУТЕШЕСТВИЕ С JABE')?></button>
                </form>
            </div>
        </section>
        <?php endif; ?>
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
