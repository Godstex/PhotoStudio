<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "buy_studio".
 *
 * @property int $user_id
 * @property int $studio_id
 * @property int|null $members
 * @property string|null $time_date
 * @property string|null $time_ur
 *
 * @property Studio $studio
 * @property Users $user
 */
class BuyStudio extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'buy_studio';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'studio_id'], 'required'],
            [['user_id', 'studio_id', 'members'], 'integer'],
            [['time_date'], 'safe'],
            [['time_ur'], 'string', 'max' => 45],
            [['user_id', 'studio_id'], 'unique', 'targetAttribute' => ['user_id', 'studio_id']],
            [['studio_id'], 'exist', 'skipOnError' => true, 'targetClass' => Studio::class, 'targetAttribute' => ['studio_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'studio_id' => 'Studio ID',
            'members' => 'Members',
            'time_date' => 'Time Date',
            'time_ur' => 'Time Ur',
        ];
    }

    /**
     * Gets query for [[Studio]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStudio()
    {
        return $this->hasOne(Studio::class, ['id' => 'studio_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
