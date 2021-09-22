<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Services;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\Requirements */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="requirements-form">

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
            <?= $form->field($model, 'suit_rus')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'duration_time_rus')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'recommendation_rus')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'season_rus')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'count_people_rus')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'necessarily_rus')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
            <?= $form->field($model, 'suit_eng')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'duration_time_eng')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'recommendation_eng')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'season_eng')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'count_people_eng')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'necessarily_eng')->textInput(['maxlength' => true]) ?>
        </div>         
    
        <div class="winter_container" style="border: 1px solid #4e73df; padding: 1em; margin: 0.5em;">
            <?php if ($model->winter_recommend_rus != null) {
                    $count = 0;
                    foreach ($model->winter_recommend_rus as $value) {
                        if ($count == 0) { ?>
                            <div class="form-group" id="winter_recomm">
                                <span id ="delete_item" class="delete_elem">x</span>
                                <?= $form->field($model, 'winter_recommend_rus[]')->textInput(['maxlength' => true, 'value' => $model->winter_recommend_rus[$count]]) ?>

                                <?= $form->field($model, 'winter_recommend_eng[]')->textInput(['maxlength' => true, 'value' => $model->winter_recommend_eng[$count]]) ?>
                            </div>    
                        <?php } else { ?>
                            <div class="form-group" id="winter_recomm">
                                <span id ="delete_item" class="delete_elem" style="display: block;">x</span>
                                <?= $form->field($model, 'winter_recommend_rus[]')->textInput(['maxlength' => true, 'value' => $model->winter_recommend_rus[$count]]) ?>

                                <?= $form->field($model, 'winter_recommend_eng[]')->textInput(['maxlength' => true, 'value' => $model->winter_recommend_eng[$count]]) ?>
                            </div>    
                        <?php } ?>
            <?php $count++; } } else { ?>
                <div class="form-group" id="winter_recomm">
                    <span id ="delete_item" class="delete_elem">x</span>
                    <?= $form->field($model, 'winter_recommend_rus[]')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'winter_recommend_eng[]')->textInput(['maxlength' => true]) ?>
                </div>    
            <?php } ?>
        </div>
        <div class="form-group">
            <?= Html::Button('Добавить', ['class' => 'btn btn-success', 'id' => 'add_rec']) ?>
        </div>
    </div>
    

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        <a href="/admin/requirements/index" class="btn btn-danger">Отмена</a>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<style>
    .delete_elem {
        display: none;    
        color: red;
        font-size: 1.3em;
        font-weight: bold;
        cursor: pointer;
        width: 2%;
        text-align: center;
    }
</style>

<script>
$('#add_rec').on('click', function() {
    let parent = $('#winter_recomm').clone();
    if ($('.winter_container').children().length > 5) {
        return ;
    }
    parent.find('input[type="text"]').val("")
    parent.find('#delete_item').css('display','block');
    $('.winter_container').append(parent)
});

$('body').on('click', '.delete_elem', function() {
    let parent = $(this).parent();
    parent.remove();
});

</script>
