<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use common\models\Cities;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Услуги');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="service-category-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Создать'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            [
                'attribute' => 'id',
                'format' => 'raw',
                'contentOptions' => ['style' => ['width' => '8px', 'text-align' => 'center']]
            ],
            'name_rus',
            // 'name_kaz',
            'name_eng',            
            // 'is_popular',

            [
                'label' => 'Презантационная',
                'format' => 'raw',
                'value' => function($data){
                    if ($data->is_popular == 0) {
                        $result = "Скрытый";
                    }
                    else {
                        $result = "Для главной страницы";
                    }
                    return $result;
                },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
