<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "services".
 *
 * @property int $id
 * @property string $name_rus
 * @property string $name_eng
 * @property string $cost
 * @property string $rating
 * @property string $body_rus
 * @property string $body_eng
 * @property string $has_tags
 * @property string $photos
 * @property int $prepayment
 * @property int $category_id
 * @property int $city_id
 */
class Services extends \yii\db\ActiveRecord
{    
    public $image;
    public $images;
    public $hash_tag;
    public $link;
    public $video;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'services';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['body_rus', 'body_eng', 'photos'], 'string'],
            [['link', 'hash_tag'], 'trim'],
            [['cost', 'rating', 'prepayment', 'category_id'], 'integer'],
            ['rating', 'integer', 'max' => 5],
            [['name_rus', 'name_eng', 'has_tags'], 'string', 'max' => 255],            
            [['image'], 'image', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, jpeg, gif', 'on' => 'create'],
            [['image'], 'image', 'extensions' => 'png, jpg, jpeg, gif', 'on' => 'update'],
            [['images'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, jpeg, gif', 'maxFiles' => 4, 'on' => 'create'],
            [['images'], 'file', 'extensions' => 'png, jpg, jpeg, gif', 'maxFiles' => 4, 'on' => 'update'],
            [['city_id'], 'required'],
            [['city_id'], 'integer'],
            [['city_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cities::className(), 'targetAttribute' => ['city_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name_rus' => 'Название на рус',
            'name_kaz' => 'Название на каз',
            'name_eng' => 'Название на анг',
            'body_rus' => 'Описание на рус',
            'body_kaz' => 'Описание на каз',
            'body_eng' => 'Описание на анг',
            'video' => 'Видео',
            'video_link' => 'Видео ссылка',
            'image' => 'Фоновая картинка',
            'images' => 'Фотографий',
            'cost' => 'Цена',
            'rating' => 'Рейтинг',
            'has_tags' => 'Хэштэги',   
            'hash_tag' => 'Хэштэг',
            'link' => 'Ссылка',
            'prepayment' => 'Предоплата',
            'category_id' => 'Выберите категорию',
            'city_id' => 'Выберите город'      
            // 'video' => 'Загрузить видео'
        ];
    }

    /**
     * {@inheritdoc}
     * @return ServicesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ServicesQuery(get_called_class());
    }

    public function saveImg()
    {
        if ($this->validate()) {
            $saveDir = Yii::getAlias('@frontend/web/uploads/');
            $dir = Yii::getAlias('@frontend/web');
            if(!file_exists($saveDir)){
                mkdir($saveDir, 0775, true);
            }
            $time = strtotime(date('Y-m-d H:i:s'));
            $photos = array();
            foreach ($this->images as $file) {
                $path = '/uploads/' . $file->baseName .'_'. $time . '.' . $file->extension;
                array_push($photos, $path);
            }
            $this->photos = json_encode($photos);
            return true;
        }
        return false;
    }

    public function upload()
    {
        
            $dir = Yii::getAlias('@frontend/web');            
            $photos = json_decode($this->photos);
            $counter = 0;
            foreach ($this->images as $file) {                
                $file->saveAs($dir . $photos[$counter]);
                $counter++;
            }
            return true;
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

    public function convertHash()
    {
        $hashs = $this->hash_tag;
        $link = $this->link;
        $items = array();
        $dict = [];
        $counter = 0;
        foreach ($hashs as $hash) {
            $dict['hash'] = $hash;
            $dict['link'] = $link[$counter];
            $counter++;
            array_push($items, $dict);
        }
        return json_encode($items);
    }

    public function renegateHash()
    {
        $hashs = json_decode($this->has_tags);        
        $hash_arr = array();
        $link_arr = array();
        if ($hashs != null) {
            foreach ($hashs as $hash) {
                array_push($hash_arr, $hash->hash);
                array_push($link_arr, $hash->link);
            }
        }          
        $this->hash_tag = $hash_arr;
        $this->link = $link_arr;
    }

    public function getName()
    {
        $lang = Yii::$app->language;
        if ($lang == 'ru') {
            return $this->name_rus;
        }
        else {
            return $this->name_eng;
        }
    }

    public function getBody()
    {
        $lang = Yii::$app->language;
        if ($lang == 'ru') {
            return $this->body_rus;
        }
        else {
            return $this->body_eng;
        }
    }    
}
