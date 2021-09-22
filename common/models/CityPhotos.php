<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "city_photos".
 *
 * @property int $id
 * @property string $img
 * @property string $name_rus
 * @property string $name_kaz
 * @property string $name_eng
 * 
 * @property Cities $city
 */
class CityPhotos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'city_photos';
    }

    public $image;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['city_id'], 'required'],
            [['city_id'], 'integer'],
            [['img'], 'string', 'max' => 255],
            [['city_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cities::className(), 'targetAttribute' => ['city_id' => 'id']],            
            [['image'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, gif', 'on' => 'create'],
            [['image'], 'file', 'extensions' => 'png, jpg, gif', 'on' => 'update'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'img' => 'Картинка',
            'name_rus' => 'Названия города на рус',
            'name_kaz' => 'Названия города на каз',
            'name_eng' => 'Названия города на анг',
            'image' => 'Картинка'
        ];
    }

    /**
     * {@inheritdoc}
     * @return CityPhotosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CityPhotosQuery(get_called_class());
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(Cities::className(), ['id' => 'city_id']);
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
}
