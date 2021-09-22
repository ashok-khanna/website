<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use common\models\Cities;
/* @var $this yii\web\View */
/* @var $searchModel common\models\GidsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Гиды';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gids-index">

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
            // 'city_id',
            [
                'attribute'=>'city_id',
                'filter'=>ArrayHelper::map(Cities::find()->asArray()->all(), 'id', 'city_rus'),
                'value'=>function($data) {
                    if (!is_null($data)) {
                        $name = Cities::find()->andWhere(['id' => $data->city_id])->one();
                        if (!empty($name))
                            return wordwrap($name->city_rus,30,'<br>');
                        else
                            return $data->city_id;
                    }
                    return "";
                }
            ],
            'lang',
            'name_rus',
            // 'name_kaz',
            //'name_eng',
            //'rating',
            //'img_sad',
            //'img_smile',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
