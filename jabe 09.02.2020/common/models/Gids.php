<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "gids".
 *
 * @property int $id
 * @property int $city_id
 * @property string $lang
 * @property string $name_rus
 * @property string $name_kaz
 * @property string $name_eng
 * @property double $rating
 * @property string $img_sad
 * @property string $img_smile
 *
 * @property Cities $city
 */
class Gids extends \yii\db\ActiveRecord
{
    public $image_sad, $image_smile, $langs;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gids';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['city_id'], 'required'],
            [['city_id'], 'integer'],
            [['rating'], 'number'],
            [['lang', 'name_rus', 'name_eng', 'img_sad', 'img_smile'], 'string', 'max' => 255],
            [['city_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cities::className(), 'targetAttribute' => ['city_id' => 'id']],
            [['langs'], 'trim'],
            [['image_sad'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png', 'on' => 'create'],
            [['image_sad'], 'file', 'extensions' => 'png', 'on' => 'update'],
            [['image_smile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png', 'on' => 'create'],
            [['image_smile'], 'file', 'extensions' => 'png', 'on' => 'update'],
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
            'lang' => Yii::t('app', 'Языки'),
            'name_rus' => Yii::t('app', 'Имя на рус'),
            'name_kaz' => Yii::t('app', 'Имя на каз'),
            'name_eng' => Yii::t('app', 'Имя на анг'),
            'rating' => Yii::t('app', 'Рейтинг'),
            'img_sad' => Yii::t('app', 'Картинка деловой'),
            'img_smile' => Yii::t('app', 'Картинка дурашливый'),
            'image_sad' => 'Картинка деловой',
            'image_smile' => 'Картинка дурашливый',
        ];
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(Cities::className(), ['id' => 'city_id']);
    }

    /**
     * {@inheritdoc}
     * @return GidsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new GidsQuery(get_called_class());
    }

    public function getName()
    {
        $lang = Yii::$app->language;
        if ($lang == 'ru') {
            return $this->name_rus;
        }
        else if ($lang == 'kz') {
            return $this->name_kaz;
        }
        else {
            return $this->name_eng;
        }
    }
}
