<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "salon_open".
 *
 * @property integer $salon_open_id
 * @property integer $salon_id
 * @property string $salon_date
 * @property integer $date_type
 * @property string $open_datetime
 * @property string $close_datetime
 * @property integer $status
 * @property string $reg_datetime
 * @property string $upd_datetime
 */
class SalonOpen extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'salon_open';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['salon_id', 'salon_date', 'date_type', 'open_datetime', 'close_datetime'], 'required'],
            [['salon_id', 'date_type', 'status'], 'integer'],
            [['salon_date', 'open_datetime', 'close_datetime', 'reg_datetime', 'upd_datetime'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'salon_open_id' => 'Salon Open ID',
            'salon_id' => 'Salon ID',
            'salon_date' => 'Salon Date',
            'date_type' => 'Date Type',
            'open_datetime' => 'Open Datetime',
            'close_datetime' => 'Close Datetime',
            'status' => 'Status',
            'reg_datetime' => 'Reg Datetime',
            'upd_datetime' => 'Upd Datetime',
        ];
    }
}
