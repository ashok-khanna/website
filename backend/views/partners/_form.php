<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Partners */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="partners-form">

    <?php $form = ActiveForm::begin(); ?>

    <img id="img_1" src="<?=$model->file_path?>" style="width: 279px; height: 166px" />
    <?= $form->field($model, 'image')->fileInput(['onchange' => 'readURL(this,"#img_1");']) ?>

    <?= $form->field($model, 'is_active')->checkbox(['id' => 'is_active'])?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-success']) ?>
        <a href="/admin/partners/index" class="btn btn-danger">Отмена</a>
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