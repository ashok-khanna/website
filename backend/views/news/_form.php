<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
// use yii\jui\DatePicker;
use kartik\date\DatePicker;
/* @var $this yii\web\View */
/* @var $model common\models\News */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-form">
    <style>
        .fade {
            opacity: 1;
        }
    </style>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Русский</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Английский</a>
        </li>
    </ul>
    <br>
    <?php $form = ActiveForm::begin(); ?>
    <?php $listCategory = ['0' => 'Роскошная Жизнь', '1' => 'GENTLEMAN QUALITY', '2' => 'НОВОСТИ КОМПАНИИ JABE CONCIERGE', '3' => 'СТИЛЬ ЖИЗНИ', '4' => 'ГОЛЬФ', '5' => 'НОЧНАЯ ЖИЗНЬ', '6' => 'ВЭЛНЕС И СПА']; ?>
    <?php if ($model->date != null) { $model->date = gmdate('yy-m-d', $model->date); } ?>
    <div class="tab-content" id="myTabContent">                
        <div class="tab-pane show fade active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <?= $form->field($model, 'name_rus')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'body_rus')->textarea(['rows' => 6]) ?>
        </div>
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
            <?= $form->field($model, 'name_eng')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'body_eng')->textarea(['rows' => 6]) ?>
        </div>          

        <?= $form->field($model, 'category_news')->dropDownList($listCategory,['prompt'=>'Select...']) ?> 
        
        <?php 
            echo '<label class="control-label">ДАТА</label>';
            echo DatePicker::widget([
                'model' => $model, 
                'attribute' => 'date',                                    
                // 'type' => DatePicker::TYPE_COMPONENT_APPEND,
                'pluginOptions' => [
                    'format' => 'yyyy-mm-dd',
                    'autoclose' => true,
                ]
            ]);
        ?>
        
        <?= $form->field($model, 'image')->fileInput() ?>  

        <?= $form->field($model, 'is_active')->checkbox(['id' => 'is_active'])?> 

        <div class="form-group">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
            <a href="/admin/news/index" class="btn btn-danger">Отмена</a>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>

<style>
#news-date-kvdate {
    display: table;
}
#news-date {
    width: 100%;
}
</style>
