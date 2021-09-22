<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\ServicesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Подуслуги');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="services-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Создать'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            [
                'attribute' => 'id',
                'format' => 'raw',
                'contentOptions' => ['style' => ['width' => '8px', 'text-align' => 'center']]
            ],
            'name_rus',
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
            [
                'label' => 'Картинка',
                'format' => 'raw',
                'value' => function($data){
                    $results = json_decode($data->photos);
                    $data = '';
                    $data .= '<div>';
                    foreach ($results as $result) {
                        $data .= Html::img($result,[
                            'alt'=>'yii2 - картинка в gridview',
                            'style' => ['width:150px; height:150px;']
                        ]);
                        // $data .= '<br>';
                    }        
                    $data .= '</div>';
                    return $data;
                },
            ],
            // 'name_kaz',
            // 'name_eng',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
