<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "services_file".
 *
 * @property int $id
 * @property int $lang_id
 * @property string $file_name
 * @property string $file_size
 * @property string $file_mime
 * @property string $file_ext
 * @property string $file_path
 *
 * @property Langs $lang
 */
class ServicesFile extends \yii\db\ActiveRecord
{
    public $file;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'services_file';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lang_id'], 'integer'],
            [['lang_id'], 'exist', 'skipOnError' => true, 'targetClass' => Langs::className(), 'targetAttribute' => ['lang_id' => 'id']],
            [['file'], 'file', 'skipOnEmpty' => false, 'extensions' => 'pdf', 'on' => 'create'],
            [['file'], 'file', 'extensions' => 'pdf', 'on' => 'update'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'lang_id' => Yii::t('app', 'Выберите Язык'),
            'file_name' => Yii::t('app', 'File Name'),
            'file_size' => Yii::t('app', 'File Size'),
            'file_mime' => Yii::t('app', 'File Mime'),
            'file_ext' => Yii::t('app', 'File Ext'),
            'file_path' => Yii::t('app', 'File Path'),
            'file' => 'Загрузите файл'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLang()
    {
        return $this->hasOne(Langs::className(), ['id' => 'lang_id']);
    }

    /**
     * {@inheritdoc}
     * @return ServicesFileQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ServicesFileQuery(get_called_class());
    }
}
