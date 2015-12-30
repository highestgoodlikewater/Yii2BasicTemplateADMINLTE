<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Employees;

/**
 * EmployeesSearch represents the model behind the search form about `app\models\Employees`.
 */
class EmployeesSearch extends Employees
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['employee_id'], 'integer'],
            [['employee_title', 'employee_name', 'employee_code', 'employee_status'], 'safe'],
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
        $query = Employees::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            $query->where('0=1');
            return $dataProvider;
        }
        $query->where('employee_status=\'Y\'');

        $query->andFilterWhere([
            'employee_id' => $this->employee_id,
        ]);
		
        $query->orFilterWhere(['like', 'employee_title', $this->employee_name]);
        $query->orFilterWhere(['like', 'employee_code', $this->employee_name]);
        $query->orFilterWhere(['like', 'employee_name', $this->employee_name]);
        $query->andFilterWhere(['like', 'employee_status', $this->employee_status]);

        return $dataProvider;
    }
}
