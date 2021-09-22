<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\ServiceCategory;
use common\models\Cities;
/* @var $this yii\web\View */
/* @var $model common\models\Services */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="services-form">
    <style>
        .fade {
            opacity: 1;
        }
    </style>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Русском</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Английском</a>
        </li>
    </ul>
    <br>
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); 
        $category=ServiceCategory::find()->all();
        $listCategory=ArrayHelper::map($category,'id','name_rus');

        $cities=Cities::find()->all();
        $listCities=ArrayHelper::map($cities,'id','city_rus');
    ?>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane show fade active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <?= $form->field($model, 'name_rus')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'body_rus')->textarea() ?>
        </div>
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
            <?= $form->field($model, 'name_eng')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'body_eng')->textarea() ?>
        </div>    

        <?= $form->field($model, 'category_id')->dropDownList($listCategory,['prompt'=>'Select...']) ?>

        <?= $form->field($model, 'city_id')->dropDownList($listCities,['prompt'=>'Select...']) ?>

        <?= $form->field($model, 'cost')->textInput(['type' => 'number']) ?>

        <?= $form->field($model, 'rating')->textInput(['type' => 'number', 'maxlength' => '5']) ?>

        <?= $form->field($model, 'prepayment')->radioList([1=>'15%', 2 => '20%', 3 => '30%']) ?>

        <div class="hash_tags" style="border: 1px solid #4e73df; padding: 1em; margin: 0.5em;">
        <?php if ($model->hash_tag != null) { 
                $count = 0;
                foreach ($model->hash_tag as $value) {
                    if ($count == 0) {?>
                        <div class="form-group" id="hash_con" >
                            <span id ="delete_item" class="delete_elem">x</span>
                            <?= $form->field($model, 'hash_tag[]')->textInput(['maxlength' => true, 'value' => $model->hash_tag[$count]]) ?>
                            
                            <?= $form->field($model, 'link[]')->textInput(['maxlength' => true, 'value' => $model->link[$count]]) ?>
                        </div>      
            <?php } else { ?>
                        <div class="form-group" id="hash_con" >
                            <span id ="delete_item" class="delete_elem" style="display: block;">x</span>
                            <?= $form->field($model, 'hash_tag[]')->textInput(['maxlength' => true, 'value' => $model->hash_tag[$count]]) ?>
                            
                            <?= $form->field($model, 'link[]')->textInput(['maxlength' => true, 'value' => $model->link[$count]]) ?>
                        </div>   
            <?php } ?>
            <?php $count++; } } else { ?>
                        <div class="form-group" id="hash_con" >
                            <span id ="delete_item" class="delete_elem">x</span>
                            <?= $form->field($model, 'hash_tag[]')->textInput(['maxlength' => true]) ?>
                            
                            <?= $form->field($model, 'link[]')->textInput(['maxlength' => true]) ?>
                        </div>   
            <?php } ?>
        </div>
        <div class="form-group">
            <?= Html::button(Yii::t('app', 'Добавить Хэштэги'), ['class' => 'btn btn-success', 'id' => 'add_hash']) ?>
        </div>
        <img id="img_1" src="<?=$model->img?>" style="width: 250px; height: 250px;" />
        <?= $form->field($model, 'image')->fileInput(['onchange' => 'readURL(this,"#img_1");']) ?>
        <div id="images"></div>
        <?= $form->field($model, 'images[]')->fileInput(['multiple' => true, 'accept' => 'image/*','onchange' => 'readUrls(this);']) ?>    

        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-success']) ?>
            <a href="/admin/services/index" class="btn btn-danger">Отмена</a>
        </div>
        <div id="photos_val" data-id='<?=$model->photos?>'></div>
    </div>
    <?php ActiveForm::end(); ?>

</div>

<style>
    .delete_elem {
        display: none;    
        color: red;        
        font-weight: bold;
        cursor: pointer;
        width: 2%;
        float: right;
    }
</style>

<script>

function readURL(input, img) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $(img).css('display', 'block');
      $(img)
        .attr('src', e.target.result);
    };
    reader.readAsDataURL(input.files[0]);
  }
}

function readUrls(input) {
    // Multiple images preview in browser
    let container = $('#images');
    container.empty();   
    console.log(container)
    if (input.files) {
        var filesAmount = input.files.length;
        for (i = 0; i < filesAmount; i++) {
            var reader = new FileReader();
            reader.onload = function(event) {
                container.prepend(`<img id='${'img_'+i}' src='${event.target.result}' style='width: 250px; height: 250px' />`)
            }
            reader.readAsDataURL(input.files[i]);
        }
    }    

    $('#gallery-photo-add').on('change', function() {
        imagesPreview(this, 'div.gallery');
    });            
}

function generate(button) {
    let parent = button.parent().clone();
}
$('#add_hash').on('click', function(button) {
    let parent = $('#hash_con').clone();
    if ($('.hash_tags').children().length > 5) {
        return ;
    }
    parent.find('input[type="text"]').val("")
    parent.find('#delete_item').css('display','inline-flex');
    $('.hash_tags').append(parent)
});

$('body').on('click', '.delete_elem', function() {
    let parent = $(this).parent();
    parent.remove();
});

$(document).ready(function () {
    let container = $('#images');
    let photos = $('#photos_val').data("id");
    console.log(photos)
    if (photos.length > 0) {
        for (let i=0; i<photos.length; i++) {
            container.prepend(`<img src='${photos[i]}' style='width: 250px; height: 250px' />`)
        }
    }

    if ($('#img_1').attr('src') == '') {
        $('#img_1').css('display', 'none');
    }
});

</script>