<?php

namespace app\modules\lesson\models;

use Yii;

/**
 * This is the model class for table "dep".
 *
 * @property integer $id
 * @property string $name
 *
 * @property Worker[] $workers
 */
class Dep extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dep';
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
    public function getWorkers()
    {
        return $this->hasMany(Worker::className(), ['dep_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return DepQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DepQuery(get_called_class());
    }
}
