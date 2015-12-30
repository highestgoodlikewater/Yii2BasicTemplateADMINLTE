<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sysmenus".
 *
 * @property integer $menu_id
 * @property string $menu_slug
 * @property string $menu_name
 * @property string $menu_url
 * @property string $menu_title
 * @property string $menu_type
 * @property integer $menu_parent_id
 * @property string $menu_icon
 * @property integer $menu_order
 * @property integer $menu_status
 */
class Sysmenus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sysmenus';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['menu_type'], 'string'],
            [['menu_parent_id', 'menu_order', 'menu_status'], 'integer'],
            [['menu_slug', 'menu_name', 'menu_url', 'menu_title', 'menu_icon'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'menu_id' => Yii::t('app', 'Menu ID'),
            'menu_slug' => Yii::t('app', 'Slug'),
            'menu_name' => Yii::t('app', 'Name'),
            'menu_url' => Yii::t('app', 'URL'),
            'menu_title' => Yii::t('app', 'Title'),
            'menu_type' => Yii::t('app', 'Type'),
            'menu_parent_id' => Yii::t('app', 'Parent'),
            'menu_icon' => Yii::t('app', 'Icon'),
            'menu_order' => Yii::t('app', 'Menu Order'),
            'menu_status' => Yii::t('app', 'Menu Status'),
        ];
    }

    /**
     * @inheritdoc
     * @return SysmenusQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SysmenusQuery(get_called_class());
    }
}
