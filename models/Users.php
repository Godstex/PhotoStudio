<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string|null $login
 * @property string|null $password
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $patronimyc
 *
 * @property BuyStudio[] $buyStudios
 * @property Studio[] $studios
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['login', 'password', 'first_name', 'last_name', 'patronimyc'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Login',
            'password' => 'Password',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'patronimyc' => 'Patronimyc',
        ];
    }

    /**
     * Gets query for [[BuyStudios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBuyStudios()
    {
        return $this->hasMany(BuyStudio::class, ['user_id' => 'id']);
    }

    /**
     * Gets query for [[Studios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStudios()
    {
        return $this->hasMany(Studio::class, ['id' => 'studio_id'])->viaTable('buy_studio', ['user_id' => 'id']);
    }
}
