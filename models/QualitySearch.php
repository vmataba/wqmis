<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Quality;

/**
 * QualitySearch represents the model behind the search form of `app\models\Quality`.
 */
class QualitySearch extends Quality
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['vending_machine_id', 'recieved_at', 'status'], 'safe'],
            [['conductivity', 'pH', 'turbidity', 'temperature'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Quality::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'conductivity' => $this->conductivity,
            'pH' => $this->pH,
            'turbidity' => $this->turbidity,
            'temperature' => $this->temperature,
            'recieved_at' => $this->recieved_at,
        ]);

        $query->andFilterWhere(['like', 'vending_machine_id', $this->vending_machine_id])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
