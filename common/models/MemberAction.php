<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "member_action".
 *
 * @property integer $member_action_id
 * @property integer $member_id
 * @property string $pos_member_cd
 * @property string $pos_member_cd_OLD
 * @property integer $salon_id
 * @property integer $salon_staff_id
 * @property integer $action_type
 * @property integer $status
 * @property integer $salon_membertype_id
 * @property integer $salon_membertype_id_NEXT
 * @property string $reason
 * @property string $receipt_datetime
 * @property string $resume_date
 * @property string $comeback_date
 * @property string $cancel_date
 * @property integer $admin_id
 * @property string $reg_datetime
 * @property string $upd_datetime
 * @property string $memo
 */
class MemberAction extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'member_action';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['member_id', 'salon_id', 'action_type', 'status', 'receipt_datetime'], 'required'],
            [['member_id', 'salon_id', 'salon_staff_id', 'action_type', 'status', 'salon_membertype_id', 'salon_membertype_id_NEXT', 'admin_id'], 'integer'],
            [['receipt_datetime', 'resume_date', 'comeback_date', 'cancel_date', 'reg_datetime', 'upd_datetime'], 'safe'],
            [['memo'], 'string'],
            [['pos_member_cd', 'pos_member_cd_OLD'], 'string', 'max' => 13],
            [['reason'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'member_action_id' => 'Member Action ID',
            'member_id' => 'Member ID',
            'pos_member_cd' => 'Pos Member Cd',
            'pos_member_cd_OLD' => 'Pos Member Cd  Old',
            'salon_id' => 'Salon ID',
            'salon_staff_id' => 'Salon Staff ID',
            'action_type' => 'Action Type',
            'status' => 'Status',
            'salon_membertype_id' => 'Salon Membertype ID',
            'salon_membertype_id_NEXT' => 'Salon Membertype Id  Next',
            'reason' => 'Reason',
            'receipt_datetime' => 'Receipt Datetime',
            'resume_date' => 'Resume Date',
            'comeback_date' => 'Comeback Date',
            'cancel_date' => 'Cancel Date',
            'admin_id' => 'Admin ID',
            'reg_datetime' => 'Reg Datetime',
            'upd_datetime' => 'Upd Datetime',
            'memo' => 'Memo',
        ];
    }
}
