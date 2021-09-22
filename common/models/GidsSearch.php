<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Gids;

/**
 * GidsSearch represents the model behind the search form of `common\models\Gids`.
 */
class GidsSearch extends Gids
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'city_id'], 'integer'],
            [['lang', 'name_rus', 'name_eng', 'img_sad', 'img_smile'], 'safe'],
            [['rating'], 'number'],
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
        $query = Gids::find();

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
            'city_id' => $this->city_id,
            'rating' => $this->rating,
        ]);

        $query->andFilterWhere(['like', 'lang', $this->lang])
            ->andFilterWhere(['like', 'name_rus', $this->name_rus])
            ->andFilterWhere(['like', 'name_eng', $this->name_eng])
            ->andFilterWhere(['like', 'img_sad', $this->img_sad])
            ->andFilterWhere(['like', 'img_smile', $this->img_smile]);

        return $dataProvider;
    }
}
