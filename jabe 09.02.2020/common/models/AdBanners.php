<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ad_banners".
 *
 * @property int $id
 * @property string $link
 * @property string $file_name
 * @property string $file_size
 * @property string $file_mime
 * @property string $file_ext
 * @property string $file_path
 * @property string $page_name
 * @property int $is_active
 */
class AdBanners extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ad_banners';
    }

    public $img;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['link'], 'string', 'max' => 255],
            [['page_name'], 'required'],
            [['page_name'], 'string'],
            [['img'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, gif', 'on' => 'create'],
            [['img'], 'file', 'extensions' => 'png, jpg, gif', 'on' => 'update'],
            ['is_active', 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'link' => 'Link',
            'img' => 'Картинка',
            'file_path' => 'Путь к файлу',
            'is_active' => 'Активный | Не активный'
        ];
    }

    /**
     * {@inheritdoc}
     * @return AdBannersQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AdBannersQuery(get_called_class());
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
