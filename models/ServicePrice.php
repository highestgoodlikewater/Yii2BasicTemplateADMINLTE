<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "service_price".
 *
 * @property string $price_id
 * @property string $price_service_id
 * @property double $price
 * @property string $price_status
 *
 * @property Services $priceService
 */
class ServicePrice extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'service_price';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['price_service_id'], 'required'],
            [['price_service_id'], 'integer'],
            [['price'], 'number'],
            [['price_status'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'price_id' => Yii::t('app', 'Price ID'),
            'price_service_id' => Yii::t('app', 'Layanan'),
            'price' => Yii::t('app', 'Harga'),
            'price_status' => Yii::t('app', 'Jadikan Default'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPriceService()
    {
        return $this->hasOne(Services::className(), ['service_id' => 'price_service_id']);
    }

    /**
     * @inheritdoc
     * @return ServicePriceQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ServicePriceQuery(get_called_class());
    }
}
