<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Requirements */

$this->title = 'Рекомендации для пахода: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Рекомендации для пахода', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="requirements-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
