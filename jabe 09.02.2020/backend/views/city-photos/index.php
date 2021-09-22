<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use common\models\Cities;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Баннеры городов');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="city-photos-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Создать'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            [
                'attribute' => 'id',
                'format' => 'raw',
                'contentOptions' => ['style' => ['width' => '8px', 'text-align' => 'center']]
            ],
            // 'img',
            // 'name_rus',
            // 'name_kaz',
            // 'name_eng',
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
            [
                'label' => 'Картинка',
                'format' => 'raw',
                'value' => function($data){
                    return Html::img(Yii::getAlias('').$data->img,[
                        'alt'=>'yii2 - картинка в gridview',
                        'style' => ['width:150px; height:150px;']
                    ]);
                },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
