<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "report".
 *
 * @property string $employee
 * @property string $tanggal
 * @property string $service_name
 * @property string $trans_qty
 * @property double $price
 * @property double $total
 */
class Report extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'report';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tanggal', 'service_name', 'trans_qty', 'price'], 'required'],
            [['tanggal'], 'safe'],
            [['trans_qty'], 'integer'],
            [['price', 'total'], 'number'],
            [['employee'], 'string', 'max' => 108],
            [['service_name'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'employee' => Yii::t('app', 'Employee'),
            'tanggal' => Yii::t('app', 'Tanggal'),
            'service_name' => Yii::t('app', 'Nama Layanan'),
            'trans_qty' => Yii::t('app', 'Trans Qty'),
            'price' => Yii::t('app', 'Price'),
            'total' => Yii::t('app', 'Total'),
        ];
    }

    /**
     * @inheritdoc
     * @return ReportQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ReportQuery(get_called_class());
    }
}
