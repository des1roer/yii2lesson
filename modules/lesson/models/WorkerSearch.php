<?php

namespace app\modules\lesson\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\lesson\models\Worker;

/**
 * WorkerSearch represents the model behind the search form about `app\modules\lesson\models\Worker`.
 */
class WorkerSearch extends Worker
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'dep_id'], 'integer'],
            [['name', 'img'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Worker::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'dep_id' => $this->dep_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'img', $this->img]);

        return $dataProvider;
    }
}
