<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "studio".
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $members
 * @property string|null $time_date
 * @property string|null $time_ur
 * @property string|null $img
 *
 * @property BuyStudio[] $buyStudios
 * @property Users[] $users
 */
class Studio extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'studio';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['members'], 'integer'],
            [['time_date'], 'safe'],
            [['name', 'time_ur'], 'string', 'max' => 45],
            [['img'], 'string', 'max' => 1000],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'members' => 'Members',
            'time_date' => 'Time Date',
            'time_ur' => 'Time Ur',
            'img' => 'Img',
        ];
    }

    /**
     * Gets query for [[BuyStudios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBuyStudios()
    {
        return $this->hasMany(BuyStudio::class, ['studio_id' => 'id']);
    }

    /**
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::class, ['id' => 'user_id'])->viaTable('buy_studio', ['studio_id' => 'id']);
    }
}
