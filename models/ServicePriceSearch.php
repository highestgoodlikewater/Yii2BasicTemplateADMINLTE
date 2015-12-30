<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ServicePrice;

/**
 * ServicePriceSearch represents the model behind the search form about `app\models\ServicePrice`.
 */
class ServicePriceSearch extends ServicePrice
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['price_id', 'price_service_id'], 'integer'],
            [['price'], 'number'],
            [['price_status'], 'safe'],
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
        $query = ServicePrice::find();

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
            'price_id' => $this->price_id,
            'price_service_id' => $this->price_service_id,
            'price' => $this->price,
        ]);

        $query->andFilterWhere(['like', 'price_status', $this->price_status]);

        return $dataProvider;
    }
}
