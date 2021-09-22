<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Рекламные баннеры');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ad-banners-index">

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
            // 'link',
            [
                'label' => 'Ссылка',
                'format' => 'raw',
                'value' => function($data) {
                    return '<a href='.$data->link.'>'.$data->link.'</a>';
                },
                'contentOptions' => ['style' => ['width' => '100px', 'text-align' => 'center']]
            ],            
            // 'file_name',
            // 'file_size',
            // 'file_mime',
            //'file_ext',
            // 'file_path',
            [
                'label' => 'Картинка',
                'format' => 'raw',
                'value' => function($data){
                    return Html::img(Yii::getAlias('').$data->file_path,[
                        'alt'=>'yii2 - картинка в gridview',
                        'style' => 'width:150px; height:150px;'
                    ]);
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

             [
                'label' => 'Страница',
                'format' => 'raw',
                'value' => function($data){
                    if ($data->page_name == 'main') {
                        $result = "Главная";
                    }
                    else if ($data->page_name == 'service_category') {
                        $result = "Услуги";
                    }
                    else if ($data->page_name == 'services') {
                        $result = "Подуслуги";
                    }
                    else if ($data->page_name == 'news') {
                        $result = "Jabe Журнал";
                    }
                    else {
                        $result = "нет";
                    }
                    return $result;
                },
            ],

            // 'page_name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
