<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Gids */

$this->title = 'Создать';
$this->params['breadcrumbs'][] = ['label' => 'Гиды', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gids-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
