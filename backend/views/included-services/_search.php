<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\IncludedServicesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="included-services-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'services_id') ?>

    <?= $form->field($model, 'gid') ?>

    <?= $form->field($model, 'eco') ?>

    <?= $form->field($model, 'transfer') ?>

    <?php // echo $form->field($model, 'selfie') ?>

    <?php // echo $form->field($model, 'eat') ?>

    <?php // echo $form->field($model, 'cafe') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
