<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\AdBanners */

$this->title = Yii::t('app', 'Рекламные баннеры: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Рекламные баннеры'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Изменить');
?>
<div class="ad-banners-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
