<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "requirements".
 *
 * @property int $id
 * @property int $services_id
 * @property string $suit_rus
 * @property string $suit_eng
 * @property string $duration_time_rus
 * @property string $duration_time_eng
 * @property string $recommendation_rus
 * @property string $recommendation_eng
 * @property string $season_rus
 * @property string $season_eng
 * @property string $count_people_rus
 * @property string $count_people_eng
 * @property string $necessarily_rus
 * @property string $necessarily_eng
 * @property string $winter_recommend_rus
 * @property string $winter_recommend_eng
 *
 * @property Services $services
 */
class Requirements extends \yii\db\ActiveRecord
{

    public $winter;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'requirements';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['services_id'], 'required'],
            [['services_id'], 'integer'],
            [['suit_rus', 'suit_eng', 'duration_time_rus', 'duration_time_eng', 'recommendation_rus', 'recommendation_eng', 'season_rus', 'season_eng', 'count_people_rus', 'count_people_eng', 'necessarily_rus', 'necessarily_eng'], 'string', 'max' => 70],
            [['winter_recommend_rus', 'winter_recommend_eng'], 'trim'],
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
            'services_id' => Yii::t('app', 'Выберите подуслугу'),
            'suit_rus' => Yii::t('app', 'Подходит на рус'),
            'suit_eng' => Yii::t('app', 'Подходит на анг'),
            'duration_time_rus' => Yii::t('app', 'Продолжительность на рус'),
            'duration_time_eng' => Yii::t('app', 'Продолжительность на анг'),
            'recommendation_rus' => Yii::t('app', 'Рекомендации на рус'),
            'recommendation_eng' => Yii::t('app', 'Рекомендации на анг'),
            'season_rus' => Yii::t('app', 'Сезон на рус'),
            'season_eng' => Yii::t('app', 'Сезон на анг'),
            'count_people_rus' => Yii::t('app', 'Количество человек'),
            'count_people_eng' => Yii::t('app', 'Количество человек'),
            'necessarily_rus' => Yii::t('app', 'Обязательно иметь с собой на рус'),
            'necessarily_eng' => Yii::t('app', 'Обязательно иметь с собой на анг'),
            'winter_recommend_rus' => Yii::t('app', 'В зимнее время рекомендуем взять на рус'),
            'winter_recommend_eng' => Yii::t('app', 'В зимнее время рекомендуем взять на анг'),
        ];
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
     * @return RequirementsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RequirementsQuery(get_called_class());
    }

    public function getSuit()
    {
        $lang = Yii::$app->language;
        if ($lang == 'ru') {
            return $this->suit_rus;
        }
        else {
            return $this->suit_eng;
        }
    }

    public function getDuration_time()
    {
        $lang = Yii::$app->language;
        if ($lang == 'ru') {
            return $this->duration_time_rus;
        }
        else {
            return $this->duration_time_eng;
        }
    }

    public function getRecommendation()
    {
        $lang = Yii::$app->language;
        if ($lang == 'ru') {
            return $this->recommendation_rus;
        }
        else {
            return $this->recommendation_eng;
        }
    }

    public function getSeason()
    {
        $lang = Yii::$app->language;
        if ($lang == 'ru') {
            return $this->season_rus;
        }
        else {
            return $this->season_eng;
        }
    }

    public function getCount_people()
    {
        $lang = Yii::$app->language;
        if ($lang == 'ru') {
            return $this->count_people_rus;
        }
        else {
            return $this->count_people_eng;
        }
    }

    public function getNecessarily()
    {
        $lang = Yii::$app->language;
        if ($lang == 'ru') {
            return $this->necessarily_rus;
        }
        else {
            return $this->necessarily_eng;
        }
    }

    public function getWinter_recommend()
    {
        $lang = Yii::$app->language;
        if ($lang == 'ru') {
            return $this->winter_recommend_rus;
        }
        else {
            return $this->winter_recommend_eng;
        }
    }
}
