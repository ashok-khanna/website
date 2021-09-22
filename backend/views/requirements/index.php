<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use common\models\Services;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $searchModel common\models\RequirementsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Рекомендации для пахода';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="requirements-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            [
                'attribute' => 'id',
                'format' => 'raw',
                'contentOptions' => ['style' => ['width' => '8px', 'text-align' => 'center']]
            ],
            // 'services_id',
            [
                'attribute'=>'services_id',
                'filter'=>ArrayHelper::map(Services::find()->asArray()->all(), 'id', 'name_rus'),
                'value'=>function($data) {
                    if (!is_null($data)) {
                        $name = Services::find()->andWhere(['id' => $data->services_id])->one();
                        if (!empty($name))
                            return wordwrap($name->name_rus,30,'<br>');
                        else
                            return $data->services_id;
                    }
                    return "";
                }
            ],
            'suit_rus',
            // 'suit_kaz',
            'suit_eng',
            //'duration_time_rus',
            //'duration_time_kaz',
            //'duration_time_eng',
            //'recommendation_rus',
            //'recommendation_kaz',
            //'recommendation_eng',
            //'season_rus',
            //'season_kaz',
            //'season_eng',
            //'count_people_rus',
            //'count_people_kaz',
            //'count_people_eng',
            //'necessarily_rus',
            //'necessarily_kaz',
            //'necessarily_eng',
            //'winter_recommend_rus',
            //'winter_recommend_kaz',
            //'winter_recommend_eng',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
