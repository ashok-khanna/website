<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\IncludedServices */

$this->title = 'Создать';
$this->params['breadcrumbs'][] = ['label' => 'Включено | Не включено', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="included-services-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
