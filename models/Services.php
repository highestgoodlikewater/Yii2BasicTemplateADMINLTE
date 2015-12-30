<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "services".
 *
 * @property string $service_id
 * @property string $service_name
 * @property string $service_status
 * @property double $service_price
 *
 * @property TransactionDetail[] $transactionDetails
 * @property Transactions[] $trans
 */
class Services extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'services';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['service_name'], 'required'],
            [['service_status'], 'string'],
            [['service_price'], 'number'],
            [['service_name'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'service_id' => Yii::t('app', 'Service ID'),
            'service_name' => Yii::t('app', 'Nama Layanan'),
            'service_status' => Yii::t('app', 'Status'),
            'service_price' => Yii::t('app', 'Harga'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransactionDetails()
    {
        return $this->hasMany(TransactionDetail::className(), ['trans_service_id' => 'service_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTrans()
    {
        return $this->hasMany(Transactions::className(), ['trans_id' => 'trans_id'])->viaTable('transaction_detail', ['trans_service_id' => 'service_id']);
    }

    /**
     * @inheritdoc
     * @return ServicesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ServicesQuery(get_called_class());
    }
}
