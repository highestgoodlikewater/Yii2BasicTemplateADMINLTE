<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Sysmenus]].
 *
 * @see Sysmenus
 */
class SysmenusQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Sysmenus[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Sysmenus|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}