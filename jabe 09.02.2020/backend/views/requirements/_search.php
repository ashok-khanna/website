<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\RequirementsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="requirements-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'services_id') ?>

    <?= $form->field($model, 'suit_rus') ?>

    <?= $form->field($model, 'suit_kaz') ?>

    <?= $form->field($model, 'suit_eng') ?>

    <?php // echo $form->field($model, 'duration_time_rus') ?>

    <?php // echo $form->field($model, 'duration_time_kaz') ?>

    <?php // echo $form->field($model, 'duration_time_eng') ?>

    <?php // echo $form->field($model, 'recommendation_rus') ?>

    <?php // echo $form->field($model, 'recommendation_kaz') ?>

    <?php // echo $form->field($model, 'recommendation_eng') ?>

    <?php // echo $form->field($model, 'season_rus') ?>

    <?php // echo $form->field($model, 'season_kaz') ?>

    <?php // echo $form->field($model, 'season_eng') ?>

    <?php // echo $form->field($model, 'count_people_rus') ?>

    <?php // echo $form->field($model, 'count_people_kaz') ?>

    <?php // echo $form->field($model, 'count_people_eng') ?>

    <?php // echo $form->field($model, 'necessarily_rus') ?>

    <?php // echo $form->field($model, 'necessarily_kaz') ?>

    <?php // echo $form->field($model, 'necessarily_eng') ?>

    <?php // echo $form->field($model, 'winter_recommend_rus') ?>

    <?php // echo $form->field($model, 'winter_recommend_kaz') ?>

    <?php // echo $form->field($model, 'winter_recommend_eng') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
