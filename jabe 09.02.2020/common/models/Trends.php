<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "trends".
 *
 * @property int $id
 * @property int $city_id
 * @property int $service_id
 * @property string $header_rus
 * @property string $header_eng
 *
 * @property Cities $city
 * @property Services $service
 * @property int $is_active
 */
class Trends extends \yii\db\ActiveRecord
{

    public $image;       
    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'trends';
    }
        
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['city_id', 'service_id'], 'required'],
            [['city_id', 'service_id'], 'integer'],
            [['city_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cities::className(), 'targetAttribute' => ['city_id' => 'id']],
            [['header_rus', 'header_eng', 'img'], 'string', 'max' => 255],
            [['service_id'], 'exist', 'skipOnError' => true, 'targetClass' => Services::className(), 'targetAttribute' => ['service_id' => 'id']],
            [['image'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, gif', 'on' => 'create'],
            [['image'], 'file', 'extensions' => 'png, jpg, gif', 'on' => 'update'],
            ['is_active', 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'city_id' => Yii::t('app', 'Выберите город'),
            'service_id' => Yii::t('app', 'Выберите подуслугу'),
            'header_rus' => 'Заголовок для города (rus)',
            'header_eng' => 'Заголовок для города (eng)',
            'is_active' => 'Активный | Не активный'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(Cities::className(), ['id' => 'city_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getService()
    {
        return $this->hasOne(Services::className(), ['id' => 'service_id']);
    }

    /**
     * {@inheritdoc}
     * @return TrendsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TrendsQuery(get_called_class());
    }

    public function imageUrl($path)
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

    public function getHeader()
    {
        $lang = Yii::$app->language;
        if ($lang == 'eng') {
            return $this->header_eng;
        }
        else {
            return $this->header_rus;
        }
    }
}
