<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "service_category".
 *
 * @property int $id
 * @property int $is_popular
 * @property string $name_rus
 * @property string $name_kaz
 * @property string $name_eng
 * @property string $header_rus
 * @property string $header_kaz
 * @property string $header_eng
 * @property string $video_name
 * @property string $video_size
 * @property string $video_mime
 * @property string $video_ext
 * @property string $video_path
 * @property string $video_link
 * @property string $cities
 */
class ServiceCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'service_category';
    }

    public $sub_tours;
    public $video;
    public $headerEng, $headerRus, $arr_cities;
    public $sub_header;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_rus', 'name_eng','header_rus', 'header_eng', 'video_link'], 'string', 'max' => 255],
            ['is_popular', 'integer'],
            [['video'], 'file', 'skipOnEmpty' => true, 'extensions' => 'avi, mp4, mov', 'on' => 'create'],
            [['video'], 'file', 'extensions' => 'avi, mp4, mov', 'on' => 'update'],
            [['headerEng', 'headerRus', 'arr_cities'], 'trim'],
            ['cities', 'string']
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
            'name_eng' => 'Название на анг',
            'header_rus' => 'Подзаголовок',
            'header_eng' => 'Подзаголовок',
            'is_popular' => 'Это услуга должна показываться на главной странице',
            'headerEng' => 'Заголовок для подуслуг (eng)',
            'headerRus' => 'Заголовок для подуслуг (rus)',
            'video' => 'Загрузить Видео',
            'arr_cities' => Yii::t('app', 'Выберите город'),
            'video_link' => Yii::t('app', 'Ссылка для видео'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return ServiceCategoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ServiceCategoryQuery(get_called_class());
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

    public function getHeader()
    {
        $lang = Yii::$app->language;
        if ($lang == 'ru') {
            return $this->header_rus;
        }
        else {
            return $this->header_eng;
        }
    }

    public function convertHash()
    {
        $arr_city = $this->arr_cities;
        $heng = $this->headerEng;
        $hrus = $this->headerRus;
        $items = array();
        $dict = [];
        $counter = 0;
        foreach ($arr_city as $city) {
            $dict['city'] = $city;
            $dict['heng'] = $heng[$counter];
            $dict['hrus'] = $hrus[$counter];
            $counter++;
            array_push($items, $dict);
        }
        return json_encode($items);
    }

    public function renegateHash()
    {
        $arr_city = json_decode($this->cities);        
        $heng_arr = array();
        $hrus_arr = array();
        $city_arr = array();
        if ($arr_city != null) {
            foreach ($arr_city as $city) {
                array_push($heng_arr, $city->heng);
                array_push($hrus_arr, $city->hrus);
                array_push($city_arr, $city->city);
            }
        }          
        $this->arr_cities = $city_arr;
        $this->headerRus = $hrus_arr;
        $this->headerEng = $heng_arr;
    }
}
