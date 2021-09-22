<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Cities;
use kartik\select2\Select2;
use yii\web\JsExpression;
use yii\bootstrap4\Modal;
/* @var $this yii\web\View */
/* @var $model common\models\Gids */
/* @var $form yii\widgets\ActiveForm */
?>


<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css">
<div class="gids-form">

    <?php $form = ActiveForm::begin();
        $cities=Cities::find()->all();
        $listCities=ArrayHelper::map($cities,'id','city_rus');

        $arr = ["de" => "German", "kz" => "Kazakh", "ru" => "Russian", "chi" => "Chinese", "en" => "English", "ko" => "Korean", "fr" => "French", "ara" => "Arabian"];
    ?>

    <?= $form->field($model, 'city_id')->dropDownList($listCities,['prompt'=>'Select...']) ?>
    
    <div class="form-group field-gids-langs">
        <label class="control-label">Выберите языки</label>
        <?php echo Select2::widget([
            'name' => 'Gids[langs]',
            'data' => $arr,
            'theme' => Select2::THEME_BOOTSTRAP,
            'options' => ['placeholder' => 'Select a state ...', 'multiple' => true, 'autocomplete' => 'off', 'class' => 'form-control'],
            'pluginOptions' => ['allowClear' => true], ]);?>
            <div class="help-block"></div>
    </div>    

    <?= $form->field($model, 'name_rus')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name_eng')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rating')->textInput() ?>

    <?= $form->field($model, 'image_sad')->fileInput() ?>

    <?= $form->field($model, 'image_smile')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        <a href="/admin/gids/index" class="btn btn-danger">Отмена</a>
    </div>

    <?php ActiveForm::end(); ?>

</div>