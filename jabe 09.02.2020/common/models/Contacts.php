<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "contacts".
 *
 * @property int $id
 * @property string $img
 * @property int $city_id
 * @property string $phone
 * @property string $phone_2
 * @property string $address_rus
 * @property string $address_kaz
 * @property string $address_eng
 * @property string $email
 *
 * @property Cities $city
 */
class Contacts extends \yii\db\ActiveRecord
{
    public $image, $city;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contacts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['city_id'], 'required'],
            [['city_id'], 'integer'],
            [['img', 'phone', 'phone_2', 'address_rus', 'address_eng', 'email'], 'string', 'max' => 255],
            [['email'], 'trim'],
            [['email'], 'email'],
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
            'id' => Yii::t('app', 'ID'),
            'img' => Yii::t('app', 'Картинка'),
            'city_id' => Yii::t('app', 'Выберите город'),
            'phone' => Yii::t('app', 'Тел'),
            'phone_2' => 'Тел-2',
            'address_rus' => Yii::t('app', 'Адрес на рус'),
            'address_kaz' => Yii::t('app', 'Адрес на каз'),
            'address_eng' => Yii::t('app', 'Адрес на анг'),
            'email' => Yii::t('app', 'Email'),
            'image' => 'Картинка'
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
     * @return ContactsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ContactsQuery(get_called_class());
    }

    public function getAddress()
    {
        $lang = Yii::$app->language;
        if ($lang == 'ru') {
            return $this->address_rus;
        }
        else if ($lang == 'kz') {
            return $this->address_kaz;
        }
        else {
            return $this->address_eng;
        }
    }
}
