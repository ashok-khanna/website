<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Services;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model common\models\IncludedServices */
/* @var $form yii\widgets\ActiveForm */
?>

<?php  
    $icon_data = [];
    $data = array();
    $icon_data['id'] = 1;
    $icon_data['img_path'] = '../../img/sub_service_icons/Eat.png';
    $icon_data['img_path2'] = '../../img/sub_service_icons/noEat.png';
    $icon_data['img'] = '/img/sub_service_icons/Eat.png';
    $icon_data['img2'] = '/img/sub_service_icons/noEat.png';
    $icon_data['name_rus'] = 'Еда и напитки';
    $icon_data['name_eng'] = 'Eat and drinks';
    array_push($data, $icon_data);
    $icon_data['id'] = 2;
    $icon_data['img_path'] = '../../img/sub_service_icons/guideService.png';
    $icon_data['img_path2'] = '../../img/sub_service_icons/noService.png';
    $icon_data['img'] = '/img/sub_service_icons/guideService.png';
    $icon_data['img2'] = '/img/sub_service_icons/noService.png';
    $icon_data['name_rus'] = 'Услуги гида';
    $icon_data['name_eng'] = 'Gid`s service';
    array_push($data, $icon_data);
    $icon_data['id'] = 3;
    $icon_data['img_path'] = '../../img/sub_service_icons/ecologyTax.png';
    $icon_data['img_path2'] = '../../img/sub_service_icons/noEcology.png';
    $icon_data['img'] = '/img/sub_service_icons/ecologyTax.png';
    $icon_data['img2'] = '/img/sub_service_icons/noEcology.png';
    $icon_data['name_rus'] = 'Экологический сбор';
    $icon_data['name_eng'] = 'Ecology tax';
    array_push($data, $icon_data);
    $icon_data['id'] = 4;
    $icon_data['img_path'] = '../../img/sub_service_icons/transfer.png';
    $icon_data['img_path2'] = '../../img/sub_service_icons/noTransfer.png';
    $icon_data['img'] = '/img/sub_service_icons/transfer.png';
    $icon_data['img2'] = '/img/sub_service_icons/noTransfer.png';
    $icon_data['name_rus'] = 'Трансфер из отеля в пункт назначения';
    $icon_data['name_eng'] = 'Transfer';
    array_push($data, $icon_data);
    $icon_data['id'] = 5;
    $icon_data['img_path'] = '../../img/sub_service_icons/selfy.png';
    $icon_data['img_path2'] = '../../img/sub_service_icons/noSelfy.png';
    $icon_data['img'] = '/img/sub_service_icons/selfy.png';
    $icon_data['img2'] = '/img/sub_service_icons/noSelfy.png';
    $icon_data['name_rus'] = 'Сельфи на фоне изумрудного озера';
    $icon_data['name_eng'] = 'Selfy';
    array_push($data, $icon_data);
    $icon_data['id'] = 6;
    $icon_data['img_path'] = '../../img/sub_service_icons/Shop.png';
    $icon_data['img_path2'] = '../../img/sub_service_icons/noShop.png';
    $icon_data['img'] = '/img/sub_service_icons/Shop.png';
    $icon_data['img2'] = '/img/sub_service_icons/noShop.png';
    $icon_data['name_rus'] = 'Кофе и магазинов';
    $icon_data['name_eng'] = 'Cafe and magazine';
    array_push($data, $icon_data);
    $icon_data['id'] = 7;
    $icon_data['img_path'] = '../../img/sub_service_icons/nigthLive.png';
    $icon_data['img_path2'] = '../../img/sub_service_icons/noNigthLive.png';
    $icon_data['img'] = '/img/sub_service_icons/nigthLive.png';
    $icon_data['img2'] = '/img/sub_service_icons/noNigthLive.png';
    $icon_data['name_rus'] = 'Ночная жизнь';
    $icon_data['name_eng'] = 'Nigth Live';
    array_push($data, $icon_data);
    $icon_data['id'] = 8;
    $icon_data['img_path'] = '../../img/sub_service_icons/Limuzin.png';
    $icon_data['img_path2'] = '../../img/sub_service_icons/noLimuzin.png';
    $icon_data['img'] = '/img/sub_service_icons/Limuzin.png';
    $icon_data['img2'] = '/img/sub_service_icons/noLimuzin.png';
    $icon_data['name_rus'] = 'Лимузин';
    $icon_data['name_eng'] = 'Limuzin';
    array_push($data, $icon_data);
    $icon_data['id'] = 9;
    $icon_data['img_path'] = '../../img/sub_service_icons/Hostes.png';
    $icon_data['img_path2'] = '../../img/sub_service_icons/noHostes.png';
    $icon_data['img'] = '/img/sub_service_icons/Hostes.png';
    $icon_data['img2'] = '/img/sub_service_icons/noHostes.png';
    $icon_data['name_rus'] = 'Хостес';
    $icon_data['name_eng'] = 'Hostes';
    array_push($data, $icon_data);
    $icon_data['id'] = 10;
    $icon_data['img_path'] = '../../img/sub_service_icons/Shampan.png';
    $icon_data['img_path2'] = '../../img/sub_service_icons/noShampan.png';
    $icon_data['img'] = '/img/sub_service_icons/Shampan.png';
    $icon_data['img2'] = '/img/sub_service_icons/noShampan.png';
    $icon_data['name_rus'] = 'Шампанское';
    $icon_data['name_eng'] = 'Shampanskoe';
    array_push($data, $icon_data);
    $icon_data['id'] = 11;
    $icon_data['img_path'] = '../../img/sub_service_icons/videoRepo.png';
    $icon_data['img_path2'] = '../../img/sub_service_icons/noVideoRepo.png';
    $icon_data['img'] = '/img/sub_service_icons/videoRepo.png';
    $icon_data['img2'] = '/img/sub_service_icons/noVideoRepo.png';
    $icon_data['name_rus'] = 'Видеорепортаж';
    $icon_data['name_eng'] = 'Video';
    array_push($data, $icon_data);
    $icon_data['id'] = 12;
    $icon_data['img_path'] = '../../img/sub_service_icons/Wifi.png';
    $icon_data['img_path2'] = '../../img/sub_service_icons/noWifi.png';
    $icon_data['img'] = '/img/sub_service_icons/Wifi.png';
    $icon_data['img2'] = '/img/sub_service_icons/noWifi.png';
    $icon_data['name_rus'] = 'Wi-fi';
    $icon_data['name_eng'] = 'Wi-fi';
    array_push($data, $icon_data);
    $icon_data['id'] = 13;
    $icon_data['img_path'] = '../../img/sub_service_icons/translater.png';
    $icon_data['img_path2'] = '../../img/sub_service_icons/noTranslater.png';
    $icon_data['img'] = '/img/sub_service_icons/translater.png';
    $icon_data['img2'] = '/img/sub_service_icons/noTranslater.png';
    $icon_data['name_rus'] = 'Профессиональный переводчик';
    $icon_data['name_eng'] = 'Translater';
    array_push($data, $icon_data);
    $icon_data['id'] = 14;
    $icon_data['img_path'] = '../../img/sub_service_icons/show.png';
    $icon_data['img_path2'] = '../../img/sub_service_icons/noShow.png';
    $icon_data['img'] = '/img/sub_service_icons/show.png';
    $icon_data['img2'] = '/img/sub_service_icons/noShow.png';
    $icon_data['name_rus'] = 'Шоу';
    $icon_data['name_eng'] = 'Show';
    array_push($data, $icon_data);
    $icon_data['id'] = 15;
    $icon_data['img_path'] = '../../img/sub_service_icons/Konserzh.png';
    $icon_data['img_path2'] = '../../img/sub_service_icons/noKonserzh.png';
    $icon_data['img'] = '/img/sub_service_icons/Konserzh.png';
    $icon_data['img2'] = '/img/sub_service_icons/noKonserzh.png';
    $icon_data['name_rus'] = 'Консерьж';
    $icon_data['name_eng'] = 'Konserzh';
    array_push($data, $icon_data);
    $icon_data['id'] = 16;
    $icon_data['img_path'] = '../../img/sub_service_icons/Instructor.png';
    $icon_data['img_path2'] = '../../img/sub_service_icons/noInstructor.png';
    $icon_data['img'] = '/img/sub_service_icons/Instructor.png';
    $icon_data['img2'] = '/img/sub_service_icons/noInstructor.png';
    $icon_data['name_rus'] = 'Инструктор';
    $icon_data['name_eng'] = 'Instructor';
    array_push($data, $icon_data);
    $icon_data['id'] = 17;
    $icon_data['img_path'] = '../../img/sub_service_icons/spa.png';
    $icon_data['img_path2'] = '../../img/sub_service_icons/noSpa.png';
    $icon_data['img'] = '/img/sub_service_icons/spa.png';
    $icon_data['img2'] = '/img/sub_service_icons/noSpa.png';
    $icon_data['name_rus'] = 'Спа';
    $icon_data['name_eng'] = 'Spa';
    array_push($data, $icon_data);
    $icon_data['id'] = 18;
    $icon_data['img_path'] = '../../img/sub_service_icons/develop.png';
    $icon_data['img_path2'] = '../../img/sub_service_icons/noDevelop.png';
    $icon_data['img'] = '/img/sub_service_icons/develop.png';
    $icon_data['img2'] = '/img/sub_service_icons/noDevelop.png';
    $icon_data['name_rus'] = 'Разработка Мероприятия';
    $icon_data['name_eng'] = 'Develop';
    array_push($data, $icon_data);
    $icon_data['id'] = 19;
    $icon_data['img_path'] = '../../img/sub_service_icons/Ligth.png';
    $icon_data['img_path2'] = '../../img/sub_service_icons/noLigth.png';
    $icon_data['img'] = '/img/sub_service_icons/Ligth.png';
    $icon_data['img2'] = '/img/sub_service_icons/noLigth.png';
    $icon_data['name_rus'] = 'Свет';
    $icon_data['name_eng'] = 'Ligth';
    array_push($data, $icon_data);
    $icon_data['id'] = 20;
    $icon_data['img_path'] = '../../img/sub_service_icons/sound.png';
    $icon_data['img_path2'] = '../../img/sub_service_icons/noSound.png';
    $icon_data['img'] = '/img/sub_service_icons/sound.png';
    $icon_data['img2'] = '/img/sub_service_icons/noSound.png';
    $icon_data['name_rus'] = 'Звук';
    $icon_data['name_eng'] = 'Sound';
    array_push($data, $icon_data);
    $icon_data['id'] = 21;
    $icon_data['img_path'] = '../../img/sub_service_icons/LedDisplay.png';
    $icon_data['img_path2'] = '../../img/sub_service_icons/noLedDisplay.png';
    $icon_data['img'] = '/img/sub_service_icons/LedDisplay.png';
    $icon_data['img2'] = '/img/sub_service_icons/noLedDisplay.png';
    $icon_data['name_rus'] = 'LED дисплей';
    $icon_data['name_eng'] = 'LED display';
    array_push($data, $icon_data);
    $icon_data['id'] = 22;
    $icon_data['img_path'] = '../../img/sub_service_icons/Face.png';
    $icon_data['img_path2'] = '../../img/sub_service_icons/noFace.png';
    $icon_data['img'] = '/img/sub_service_icons/Face.png';
    $icon_data['img2'] = '/img/sub_service_icons/noFace.png';
    $icon_data['name_rus'] = 'Face контроль';
    $icon_data['name_eng'] = 'Face';
    array_push($data, $icon_data);
    $icon_data['id'] = 23;
    $icon_data['img_path'] = '../../img/sub_service_icons/Drink.png';
    $icon_data['img_path2'] = '../../img/sub_service_icons/noDrink.png';
    $icon_data['img'] = '../../img/sub_service_icons/Drink.png';
    $icon_data['img2'] = '../../img/sub_service_icons/noDrink.png';
    $icon_data['name_rus'] = 'welcome drink';
    $icon_data['name_eng'] = 'Welcome drink';
    array_push($data, $icon_data);
    
?>

<div class="included-services-form">

    <?php $form = ActiveForm::begin();
        $services=Services::find()->all();
        $listServices=ArrayHelper::map($services,'id','name_rus');
        $is_exists = false;
    ?>

    <?= $form->field($model, 'services_id')->dropDownList($listServices,['prompt'=>'Select...']) ?>
        <div style="display: none;" id="data" data-id="<?=htmlspecialchars(json_encode($data), ENT_QUOTES, 'UTF-8')?>"></div>
        <div class="row">
            <div class="form-group col-1">
                Картинка
            </div>
            <div class="form-group col-3">
                Заголовок (рус)
            </div>
            <div class="form-group col-3">
                Заголовок (eng)
            </div>
            <div class="form-group col-1">
                Включено
            </div>
            <div class="form-group col-2">
                Не включено
            </div>
            <div class="form-group col-2">
                Не активно
            </div>
            <?php foreach($data as $dt): ?>    
                <?php if ($model->included != null) { $included_data = json_decode($model->included); ?>           
                        <?php foreach ($included_data as $data): ?>
                            <?php if ($dt['id'] == $data->id): $is_exists = true; ?>
                                    <div class="form-group col-1">                
                                        <img src="<?=$dt['img_path']?>" class="img<?=$dt['id']?>" alt="">                
                                    </div>                
                                    <div class="form-group col-3">
                                        <input type="text" name="name_rus" value="<?=$data->name_rus?>" class="form-control name_rus<?=$dt['id']?>" readonly>
                                    </div>
                                    <div class="form-group col-3">
                                        <input type="text" name="name_eng" value="<?=$data->name_eng?>" class="form-control name_eng<?=$dt['id']?>" readonly>
                                    </div>
                                    <div class="form-check col-1 padding_top">
                                        <input type="radio" data-id="<?=$dt['id']?>" name="is_include<?=$dt['id']?>" class="included" checked>                    
                                    </div>                         
                                    <div class="form-check col-2 padding_top">
                                        <input type="radio" data-id="<?=$dt['id']?>" name="is_include<?=$dt['id']?>" class="not_included">
                                    </div>
                                    <div class="form-check col-2 padding_top">
                                        <input type="radio" data-id="<?=$dt['id']?>" name="is_include<?=$dt['id']?>" class="not_active">
                                    </div>
                            <?php break; endif; ?>
                        <?php endforeach; ?>
                <?php } if ($model->not_included != null) { $not_included_data = json_decode($model->not_included); ?>
                            <?php foreach ($not_included_data as $data): ?>
                                <?php if ($dt['id'] == $data->id): $is_exists = true; ?>
                                        <div class="form-group col-1">                
                                            <img src="<?=$dt['img_path']?>" class="img<?=$dt['id']?>" alt="">                
                                        </div>                
                                        <div class="form-group col-3">
                                            <input type="text" name="name_rus" value="<?=$data->name_rus?>" class="form-control name_rus<?=$dt['id']?>" readonly>
                                        </div>
                                        <div class="form-group col-3">
                                            <input type="text" name="name_eng" value="<?=$data->name_eng?>" class="form-control name_eng<?=$dt['id']?>" readonly>
                                        </div>
                                        <div class="form-check col-1 padding_top">
                                            <input type="radio" data-id="<?=$dt['id']?>" name="is_include<?=$dt['id']?>" class="included">                    
                                        </div>                         
                                        <div class="form-check col-2 padding_top">
                                            <input type="radio" data-id="<?=$dt['id']?>" name="is_include<?=$dt['id']?>" class="not_included" checked>
                                        </div>
                                        <div class="form-check col-2 padding_top">
                                            <input type="radio" data-id="<?=$dt['id']?>" name="is_include<?=$dt['id']?>" class="not_active">
                                        </div>
                                <?php break; endif; ?>
                            <?php endforeach; ?>
                <?php } if (!$is_exists) { ?>                        
                        <div class="form-group col-1">                
                            <img src="<?=$dt['img_path']?>" class="img<?=$dt['id']?>" alt="">                
                        </div>                
                        <div class="form-group col-3">
                            <input type="text" name="name_rus" value="<?=$dt['name_rus']?>" class="form-control name_rus<?=$dt['id']?>">
                        </div>
                        <div class="form-group col-3">
                            <input type="text" name="name_eng" value="<?=$dt['name_eng']?>" class="form-control name_eng<?=$dt['id']?>">
                        </div>
                        <div class="form-check col-1 padding_top">
                            <input type="radio" data-id="<?=$dt['id']?>" name="is_include<?=$dt['id']?>" class="included">                    
                        </div>                         
                        <div class="form-check col-2 padding_top">
                            <input type="radio" data-id="<?=$dt['id']?>" name="is_include<?=$dt['id']?>" class="not_included">
                        </div>
                        <div class="form-check col-2 padding_top">
                            <input type="radio" data-id="<?=$dt['id']?>" name="is_include<?=$dt['id']?>" class="not_active" checked>
                        </div>           
                <?php } ?>          
            <?php $is_exists = false; endforeach; ?>            
        </div>
                
        <input type="hidden" name="included" id="included">        
        <input type="hidden" name="not_included" id="not_included">        
        <div style="display: none;" id="inc_arr" data-id="<?=htmlspecialchars(json_encode($model->included), ENT_QUOTES, 'UTF-8')?>"></div>
        <div style="display: none;" id="not_arr" data-id="<?=htmlspecialchars(json_encode($model->not_included), ENT_QUOTES, 'UTF-8')?>"></div>
    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success', 'id' => 'submitBtn']) ?>
        <a href="/admin/included-services/index" class="btn btn-danger">Отмена</a>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<style>

.padding_top {
    padding-top: 0.5em;
}

.center {
    text-align: center;
}

</style>

<script>
let item = {};
let inc_arr = {};
let not_arr = {};
let data = $('#data').data('id');
let existed_inc = jQuery.parseJSON($("#inc_arr").data('id'));
let existed_not = jQuery.parseJSON($("#not_arr").data('id'))
if (existed_inc && Object.keys(JSON.parse(existed_inc)).length > 0) {    
    inc_arr = JSON.parse(existed_inc);
    setToInput()
}
if (existed_not && Object.keys(JSON.parse(existed_not)).length > 0) {
    not_arr = JSON.parse(existed_not);
    setToInput()
}

$('body').on('click', '.included', function(){
    let id = $(this).data('id');
    $('.name_eng'+id).attr('readonly', true);
    $('.name_rus'+id).attr('readonly', true);    
    let current = data[id-1];
    let name_rus = $('.name_rus'+id).val();
    let name_eng = $('.name_eng'+id).val();
    if (!inc_arr[id]) {
        item['id'] = id;
        item['name_rus'] = name_rus;
        item['name_eng'] = name_eng;
        item['img'] = current['img'] ? current['img'] : '';
        inc_arr[id] = {...item};
    }
    if (not_arr[id]) {
        not_arr = RemoveItem(not_arr, id);
    }
    setToInput()
})

$('body').on('click', '.not_included', function(){    
    let id = $(this).data('id');
    $('.name_eng'+id).attr('readonly', true);
    $('.name_rus'+id).attr('readonly', true);
    let current = data[id-1];
    let name_rus = $('.name_rus'+id).val();
    let name_eng = $('.name_eng'+id).val();
    if (!not_arr[id]) {
        item['id'] = id;
        item['name_rus'] = name_rus;
        item['name_eng'] = name_eng;
        item['img'] = current['img2'] ? current['img2'] : '';    
        not_arr[id] = {...item};
    }    
    if (inc_arr[id]) {
        inc_arr = RemoveItem(inc_arr, id);
    }
    setToInput()
})

$('body').on('click', '.not_active', function(){    
    let id = $(this).data('id');
    $('.name_eng'+id).attr('readonly', false);
    $('.name_rus'+id).attr('readonly', false);    
    if (inc_arr[id]) {
        inc_arr = RemoveItem(inc_arr, id);
    }
    if (not_arr[id]) {
        not_arr = RemoveItem(not_arr, id);
    }
    setToInput()
})

function setToInput() {
    let inc_obj = JSON.stringify(inc_arr);
    let not_obj = JSON.stringify(not_arr);
    $('#not_included').val(not_obj)
    $('#included').val(inc_obj)    
}

function RemoveItem(arr, id) {
    let newArr = {...arr}
    delete newArr[id]
    return newArr;
}

</script>