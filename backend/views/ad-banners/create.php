<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\AdBanners */

$this->title = Yii::t('app', 'Рекламные баннеры');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Рекламные баннеры'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ad-banners-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
