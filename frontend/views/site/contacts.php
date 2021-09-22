<?php $this->title = Yii::t('app', 'Контакты');
 include 'header.php';?>
    <span style="display: none;" class="page_name">Контакты</span>
    <!DOCTYPE html>
    <html lang="en">
    
    <body>
        <!-- <img src="contacts.jpg" class="test"> -->
        <section class="noInMob" id="contacts">

            <div class="topImg">
                <img src="/img/articleTop.png" alt="верхняя картинка">
                <div></div>
            </div>

            <div class="newTitle noInMob">
                <div class="newTitleLine"></div>
                <div class="newTitleText">
                    <?=Yii::t('app', 'Контакты')?>
                    <div class="newTitleFlareWrap" data-aos="zoom-in" data-aos-delay="300" data-aos-once="false">
                        <div class="flareImg">
                            <img src="/img/flare.png" alt="img">
                        </div>

                    </div>
                </div>
                <div class="newTitleLine"></div>
            </div>

            <div class="container">

                <div class="contactsBox">
                    <?php if ($contacts != null): ?>
                        <?php foreach ($contacts as $contact): ?>
                            <div class="contactsItem">
                                <div class="contactsImg">
                                    <img src="<?=$contact->img?>" alt="Алматы">
                                </div>
                                <div class="contactsInfo">
                                    <div class="contactsInfoTop">
                                        <div class="contactsCity">
                                            <span><?=$contact->city?></span>
                                        </div>
                                    </div>
                                    <div class="contactsInfoBottom">
                                        <div class="infoTel">
                                            <div class="infoTelImg">
                                                <img src="/img/contactsTel.png" alt="contactsTel">
                                            </div>
                                            <div class="infoTelText">
                                                <span>
                                                    <?=$contact->phone?> <br>                                                    
                                                    <?=$contact->phone_2?>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="infoAdress">
                                            <div class="infoAdressImg">
                                                <img src="/img/contactsAdress.png" alt="contactsAdress">
                                            </div>
                                            <div class="infoAdressText">
                                                <span>
                                                <?=$contact->address?>                                                
                                                </span>                                            
                                            </div>
                                        </div>
                                        <div class="infoIndex">
                                            <div class="infoIndexImg">
                                                <img src="/img/contactsIndex.png" alt="contactsIndex">
                                            </div>
                                            <div class="infoIndexText">
                                                <span>
                                                    <?=$contact->email?>
                                                    <!-- Индекс 050012 -->
                                                </span>                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>                                                          
                </div>
            </div>            
        </section>






        <div class="articleOpenM"> <!-- CONTACTS MOBILE -->
            <div class="topImgM">
                <img src="/img/mobile/aboutTopImgM.png" alt="img">
                <div></div>
            </div>
            <div class="titleM">  <!-- CONTACTS TITLE MOBILE -->
                <div class="hr"><hr></div>
                <div class="titleMSpan gradient-title"><span>Контакты</span></div>
                <div class="hr"><hr></div>
            </div>
            
            <div class="contactsBoxM">
                <!----------------------------->
                <div class="contactsItemM">
                    <div class="contactsItemCityTitleM">
                        <div class="articlesItemAboutBtnLineM"></div>
                        <div class="articlesItemAboutBtnDotM">
                            <img src="/img/mobile/articlesItemAboutBtnDotM.png" alt="img">
                        </div>
                        <div class="contactsCityTitleM">                            
                            <span>
                                Алматы
                            </span>
                        </div>
                        <div class="articlesItemAboutBtnDotM">
                            <img src="/img/mobile/articlesItemAboutBtnDotM.png" alt="img">
                        </div>
                        <div class="articlesItemAboutBtnLineM"></div>
                    </div>
                    <div class="contactsItemImgM">
                        <img src="/img/mobile/contactsAlmatyM.png" alt="img">
                    </div>
                    <div class="contactsItemInfoM">
                       <div class="contactsInfoM">
                           <div class="contactsInfoLeftM">
                                <div class="infoTelM">
                                    <div class="infoTelImgM">
                                        <img class="contactsTelM" src="/img/mobile/contactsTelM.png" alt="contactsTel">
                                    </div>
                                    <div class="infoTelTextM">
                                        <p>
                                            +7 (778) 456 89 73
                                        </p>
                                        <p>
                                            +7 (727) 339 07 50
                                        </p>
                                    </div>
                                </div>
                                <div class="infoIndexM">
                                    <div class="infoIndexImgM">
                                        <img class="contactsIndexM" src="/img/mobile/contactsIndexM.png" alt="contactsIndex">
                                    </div>
                                    <div class="infoIndexText">
                                        <p>
                                            Индекс 050012
                                        </p>                                        
                                    </div>
                                </div>
                            </div>

                            <div class="infoAdressM">
                                <div class="infoAdressImgM">
                                    <img class="contactsAdressM" src="/img/mobile/contactsAdressM.png" alt="contactsAdress">
                                </div>
                                <div class="infoAdressText">
                                    <p>
                                        Казахстан, г. Алматы,
                                        ул. Карасай батыра, 123, офис 9.
                                    </p>                                        
                                </div>
                            </div>
                            
                        </div>                       
                    </div>
                </div>
                <!----------------------------->
                <div class="contactsItemM">
                    <div class="contactsItemCityTitleM">
                        <div class="articlesItemAboutBtnLineM"></div>
                        <div class="articlesItemAboutBtnDotM">
                            <img src="/img/mobile/articlesItemAboutBtnDotM.png" alt="img">
                        </div>
                        <div class="contactsCityTitleM">                            
                            <span>
                                Нур-Султан
                            </span>
                        </div>
                        <div class="articlesItemAboutBtnDotM">
                            <img src="/img/mobile/articlesItemAboutBtnDotM.png" alt="img">
                        </div>
                        <div class="articlesItemAboutBtnLineM"></div>
                    </div>
                    <div class="contactsItemImgM">
                        <img src="/img/mobile/contactsNur-SultanM.png" alt="img">
                    </div>
                    <div class="contactsItemInfoM">
                       <div class="contactsInfoM">
                           <div class="contactsInfoLeftM">
                                <div class="infoTelM">
                                    <div class="infoTelImgM">
                                        <img class="contactsTelM" src="/img/mobile/contactsTelM.png" alt="contactsTel">
                                    </div>
                                    <div class="infoTelTextM">
                                        <p>
                                            +7 (778) 456 89 73
                                        </p>
                                        <p>
                                            +7 (727) 339 07 50
                                        </p>
                                    </div>
                                </div>
                                <div class="infoIndexM">
                                    <div class="infoIndexImgM">
                                        <img class="contactsIndexM" src="/img/mobile/contactsIndexM.png" alt="contactsIndex">
                                    </div>
                                    <div class="infoIndexText">
                                        <p>
                                            Индекс 050012
                                        </p>                                        
                                    </div>
                                </div>
                            </div>

                            <div class="infoAdressM">
                                <div class="infoAdressImgM">
                                    <img class="contactsAdressM" src="/img/mobile/contactsAdressM.png" alt="contactsAdress">
                                </div>
                                <div class="infoAdressText">
                                    <p>
                                        Казахстан, г. Алматы,
                                        ул. Карасай батыра, 123, офис 9.
                                    </p>                                        
                                </div>
                            </div>
                            
                        </div>                       
                    </div>
                </div>
                <!----------------------------->
                <div class="contactsItemM">
                    <div class="contactsItemCityTitleM">
                        <div class="articlesItemAboutBtnLineM"></div>
                        <div class="articlesItemAboutBtnDotM">
                            <img src="/img/mobile/articlesItemAboutBtnDotM.png" alt="img">
                        </div>
                        <div class="contactsCityTitleM">                            
                            <span>
                                Москва
                            </span>
                        </div>
                        <div class="articlesItemAboutBtnDotM">
                            <img src="/img/mobile/articlesItemAboutBtnDotM.png" alt="img">
                        </div>
                        <div class="articlesItemAboutBtnLineM"></div>
                    </div>
                    <div class="contactsItemImgM">
                        <img src="/img/mobile/contactsMoskowM.png" alt="img">
                    </div>
                    <div class="contactsItemInfoM">
                       <div class="contactsInfoM">
                           <div class="contactsInfoLeftM">
                                <div class="infoTelM">
                                    <div class="infoTelImgM">
                                        <img class="contactsTelM" src="/img/mobile/contactsTelM.png" alt="contactsTel">
                                    </div>
                                    <div class="infoTelTextM">
                                        <p>
                                            +7 (778) 456 89 73
                                        </p>
                                        <p>
                                            +7 (727) 339 07 50
                                        </p>
                                    </div>
                                </div>
                                <div class="infoIndexM">
                                    <div class="infoIndexImgM">
                                        <img class="contactsIndexM" src="/img/mobile/contactsIndexM.png" alt="contactsIndex">
                                    </div>
                                    <div class="infoIndexText">
                                        <p>
                                            Индекс 050012
                                        </p>                                        
                                    </div>
                                </div>
                            </div>

                            <div class="infoAdressM">
                                <div class="infoAdressImgM">
                                    <img class="contactsAdressM" src="/img/mobile/contactsAdressM.png" alt="contactsAdress">
                                </div>
                                <div class="infoAdressText">
                                    <p>
                                        Казахстан, г. Алматы,
                                        ул. Карасай батыра, 123, офис 9.
                                    </p>                                        
                                </div>
                            </div>
                            
                        </div>                       
                    </div>
                </div>
                <!----------------------------->
                <div class="contactsItemM">
                    <div class="contactsItemCityTitleM">
                        <div class="articlesItemAboutBtnLineM"></div>
                        <div class="articlesItemAboutBtnDotM">
                            <img src="/img/mobile/articlesItemAboutBtnDotM.png" alt="img">
                        </div>
                        <div class="contactsCityTitleM">                            
                            <span>
                                Баку
                            </span>
                        </div>
                        <div class="articlesItemAboutBtnDotM">
                            <img src="/img/mobile/articlesItemAboutBtnDotM.png" alt="img">
                        </div>
                        <div class="articlesItemAboutBtnLineM"></div>
                    </div>
                    <div class="contactsItemImgM">
                        <img src="/img/mobile/contactsBakuM.png" alt="img">
                    </div>
                    <div class="contactsItemInfoM">
                       <div class="contactsInfoM">
                           <div class="contactsInfoLeftM">
                                <div class="infoTelM">
                                    <div class="infoTelImgM">
                                        <img class="contactsTelM" src="/img/mobile/contactsTelM.png" alt="contactsTel">
                                    </div>
                                    <div class="infoTelTextM">
                                        <p>
                                            +7 (778) 456 89 73
                                        </p>
                                        <p>
                                            +7 (727) 339 07 50
                                        </p>
                                    </div>
                                </div>
                                <div class="infoIndexM">
                                    <div class="infoIndexImgM">
                                        <img class="contactsIndexM" src="/img/mobile/contactsIndexM.png" alt="contactsIndex">
                                    </div>
                                    <div class="infoIndexText">
                                        <p>
                                            Индекс 050012
                                        </p>                                        
                                    </div>
                                </div>
                            </div>

                            <div class="infoAdressM">
                                <div class="infoAdressImgM">
                                    <img class="contactsAdressM" src="/img/mobile/contactsAdressM.png" alt="contactsAdress">
                                </div>
                                <div class="infoAdressText">
                                    <p>
                                        Казахстан, г. Алматы,
                                        ул. Карасай батыра, 123, офис 9.
                                    </p>                                        
                                </div>
                            </div>
                            
                        </div>                       
                    </div>
                </div>
                <!----------------------------->
                
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
                            Ваши самые изысканные и капризные запросы ждут здесь!
                        </h4>
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
                        <button type="submit" class="borderAdd openFormM"><?=Yii::t('app','ОТПРАВИТЬ')?></button>
                    </div>
                </form>
            </div>
        </div>
        <div class="popupFormBack"></div>



</body>
    </html>

<?php include 'footer.php';?>