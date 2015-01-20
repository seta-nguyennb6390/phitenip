<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "salon".
 *
 * @property integer $salon_id
 * @property integer $salon_group_id
 * @property string $pos_shop_cd
 * @property string $salon_name
 * @property string $salon_kana
 * @property string $salon_tel
 * @property string $zip_cd
 * @property string $jis_code
 * @property string $addr_ken
 * @property string $addr_shi
 * @property string $addr_cho
 * @property string $addr_bldg
 * @property double $longitude
 * @property double $latitude
 * @property integer $salon_type
 * @property integer $gender_type
 * @property string $holiday_other
 * @property string $open_time
 * @property string $close_time
 * @property string $open_other
 * @property integer $reservable_days
 * @property integer $capacity
 * @property integer $timelimit_atday
 * @property integer $status
 * @property integer $admin_id
 * @property string $reg_datetime
 * @property string $upd_datetime
 * @property string $memo
 */
class Salon extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'salon';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['salon_group_id', 'pos_shop_cd', 'salon_name', 'salon_kana', 'salon_tel', 'zip_cd', 'jis_code', 'addr_ken', 'addr_shi', 'addr_cho', 'longitude', 'latitude', 'capacity'], 'required'],
            [['salon_group_id', 'salon_type', 'gender_type', 'reservable_days', 'capacity', 'timelimit_atday', 'status', 'admin_id'], 'integer'],
            [['longitude', 'latitude'], 'number'],
            [['open_time', 'close_time', 'reg_datetime', 'upd_datetime'], 'safe'],
            [['memo'], 'string'],
            [['pos_shop_cd'], 'string', 'max' => 6],
            [['salon_name', 'salon_kana', 'addr_ken', 'addr_shi', 'addr_cho', 'addr_bldg', 'holiday_other', 'open_other'], 'string', 'max' => 255],
            [['salon_tel'], 'string', 'max' => 12],
            [['zip_cd'], 'string', 'max' => 8],
            [['jis_code'], 'string', 'max' => 5]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'salon_id' => 'Salon ID',
            'salon_group_id' => 'Salon Group ID',
            'pos_shop_cd' => 'Pos Shop Cd',
            'salon_name' => 'Salon Name',
            'salon_kana' => 'Salon Kana',
            'salon_tel' => 'Salon Tel',
            'zip_cd' => 'Zip Cd',
            'jis_code' => 'Jis Code',
            'addr_ken' => 'Addr Ken',
            'addr_shi' => 'Addr Shi',
            'addr_cho' => 'Addr Cho',
            'addr_bldg' => 'Addr Bldg',
            'longitude' => 'Longitude',
            'latitude' => 'Latitude',
            'salon_type' => 'Salon Type',
            'gender_type' => 'Gender Type',
            'holiday_other' => 'Holiday Other',
            'open_time' => 'Open Time',
            'close_time' => 'Close Time',
            'open_other' => 'Open Other',
            'reservable_days' => 'Reservable Days',
            'capacity' => 'Capacity',
            'timelimit_atday' => 'Timelimit Atday',
            'status' => 'Status',
            'admin_id' => 'Admin ID',
            'reg_datetime' => 'Reg Datetime',
            'upd_datetime' => 'Upd Datetime',
            'memo' => 'Memo',
        ];
    }
}
