<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "included_services".
 *
 * @property int $id
 * @property int $services_id
 * @property string $not_included
 * @property string $included
 * @property string $not_included_trim
 * @property string $included_trim
 * 
 *
 * @property Services $services
 */
class IncludedServices extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'included_services';
    }

    public $not_included_trim;
    public $included_trim;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['services_id'], 'required'],
            ['services_id', 'integer'],
            [['not_included', 'included'], 'string'],
            [['not_included_trim', 'included_trim'], 'string'],        
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
            'services_id' => Yii::t('app', 'Выберите Подуслугу'),
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
     * @return IncludedServicesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new IncludedServicesQuery(get_called_class());
    }
}
