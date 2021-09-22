<?php $this->title = Yii::t('app', 'Корзина');
include 'header.php';?>
 <link rel="stylesheet" href="/css/datepicker.css">
 <link rel="stylesheet" href="/css/bootstrap-datepicker.min.css">
 <span style="display: none;" class="page_name">Корзина</span>
    <!DOCTYPE html>
    <html lang="en">

    <body>
        <!-- <img src="articles.jpg" class="test"> -->
        <section class="noInMob" id="basket">

            <div class="topImg">
                <img src="/img/basketTopImg.png" alt="img">
                <div></div>
            </div>

            <div class="newTitle noInMob">
                <div class="newTitleLine"></div>
                <div class="newTitleText">
                    <?=Yii::t('app', 'Моя корзина')?>
                    <div class="newTitleFlareWrap" data-aos="zoom-in" data-aos-delay="300" data-aos-once="false">
                        <div class="flareImg">
                            <img src="/img/flare.png" alt="img">
                        </div>

                    </div>
                </div>
                <div class="newTitleLine"></div>
            </div>

            <div class="container">
                <div class="basketBox">
                    <div class="basketList">
                        <p class="error_msg"></p>
                        <div class="basketListDate">
                            <div class="basketListDateCity">
                                <div class="basketListCity gradient-title-2">Город:</div>
                                <div class="basketCity"><?=isset($_SESSION['city_id']) ? Yii::$app->language == 'ru' ? $_SESSION['city_rus'] : $_SESSION['city_eng'] : $CurrentCity->city?></div>
                            </div>
                            <div class="basketListDateFrom">
                                <div class="basketListDateFromText">Дата от:</div>
                                <input type="text" class="datePicker datepicker-here" id="dateFrom" required />
                                <!--DATE PICKER-->

                            </div>
                            <div class="basketListDateUntil">
                                <div class="basketListDateUntilText">Дата до:</div>
                                <!-- <div class="datePicker"></div> -->
                                <input type="text" class="datePicker datepicker-here" id="dateTo" required disabled />
                                <!--DATE PICKER-->
                            </div>
                        </div>
                        <div class="basketTable">
                            <table>
                                <tr>
                                    <td class="basketTitle whiteBorder">Наименование</td><td class="basketTitle whiteBorder">Сумма</td><td class="basketTitle"></td>
                                </tr>
                                <tbody class="ServiceProduct">

                                </tbody>                               
                            </table>
                            <div class="basketTotal">
                                    <div class="basketTotalItems">
                                        <div class="basketTotalItem gradient-title-2">Итого товаров:</div>
                                        <div class="basketTotalItem1 TotalItem">0</div>
                                    </div>
                                </div>
                                <div class="basketTotal">
                                    <div class="basketTotalItems">
                                        <div class="basketTotalItem gradient-title-2">Итого сумма:</div>
                                        <div class="basketTotalItemPrice TotalSum">0 $</div>
                                    </div>
                                    <div class="basketTotalItems">
                                        <div class="checkImg"><img src="/img/checkImg.png" alt="img"></div>
                                        <div class="basketTotalItem gradient-title-2">Сумма предоплаты:</div>
                                        <div data-id="1" class="basketTotalItemPrice PreSum">0 $</div>
                                    </div>
                                </div>
                            </div>
                            <div class="basketTotalButton">
                                <button class="baksetButton brownBack noUpper">Оплатить</button>
                            </div>
                        </div>

                    <!-- </div> -->


                    <div class="customerForm">
                        <form action="#" method="get">
                            <div>
                                <p class="gradient-title-2 basketFormStyle">Данные покупателя:</p>
                            </div>
                            <div>
                                <p class="gradient-title-2 basketFormStyle-2">Все поля помеченные * обязательны для заполнения</p>
                            </div>
                            <div>
                                <input tabindex="1" id="name" placeholder="Ваше имя" name="customerName" type="text" required>
                            </div>
                            <div>
                                <input tabindex="2" id="phone" placeholder="Телефон" name="customerTel" type="tel" required>
                            </div>
                            <div>
                                <input tabindex="3" id="email" placeholder="e-mail" name="customerEmail" type="email" required>
                            </div>
                            <div>
                                <input tabindex="4" id="city" placeholder="Город" name="customerCity" type="text" required>
                            </div>
                            <div class="payRadio">
                                <div class="payMethodTitle">
                                    <p class="gradient-title-2 basketFormStyle">Способ оплаты</p>
                                </div>
                                <label for="cash" class="payMethodLabel">Наличными(при оплате по приезду)
                                    <input name="payment_type" id="cash" tabindex="5" type="radio" checked value="cash">
                                    <span class="checkmark"></span>
                                </label>
                                <label for="cashless" style="margin: 2em 0 2.5em;" class="payMethodLabel">Безналичный расчет (выставляется счет, оплата в течение 3 дней)
                                    <input name="payment_type" tabindex="6" id="cashless" type="radio" value="cashless">
                                    <span class="checkmark"></span>
                                </label>
                                <label for="card" class="payMethodLabel">Онлайн оплата картой (после согласования с менеджером)
                                    <input name="payment_type" tabindex="7" id="card" type="radio" value="card">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <button class="baksetFormButton brownBack noUpper callFrame" tabindex="8" type="submit">Оформить заказ</button>
                        </form>
                    </div>

                </div>

        </section>



        <div class="basketPageM">
            <div class="topImgM">
                <img src="/img/mobile/basketTopImgM.png" alt="img">
                <div></div>
            </div>
            <div class="titleM">  <!-- TOURS TITLE MOBILE -->
                <div class="hr"><hr></div>
                <div class="titleMSpan gradient-title"><span>Моя корзина</span></div>
                <div class="hr"><hr></div>
            </div>
            <div class="basketBoxM">
                <div class="basketListDateCityM">
                    <div class="basketListCityM"><p class="gradient-title-2">Город:</p></div>
                    <div class="basketCityM"><p>Алматы</p></div>
                </div>
                <div class="basketListDateFromM">
                    <div class="basketListDateFromTextM"><p class="gradient-title-2">Дата от:</p></div>
                    <!-- <div class="datePickerM"></div> -->
                    <input type="text" name="" id="dateFromM" class="datePickerM datepicker-here" required>
                    <!--DATE PICKER-->
                    <p class="error_msgM"></p>
                </div>
                <div class="basketListDateUntilM">
                    <div class="basketListDateUntilTextM"><p class="gradient-title-2">Дата до:</p></div>
                    <!-- <div class="datePickerM datePickerBottomM"></div> -->
                    <input type="text" name="" id="dateToM" class="datePickerM datePickerBottomM datepicker-here" required>
                    <!--DATE PICKER-->
                    <p class="error_msgM"></p>
                </div>
                <div class="basketTableM">
                    <table>
                        <thead>
                            <tr>
                                <td class="basketTitleM whiteBorder">Наименование</td>
                                <td class="basketTitleM whiteBorder">Сумма</td>
                                <td class="basketTitleM"></td>
                            </tr>
                        </thead>
                        <tbody class="ServiceProductM">

                        </tbody>                        
                    </table>
                </div>
                <div class="basketListDateCityM">
                    <div class="totalTableM basketTotalInfoM"><p class="gradient-title-2">Итого товаров:</p></div>
                    <div class="basketCityM"><p class="TotalItem">0</p></div>
                </div>
                <div class="basketListDateCityM">
                    <div class="totalTableM basketTotalInfoM"><p class="gradient-title-2">Итого сумма:</p></div>
                    <div class="basketCityM"><p class="TotalSum">0 $</p></div>
                </div>
                <div class="basketSummM basketListDateCityM">
                    <div class="checkImgM"><img src="/img/mobile/checkImgM.png" alt="img"></div>
                    <div class="basketTotalInfoM"><p class="gradient-title-2">Сумма предоплаты:</p></div>
                    <div class="basketCityM ml0_em"><p data-id="1" class="PreSum">0 $</p></div>
                </div>
                <div class="basketTotalButtonM">
                    <button class="baksetButtonM brownBack noUpper">Оплатить</button>
                </div>
                <div class="basketLineM"></div>

                <div class="customerFormM">
                    <form action="#" method="get">
                        <div>
                            <p class="gradient-title-2 basketFormStyleM">Данные покупателя:</p>
                        </div>
                        <div>
                            <p class="gradient-title-2 basketFormStyleM-2">Все поля помеченные * обязательны для заполнения</p>
                        </div>
                        <div>
                            <input tabindex="1" id="nameM" placeholder="Ваше имя" type="text">
                        </div>
                        <div>
                            <input tabindex="2" id="phoneM" placeholder="Телефон" type="tel">
                        </div>
                        <div>
                            <input tabindex="3" id="emailM" placeholder="e-mail" type="email">
                        </div>
                        <div>
                            <input tabindex="4" id="cityM" placeholder="Город" type="text">
                        </div>
                        <div class="payRadioM">
                            <div class="payMethodTitleM">
                                <p class="gradient-title-2 basketFormStyleM">Способ оплаты</p>
                            </div>
                            <label class="payMethodLabelM">Наличными(при оплате по приезду)
                                <input tabindex="5" type="radio" checked="checked" name="payMethod" value="cash">
                                <span class="checkmarkM"></span>
                            </label>
                            <label style="margin: 2.3em 0 2.3em;" class="payMethodLabelM">Безналичный расчет (выставляется счет, оплата в течение 3 дней)
                                <input tabindex="6" type="radio" name="payMethod" value="cashless">
                                <span class="checkmarkM"></span>
                            </label>
                            <label class="payMethodLabelM">Онлайн оплата картой (после согласования с менеджером)
                                <input tabindex="7" type="radio" name="payMethod" value="card">
                                <span class="checkmarkM"></span>
                            </label>
                        </div>
                        <div class="basketBtnM">
                            <button class="baksetFormButtonM brownBack noUpper callFrameM" tabindex="8" type="submit">Оформить заказ</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
</body>
    </html>

<?php include 'footer.php';?>
<script src="https://widget.cloudpayments.ru/bundles/cloudpayments"></script>
<script src="/js/basket.js"></script>
<script src="/js/cloudpayments.js"></script>
<script src="/js/datepicker.js"></script>

<script>
    var lang = $('body').attr('lang');
    $('#dateFrom').datepicker({
        minDate: new Date(),
        language: 'en',
        onSelect: function onSelect(fd, date) {
            $('#dateTo').removeAttr('disabled')
            let dateFrom = $('#dateFrom').val();
            dateFrom = dateFrom.split('.')
            dateFrom = new Date(dateFrom[2], dateFrom[1] - 1, dateFrom[0])
            $('#dateTo').datepicker({
                minDate: dateFrom,
                language: 'en',
                onSelect: function onSelect(fd, date) {                    
                    var dateFrom = $('#dateFrom').val();
                    var dateTo = $('#dateTo').val();    
                    var lang = $('body').attr('lang')                    
                    dateTo = dateTo.split('.')
                    dateFrom = dateFrom.split('.')
                    dateTo = new Date(dateTo[2], dateTo[1] - 1, dateTo[0])
                    dateFrom = new Date(dateFrom[2], dateFrom[1] - 1, dateFrom[0])
                    let dayCount = (dateTo.getTime() - dateFrom.getTime())/1000 / 60 / 60 / 24;    
                    let PreCost = $('.PreSum').data('id');
                    let TotalCost = $('.TotalSum').data('id');
                    PreCost = parseInt(PreCost) * parseInt(dayCount);
                    TotalCost = parseInt(TotalCost) * parseInt(dayCount);
                    PreCost = PreCost > 0 ? PreCost : 1;
                    setPreSum(PreCost)
                    setTotalCosts(TotalCost)
                }
            });
        }
    });
    $('#dateFromM').datepicker({
        minDate: new Date(),
        language: 'en',
        onSelect: function onSelect(fd, date) {
            $('#dateToM').removeAttr('disabled')
            let dateFrom = $('#dateFromM').val();
            dateFrom = dateFrom.split('.')
            dateFrom = new Date(dateFrom[2], dateFrom[1] - 1, dateFrom[0])
            $('#dateToM').datepicker({
                minDate: dateFrom,
                language: 'en',
                onSelect: function onSelect(fd, date) {
                    var dateFrom = $('#dateFromM').val();
                    var dateTo = $('#dateToM').val();                    
                    $('.error_msgM').hide()
                    dateTo = dateTo.split('.')
                    dateFrom = dateFrom.split('.')
                    dateTo = new Date(dateTo[2], dateTo[1] - 1, dateTo[0])
                    dateFrom = new Date(dateFrom[2], dateFrom[1] - 1, dateFrom[0])
                    let dayCount = (dateTo.getTime() - dateFrom.getTime()) / 1000 / 60 / 60 / 24;
                    let PreCost = $('.PreSum').data('id');
                    let TotalCost = $('.TotalSum').data('id');
                    PreCost = parseInt(PreCost) * parseInt(dayCount);
                    TotalCost = parseInt(TotalCost) * parseInt(dayCount);
                    PreCost = PreCost > 0 ? PreCost : 1;
                    setPreSum()
                    setTotalCosts(TotalCost)
                }                
            });
        }
    });
</script>