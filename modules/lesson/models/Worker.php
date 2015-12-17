<?php

namespace app\modules\lesson\models;
use yii\helpers\Html;
use Yii;
/**
 * This is the model class for table "worker".
 *
 * @property integer $id
 * @property string $name
 * @property integer $dep_id
 * @property string $img
 *
 * @property Dep $dep
 * @property WorkerHasPerk[] $workerHasPerks
 */
class Worker extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'worker';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'dep_id'], 'required'],
            [['name'], 'string'],
            [['img'], 'file'],
            [['dep_id'], 'integer'],
            [['perks_list'], 'safe'],
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
            'dep_id' => 'Dep ID',
            'img' => 'Img',           
        ];
    }

    public function getMyperks()
    {
        $perks = $this->perks;
        for($i = 0; $i <= count($perks); $i++)
        {
            if (!empty($perks[$i]['name']))
                $perk[] = Html::a($perks[$i]['name'], ['/lesson/perk/view', 'id' => $perks[$i]['id'],], ['class' => 'btn btn-link']);
        }
        return ($perk) ? implode($perk) : '';
    }

    public function getPerks()
    {
        return $this->hasMany(Perk::className(), ['id' => 'perk_id'])
                        ->viaTable('worker_has_perk', ['worker_id' => 'id']);
    }
    
    public function formName()
    {
        return '';
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDep()
    {
        return $this->hasOne(Dep::className(), ['id' => 'dep_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWorkerHasPerks()
    {
        return $this->hasMany(WorkerHasPerk::className(), ['worker_id' => 'id']);
    }
    public function getImageurl()
    {
        // return your image url here
        return \Yii::$app->request->BaseUrl . '/uploads/' . $this->img;
    }
    /**
     * @inheritdoc
     * @return WorkerQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new WorkerQuery(get_called_class());
    }
    
    public function behaviors()
    {
        return [
            [
                'class' => \voskobovich\behaviors\ManyToManyBehavior::className(),
                'relations' => [
                    'perks_list' => 'perks',
                ],
            ],
        ];
    }
}
