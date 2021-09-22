<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use common\models\Services;
/* @var $this yii\web\View */
/* @var $searchModel common\models\IncludedServicesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Включено | Не включено';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="included-services-index">

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
            // 'gid',
            // 'eco',
            // 'transfer',
            //'selfie',
            //'eat',
            //'cafe',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
