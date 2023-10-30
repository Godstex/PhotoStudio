<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "studio".
 *
 * @property int $id
 * @property string|null $name
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
            [['name'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'img' => 'Фото',
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            if (!empty($this->img)){
                $this->img->saveAs('img/' . $this->img->baseName . '.' . $this->img->extension);
                return true;
            }
        } else {
            return false;
        }
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
