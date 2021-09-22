<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Langs;
use common\models\Services;
/* @var $this yii\web\View */
/* @var $model common\models\ServiceVideo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="service-video-form">

    <?php $form = ActiveForm::begin();
        $langs=Langs::find()->all();
        $listLang=ArrayHelper::map($langs,'id','name');

        $services=Services::find()->all();
        $listServices=ArrayHelper::map($services,'id','name_rus');

        $model->lang_id = null;
        $model->services_id = null;
    ?>

    <?= $form->field($model, 'lang_id')->dropDownList($listLang,['prompt'=>'Select...']) ?>

    <?= $form->field($model, 'services_id')->dropDownList($listServices,['prompt'=>'Select...']) ?>

    <?= $form->field($model, 'video')->fileInput() ?>

    <?= $form->field($model, 'video_link')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-success']) ?>
        <a href="/admin/service-video/index" class="btn btn-danger">Отмена</a>
    </div>

    <?php ActiveForm::end(); ?>

</div>
