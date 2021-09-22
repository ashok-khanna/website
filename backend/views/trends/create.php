<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Trends */

$this->title = 'Создать';
$this->params['breadcrumbs'][] = ['label' => 'Тренды', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trends-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
