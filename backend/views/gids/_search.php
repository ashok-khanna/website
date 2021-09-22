<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\GidsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gids-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'city_id') ?>

    <?= $form->field($model, 'lang') ?>

    <?= $form->field($model, 'name_rus') ?>

    <?= $form->field($model, 'name_kaz') ?>

    <?php // echo $form->field($model, 'name_eng') ?>

    <?php // echo $form->field($model, 'rating') ?>

    <?php // echo $form->field($model, 'img_sad') ?>

    <?php // echo $form->field($model, 'img_smile') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
