<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\IncludedServices */

$this->title = 'Включено | Не включено: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Включено | Не включено', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="included-services-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
