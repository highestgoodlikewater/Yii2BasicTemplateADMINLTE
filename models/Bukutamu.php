<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bukutamu".
 *
 * @property string $id
 * @property string $nama
 * @property string $pesan
 */
class Bukutamu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bukutamu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama', 'pesan'], 'required'],
            [['pesan'], 'string'],
            [['nama'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'nama' => Yii::t('app', 'Nama'),
            'pesan' => Yii::t('app', 'Pesan'),
        ];
    }

    /**
     * @inheritdoc
     * @return BukutamuQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BukutamuQuery(get_called_class());
    }
}
