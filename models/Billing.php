<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "billing".
 *
 * @property int $id
 * @property float $amount
 * @property string $date
 * @property int $userId
 */
class Billing extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'billing';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['amount'], 'number'],
            [['date', 'userId'], 'required'],
            [['date'], 'safe'],
            [['userId'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'amount' => 'Amount',
            'date' => 'Date',
            'userId' => 'User ID',
        ];
    }
}
