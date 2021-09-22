<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cities".
 *
 * @property int $id
 * @property string $country_rus
 * @property string $country_kaz
 * @property string $country_eng
 * @property string $city_rus
 * @property string $city_kaz
 * @property string $city_eng
 *
 * @property Contacts[] $contacts
 * @property Gids[] $gids
 * @property Trends[] $trends
 */
class Cities extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cities';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['city_rus', 'city_eng'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'country_rus' => Yii::t('app', 'Страна на рус'),
            'country_kaz' => Yii::t('app', 'Страна на каз'),
            'country_eng' => Yii::t('app', 'Страна на анг'),
            'city_rus' => Yii::t('app', 'Город на рус'),
            'city_kaz' => Yii::t('app', 'Город на каз'),
            'city_eng' => Yii::t('app', 'Город на анг'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContacts()
    {
        return $this->hasMany(Contacts::className(), ['city_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGids()
    {
        return $this->hasMany(Gids::className(), ['city_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTrends()
    {
        return $this->hasMany(Trends::className(), ['city_id' => 'id']);
    }

    public function getCity()
    {
        $lang = Yii::$app->language;
        if ($lang == 'ru') {
            return $this->city_rus;
        }
        else {
            return $this->city_eng;
        }
    }

    public function getCountry()
    {
        $lang = Yii::$app->language;
        if ($lang == 'ru') {
            return $this->country_rus;
        }
        else {
            return $this->country_eng;
        }
    }

    /**
     * {@inheritdoc}
     * @return CitiesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CitiesQuery(get_called_class());
    }
}
