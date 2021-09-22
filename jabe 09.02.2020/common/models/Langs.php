<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "langs".
 *
 * @property int $id
 * @property string $source
 * @property string $name
 *
 * @property ServiceVideo[] $serviceVideos
 */
class Langs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'langs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['source', 'name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'source' => Yii::t('app', 'Source'),
            'name' => Yii::t('app', 'Name'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServiceVideos()
    {
        return $this->hasMany(ServiceVideo::className(), ['lang_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return LangsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new LangsQuery(get_called_class());
    }
}
