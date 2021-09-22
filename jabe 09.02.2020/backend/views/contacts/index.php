<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use common\models\Cities;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Контакты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contacts-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать', ['create'], ['class' => 'btn btn-success']) ?>
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
            'phone',
            'address_rus',
            //'address_kaz',
            //'address_eng',
            //'email:email',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
