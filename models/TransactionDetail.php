<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "transaction_detail".
 *
 * @property string $trans_id
 * @property string $trans_service_id
 * @property string $trans_qty
 * @property double $price
 *
 * @property Services $transService
 * @property Transactions $trans
 */
class TransactionDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'transaction_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['trans_id', 'trans_service_id', 'trans_qty', 'price'], 'required'],
            [['trans_service_id', 'trans_qty'], 'integer'],
            [['price'], 'number'],
            [['trans_id'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'trans_id' => Yii::t('app', 'Trans ID'),
            'trans_service_id' => Yii::t('app', 'Trans Service ID'),
            'trans_qty' => Yii::t('app', 'Trans Qty'),
            'price' => Yii::t('app', 'Price'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransService()
    {
        return $this->hasOne(Services::className(), ['service_id' => 'trans_service_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTrans()
    {
        return $this->hasOne(Transactions::className(), ['trans_id' => 'trans_id']);
    }

    /**
     * @inheritdoc
     * @return TransactionDetailQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TransactionDetailQuery(get_called_class());
    }
}
