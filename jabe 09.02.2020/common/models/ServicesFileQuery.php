<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[ServicesFile]].
 *
 * @see ServicesFile
 */
class ServicesFileQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return ServicesFile[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return ServicesFile|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
