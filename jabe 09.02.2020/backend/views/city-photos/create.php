<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CityPhotos */

$this->title = Yii::t('app', 'Создать');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Баннеры городов'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="city-photos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
