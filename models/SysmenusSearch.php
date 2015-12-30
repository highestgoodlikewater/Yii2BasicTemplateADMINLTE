<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Sysmenus;

/**
 * SysmenusSearch represents the model behind the search form about `app\models\Sysmenus`.
 */
class SysmenusSearch extends Sysmenus
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['menu_id', 'menu_parent_id', 'menu_order', 'menu_status'], 'integer'],
            [['menu_slug', 'menu_name', 'menu_url', 'menu_title', 'menu_type', 'menu_icon'], 'safe'],
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
        $query = Sysmenus::find();

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
            'menu_id' => $this->menu_id,
            'menu_parent_id' => $this->menu_parent_id,
            'menu_order' => $this->menu_order,
            'menu_status' => $this->menu_status,
        ]);

        $query->andFilterWhere(['like', 'menu_slug', $this->menu_slug])
            ->andFilterWhere(['like', 'menu_name', $this->menu_name])
            ->andFilterWhere(['like', 'menu_url', $this->menu_url])
            ->andFilterWhere(['like', 'menu_title', $this->menu_title])
            ->andFilterWhere(['like', 'menu_type', $this->menu_type])
            ->andFilterWhere(['like', 'menu_icon', $this->menu_icon]);

        return $dataProvider;
    }
}
