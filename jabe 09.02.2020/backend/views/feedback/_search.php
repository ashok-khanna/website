<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\FeedbackSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="feedback-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'services_id') ?>

    <?= $form->field($model, 'name_rus') ?>

    <?= $form->field($model, 'name_kaz') ?>

    <?= $form->field($model, 'name_eng') ?>

    <?php // echo $form->field($model, 'coment_rus') ?>

    <?php // echo $form->field($model, 'coment_kaz') ?>

    <?php // echo $form->field($model, 'coment_eng') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
