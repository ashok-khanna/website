<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Cities;
/* @var $this yii\web\View */
/* @var $model common\models\CityPhotos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="city-photos-form">

    <style>
    .fade {
        opacity: 1;
    }
    </style>
    <br>
    <?php $form = ActiveForm::begin();
      $cities=Cities::find()->all();
      $listCities=ArrayHelper::map($cities,'id','city_rus');
    ?>    

    <?= $form->field($model, 'city_id')->dropDownList($listCities,['prompt'=>'Select...']) ?>

    <img id="img_1" src="<?=$model->img?>" style="width: 250px; height: 250px;" />
    <?= $form->field($model, 'image')->fileInput(['onchange' => 'readURL(this,"#img_1");']) ?>
    
    <div class="form-group">
      <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-success']) ?>
      <a href="/admin/city-photos/index" class="btn btn-danger">Отмена</a>
    </div>
    <?php ActiveForm::end(); ?>

</div>
<script>

$(document).ready(function () {
  if ($('#img_1').attr('src') == '') {
    $('#img_1').css('display', 'none');
  }
});
function readURL(input, img) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $(img).css('display', 'block');
      $(img)
        .attr('src', e.target.result);
    };
    reader.readAsDataURL(input.files[0]);
  }
}

</script>