<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Cities */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cities-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'city_rus')->textInput(['maxlength' => true]) ?>    

    <?= $form->field($model, 'city_eng')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        <a href="/admin/cities/index" class="btn btn-danger">Отмена</a>
    </div>

    <?php ActiveForm::end(); ?>

</div>
