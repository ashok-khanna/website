<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[IncludedServices]].
 *
 * @see IncludedServices
 */
class IncludedServicesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return IncludedServices[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return IncludedServices|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
