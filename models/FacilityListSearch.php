<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\FacilityList;

/**
 * FacilityListSearch represents the model behind the search form about `app\models\FacilityList`.
 */
class FacilityListSearch extends FacilityList
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['facility_name', 'external_ip', 'internal_ip', 'description'], 'safe'],
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
        $query = FacilityList::find();

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
        $query->andFilterWhere(['like', 'facility_name', $this->facility_name])
            ->andFilterWhere(['like', 'external_ip', $this->external_ip])
            ->andFilterWhere(['like', 'internal_ip', $this->internal_ip])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
