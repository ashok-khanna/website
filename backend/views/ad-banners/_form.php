<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\AdBanners */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ad-banners-form">

    <?php $form = ActiveForm::begin();
      $arr = ['main' => 'Главная', 'service_category' => 'Услуги', 'services' => 'Подуслуги', 'news' => 'Статьи'];
    ?>

    <?= $form->field($model, 'page_name')->dropDownList($arr,['prompt'=>'Select...']) ?>

    <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'img')->fileInput(['onchange' => 'readURL(this,"#img_1");']) ?>
    <?php if ($model->page_name != null): ?>
      <?php if($model->page_name == 'main'): ?>
        <p id="img_size">Размер картинки 240х240</p>
      <?php elseif($model->page_name == 'service_category'): ?>
        <p id="img_size">Размер картинки 250х250</p>
      <?php elseif($model->page_name == 'services'): ?>
        <p id="img_size">Размер картинки 270х270</p>
      <?php elseif($model->page_name == 'news'): ?>
        <p id="img_size">Размер картинки 280х280</p>
      <?php endif ?>
    <?php endif; ?>    

    <?= $form->field($model, 'is_active')->checkbox(['id' => 'is_active'])?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-success']) ?>
        <a href="/admin/ad-banners/index" class="btn btn-danger">Отмена</a>
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