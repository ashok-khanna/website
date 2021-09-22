<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[CityPhotos]].
 *
 * @see CityPhotos
 */
class CityPhotosQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return CityPhotos[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return CityPhotos|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
