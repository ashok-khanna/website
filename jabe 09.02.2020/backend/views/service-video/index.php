<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use common\models\Services;
use common\models\Langs;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Видео для услуги');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="service-video-index">

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
            // 'lang_id',
            [
                'attribute'=>'lang_id',
                'filter'=>ArrayHelper::map(Langs::find()->asArray()->all(), 'id', 'name'),
                'value'=>function($data) {
                    if (!is_null($data)) {
                        $name = Langs::find()->andWhere(['id' => $data->lang_id])->one();
                        if (!empty($name))
                            return wordwrap($name->name,30,'<br>');
                        else
                            return $data->lang_id;
                    }
                    return "";
                }
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
            // 'file_name',
            // 'file_size',
            //'file_mime',
            //'file_ext',
            //'file_path',
            [
                'label' => 'Видео',
                'format' => 'raw',
                'value' => function($data){
                    return '<video style="width: 300px; height: 300px;" controls="controls"><source src="'.$data->file_path.'"></video>';
                },
            ],
            //'video_link',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
