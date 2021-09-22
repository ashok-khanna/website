<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[Trends]].
 *
 * @see Trends
 */
class TrendsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Trends[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Trends|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

}
