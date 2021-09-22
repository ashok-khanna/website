<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property string $name_rus
 * @property string $name_kaz
 * @property string $name_eng
 * @property string $img
 * @property string $body_rus
 * @property string $body_kaz
 * @property string $body_eng
 * @property string $category_news
 * @property int $date
 * @property int $is_active
 */
class News extends \yii\db\ActiveRecord
{
    public $image;    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['body_rus', 'body_eng'], 'string'],
            [['date','category_news'], 'required'],
            [['date', 'category_news'], 'string'],
            [['name_rus', 'name_eng', 'img'], 'string', 'max' => 50],
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
            'name_rus' => Yii::t('app', 'Заголовок на рус'),
            'name_kaz' => Yii::t('app', 'Заголовок на каз'),
            'name_eng' => Yii::t('app', 'Заголовок на анг'),
            'img' => Yii::t('app', 'Картинка'),
            'body_rus' => Yii::t('app', 'Описание на рус'),
            'body_kaz' => Yii::t('app', 'Описание на каз'),
            'body_eng' => Yii::t('app', 'Описание на анг'),
            'date' => Yii::t('app', 'Дата'),
            'is_active' => 'Активный | Не активный'
        ];
    }

    public function imageUrl($path)
    {
        if ($this->validate()) {
            $saveDir = Yii::getAlias('@frontend/web/uploads/');

            if(!file_exists($saveDir)) {
                mkdir($saveDir, 0775, true);
            }
            
            $url = '/uploads/' . $path;
            return $url;
        } else {
            return false;
        }
    }

    public function getName() {
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

    public function getBody() {
        $lang = Yii::$app->language;
        if ($lang == 'ru') {
            return $this->body_rus;
        }
        else if ($lang == 'kz') {
            return $this->body_kaz;
        }
        else {
            return $this->body_eng;
        }
    }

    /**
     * {@inheritdoc}
     * @return NewsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new NewsQuery(get_called_class());
    }
}
