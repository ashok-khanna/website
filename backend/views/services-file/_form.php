<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Langs;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model common\models\ServicesFile */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="services-file-form">

    <?php $form = ActiveForm::begin(); 
        $langs=Langs::find()->all();
        $listLangs=ArrayHelper::map($langs,'id','name');
        $model->lang_id = null;
    ?>

    <?= $form->field($model, 'lang_id')->dropDownList($listLangs,['prompt'=>'Select...']) ?>

    <?= $form->field($model, 'file')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        <a href="/admin/services-file/index" class="btn btn-danger">Отмена</a>
    </div>

    <?php ActiveForm::end(); ?>

</div>
