<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ServicesFile */

$this->title = 'Создать';
$this->params['breadcrumbs'][] = ['label' => 'Файл для скачивание', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="services-file-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
