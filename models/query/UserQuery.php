<?php

namespace app\models\query;

/**
 * This is the ActiveQuery class for [[\app\models\User]].
 *
 * @see \app\models\User
 */
class UserQuery extends \yii\db\ActiveQuery
{
    public function byCreator($id)
    {
        return $this->andWhere(['creator_id' => $id]);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\User[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\User|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}