<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "employees".
 *
 * @property string $employee_id
 * @property string $employee_title
 * @property string $employee_name
 * @property string $employee_code
 * @property string $employee_status
 *
 * @property Transactions[] $transactions
 */
class Employees extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'employees';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['employee_title', 'employee_status'], 'string'],
            [['employee_name','employee_code','employee_title'], 'required','message' => '{attribute} tidak boleh kosong.'],
            [['employee_name', 'employee_code'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'employee_id' => Yii::t('app', 'Employee ID'),
            'employee_title' => Yii::t('app', 'Panggilan (Title)'),
            'employee_name' => Yii::t('app', 'Nama'),
            'employee_code' => Yii::t('app', 'Kode'),
            'employee_status' => Yii::t('app', 'Status'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransactions()
    {
        return $this->hasMany(Transactions::className(), ['trans_employee' => 'employee_id']);
    }

    /**
     * @inheritdoc
     * @return EmployeesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EmployeesQuery(get_called_class());
    }
}
