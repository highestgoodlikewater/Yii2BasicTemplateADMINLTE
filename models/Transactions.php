<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "transactions".
 *
 * @property string $trans_id
 * @property string $trans_date
 * @property string $trans_employee
 * @property string $trans_status
 * @property double $trans_total
 *
 * @property TransactionDetail[] $transactionDetails
 * @property Services[] $transServices
 * @property Employees $transEmployee
 */
class Transactions extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'transactions';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['trans_id', 'trans_date', 'trans_employee'], 'required'],
            [['trans_date'], 'safe'],
            [['trans_employee'], 'integer'],
            [['trans_status','trans_employee'], 'string'],
            [['trans_total'], 'number'],
            [['trans_id'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'trans_id' => Yii::t('app', 'ID'),
            'trans_date' => Yii::t('app', 'Tanggal'),
            'trans_employee' => Yii::t('app', 'Karyawan / Travel'),
            'trans_status' => Yii::t('app', 'Status'),
            'trans_total' => Yii::t('app', 'Total'),
        ];
    }

	public static function pageTotal($provider, $fieldName)
	{
		$total=0;
		foreach($provider as $item){
			$total+=$item->$fieldName;
		}
		return "<strong>".number_format($total,2,',','.')."<strong>";
	}
	
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransactionDetails()
    {
        return $this->hasMany(TransactionDetail::className(), ['trans_id' => 'trans_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransServices()
    {
        return $this->hasMany(Services::className(), ['service_id' => 'trans_service_id'])->viaTable('transaction_detail', ['trans_id' => 'trans_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransEmployee()
    {
        return $this->hasOne(Employees::className(), ['employee_id' => 'trans_employee']);
    }

    /**
     * @inheritdoc
     * @return TransactionsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TransactionsQuery(get_called_class());
    }
}
