<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[ServiceVideo]].
 *
 * @see ServiceVideo
 */
class ServiceVideoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return ServiceVideo[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return ServiceVideo|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
