<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use common\models\Cities;
use common\models\Services;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Тренды';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trends-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            // 'city_id',
            [
                'label' => 'Город',
                'format' => 'raw',
                'value' => function($data) {
                    $city = Cities::find()->andWhere(['id' => $data->city_id])->one();
                    return $city->city_rus;
                },
            ],
            // 'service_id',
            [
                'label' => 'Подуслуга',
                'format' => 'raw',
                'value' => function($data) {
                    $service = Services::find()->andWhere(['id' => $data->service_id])->one();
                    return $service->name_rus;
                },
            ],

            [
                'label' => 'Активный',
                'format' => 'raw',
                'value' => function($data) {
                    if ($data->is_active == 0) {
                        $result = 'Не активный';
                    }
                    else {
                        $result = 'Активный';
                    }
                    return $result;
                },                
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
