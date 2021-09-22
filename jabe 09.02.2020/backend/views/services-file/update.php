<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ServicesFile */

$this->title = 'Файл для скачивание: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Файл для скачивание', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="services-file-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
