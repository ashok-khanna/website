<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Services;
/* @var $this yii\web\View */
/* @var $model common\models\Feedback */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="feedback-form">
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
    <?php $form = ActiveForm::begin();
        $services=Services::find()->all();
        $listServices=ArrayHelper::map($services,'id','name_rus');

        $model->services_id = null;
    ?>
    <div class="tab-content" id="myTabContent">
        <?= $form->field($model, 'services_id')->dropDownList($listServices,['prompt'=>'Select...']) ?>
        <div class="tab-pane show fade active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <?= $form->field($model, 'name_rus')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'coment_rus')->textarea(['rows' => 6]) ?>
        </div>
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
            <?= $form->field($model, 'name_eng')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'coment_eng')->textarea(['rows' => 6]) ?>
        </div>      
    
        <div class="form-group">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
            <a href="/admin/feedback/index" class="btn btn-danger">Отмена</a>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
