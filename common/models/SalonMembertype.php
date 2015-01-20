<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "salon_membertype".
 *
 * @property integer $salon_membertype_id
 * @property integer $salon_id
 * @property string $membertype_name
 * @property string $descrption
 * @property integer $gender_type
 * @property integer $use_limit
 * @property integer $holiday_type
 * @property integer $timelimit_flg
 * @property string $start_time
 * @property string $close_time
 * @property integer $timelimit_atday
 * @property integer $facility_flg
 * @property integer $status
 * @property string $activate_date
 * @property string $disable_date
 * @property integer $admin_id
 * @property string $reg_datetime
 * @property string $upd_datetime
 * @property string $memo
 */
class SalonMembertype extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'salon_membertype';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['salon_id', 'membertype_name'], 'required'],
            [['salon_id', 'gender_type', 'use_limit', 'holiday_type', 'timelimit_flg', 'timelimit_atday', 'facility_flg', 'status', 'admin_id'], 'integer'],
            [['descrption', 'memo'], 'string'],
            [['start_time', 'close_time', 'activate_date', 'disable_date', 'reg_datetime', 'upd_datetime'], 'safe'],
            [['membertype_name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'salon_membertype_id' => 'Salon Membertype ID',
            'salon_id' => 'Salon ID',
            'membertype_name' => 'Membertype Name',
            'descrption' => 'Descrption',
            'gender_type' => 'Gender Type',
            'use_limit' => 'Use Limit',
            'holiday_type' => 'Holiday Type',
            'timelimit_flg' => 'Timelimit Flg',
            'start_time' => 'Start Time',
            'close_time' => 'Close Time',
            'timelimit_atday' => 'Timelimit Atday',
            'facility_flg' => 'Facility Flg',
            'status' => 'Status',
            'activate_date' => 'Activate Date',
            'disable_date' => 'Disable Date',
            'admin_id' => 'Admin ID',
            'reg_datetime' => 'Reg Datetime',
            'upd_datetime' => 'Upd Datetime',
            'memo' => 'Memo',
        ];
    }
}
