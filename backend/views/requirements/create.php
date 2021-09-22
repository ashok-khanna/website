<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Requirements */

$this->title = 'Создать';
$this->params['breadcrumbs'][] = ['label' => 'Рекомендации для пахода', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="requirements-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
