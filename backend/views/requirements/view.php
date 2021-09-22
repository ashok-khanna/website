<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Requirements */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Рекомендации для пахода', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="requirements-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'services_id',
            'suit_rus',
            // 'suit_kaz',
            'suit_eng',
            'duration_time_rus',
            // 'duration_time_kaz',
            'duration_time_eng',
            'recommendation_rus',
            // 'recommendation_kaz',
            'recommendation_eng',
            'season_rus',
            // 'season_kaz',
            'season_eng',
            'count_people_rus',
            // 'count_people_kaz',
            'count_people_eng',
            'necessarily_rus',
            // 'necessarily_kaz',
            'necessarily_eng',
            'winter_recommend_rus',
            // 'winter_recommend_kaz',
            'winter_recommend_eng',
        ],
    ]) ?>

</div>
