<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "partners".
 *
 * @property int $id
 * @property string $file_name
 * @property string $file_size
 * @property string $file_mime
 * @property string $file_ext
 * @property string $file_path
 * @property int $is_active
 */
class Partners extends \yii\db\ActiveRecord
{
    public $image;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'partners';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // [['file_name', 'file_size', 'file_mime', 'file_ext', 'file_path'], 'string', 'max' => 255],
            ['is_active', 'integer'],
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
            // 'file_name' => Yii::t('app', 'File Name'),
            // 'file_size' => Yii::t('app', 'File Size'),
            // 'file_mime' => Yii::t('app', 'File Mime'),
            // 'file_ext' => Yii::t('app', 'File Ext'),
            // 'file_path' => Yii::t('app', 'File Path'),
            'image' => 'Картинка',
            'is_active' => 'Активный | Не активный'
        ];
    }

    /**
     * {@inheritdoc}
     * @return PartnersQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PartnersQuery(get_called_class());
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
