<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\District;

/**
 * DistrictSearch represents the model behind the search form of `app\models\District`.
 */
class DistrictSearch extends District {

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['district_id'], 'integer'],
            [['region_id', 'districtName'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios() {
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
    public function search($params) {
        $query = District::find();

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
            'district_id' => $this->district_id,
            'region_id' => $this->region_id
        ]);

        $query->andFilterWhere(['like', 'region_id', $this->region_id])
                ->andFilterWhere(['like', 'districtName', $this->districtName]);

        return $dataProvider;
    }

}
