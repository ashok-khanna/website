<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Gids */

$this->title = 'Гиды: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Гиды', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="gids-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
