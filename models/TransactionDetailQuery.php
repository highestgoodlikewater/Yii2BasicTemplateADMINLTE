<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[TransactionDetail]].
 *
 * @see TransactionDetail
 */
class TransactionDetailQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return TransactionDetail[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return TransactionDetail|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}