<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "service_video".
 *
 * @property int $id
 * @property int $lang_id
 * @property int $services_id
 * @property string $file_name
 * @property string $file_size
 * @property string $file_mime
 * @property string $file_ext
 * @property string $file_path
 * @property string $video_link
 *
 * @property Langs $lang
 * @property Services $services
 */
class ServiceVideo extends \yii\db\ActiveRecord
{
    public $video;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'service_video';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lang_id', 'services_id'], 'integer'],
            [['video_link'], 'string', 'max' => 255],
            [['video'], 'file', 'skipOnEmpty' => true, 'extensions' => 'avi, mp4, mov', 'on' => 'create'],
            [['video'], 'file', 'extensions' => 'avi, mp4, mov', 'on' => 'update'],
            [['lang_id'], 'exist', 'skipOnError' => true, 'targetClass' => Langs::className(), 'targetAttribute' => ['lang_id' => 'id']],
            [['services_id'], 'exist', 'skipOnError' => true, 'targetClass' => Services::className(), 'targetAttribute' => ['services_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'lang_id' => Yii::t('app', 'Выберите язык'),
            'services_id' => Yii::t('app', 'Выберите подуслугу'),
            'video' => 'Загрузить Видео',
            'video_link' => Yii::t('app', 'Ссылка для видео'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLang()
    {
        return $this->hasOne(Langs::className(), ['id' => 'lang_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServices()
    {
        return $this->hasOne(Services::className(), ['id' => 'services_id']);
    }

    /**
     * {@inheritdoc}
     * @return ServiceVideoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ServiceVideoQuery(get_called_class());
    }

    public function videoUrl($path)
    {
        if ($this->validate()) {
            $saveDir = Yii::getAlias('@frontend/web/uploads/');

            if(!file_exists($saveDir)){
                mkdir($saveDir, 0775, true);
            }
            
            $url = '/uploads/' . $path;
            return $url;
        } else {
            return false;
        }
    }
}
