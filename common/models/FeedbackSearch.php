<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Feedback;

/**
 * FeedbackSearch represents the model behind the search form of `common\models\Feedback`.
 */
class FeedbackSearch extends Feedback
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'services_id'], 'integer'],
            [['name_rus', 'name_eng', 'coment_rus', 'coment_eng'], 'safe'],
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
        $query = Feedback::find();

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

        $query->andFilterWhere(['like', 'name_rus', $this->name_rus])
            ->andFilterWhere(['like', 'name_eng', $this->name_eng])
            ->andFilterWhere(['like', 'coment_rus', $this->coment_rus])
            ->andFilterWhere(['like', 'coment_eng', $this->coment_eng]);

        return $dataProvider;
    }
}
