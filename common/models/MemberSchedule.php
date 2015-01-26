<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "member_schedule".
 *
 * @property integer $member_schedule_id
 * @property integer $member_id
 * @property string $pos_member_cd
 * @property integer $salon_membertype_id
 * @property integer $salon_id
 * @property string $user_name
 * @property string $user_kana
 * @property string $user_tel
 * @property string $start_datetime
 * @property string $end_datetime
 * @property integer $entry_type
 * @property integer $status
 * @property integer $visit_type
 * @property integer $visit_flg
 * @property string $cancel_date
 * @property integer $count_monthly
 * @property string $description
 * @property integer $admin_id
 * @property string $reg_datetime
 * @property string $upd_datetime
 * @property string $memo
 */
class MemberSchedule extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'member_schedule';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['member_id', 'salon_id', 'user_kana', 'user_tel', 'start_datetime', 'end_datetime', 'entry_type', 'count_monthly'], 'required'],
            [['member_id', 'salon_membertype_id', 'salon_id', 'entry_type', 'status', 'visit_type', 'visit_flg', 'count_monthly', 'admin_id'], 'integer'],
            [['start_datetime', 'end_datetime', 'cancel_date', 'reg_datetime', 'upd_datetime'], 'safe'],
            [['description', 'memo'], 'string'],
            [['pos_member_cd', 'user_tel'], 'string', 'max' => 13],
            [['user_name', 'user_kana'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'member_schedule_id' => 'Member Schedule ID',
            'member_id' => 'Member ID',
            'pos_member_cd' => 'Pos Member Cd',
            'salon_membertype_id' => 'Salon Membertype ID',
            'salon_id' => 'Salon ID',
            'user_name' => 'User Name',
            'user_kana' => 'User Kana',
            'user_tel' => 'User Tel',
            'start_datetime' => 'Start Datetime',
            'end_datetime' => 'End Datetime',
            'entry_type' => 'Entry Type',
            'status' => 'Status',
            'visit_type' => 'Visit Type',
            'visit_flg' => 'Visit Flg',
            'cancel_date' => 'Cancel Date',
            'count_monthly' => 'Count Monthly',
            'description' => 'Description',
            'admin_id' => 'Admin ID',
            'reg_datetime' => 'Reg Datetime',
            'upd_datetime' => 'Upd Datetime',
            'memo' => 'Memo',
        ];
    }
}
