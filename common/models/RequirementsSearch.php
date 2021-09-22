<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Requirements;

/**
 * RequirementsSearch represents the model behind the search form of `common\models\Requirements`.
 */
class RequirementsSearch extends Requirements
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'services_id'], 'integer'],
            [['suit_rus', 'suit_eng', 'duration_time_rus', 'duration_time_eng', 'recommendation_rus', 'recommendation_eng', 'season_rus', 'season_eng', 'count_people_rus', 'count_people_eng', 'necessarily_rus', 'necessarily_eng', 'winter_recommend_rus', 'winter_recommend_eng'], 'safe'],
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
        $query = Requirements::find();

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
            'services_id' => $this->services_id,
        ]);

        $query->andFilterWhere(['like', 'suit_rus', $this->suit_rus])
            ->andFilterWhere(['like', 'suit_eng', $this->suit_eng])
            ->andFilterWhere(['like', 'duration_time_rus', $this->duration_time_rus])
            ->andFilterWhere(['like', 'duration_time_eng', $this->duration_time_eng])
            ->andFilterWhere(['like', 'recommendation_rus', $this->recommendation_rus])
            ->andFilterWhere(['like', 'recommendation_eng', $this->recommendation_eng])
            ->andFilterWhere(['like', 'season_rus', $this->season_rus])
            ->andFilterWhere(['like', 'season_eng', $this->season_eng])
            ->andFilterWhere(['like', 'count_people_rus', $this->count_people_rus])
            ->andFilterWhere(['like', 'count_people_eng', $this->count_people_eng])
            ->andFilterWhere(['like', 'necessarily_rus', $this->necessarily_rus])
            ->andFilterWhere(['like', 'necessarily_eng', $this->necessarily_eng])
            ->andFilterWhere(['like', 'winter_recommend_rus', $this->winter_recommend_rus])
            ->andFilterWhere(['like', 'winter_recommend_eng', $this->winter_recommend_eng]);

        return $dataProvider;
    }
}
