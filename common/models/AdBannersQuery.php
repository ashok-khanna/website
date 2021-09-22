<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[AdBanners]].
 *
 * @see AdBanners
 */
class AdBannersQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
    return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return AdBanners[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return AdBanners|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
