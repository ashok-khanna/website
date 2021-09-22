<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "feedback".
 *
 * @property int $id
 * @property int $services_id
 * @property string $name_rus
 * @property string $name_kaz
 * @property string $name_eng
 * @property string $coment_rus
 * @property string $coment_kaz
 * @property string $coment_eng
 *
 * @property Services $services
 */
class Feedback extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'feedback';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['services_id'], 'required'],
            [['services_id'], 'integer'],
            [['coment_rus', 'coment_eng'], 'string'],
            [['name_rus', 'name_eng'], 'string', 'max' => 255],
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
            'name_rus' => Yii::t('app', 'Имя на рус'),
            'name_kaz' => Yii::t('app', 'Имя на каз'),
            'name_eng' => Yii::t('app', 'Имя на анг'),
            'coment_rus' => Yii::t('app', 'Коментарий на рус'),
            'coment_kaz' => Yii::t('app', 'Коментарий на каз'),
            'coment_eng' => Yii::t('app', 'Коментарий на анг'),
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
     * @return FeedbackQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FeedbackQuery(get_called_class());
    }

    public function getComment()
    {
        $lang = Yii::$app->language;
        if ($lang == 'ru') {
            return $this->coment_rus;
        }
        else if ($lang == 'kz') {
            return $this->coment_kaz;
        }
        else {
            return $this->coment_eng;
        }
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
