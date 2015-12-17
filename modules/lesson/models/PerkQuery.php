<?php

namespace app\modules\lesson\models;

/**
 * This is the ActiveQuery class for [[Perk]].
 *
 * @see Perk
 */
class PerkQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Perk[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Perk|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}