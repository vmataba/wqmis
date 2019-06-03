<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\UserType;

/**
 * UserTypeSearch represents the model behind the search form of `app\models\UserType`.
 */
class UserTypeSearch extends UserType
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_type_id', 'created_by'], 'integer'],
            [['user_type_code'],'string','max' => 16],
            [['user_type_description', 'created_at', 'updated_at'], 'safe'],
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
        $query = UserType::find();

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
            'user_type_id' => $this->user_type_id,
            'user_type_code' => $this->user_type_code,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
        ]);

        $query->andFilterWhere(['like', 'user_type_description', $this->user_type_description]);

        return $dataProvider;
    }
}
