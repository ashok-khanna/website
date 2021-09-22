<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Cities;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model common\models\ServiceCategory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="service-category-form">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Русском</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Английском</a>
        </li>
    </ul>
    <br>
    <?php $form = ActiveForm::begin();
        $cities=Cities::find()->all();
        $listCities=ArrayHelper::map($cities,'id','city_rus');        
    ?>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane show fade active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <?= $form->field($model, 'name_rus')->textInput(['maxlength' => true]) ?>        

            <?= $form->field($model, 'header_rus')->textInput(['maxlength' => 70]) ?>            
        </div>
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
            <?= $form->field($model, 'name_eng')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'header_eng')->textInput(['maxlength' => 70]) ?>            
        </div>
        
        <div class="city_tags" style="border: 1px solid #4e73df; padding: 1em; margin: 0.5em;">  
            <?php if ($model->arr_cities != null) { 
                $count = 0;
                foreach ($model->arr_cities as $value) {
                    if ($count == 0) { ?>
                    <div class="form-group" id="city_con" >
                        <span id ="delete_item" class="delete_elem">x</span>
                        <?= $form->field($model, 'arr_cities[]')->dropDownList($listCities,['prompt'=>'Select...', 'value' => $model->arr_cities[$count]]) ?>
                        <?= $form->field($model, 'headerEng[]')->textInput(['maxlength' => 70, 'class' => 'form-control heng', 'value' => $model->headerEng[$count]]) ?>
                        <?= $form->field($model, 'headerRus[]')->textInput(['maxlength' => 70, 'class' => 'form-control hrus', 'value' => $model->headerRus[$count]]) ?>
                    </div>    
                <?php } else { ?>
                    <div class="form-group" id="city_con" >
                        <span id ="delete_item" class="delete_elem" style="display: block;">x</span>
                        <?= $form->field($model, 'arr_cities[]')->dropDownList($listCities,['prompt'=>'Select...', 'value' => $model->arr_cities[$count]]) ?>
                        <?= $form->field($model, 'headerEng[]')->textInput(['maxlength' => 70, 'class' => 'form-control heng', 'value' => $model->headerEng[$count]]) ?>
                        <?= $form->field($model, 'headerRus[]')->textInput(['maxlength' => 70, 'class' => 'form-control hrus', 'value' => $model->headerRus[$count]]) ?>
                    </div>
                <?php } $count++; } } else { ?> 
                    <div class="form-group" id="city_con" >
                        <span id ="delete_item" class="delete_elem">x</span>
                        <?= $form->field($model, 'arr_cities[]')->dropDownList($listCities,['prompt'=>'Select...']) ?>
                        <?= $form->field($model, 'headerEng[]')->textInput(['maxlength' => 70, 'class' => 'form-control heng']) ?>
                        <?= $form->field($model, 'headerRus[]')->textInput(['maxlength' => 70, 'class' => 'form-control hrus']) ?>
                    </div>
                <?php } ?>         
        </div>
        <div class="form-group">
            <?= Html::button(Yii::t('app', 'Добавить город'), ['class' => 'btn btn-success', 'id' => 'add_city']) ?>
        </div>                
        <?= $form->field($model, 'video')->fileInput() ?>

        <?= $form->field($model, 'video_link')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'is_popular')->checkbox(['id' => 'is_popular'])?>

        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-success', 'id' => 'save_btn']) ?>
            <a href="/admin/service-category/index" class="btn btn-danger">Отмена</a>
        </div>
    </div>            
    <?php ActiveForm::end(); ?>

</div>
<style>
    .fade {
        opacity: 1;
    }
    .delete_elem {
        display: none;    
        color: red;        
        font-weight: bold;
        cursor: pointer;
        width: 2%;
        float: right;
    }
    .stored_city {
        display: none;
    }
</style>
<script>
$(document).ready(function(){       
    if ($('#is_popular').is(':checked')) {        
        $('#is_popular').attr('disabled',false)
    }   
    $('#is_popular').change(function(){
        if ($('#is_popular').attr('value') == '1' && this.checked == false)
            $('#is_popular').attr('value','0')
    })    
})
</script>

<script>
    $('#add_city').on('click', function(button) {
        let parent = $('#city_con').clone();             
        parent.find('input[type="text"]').val("")        
        parent.find('#delete_item').css('display','inline-flex');   
        $('.city_tags').append(parent)  
    });

    $('body').on('click', '.delete_elem', function() {
        let parent = $(this).parent();
        parent.remove();
    });

</script>
