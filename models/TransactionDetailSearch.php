<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TransactionDetail;

/**
 * TransactionDetailSearch represents the model behind the search form about `app\models\TransactionDetail`.
 */
class TransactionDetailSearch extends TransactionDetail
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['trans_id'], 'safe'],
            [['trans_service_id', 'trans_qty'], 'integer'],
            [['price'], 'number'],
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
        $query = TransactionDetail::find();

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
            'trans_service_id' => $this->trans_service_id,
            'trans_qty' => $this->trans_qty,
            'price' => $this->price,
        ]);

        $query->andFilterWhere(['like', 'trans_id', $this->trans_id]);

        return $dataProvider;
    }
}
