    <div class="footerBox noInMob">

        <div class="cities gradient-title show">
            <?php if ($cities != null): $count=0; ?>
                <?php foreach ($cities as $city): ?>            
                        <?php if ($count == 4) {break;} ?>
                        <span><?=$city->city?></span>                                
                <?php $count++; endforeach;?>
            <?php endif;?>            
        </div>

        <div class="social show">
            <a href="#">
                <img class="w_2_5em" src="/img/WA.png">
            </a>
            <a href="#">
                <img src="/img/telega.png">
            </a>
        </div>

        <div class="email gradient-title show">
            <a href="#">Concierge@jabe.kz</a>
        </div>

        <div class="adress">
            <div class="adressItem show">
                <p class="gradient-title"><?=Yii::t('app', 'Адрес:')?></p>
            </div>
            <div class="adressItem show">
                <p class="gradient-title">
                    <?=Yii::t('app', 'РК, г. Алматы, индекс 050012')?>
                </p>
                <p class="gradient-title">
                    <?=Yii::t('app', 'ул. Карасай батыра, 123, оф.9.')?>
                </p>
            </div>
            <div class="adressItem hide">     
                <div style="display: flex;">           
                    <img src="/img/53.png">                
                    <span>
                       <?=Yii::t('app', 'РК, г. Алматы, индекс 050012 ул. Карасай батыра, 123, оф.9.')?>
                    </span>
                </div>
            </div>
        </div>

        <div class="tel">
            <div class="telItem show">
                <span class="gradient-title"><?=Yii::t('app', 'Телефоны:')?></span>
            </div>
            <div class="telItem show">
                <a class="telItem_1 gradient-title" href="#">
                    + 7 (778) 888 55 99
                </a>
                <a class="telItem_2 gradient-title" href="#">
                    + 7 (727) 339 07 50
                </a>
            </div>
            <div class="telItem hide">
                <div style="display: flex;">
                    <img src="/img/ICON.png">                
                    <a href="">+ 7 (778) 888 55 99 </a>
                    <a href="">+ 7 (727) 339 07 50</a>
                </div>                
            </div>
        </div>

    </div>

<script src="/js/jquery.js"></script>
<script src="/js/owl.carousel.js"></script>
<script src="/js/swiper.js"></script>
<script src="/vendor/aos.js"></script>
<script src="/vendor/app.js"></script>
<script src="/js/fansybox.js"></script>
<script src="/js/code.js"></script>
</main>
</body>
</html>