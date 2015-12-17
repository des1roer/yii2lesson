<?php

namespace app\modules\lesson\models;

/**
 * This is the ActiveQuery class for [[Workerperk]].
 *
 * @see Workerperk
 */
class WorkerperkQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Workerperk[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Workerperk|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}