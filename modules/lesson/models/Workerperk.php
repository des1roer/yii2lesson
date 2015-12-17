<?php

namespace app\modules\lesson\models;

use Yii;

/**
 * This is the model class for table "worker_has_perk".
 *
 * @property integer $id
 * @property integer $worker_id
 * @property integer $perk_id
 *
 * @property Perk $perk
 * @property Worker $worker
 */
class Workerperk extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'worker_has_perk';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['worker_id', 'perk_id'], 'required'],
            [['worker_id', 'perk_id'], 'integer'],
            [['worker_id', 'perk_id'], 'unique', 'targetAttribute' => ['worker_id', 'perk_id'], 'message' => 'The combination of Worker ID and Perk ID has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'worker_id' => 'Worker ID',
            'perk_id' => 'Perk ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerk()
    {
        return $this->hasOne(Perk::className(), ['id' => 'perk_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWorker()
    {
        return $this->hasOne(Worker::className(), ['id' => 'worker_id']);
    }

    /**
     * @inheritdoc
     * @return WorkerperkQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new WorkerperkQuery(get_called_class());
    }
}
