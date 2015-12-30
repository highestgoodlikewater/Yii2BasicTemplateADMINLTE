<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Transactions;

/**
 * TransactionsSearch represents the model behind the search form about `app\models\Transactions`.
 */
class TransactionsSearch extends Transactions
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['trans_employee','trans_id', 'trans_date', 'trans_status'], 'safe'],
            //[[''], 'integer'],
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
        $query = Transactions::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
		$query->joinWith('transEmployee');
        $query->andFilterWhere([
            'trans_date' => $this->trans_date,
        ]);
		$query->andFilterWhere([
            'like','CONCAT(employees.employee_name)' , $this->trans_employee,
        ]);

        $query->andFilterWhere(['like', 'trans_id', $this->trans_id])
            ->andFilterWhere(['like', 'trans_status', $this->trans_status]);

        return $dataProvider;
    }
}
