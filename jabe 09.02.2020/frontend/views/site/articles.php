
<?php $this->title = Yii::t('app', 'Jabe Журнал'); include 'header.php';?>
    <span style="display: none;" class="page_name">Jabe Журнал</span>
    <!DOCTYPE html>
    <html lang="en">
    
    <body>
        <!-- <img src="articles.jpg" class="test"> -->
        <section class="noInMob" id="articles">

            <div class="topImg">
                <img src="/img/articleTop.png" alt="img">
                <div></div>
            </div>

            <div class="newTitle">
                <div class="newTitleLine"></div>
                <div class="newTitleText">
                    <?=Yii::t('app', 'Эксклюзивы JABE')?>
                    <div class="newTitleFlareWrap" data-aos="zoom-in" data-aos-delay="300" data-aos-once="false">
                        <div class="flareImg">
                            <img src="/img/flare.png" alt="img">
                        </div>

                    </div>
                </div>
                <div class="newTitleLine"></div>
            </div>

            <div class="container">

                <div class="articlesBox">                    
                
                    <div class="swiper_box">
                        <!-- <div class="categoryChoiceText"><span>Пожалуйста, выберите категорию</span></div> -->
                        <div class="swiper-container-journal swiper-container">
                            <div id="Category_web" class="swiper-wrapper">
                                <div class="swiper-slide"><p><a data-id="none" href="#"><?=Yii::t('app', 'Выберите категорию')?></a></p></div>
                                <div class="swiper-slide"><p><a data-id="0" href="#"><?=Yii::t('app', 'Роскошная Жизнь')?></a></p></div>
                                <div class="swiper-slide"><p><a data-id="1" href="#">Gentleman Quality</a></p></div>
                                <div class="swiper-slide"><p><a data-id="2" href="#"><?=Yii::t('app', 'Новости Компании Jabe Concierge')?></a></p></div>
                                <div class="swiper-slide"><p><a data-id="3" href="#"><?=Yii::t('app', 'Стиль Жизни')?></a></p></div>
                                <div class="swiper-slide"><p><a data-id="4" href="#"><?=Yii::t('app', 'Гольф')?></a></p></div>
                                <div class="swiper-slide"><p><a data-id="5" href="#"><?=Yii::t('app', 'Ночная Жизнь')?></a></p></div>
                                <div class="swiper-slide"><p><a data-id="6" href="#"><?=Yii::t('app', 'Вэлнес и СПА')?></a></p></div>
                            </div>                       
                            <div class="swiper-button-up"><span>></span> </div>
                            <div class="swiper-button-down"><span><</span></div>
                        </div>
                    </div>
                      
                    <div class="category0" style="width: 100%;">   
                        <?php if ($category == 0 || empty($category)): ?>
                            <div class="newTitle newTitleNoBack noinMob">
                                <div class="newTitleLineJournal"></div>
                                <div class="newTitleTextJournal">
                                    <?=Yii::t('app', 'Роскошная Жизнь')?>
                                </div>
                                <div class="newTitleLineJournal"></div>
                            </div>
                            <?php $count = 1; foreach($news as $new): ?>
                                <?php if ($new->category_news == 0): ?>                    
                                    <div class="articlesItem" data-aos="zoom-in">

                                        <div class="articlesImg">
                                            <img src="<?=$new->img?>" alt="иллюстрация">
                                        </div>

                                        <div class="articlesInfo">
                                            <div class="articlesInfoTop">
                                                <div class="articlesTitle gradient-1">
                                                    <span><?=$new->name?></span>
                                                </div>
                                            </div>
                                            <div class="articlesInfoBottom">
                                                <div class="articlesAbout">
                                                    <p>
                                                        <?=mb_substr($new->body, 0, 280)?>                                                   
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="articlesButton">
                                                <div class="articlesHr"><hr></div>
                                                <div class="articlesSqr"></div>
                                                <a class="qazyButton borderAdd" href="/site/article/<?=$new->id?>">Подробнее</a>
                                            </div>

                                        </div>
                                    </div>
                                    <?php if ($count == 3): break; ?>
                                    <?php endif; ?>
                                <?php $count++; endif; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                                                                                                        

                    <div class="category1" style="width: 100%;">
                        <?php if ($category == 1 || empty($category)): ?>
                            <div class="newTitle newTitleNoBack noinMob">
                                <div class="newTitleLineJournal"></div>
                                <div class="newTitleTextJournal">
                                    Gentleman Quality
                                </div>
                                <div class="newTitleLineJournal"></div>
                            </div>
                            <?php $count = 1; foreach($news as $new): ?>
                                <?php if ($new->category_news == 1): ?>                    
                                    <div class="articlesItem" data-aos="zoom-in">

                                        <div class="articlesImg">
                                            <img src="<?=$new->img?>" alt="иллюстрация">
                                        </div>

                                        <div class="articlesInfo">
                                            <div class="articlesInfoTop">
                                                <div class="articlesTitle gradient-1">
                                                    <span><?=$new->name?></span>
                                                </div>
                                            </div>
                                            <div class="articlesInfoBottom">
                                                <div class="articlesAbout">
                                                    <p>
                                                        <?=mb_substr($new->body, 0, 280)?>
                                                        <!-- Джэбе (джебе, джабе) — одна из старейших пород казахских лошадей, самые крупные представители
                                                        казахской породы, выведенной на территории современного Казахстана и разводимой в настоящее время в Республике Казахстан
                                                        и прилегающих к ней территориях. -->
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="articlesButton">
                                                <div class="articlesHr"><hr></div>
                                                <div class="articlesSqr"></div>
                                                <a class="qazyButton borderAdd" href="/site/article/<?=$new->id?>">Подробнее</a>
                                            </div>

                                        </div>
                                    </div>
                                    <?php if ($count == 3): break; ?>
                                    <?php endif; ?>
                                <?php $count++; endif; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                    <div class="articlesItem articlesItemAd">

                        <img src="/img/articlesAd.png" alt="articles Ad">
                      
                    </div>

                    <div class="category2" style="width: 100%;">
                        <?php if ($category == 2 || empty($category)): ?>
                            <div class="newTitle newTitleNoBack noinMob">
                                <div class="newTitleLineJournal"></div>
                                <div class="newTitleTextJournal">
                                    <?=Yii::t('app', 'Новости Компании Jabe Concierge')?>
                                </div>
                                <div class="newTitleLineJournal"></div>
                            </div>
                            <?php $count = 1; foreach($news as $new): ?>
                                <?php if ($new->category_news == 2): ?>                     
                                    <div class="articlesItem" data-aos="zoom-in">

                                        <div class="articlesImg">
                                            <img src="<?=$new->img?>" alt="иллюстрация">
                                        </div>

                                        <div class="articlesInfo">
                                            <div class="articlesInfoTop">
                                                <div class="articlesTitle gradient-1">
                                                    <span><?=$new->name?></span>
                                                </div>
                                            </div>
                                            <div class="articlesInfoBottom">
                                                <div class="articlesAbout">
                                                    <p>
                                                        <?=mb_substr($new->body, 0, 280)?>
                                                        <!-- Джэбе (джебе, джабе) — одна из старейших пород казахских лошадей, самые крупные представители
                                                        казахской породы, выведенной на территории современного Казахстана и разводимой в настоящее время в Республике Казахстан
                                                        и прилегающих к ней территориях. -->
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="articlesButton">
                                                <div class="articlesHr"><hr></div>
                                                <div class="articlesSqr"></div>
                                                <a class="qazyButton borderAdd" href="/site/article/<?=$new->id?>">Подробнее</a>
                                            </div>

                                        </div>
                                    </div>
                                    <?php if ($count == 3): break; ?>
                                    <?php endif; ?>
                                <?php $count++; endif; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>

                    <div class="category3" style="width: 100%;">
                        <?php if ($category == 3 || empty($category)): ?>
                            <div class="newTitle newTitleNoBack noinMob">
                                <div class="newTitleLineJournal"></div>
                                <div class="newTitleTextJournal">
                                    <?=Yii::t('app', 'Стиль Жизни')?>
                                </div>
                                <div class="newTitleLineJournal"></div>
                            </div>                    
                            <?php $count = 1;foreach ($news as $new): ?>
                                <?php if ($new->category_news == 3): ?>
                                    <div class="articlesItem" data-aos="zoom-in">

                                        <div class="articlesImg">
                                            <img src="<?=$new->img?>" alt="иллюстрация">
                                        </div>

                                        <div class="articlesInfo">
                                            <div class="articlesInfoTop">
                                                <div class="articlesTitle gradient-1">
                                                    <span><?=$new->name?></span>
                                                </div>
                                            </div>
                                            <div class="articlesInfoBottom">
                                                <div class="articlesAbout">
                                                    <p>
                                                        <?=mb_substr($new->body, 0, 280)?>                                                 
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="articlesButton">
                                                <div class="articlesHr"><hr></div>
                                                <div class="articlesSqr"></div>
                                                <a class="qazyButton borderAdd" href="/site/article/<?=$new->id?>">Подробнее</a>
                                            </div>

                                        </div>
                                    </div>
                                    <?php if ($count == 3): break; ?>
                                    <?php endif; ?>
                                <?php $count++; endif;?>
                            <?php endforeach;?>
                        <?php endif; ?>
                    </div>

                    <div class="category4" style="width: 100%;">
                        <?php if ($category == 4 || empty($category)): ?>
                            <div class="newTitle newTitleNoBack noinMob">
                                <div class="newTitleLineJournal"></div>
                                <div class="newTitleTextJournal">
                                    <?=Yii::t('app', 'Гольф')?>
                                </div>
                                <div class="newTitleLineJournal"></div>
                            </div>
                            <?php $count = 1;foreach ($news as $new): ?>
                                <?php if ($new->category_news == 4): ?>
                                    <div class="articlesItem" data-aos="zoom-in">

                                        <div class="articlesImg">
                                            <img src="<?=$new->img?>" alt="иллюстрация">
                                        </div>

                                        <div class="articlesInfo">
                                            <div class="articlesInfoTop">
                                                <div class="articlesTitle gradient-1">
                                                    <span><?=$new->name?></span>
                                                </div>
                                            </div>
                                            <div class="articlesInfoBottom">
                                                <div class="articlesAbout">
                                                    <p>
                                                        <?=mb_substr($new->body, 0, 280)?>
                                                        <!-- Джэбе (джебе, джабе) — одна из старейших пород казахских лошадей, самые крупные представители
                                                        казахской породы, выведенной на территории современного Казахстана и разводимой в настоящее время в Республике Казахстан
                                                        и прилегающих к ней территориях. -->
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="articlesButton">
                                                <div class="articlesHr"><hr></div>
                                                <div class="articlesSqr"></div>
                                                <a class="qazyButton borderAdd" href="/site/article/<?=$new->id?>">Подробнее</a>
                                            </div>

                                        </div>
                                    </div>
                                    <?php if ($count == 3): break; ?>
                                    <?php endif; ?>
                                <?php $count++; endif;?>
                            <?php endforeach;?>
                        <?php endif; ?>
                    </div>
                    <div class="category5" style="width: 100%;">
                        <?php if ($category == 5 || empty($category)): ?>                        
                            <div class="newTitle newTitleNoBack noinMob">
                                <div class="newTitleLineJournal"></div>
                                <div class="newTitleTextJournal">
                                    <?=Yii::t('app', 'Ночная Жизнь')?>
                                </div>
                                <div class="newTitleLineJournal"></div>
                            </div>                    
                            <?php $count = 1;foreach ($news as $new): ?>
                                <?php if ($new->category_news == 5): ?>
                                    <div class="articlesItem" data-aos="zoom-in">

                                        <div class="articlesImg">
                                            <img src="<?=$new->img?>" alt="иллюстрация">
                                        </div>

                                        <div class="articlesInfo">
                                            <div class="articlesInfoTop">
                                                <div class="articlesTitle gradient-1">
                                                    <span><?=$new->name?></span>
                                                </div>
                                            </div>
                                            <div class="articlesInfoBottom">
                                                <div class="articlesAbout">
                                                    <p>
                                                        <?=mb_substr($new->body, 0, 280)?>
                                                        <!-- Джэбе (джебе, джабе) — одна из старейших пород казахских лошадей, самые крупные представители
                                                        казахской породы, выведенной на территории современного Казахстана и разводимой в настоящее время в Республике Казахстан
                                                        и прилегающих к ней территориях. -->
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="articlesButton">
                                                <div class="articlesHr"><hr></div>
                                                <div class="articlesSqr"></div>
                                                <a class="qazyButton borderAdd" href="/site/article/<?=$new->id?>">Подробнее</a>
                                            </div>

                                        </div>
                                    </div>
                                    <?php if ($count == 3): break; ?>
                                    <?php endif; ?>
                                <?php $count++; endif;?>
                            <?php endforeach;?>
                        <?php endif; ?>
                    </div>

                    <div class="category6" style="width: 100%;">
                        <?php if ($category == 6 || empty($category)): ?>                        
                            <div class="newTitle newTitleNoBack noinMob">
                                <div class="newTitleLineJournal"></div>
                                <div class="newTitleTextJournal">
                                    <?=Yii::t('app', 'Вэлнес и СПА')?>
                                </div>
                                <div class="newTitleLineJournal"></div>
                            </div>
                            <?php $count = 1;foreach ($news as $new): ?>
                                <?php if ($new->category_news == 6): ?>
                                    <div class="articlesItem" data-aos="zoom-in">

                                        <div class="articlesImg">
                                            <img src="<?=$new->img?>" alt="иллюстрация">
                                        </div>

                                        <div class="articlesInfo">
                                            <div class="articlesInfoTop">
                                                <div class="articlesTitle gradient-1">
                                                    <span><?=$new->name?></span>
                                                </div>
                                            </div>
                                            <div class="articlesInfoBottom">
                                                <div class="articlesAbout">
                                                    <p>
                                                        <?=mb_substr($new->body, 0, 280)?>
                                                        <!-- Джэбе (джебе, джабе) — одна из старейших пород казахских лошадей, самые крупные представители
                                                        казахской породы, выведенной на территории современного Казахстана и разводимой в настоящее время в Республике Казахстан
                                                        и прилегающих к ней территориях. -->
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="articlesButton">
                                                <div class="articlesHr"><hr></div>
                                                <div class="articlesSqr"></div>
                                                <a class="qazyButton borderAdd" href="/site/article/<?=$new->id?>">Подробнее</a>
                                            </div>

                                        </div>
                                    </div>
                                    <?php if ($count == 3): break; ?>
                                    <?php endif; ?>
                                <?php $count++; endif;?>
                            <?php endforeach;?>
                        <?php endif; ?>
                    </div>
                                                       
                </div>
            </div>            
        </section>

        <div class="articleOpenM">
            <div class="topImgM">
                <img src="/img/mobile/aboutTopImgM.png" alt="img">
                <div></div>
            </div>
            <div class="titleM">  <!-- ARTICLES TITLE MOBILE -->
                <div class="hr"><hr></div>
                <div class="titleMSpan gradient-title"><span>jabe журнал</span></div>
                <div class="hr"><hr></div>
            </div>
            
            <div class="articlesBoxM">
                <div class="swiper_box">
                    <!-- <div class="categoryChoiceText"><span>Пожалуйста, выберите категорию</span></div> -->
                    <div class="swiper-container-journal swiper-container">
                        <div id = "Category_mob" class="swiper-wrapper">
                            <div class="swiper-slide"><p><a data-id="none" href="#"><?=Yii::t('app', 'Выберите категорию')?></a></p></div>
                            <div class="swiper-slide"><p><a data-id="0" href="#"><?=Yii::t('app', 'Роскошная Жизнь')?></a></p></div>
                            <div class="swiper-slide"><p><a data-id="1" href="#">Gentleman Quality</a></p></div>
                            <div class="swiper-slide"><p><a data-id="2" href="#"><?=Yii::t('app', 'Новости Компании Jabe Concierge')?></a></p></div>
                            <div class="swiper-slide"><p><a data-id="3" href="#"><?=Yii::t('app', 'Стиль Жизни')?></a></p></div>
                            <div class="swiper-slide"><p><a data-id="4" href="#"><?=Yii::t('app', 'Гольф')?></a></p></div>
                            <div class="swiper-slide"><p><a data-id="5" href="#"><?=Yii::t('app', 'Ночная Жизнь')?></a></p></div>
                            <div class="swiper-slide"><p><a data-id="6" href="#"><?=Yii::t('app', 'Вэлнес и СПА')?></a></p></div>
                        </div>                       

                        <div class="swiper-button-up"><span>></span> </div>
                        <div class="swiper-button-down"><span><</span></div>
                    </div>
                </div>
                
                <!------------------------>
                <div class="categoryM0">
                    <div class="newTitle newTitleNoBack noinMob">
                        <div class="newTitleLine"></div>
                        <div class="newTitleText">
                            <?=Yii::t('app', 'Роскошная Жизнь')?>
                        </div>
                        <div class="newTitleLine"></div>
                    </div>
                    <div class="articlesItemM">
                        <div class="articlesItemImgM">
                            <img src="/img/mobile/articleItemImg.png" alt="img">
                        </div>
                        <div class="articlesItemAboutM">
                            <div class="articlesItemAboutTitleM">
                                <p>Джэбе</p>
                            </div>
                            <div class="articlesItemAboutTextM">
                                <p>
                                    Джэбе (джебе, джабе) — одна из старейших пород
                                    казахских лошадей, самые крупные представители
                                    казахской породы, выведенной на территории современного
                                    Казахстана и разводимой в настоящее время в Республике
                                    Казахстан и прилегающих к ней территориях.
                                </p>
                            </div>                        
                        </div>
                        <div class="articlesItemAboutBtnM">
                            <div class="articlesItemAboutBtnLineM"></div>
                            <div class="articlesItemAboutBtnDotM">
                                <img src="/img/mobile/articlesItemAboutBtnDotM.png" alt="img">
                            </div>
                            <div class="articlesItemBtnM ">
                                <button class="btnM borderAddM">
                                    <a href="/site/article/1">Подробнее</a>
                                </button>
                            </div>
                            <div class="articlesItemAboutBtnDotM">
                                <img src="/img/mobile/articlesItemAboutBtnDotM.png" alt="img">
                            </div>
                            <div class="articlesItemAboutBtnLineM"></div>
                        </div>
                    </div>
                </div>
                <div class="categoryM1">
                    <div class="newTitle newTitleNoBack noinMob">
                        <div class="newTitleLine"></div>
                        <div class="newTitleText">
                            Gentleman Quality
                        </div>
                        <div class="newTitleLine"></div>
                    </div>
                    <div class="articlesItemM">
                        <div class="articlesItemImgM">
                            <img src="/img/mobile/articleItemImg.png" alt="img">
                        </div>
                        <div class="articlesItemAboutM">
                            <div class="articlesItemAboutTitleM">
                                <p>Джэбе</p>
                            </div>
                            <div class="articlesItemAboutTextM">
                                <p>
                                    Джэбе (джебе, джабе) — одна из старейших пород
                                    казахских лошадей, самые крупные представители
                                    казахской породы, выведенной на территории современного
                                    Казахстана и разводимой в настоящее время в Республике
                                    Казахстан и прилегающих к ней территориях.
                                </p>
                            </div>                        
                        </div>
                        <div class="articlesItemAboutBtnM">
                            <div class="articlesItemAboutBtnLineM"></div>
                            <div class="articlesItemAboutBtnDotM">
                                <img src="/img/mobile/articlesItemAboutBtnDotM.png" alt="img">
                            </div>
                            <div class="articlesItemBtnM ">
                                <button class="btnM borderAddM">
                                    <a href="/site/article/1">Подробнее</a>
                                </button>
                            </div>
                            <div class="articlesItemAboutBtnDotM">
                                <img src="/img/mobile/articlesItemAboutBtnDotM.png" alt="img">
                            </div>
                            <div class="articlesItemAboutBtnLineM"></div>
                        </div>
                    </div>
                </div>
                <!------------------------>   
                <div class="categoryM2">             
                    <div class="newTitle newTitleNoBack noinMob">
                        <div class="newTitleLine"></div>
                        <div class="newTitleText">
                            <?=Yii::t('app', 'Новости Компании Jabe Concierge')?>
                        </div>
                        <div class="newTitleLine"></div>
                    </div>
                    <div class="articlesItemM">
                        <div class="articlesItemImgM">
                            <img src="/img/mobile/articleItemImg.png" alt="img">
                        </div>
                        <div class="articlesItemAboutM">
                            <div class="articlesItemAboutTitleM">
                                <p>Джэбе</p>
                            </div>
                            <div class="articlesItemAboutTextM">
                                <p>
                                    Джэбе (джебе, джабе) — одна из старейших пород
                                    казахских лошадей, самые крупные представители
                                    казахской породы, выведенной на территории современного
                                    Казахстана и разводимой в настоящее время в Республике
                                    Казахстан и прилегающих к ней территориях.
                                </p>
                            </div>                        
                        </div>
                        <div class="articlesItemAboutBtnM">
                            <div class="articlesItemAboutBtnLineM"></div>
                            <div class="articlesItemAboutBtnDotM">
                                <img src="/img/mobile/articlesItemAboutBtnDotM.png" alt="img">
                            </div>
                            <div class="articlesItemBtnM ">
                                <button class="btnM borderAddM">
                                    <a href="/site/article/1">Подробнее</a>
                                </button>
                            </div>
                            <div class="articlesItemAboutBtnDotM">
                                <img src="/img/mobile/articlesItemAboutBtnDotM.png" alt="img">
                            </div>
                            <div class="articlesItemAboutBtnLineM"></div>
                        </div>
                    </div>
                </div>
                <!------------------------>
                <div class="categoryM3">
                    <!------------------------>
                    <div class="newTitle newTitleNoBack noinMob">
                        <div class="newTitleLine"></div>
                        <div class="newTitleText">
                            <?=Yii::t('app', 'Стиль Жизни')?>
                        </div>
                        <div class="newTitleLine"></div>
                    </div>
                    <div class="articlesItemM">
                        <div class="articlesItemImgM">
                            <img src="/img/mobile/articleItemImg.png" alt="img">
                        </div>
                        <div class="articlesItemAboutM">
                            <div class="articlesItemAboutTitleM">
                                <p>Джэбе</p>
                            </div>
                            <div class="articlesItemAboutTextM">
                                <p>
                                    Джэбе (джебе, джабе) — одна из старейших пород
                                    казахских лошадей, самые крупные представители
                                    казахской породы, выведенной на территории современного
                                    Казахстана и разводимой в настоящее время в Республике
                                    Казахстан и прилегающих к ней территориях.
                                </p>
                            </div>                        
                        </div>
                        <div class="articlesItemAboutBtnM">
                            <div class="articlesItemAboutBtnLineM"></div>
                            <div class="articlesItemAboutBtnDotM">
                                <img src="/img/mobile/articlesItemAboutBtnDotM.png" alt="img">
                            </div>
                            <div class="articlesItemBtnM ">
                                <button class="btnM borderAddM">
                                    <a href="/site/article/1">Подробнее</a>
                                </button>
                            </div>
                            <div class="articlesItemAboutBtnDotM">
                                <img src="/img/mobile/articlesItemAboutBtnDotM.png" alt="img">
                            </div>
                            <div class="articlesItemAboutBtnLineM"></div>
                        </div>
                    </div>
                </div>               
                
                <div class="categoryM4">
                    <!------------------------>
                    <div class="newTitle newTitleNoBack noinMob">
                        <div class="newTitleLine"></div>
                        <div class="newTitleText">
                            <?=Yii::t('app', 'Гольф')?>
                        </div>
                        <div class="newTitleLine"></div>
                    </div>
                    <div class="articlesItemM">
                        <div class="articlesItemImgM">
                            <img src="/img/mobile/articleItemImg.png" alt="img">
                        </div>
                        <div class="articlesItemAboutM">
                            <div class="articlesItemAboutTitleM">
                                <p>Джэбе</p>
                            </div>
                            <div class="articlesItemAboutTextM">
                                <p>
                                    Джэбе (джебе, джабе) — одна из старейших пород
                                    казахских лошадей, самые крупные представители
                                    казахской породы, выведенной на территории современного
                                    Казахстана и разводимой в настоящее время в Республике
                                    Казахстан и прилегающих к ней территориях.
                                </p>
                            </div>                        
                        </div>
                        <div class="articlesItemAboutBtnM">
                            <div class="articlesItemAboutBtnLineM"></div>
                            <div class="articlesItemAboutBtnDotM">
                                <img src="/img/mobile/articlesItemAboutBtnDotM.png" alt="img">
                            </div>
                            <div class="articlesItemBtnM ">
                                <button class="btnM borderAddM">
                                    <a href="/site/article/1">Подробнее</a>
                                </button>
                            </div>
                            <div class="articlesItemAboutBtnDotM">
                                <img src="/img/mobile/articlesItemAboutBtnDotM.png" alt="img">
                            </div>
                            <div class="articlesItemAboutBtnLineM"></div>
                        </div>
                    </div>
                </div>
                
                <div class="categoryM5">
                    <!------------------------>
                    <div class="newTitle newTitleNoBack noinMob">
                        <div class="newTitleLine"></div>
                        <div class="newTitleText">
                            <?=Yii::t('app', 'Ночная Жизнь')?>
                        </div>
                        <div class="newTitleLine"></div>
                    </div>
                    <div class="articlesItemM">
                        <div class="articlesItemImgM">
                            <img src="/img/mobile/articleItemImg.png" alt="img">
                        </div>
                        <div class="articlesItemAboutM">
                            <div class="articlesItemAboutTitleM">
                                <p>Джэбе</p>
                            </div>
                            <div class="articlesItemAboutTextM">
                                <p>
                                    Джэбе (джебе, джабе) — одна из старейших пород
                                    казахских лошадей, самые крупные представители
                                    казахской породы, выведенной на территории современного
                                    Казахстана и разводимой в настоящее время в Республике
                                    Казахстан и прилегающих к ней территориях.
                                </p>
                            </div>                        
                        </div>
                        <div class="articlesItemAboutBtnM">
                            <div class="articlesItemAboutBtnLineM"></div>
                            <div class="articlesItemAboutBtnDotM">
                                <img src="/img/mobile/articlesItemAboutBtnDotM.png" alt="img">
                            </div>
                            <div class="articlesItemBtnM ">
                                <button class="btnM borderAddM">
                                    <a href="/site/article/1">Подробнее</a>
                                </button>
                            </div>
                            <div class="articlesItemAboutBtnDotM">
                                <img src="/img/mobile/articlesItemAboutBtnDotM.png" alt="img">
                            </div>
                            <div class="articlesItemAboutBtnLineM"></div>
                        </div>
                    </div>
                </div>
                
                <div class="categoryM6">
                    <!------------------------>
                    <div class="newTitle newTitleNoBack noinMob">
                        <div class="newTitleLine"></div>
                        <div class="newTitleText">
                            <?=Yii::t('app', 'Вэлнес и СПА')?>
                        </div>
                        <div class="newTitleLine"></div>
                    </div>                        
                    <!------------------------>                
                    <div class="articlesItemM">
                        <div class="articlesItemImgM">
                            <img src="/img/mobile/articleItemImg.png" alt="img">
                        </div>
                        <div class="articlesItemAboutM">
                            <div class="articlesItemAboutTitleM">
                                <p>Джэбе</p>
                            </div>
                            <div class="articlesItemAboutTextM">
                                <p>
                                    Джэбе (джебе, джабе) — одна из старейших пород
                                    казахских лошадей, самые крупные представители
                                    казахской породы, выведенной на территории современного
                                    Казахстана и разводимой в настоящее время в Республике
                                    Казахстан и прилегающих к ней территориях.
                                </p>
                            </div>                        
                        </div>
                        <div class="articlesItemAboutBtnM">
                            <div class="articlesItemAboutBtnLineM"></div>
                            <div class="articlesItemAboutBtnDotM">
                                <img src="/img/mobile/articlesItemAboutBtnDotM.png" alt="img">
                            </div>
                            <div class="articlesItemBtnM ">
                                <button class="btnM borderAddM">
                                    <a href="/site/article/1">Подробнее</a>
                                </button>
                            </div>
                            <div class="articlesItemAboutBtnDotM">
                                <img src="/img/mobile/articlesItemAboutBtnDotM.png" alt="img">
                            </div>
                            <div class="articlesItemAboutBtnLineM"></div>
                        </div>
                    </div>
                </div>                                
                
                <div class="articlesNavM">
                    <nav>
                        <ul class="pagination articlesPaginationM">
                            <li>
                                <a href="javascript:void(0)"><img src="/img/row-left.png" alt="row-left"></a>
                            </li>
                            <li style="width:2em;height:2em;">
                                <a href="javascript:void(0)">1</a>
                            </li>
                            <li style="width:2em;height:2em;">
                                <a href="javascript:void(0)">2</a>
                            </li>
                            <li class="dots">
                                <a href="javascript:void(0)"><span>...</span></a>
                            </li>
                            <li style="width:2em;height:2em;" class="active">
                                <a href="javascript:void(0)">9</a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img src="/img/row-left.png" alt="row-left"></a>
                            </li>
                        </ul>
                    </nav>
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
                    <div class="toursFormTitleM">
                        <h4>
                            <?=Yii::t('app', 'Ваши самые изысканные и капризные запросы ждут здесь!')?>
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