<?php

namespace app\modules\lesson\models;

use Yii;

/**
 * This is the model class for table "perk".
 *
 * @property integer $id
 * @property string $name
 *
 * @property WorkerHasPerk[] $workerHasPerks
 */
class Perk extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'perk';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWorkerHasPerks()
    {
        return $this->hasMany(WorkerHasPerk::className(), ['perk_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return PerkQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PerkQuery(get_called_class());
    }
}
