<?php $this->title = Yii::t('app', 'Главная страница'); include 'header.php';?>
        <span style="display: none;" class="page_name">Главная страница</span>
        <section id="page-1-1">
            <div class="bannerImgDekor"> 
                <img class="bannerDekorImg" src="/img/back4textBanner1.png" alt="img">
                <div class="logoBanner">
                    <img class="logoBannerImg" src="/img/конь.png" alt="img">
                </div>
            </div>
            <!-- <div class="logoBanner"> <img src="/img/logoBanner.png" alt="img"></div> -->
    
            <div class="text-box show">
                <h1 class="gradientBannerSlider">Experience <span>•</span> Etnique <span>•</span> Emotion</h1>
                <div class="newTitleFlareWrap_1">
                    <div class="flareImgBanner">
                        <img src="/img/flare.png" alt="img">
                    </div>
                </div>
            </div>
            

            <div class="text-box-mob hide">
                <div class="textBannerBack_1M"><p class="text-box-mob_p inLineBox">Experience</p></div>
                <div class="textBannerBack_2M"><p class="text-box-mob_p"><span class = "gradientBannerSlider">•</span>&nbsp;<span class = "gradientBannerSlider">Etnique</span> &nbsp;<span class = "gradientBannerSlider">•</span></p></div>
                <div class="textBannerBack_3M"><p class="text-box-mob_p"><span class = "gradientBannerSlider">Emotion</span></p></div>            
            </div>
                
            <div class="slider owl-carousel show" id="slider">
                <?php foreach ($banner as $ban) { ?>
                    <div class="item" ><img src="<?=$ban->img?>" alt="баннер"></div>
                <?php } ?>
            </div>
            <div class="slider hide" id="slider">
                <div class="item"><img src="/img/banner.png" alt="баннер"></div>
            </div>

            <div class="sliderLbl">
                <a href="#">
                    <?php if ($banner != null): ?>
                    <div class="post_text">
                        <?=$banner[0]->city->city?></div>
                        <div class="sliderLblAnimation"></div>
                    </div>
                    <?php endif; ?>
                </a>
            </div>
                    
            <div  class="sliderButtons swiper-container">
                <div class="city_btns flex start swiper-wrapper">
                    <?php $count=0; foreach ($banner as $ban):?>
                        <a href="#" class="city_item <?=$count == 0 ? 'factive' : ''?> swiper-slide">
                            <div class="city_name">
                                <div class="city_name_box">                                    
                                    <?=$ban->city->city?>
                                </div>
                            </div>
                            <img src="/frontend/web/img/city_helper.png" class="city_helper">
                            <img src="/frontend/web/img/city_helper_active.png" class="city_helper_active">
                        </a>
                    <?php $count++; endforeach; ?>                   
                </div>
            </div>
        </section>

        <section id="page-1-2">
            <?php if ($adds != null): ?>
            <div class="wrapper noInMob" onclick="location.href = '<?=$adds->link?>'"> 
                <img src="<?=$adds->file_path?>" alt="img">
            </div>
            <?php endif; ?>
            
            

            <div class="newTitle newTitleAbsolute newTitleNoBack noinMob">
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

            <div class="jabe-bg show"><img src="/img/aboutCompanyBack.png" alt="img"></div>
            
            <div class="add" style="display: none;">
                <img src="/img/ad.png" alt="место для рекламы">
            </div>
                        
            <div class="container-box" id="containerService">
                <?php 
                    $count = count($services);
                ?>
                    <?php if($count == 4): ?>
                        <div class="videoBlocksShell show">
                            <div class="videoBlock" data-aos="fade-left">
                                <div class="videoBlockInfo">
                                    <div class="videoBlockTitle"><h3 class="gradient-1"><a href="/site/tours/<?=$services[0]->id?>"><?=$services[0]->name?></a></h3></div>
                                    <div class="videoBlockList videoBoxShadow">
                                        <div class="videoBlockListItem noHover"><a href="/site/tours/<?=$services[0]->id?>"><i><?=$services[0]->header?></i></a></div>                            
                                        <?php foreach ($services[2]->sub_tours as $sub_tour): ?>
                                            <div class="videoBlockListItem upper"><a href="/site/sub_tours/<?=$sub_tour->id?>" class="sub_touer" data-id="<?=$sub_tour->id?>"><?=$sub_tour->name?></a></div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                <div class="videoBlockContent">
                                    <div class="videoBlockVideo">
                                        <video controls>
                                            <source src="<?=$services[0]->video_path?>" type="<?=$services[0]->video_mime?>">
                                        </video>
                                    </div>
                                    <div class="videoBlockBtn">
                                        <div class="btnBlockSqr"></div>
                                        <div class="btnBlockLine"></div>
                                        <div class="btnBlockButton"><a href="/site/tours/<?=$services[0]->id?>" class="qazyButton borderAdd"><?=Yii::t('app','Подробнее')?></a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="videoBlock" data-aos="fade-left">
                                <div class="videoBlockContent videoBlockContentRevers">
                                    <div class="videoBlockVideo videoBlockVideoRevers">
                                        <video controls>
                                            <source src="<?=$services[1]->video_path?>" type="<?=$services[0]->video_mime?>">
                                        </video>
                                    </div>
                                    <div class="videoBlockBtn videoBlockBtnRevers">
                                        <div class="btnBlockButton btnBlockButtonRevers"><a href="/site/tours/<?=$services[1]->id?>" class="qazyButton borderAdd">Подробнее</a></div>
                                        <div class="btnBlockLine"></div>
                                        <div class="btnBlockSqr"></div>
                                    </div>
                                </div>
                                <div class="videoBlockInfo">
                                    <div class="videoBlockTitle videoBlockTitleRevers"><h3 class="gradient-1"><a href="/site/tours/<?=$services[1]->id?>"><?=$services[1]->name?></a></h3></div>
                                    <div class="videoBlockList videoBlockListRevers">
                                        <div class="videoBlockListItem noHover"><a href="#"><i><?=$services[1]->header?></i></a></div>
                                        <?php foreach ($services[1]->sub_tours as $sub_tour): ?>
                                            <div class="videoBlockListItem upper"><a href="/site/sub_tours/<?=$sub_tour->id?>" class="sub_touer" data-id="<?=$sub_tour->id?>"><?=$sub_tour->name?></a></div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        

                        <div class="videoBlock gray-bg show" data-aos="fade-left">
                            <div class="videoBlockInfo">
                                <div class="videoBlockTitle"><h3 class="gradient-1"><a href="/site/tours/<?=$services[2]->id?>"><?=$services[2]->name?></a></h3></div>
                                <div class="videoBlockList videoBoxShadow">
                                    <div class="videoBlockListItem noHover"><a href="#"><i><?=$services[2]->header?></i></a></div>
                                    <?php foreach ($services[2]->sub_tours as $sub_tour): ?>
                                        <div class="videoBlockListItem upper"><a href="/site/sub_tours/<?=$sub_tour->id?>" class="sub_touer" data-id="<?=$sub_tour->id?>"><?=$sub_tour->name?></a></div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div class="videoBlockContent">
                                <div class="videoBlockVideo">
                                    <video controls>
                                        <source src="<?=$services[2]->video_path?>" type="<?=$services[0]->video_mime?>">
                                    </video>
                                </div>
                                <div class="videoBlockBtn">
                                    <div class="btnBlockSqr"></div>
                                    <div class="btnBlockLine"></div>
                                    <div class="btnBlockButton"><a href="/site/tours/<?=$services[2]->id?>" class="qazyButton borderAdd"><?=Yii::t('app', 'Подробнее')?></a></div>
                                </div>
                            </div>
                        </div>


                        <div class="videoBlock gray-bg show" data-aos="fade-left">
                            <div class="videoBlockContent videoBlockContentRevers">
                                <div class="videoBlockVideo videoBlockVideoRevers">
                                   <video controls>
                                        <source src="<?=$services[3]->video_path?>" type="<?=$services[0]->video_mime?>">
                                    </video>
                                </div>
                                <div class="videoBlockBtn videoBlockBtnRevers">
                                    <div class="btnBlockButton btnBlockButtonRevers"><a href="tours.php" class="qazyButton borderAdd"><?=Yii::t('app', 'Подробнее')?></a></div>
                                    <div class="btnBlockLine"></div>
                                    <div class="btnBlockSqr"></div>
                                </div>
                            </div>
                            <div class="videoBlockInfo">
                                <div class="videoBlockTitle videoBlockTitleRevers"><h3 class="gradient-1"><a href="/site/tours/<?=$services[3]->id?>"><?=$services[3]->name?></a></h3></div>
                                <div class="videoBlockList videoBlockListRevers">
                                    <div class="videoBlockListItem noHover"><a href="#"><i><?=$services[3]->header?></i></a></div>
                                    <?php foreach ($services[3]->sub_tours as $sub_tour): ?>
                                        <div class="videoBlockListItem upper"><a href="/site/sub_tours/<?=$sub_tour->id?>" class="sub_touer" data-id="<?=$sub_tour->id?>"><?=$sub_tour->name?></a></div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    <?php elseif ($count == 3): ?>
                        <div class="videoBlock show" data-aos="fade-left">
                            <div class="videoBlockInfo">
                                <div class="videoBlockTitle"><h3 class="gradient-1"><a href="/site/tours/<?=$services[0]->id?>"><?=$services[0]->name?></a></h3></div>
                                <div class="videoBlockList videoBoxShadow">
                                    <div class="videoBlockListItem noHover"><a href="/site/tours/<?=$services[0]->id?>"><i><?=$services[0]->header?></i></a></div>                            
                                    <?php foreach ($services[0]->sub_tours as $sub_tour): ?>
                                        <div class="videoBlockListItem upper"><a href="/site/sub_tours/<?=$sub_tour->id?>" class="sub_touer" data-id="<?=$sub_tour->id?>"><?=$sub_tour->name?></a></div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div class="videoBlockContent">
                                <div class="videoBlockVideo">
                                    <video controls>
                                        <source src="<?=$services[0]->video_path?>" type="<?=$services[0]->video_mime?>">
                                    </video>
                                </div>
                                <div class="videoBlockBtn">
                                    <div class="btnBlockSqr"></div>
                                    <div class="btnBlockLine"></div>
                                    <div class="btnBlockButton"><a href="/site/tours/<?=$services[0]->id?>" class="qazyButton borderAdd"><?=Yii::t('app', 'Подробнее')?></a></div>
                                </div>
                            </div>
                        </div>
                        <div class="videoBlock show" data-aos="fade-left">
                            <div class="videoBlockContent videoBlockContentRevers">
                                <div class="videoBlockVideo videoBlockVideoRevers">
                                    <video controls>
                                        <source src="<?=$services[1]->video_path?>" type="<?=$services[0]->video_mime?>">
                                    </video>
                                </div>
                                <div class="videoBlockBtn videoBlockBtnRevers">
                                    <div class="btnBlockButton btnBlockButtonRevers"><a href="/site/tours/<?=$services[1]->id?>" class="qazyButton borderAdd"><?=Yii::t('app', 'Подробнее')?></a></div>
                                    <div class="btnBlockLine"></div>
                                    <div class="btnBlockSqr"></div>
                                </div>
                            </div>
                            <div class="videoBlockInfo">
                                <div class="videoBlockTitle videoBlockTitleRevers"><h3 class="gradient-1"><a href="/site/tours/<?=$services[1]->id?>"><?=$services[1]->name?></a></h3></div>
                                <div class="videoBlockList videoBlockListRevers">
                                    <div class="videoBlockListItem noHover"><a href="#"><i><?=$services[1]->header?></i></a></div>
                                    <?php foreach ($services[1]->sub_tours as $sub_tour): ?>
                                        <div class="videoBlockListItem upper"><a href="/site/sub_tours/<?=$sub_tour->id?>" class="sub_touer" data-id="<?=$sub_tour->id?>"><?=$sub_tour->name?></a></div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    
                        

                        <div class="videoBlock gray-bg show" data-aos="fade-left">
                            <div class="videoBlockInfo">
                                <div class="videoBlockTitle"><h3 class="gradient-1"><?=$services[2]->name?></h3></div>
                                <div class="videoBlockList videoBoxShadow">
                                    <div class="videoBlockListItem noHover"><a href="#"><i><?=$services[2]->header?></i></a></div>
                                    <?php foreach ($services[2]->sub_tours as $sub_tour): ?>
                                        <div class="videoBlockListItem upper"><a href="/site/sub_tours/<?=$sub_tour->id?>" class="sub_touer" data-id="<?=$sub_tour->id?>"><?=$sub_tour->name?></a></div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div class="videoBlockContent">
                                <div class="videoBlockVideo">
                                    <video controls>
                                        <source src="<?=$services[2]->video_path?>" type="<?=$services[0]->video_mime?>">
                                    </video>
                                </div>
                                <div class="videoBlockBtn">
                                    <div class="btnBlockSqr"></div>
                                    <div class="btnBlockLine"></div>
                                    <div class="btnBlockButton"><a href="/site/tours/<?=$services[2]->id?>" class="qazyButton borderAdd"><?=Yii::t('app', 'Подробнее')?></a></div>
                                </div>
                            </div>
                        </div>
                    <?php elseif ($count == 2): ?>
                        <div class="videoBlock show" data-aos="fade-left">
                            <div class="videoBlockInfo">
                                <div class="videoBlockTitle"><h3 class="gradient-1"><a href="/site/tours/<?=$services[0]->id?>"><?=$services[0]->name?></a></h3></div>
                                <div class="videoBlockList videoBoxShadow">
                                    <div class="videoBlockListItem noHover"><a href="/site/tours/<?=$services[0]->id?>"><i><?=$services[0]->header?></i></a></div>                            
                                    <?php foreach ($services[0]->sub_tours as $sub_tour): ?>
                                        <div class="videoBlockListItem upper"><a href="/site/sub_tours/<?=$sub_tour->id?>" class="sub_touer" data-id="<?=$sub_tour->id?>"><?=$sub_tour->name?></a></div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div class="videoBlockContent">
                                <div class="videoBlockVideo">
                                    <video controls>
                                        <source src="<?=$services[0]->video_path?>" type="<?=$services[0]->video_mime?>">
                                    </video>
                                </div>
                                <div class="videoBlockBtn">
                                    <div class="btnBlockSqr"></div>
                                    <div class="btnBlockLine"></div>
                                    <div class="btnBlockButton"><a href="/site/tours/<?=$services[0]->id?>" class="qazyButton borderAdd"><?=Yii::t('app', 'Подробнее')?></a></div>
                                </div>
                            </div>
                        </div>
                        <div class="videoBlock show" data-aos="fade-left">
                            <div class="videoBlockContent videoBlockContentRevers">
                                <div class="videoBlockVideo videoBlockVideoRevers">
                                    <video controls>
                                        <source src="<?=$services[1]->video_path?>" type="<?=$services[0]->video_mime?>">
                                    </video>
                                </div>
                                <div class="videoBlockBtn videoBlockBtnRevers">
                                    <div class="btnBlockButton btnBlockButtonRevers"><a href="/site/tours/<?=$services[1]->id?>" class="qazyButton borderAdd"><?=Yii::t('app', 'Подробнее')?></a></div>
                                    <div class="btnBlockLine"></div>
                                    <div class="btnBlockSqr"></div>
                                </div>
                            </div>
                            <div class="videoBlockInfo">
                                <div class="videoBlockTitle videoBlockTitleRevers"><h3 class="gradient-1"><a href="/site/tours/<?=$services[1]->id?>"><?=$services[1]->name?></a></h3></div>
                                <div class="videoBlockList videoBlockListRevers">
                                    <div class="videoBlockListItem noHover"><a href="#"><i><?=$services[1]->header?></i></a></div>
                                    <?php foreach ($services[1]->sub_tours as $sub_tour): ?>
                                        <div class="videoBlockListItem upper"><a href="/site/sub_tours/<?=$sub_tour->id?>" class="sub_touer" data-id="<?=$sub_tour->id?>"><?=$sub_tour->name?></a></div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    <?php elseif ($count == 1): ?>
                        <div class="videoBlock show" data-aos="fade-left">
                            <div class="videoBlockInfo">
                                <div class="videoBlockTitle"><h3 class="gradient-1"><a href="/site/tours/<?=$services[0]->id?>"><?=$services[0]->name?></a></h3></div>
                                <div class="videoBlockList videoBoxShadow">
                                    <div class="videoBlockListItem noHover"><a href="/site/tours/<?=$services[0]->id?>"><i><?=$services[0]->header?></i></a></div>                            
                                    <?php foreach ($services[0]->sub_tours as $sub_tour): ?>
                                        <div class="videoBlockListItem upper"><a href="/site/sub_tours/<?=$sub_tour->id?>" class="sub_touer" data-id="<?=$sub_tour->id?>"><?=$sub_tour->name?></a></div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div class="videoBlockContent">
                                <div class="videoBlockVideo">
                                    <video controls>
                                        <source src="<?=$services[0]->video_path?>" type="<?=$services[0]->video_mime?>">
                                    </video>
                                </div>
                                <div class="videoBlockBtn">
                                    <div class="btnBlockSqr"></div>
                                    <div class="btnBlockLine"></div>
                                    <div class="btnBlockButton"><a href="/site/tours/<?=$services[0]->id?>" class="qazyButton borderAdd"><?=Yii::t('app', 'Подробнее')?></a></div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    
                    <?php if ($services != null): $count=1; ?>
                            <?php foreach ($services as $service): ?>
                                <?php if ($count < 3): ?>
                                    <div class="videoBlock-mob hide" data-aos="<?=$count%2 != 0 ? 'fade-left' : 'fade-right'?>">                
                                        <div class="videoBlockTitle-mob"><h3><?=$service->name?></h3></div>                    
                                        <div class="videoBlockList-mob">
                                            <div class="videoBlockListItem kortej"><p><i><?=$service->header?></i></p></div>
                                            <?php foreach ($service->sub_tours as $sub_tour): ?>
                                                    <div class="videoBlockListItem upper"><a href="/site/sub_tours/<?=$sub_tour->id?>"><?=$sub_tour->name?></a></div>
                                            <?php endforeach; ?>                                        
                                        </div>
                                        <div class="videoBlockFoot-mob">
                                            <button class="videoButton"> <img src="/img/mobile/playButtonpng.png" alt=""><?=Yii::t('app', 'Посмотреть видео');?></button>
                                            <button class="borderAdd"><?=Yii::t('app', 'Подробнее');?></button>
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <div class="container_mob hide">
                                        <div class="videoBlock-mob videoBlock-mob_2 hide" data-aos="<?=$count%2 != 0 ? 'fade-left' : 'fade-right'?>">                
                                            <div class="videoBlockTitle-mob"><h3><?=$service->name?></h3></div>                    
                                            <div class="videoBlockList-mob">
                                                <div class="videoBlockListItem kortej"><p><i><?=$service->header?></i></p></div>
                                                <?php foreach ($service->sub_tours as $sub_tour): ?>
                                                        <div class="videoBlockListItem upper"><a href="/site/sub_tours/<?=$sub_tour->id?>"><?=$sub_tour->name?></a></div>
                                                <?php endforeach; ?>                                             
                                            </div>
                                            <div class="videoBlockFoot-mob">
                                                <button class="videoButton"> <img src="/img/mobile/playButtonpng.png" alt=""><?=Yii::t('app', 'Посмотреть видео');?></button>
                                                <button class="borderAdd"><?=Yii::t('app', 'Подробнее');?></button>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                    <?php endif; ?>
                    
                    
            </div>
        </section>

        <section id="page-1-3">
            <div class="newTitle noInMob">
                <div class="newTitleLine"></div>
                <div class="newTitleText">
                    <?=Yii::t('app', 'Тренды в СНГ')?>
                    <div class="newTitleFlareWrap" data-aos="zoom-in" data-aos-delay="300" data-aos-once="false">
                        <div class="flareImg">
                            <img src="/img/flare.png" alt="img">
                        </div>

                    </div>
                </div>
                <div class="newTitleLine"></div>
            </div>
            <div class="trends flex align-center show">
                <div class="trend-1">
                    <div class="shellAos-1" data-aos="zoom-in" data-aos-delay="200">
                        <div class="trends-ad">
                            <img src="/img/trendsAd.png" alt="место для рекламы">
                        </div>
                    </div>
                </div>                
                <?php if ($trends != null): ?>
                    <?php $count=2; foreach ($trends as $trend): ?>
                            <div class="trend-item trend-<?=$count?>">                    
                                <div class="shellAos-<?=$count?>" data-aos="rotate-center" data-aos-delay="<?=$count==2 ? '600' : $count==3 ? '450' : $count==4 ? '50' : '50' ?>" data-aos-duration="700">
                                    <div class="trends-photo">
                                        <h4><?=$trend->city->city?></h4>
                                        <img src="<?=$trend->img?>" alt="">
                                    </div>
                                    <div class="trends-text">
                                        <p><?=$trend->header?></p>
                                        <div class="trendsLine"><img src="/img/trendsLine.png" alt="img"></div>
                                        <p><?=$trend->service->cost?> $</p>
                                        <div class="basketPlus">
                                            <div><button onclick="location.href='/site/sub_tours/<?=$trend->service_id?>'" class="btnBrown"><?=Yii::t('app', 'Подробнее')?></button></div>
                                            <div class="basketPlusImg"> 
                                                <a href="/site/basket" onclick="addStorage('<?=$trend->service->id?>', event)">
                                                    <img src="/img/basketPlus.png" alt="img">
                                                    <img style="width: 30%; top: 58%;" src="/img/plus.png" alt="img">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php $count++; endforeach; ?>
                

                
                <?php endif; ?>
            </div>
            <div class="trends-mob hide owl-slider">
                <!-- <div id="carousel" class="owl-carousel"> -->
                    <div>
                    <?php if ($trends != null): $count = 1; ?>
                            <?php foreach ($trends as $trend): ?>
                                <div class="trend-item-mob item" data-aos="<?=$count%2!=0 ? 'fade-left' : 'fade-right'?>">
                                    <div class="shellAos-2">
                                        <div class="trends-text">
                                            <p><?=$trend->header?></p>                            
                                            <div> <p class="trends_price"><?=$trend->service->cost?> $</p> <div class="trends-text_line"><img src="/img/trends-text_line.png" alt="img"></div> </div>
                                        </div>
                                        <div class="trends-photo">
                                            <!-- <h4>MOSCOW</h4> -->
                                            <img src="<?=$trend->img?>" alt="Москва">
                                        </div>                        
                                        <div class="basketPlus">
                                            <button class="borderAdd basket" onclick="addStorage('<?=$trend->service->id?>', event)">
                                                <img src="/img/basketPlus.png" alt="">
                                                в корзину
                                            </button>
                                            <button class="borderAdd basket">Подробнее</button>
                                        </div>
                                    </div>
                                </div>
                            <?php $count++; endforeach; ?>
                    <?php endif; ?>                                                                   
                    </div>                                                          
                <!-- </div> -->
                <div class="owl-nav">
                    <button class="button-owl prev_owl2" style="display: none;"> <img class="owl-prev-img" style="transform: rotate(180deg);" src="/img/mobile/icon.png" alt=""> <img class="owl-hov-img" src="/img/mobile/icon-hover.png" alt=""> </button>
                    <button class="button-owl next_owl2" style="display: none;"> <img class="owl-prev-img" src="/img/mobile/icon.png" alt=""> <img class="owl-hov-img" style="transform: rotate(180deg);" src="/img/mobile/icon-hover.png" alt=""> </button>
                </div>
            </div>
            <div class="takeIt">
                <img class="show" src="/img/back4trends.png" alt="фон">
                <img class="hide" src="/img/mobile/form_background.png" alt="">
                <div class="takeIt-container hide">
                    <p class="unselectable" data-aos="zoom-in">Нет времени на организацию поездки?</p>
                    <h3 class="upper gradientBannerSlider"><?=Yii::t('app', 'МОИ ЭКСКЛЮЗИВНЫЕ ПОЕЗДКИ С JABE. Те же локации, но красочнее эмоции.')?></h3>
                    <button  class="borderAdd openFormM basket"><?=Yii::t('app', 'Отправить')?></button>
                </div>
                <div class="form show">               
                    <div class="formDekorText" data-aos="zoom-in" data-aos-delay="500" data-aos-once="true">
                        <div class="lines_left right_21p">
                            <hr class="line_sm right_86p">
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
                        <p class="unselectable"><?=Yii::t('app', 'Нет времени на организацию поездки?')?></p>
                    </div>
                    <p class="formSpan-2"><?=Yii::t('app', 'МОИ ЭКСКЛЮЗИВНЫЕ ПОЕЗДКИ С JABE,')?></p>
                    <p class="formSpan-2"><?=Yii::t('app', 'Те же локации, но красочнее эмоции.')?></p>
                    <button class="borderAdd openForm"><?=Yii::t('app', 'ОТПРАВИТЬ')?></button>
                </div>
            </div>
        </section>


        

        <section id="page-1-4">
            <div class="newTitle noInMob">
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
                <div class="aboutJabe">
                    <p>
                        <?=Yii::t('app', 'Джабэ - это степная порода казахской лошади, именно она и вдохновила бренд "Jabe Concierge". Скромная лошадка выживает в мороз и жару в открытых степях Западного Казахстана. Умное и сильное доброе животное - амбассадор наших ценностей. Джабэ - верный спутник Кочевника в любых его самых рискованных путешествиях,и в минус и в плюс 50 С.')?>
                    </p>
                </div>
                <div class="jabeIs">
                    <div class="jabeIsText">
                        <span class="show"><?=Yii::t('app', 'Терпеливая <br> и добрая')?></span>
                        <span class="hide" data-aos="zoom-in" data-aos-duration="1000"><?=Yii::t('app', 'Терпеливая и добрая')?></span>
                        <span data-aos="zoom-in" data-aos-duration="1000"><?=Yii::t('app', 'Умная и быстрая')?></span>
                        <span data-aos="zoom-in" data-aos-duration="1000"><?=Yii::t('app', 'Она отлично<br> позаботится о Вас')?> </span>
                    </div>
                    <div class="jabeIsLogo">
                        <img src="/img/jabeIsLogo.png" alt="jabeLogo">
                    </div>
                </div>
                <div class="jabeSlogan hide">
                    <img src="/img/mobile/slogan_photo_mob.png" alt="jabe2">
                    <div class="slogan_1">
                        <span class="upper" style="font-size: 1.1em;"><?=Yii::t('app', 'Мы просто другие...')?></span>
                    </div>
                    <div class="slogan">
                        <span class="upper" style="font-size: 1.1em;"><?=Yii::t('app', 'Мы создаем эмоции, а не продаем туры.')?></span>
                    </div>
                </div>
                <div class="jabePhotos show">
                    <div class="jabePhoto1" data-aos="fade-right" data-aos-duration="1000" data-aos-delay="50">
                        <img src="/img/jabePhoto1.png" alt="jabe1">
                    </div>
                    <div class="jabePhoto2" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="50">
                        <img src="/img/jabePhoto2.png" alt="jabe2">
                    </div>
                    <div class="jabePhoto3" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="50">
                        <img src="/img/jabePhoto3.png" alt="jabe3">
                    </div>
                </div>
                <div class="weDifferent flex align-center show">
                    <div><span><?=Yii::t('app', 'Мы просто другие.')?></span></div>
                    <div><span><?=Yii::t('app', 'Мы создаем эмоции, а не продаем туры...')?></span></div>
                </div>
            </div>
        </section>

        <section id="page-1-5">
            <div class="titlePartners" style="margin-bottom: 4em;">
                <div class="hrPartners"></div>
                <div class="titleSpan"><span class="gradient-title-2"><?=Yii::t('app', 'Партнеры компании JABE')?></span></div>
                <div class="hrPartners"></div>
            </div>
            <div class="container show">
                <div class="owl-slider">
                    <div class="prev_owl"><a href="#"><img src="/img/rowToLeft.png" alt="img"></a></div>
                    <div id="carousel_partners" class="owl-carousel">
                        <?php foreach ($partners as $partner) { ?>                            
                            <div class="partnersSliderItem">
                                <div class="containerPartners">
                                    <img src="<?=$partner->file_path?>" alt="<?=$partner->file_name?>">
                                </div>                            
                            </div>                            
                        <?php } ?>
                    </div>
                    <div class="next_owl" ><a href="#"><img src="/img/rowToRight.png" alt="img"></a></div>
                </div>
            </div>
            <div id="carousel" class="owl-carousel hide">
                <div class="partnersBox-mob">
                    <div class="partnerItemBox item">
                        <div class="partnerImgBox">
                            <div class="ImgBox">
                                <img src="/img/mobile/rixos-partner.png" alt="">
                            </div>
                        </div>
                    </div>

                    <div class="partnerItemBox item">
                        <div class="partnerImgBox">
                            <div class="ImgBox">
                                <img src="/img/mobile/ramada_partner.png" alt="">
                            </div>
                        </div>
                    </div>                
                </div>

                <div class="partnersBox-mob">
                    <div class="partnerItemBox item">
                        <div class="partnerImgBox">
                            <div class="ImgBox">
                                <img src="/img/mobile/rixos-partner.png" alt="">
                            </div>
                        </div>
                    </div>

                    <div class="partnerItemBox item">
                        <div class="partnerImgBox">
                            <div class="ImgBox">
                                <img src="/img/mobile/ramada_partner.png" alt="">
                            </div>
                        </div>
                    </div>                
                </div>
            </div>
            <div class="owl-nav">
                <button class="button-owl prev_owl3 hide"> <img class="owl-prev-img" style="transform: rotate(180deg);" src="/img/mobile/icon.png" alt=""> <img class="owl-hov-img" src="/img/mobile/icon-hover.png" alt=""> </button>
                <button class="button-owl next_owl3 hide"> <img class="owl-prev-img" src="/img/mobile/icon.png" alt=""> <img class="owl-hov-img" style="transform: rotate(180deg);" src="/img/mobile/icon-hover.png" alt=""> </button>
            </div>

        </section>

        <section id="page-1-6">
            <div class="takeIt show">
                <img src="/img/back4form.png" alt="фон для формы">
                <div class="thanksForm"> <p><?=Yii::t('app', 'СПАСИБО, ВАША ЗАЯВКА ПРИНЯТА!')?></p></div>
                <form action="#" method="get">
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
                        <?=Yii::t('app', 'Нет времени на организацию поездки?')?>                        
                    </div>
                    <span><?=Yii::t('app','Ваши самые изысканные и капризные запросы ждут здесь!')?></span>
                    <div class="input-form takeItInput">
                        <input name="name" style="width: 50%;" placeholder="<?=Yii::t('app','Имя')?>" type="text">
                        <input name="phone" style="width: 50%;" placeholder="<?=Yii::t('app','Телефон')?>" type="tel">
                    </div>
                    <input name="page" id="page_nameM" style="display: none;" type="text" placeholder="">
                    <input name="btn" id="btn_name" style="display: none;" type="text" placeholder="">
                    <button class="submitForm2 borderAdd"><?=Yii::t('app', 'ОТПРАВИТЬСЯ В ПУТЕШЕСТВИЕ С JABE')?></button>
                </form>
            </div>
            <div class="takeIt-mob hide">
                <img src="/img/mobile/form_background.png" alt="">
                <div class="takeIt-container-2 hide">
                    <span class="upper gradientBannerSlider" data-aos="zoom-in"><?=Yii::t('app','Ваши самые изысканные')?></span> <br>
                    <span class="upper gradientBannerSlider" data-aos="zoom-in"><?=Yii::t('app','и капризные запросы ждут здесь!')?></span>
                    <button  class="borderAdd openFormM basket"><?=Yii::t('app','ОТПРАВИТЬСЯ В ПУТЕШЕСТВИЕ С JABE')?></button>
                </div>
            </div>
        </section>
<script src="/js/basket.js"></script>        
<?php include 'footer.php';?>

