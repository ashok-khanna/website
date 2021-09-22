<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Cities;
use common\models\Services;
/* @var $this yii\web\View */
/* @var $model common\models\Trends */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="trends-form">

    <?php $form = ActiveForm::begin();
        $cities=Cities::find()->all();
        $listCities=ArrayHelper::map($cities,'id','city_rus');

        $services=Services::find()->all();
        $listServices=ArrayHelper::map($services,'id','name_rus');
        
        $model->service_id = null;
        // $model->city_id = null;
    ?>

    <?= $form->field($model, 'city_id')->dropDownList($listCities,['prompt'=>'Select...']) ?>

    <?= $form->field($model, 'service_id')->dropDownList($listServices,['prompt'=>'Select...']) ?>

    <?= $form->field($model, 'header_rus')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'header_eng')->textInput(['maxlength' => true]) ?>
    
    <img id="img_1" src="" style="width: 250px; height: 250px; display: none;" />
    <div id="img_content" style="display: none;" data-id="<?=$model->img?>"></div>
    <?= $form->field($model, 'image')->fileInput(['onchange' => 'readURL(this,"#img_1");']) ?>

    <?= $form->field($model, 'is_active')->checkbox(['id' => 'is_active'])?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        <a href="/admin/trends/index" class="btn btn-danger">Отмена</a>
    </div>

    <?php ActiveForm::end(); ?>

</div>
