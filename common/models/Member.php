<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "member".
 * Author Ha Huu Don(donhh6551@seta-asia.com.vn)
 * Date 21/01/2015
 * 
 * @property integer $member_id
 * @property string $pos_member_cd
 * @property integer $salon_id
 * @property string $user_name
 * @property string $user_kana
 * @property string $user_tel
 * @property string $user_tel2
 * @property string $user_email
 * @property integer $gender
 * @property string $birthday
 * @property string $zip_cd
 * @property string $jis_cd
 * @property string $addr_1
 * @property string $addr_2
 * @property string $addr_3
 * @property integer $salon_membertype_id
 * @property integer $use_limit
 * @property integer $timelimit_atday
 * @property integer $status
 * @property string $entry_date
 * @property string $withdraw_date
 * @property string $descrption
 * @property integer $salon_staff_id
 * @property integer $admin_id
 * @property string $reg_datetime
 * @property string $upd_datetime
 * @property string $memo
 */
class Member extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'member';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['salon_id', 'use_limit', 'status', 'reg_datetime'], 'required'],
            [['salon_id', 'gender', 'salon_membertype_id', 'use_limit', 'timelimit_atday', 'status', 'salon_staff_id', 'admin_id'], 'integer'],
            [['birthday', 'entry_date', 'withdraw_date', 'reg_datetime', 'upd_datetime'], 'safe'],
            [['descrption', 'memo'], 'string'],
            [['pos_member_cd'], 'string', 'max' => 13],
            [['user_name', 'user_kana', 'user_email', 'addr_1', 'addr_2', 'addr_3'], 'string', 'max' => 255],
            [['user_tel', 'user_tel2'], 'string', 'max' => 12],
            [['zip_cd'], 'string', 'max' => 8],
            [['jis_cd'], 'string', 'max' => 5]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'member_id' => 'Member ID',
            'pos_member_cd' => 'Pos Member Cd',
            'salon_id' => 'Salon ID',
            'user_name' => 'User Name',
            'user_kana' => 'User Kana',
            'user_tel' => 'User Tel',
            'user_tel2' => 'User Tel2',
            'user_email' => 'User Email',
            'gender' => 'Gender',
            'birthday' => 'Birthday',
            'zip_cd' => 'Zip Cd',
            'jis_cd' => 'Jis Cd',
            'addr_1' => 'Addr 1',
            'addr_2' => 'Addr 2',
            'addr_3' => 'Addr 3',
            'salon_membertype_id' => 'Salon Membertype ID',
            'use_limit' => 'Use Limit',
            'timelimit_atday' => 'Timelimit Atday',
            'status' => 'Status',
            'entry_date' => 'Entry Date',
            'withdraw_date' => 'Withdraw Date',
            'descrption' => 'Descrption',
            'salon_staff_id' => 'Salon Staff ID',
            'admin_id' => 'Admin ID',
            'reg_datetime' => 'Reg Datetime',
            'upd_datetime' => 'Upd Datetime',
            'memo' => 'Memo',
        ];
    }
	
	/**
	 * description: Get list member
	 * Author: Ha Huu Don(donhh6551@seta-asia.com.vn)
     * Date: 21/01/2015
	 */
	public function listMembers($limit){
		$listAll = $this->find()
        ->limit($limit)
        ->all();
		
		return $listAll;
	}

	/**
	 * description: Get list pagination
	 * Author: Ha Huu Don(donhh6551@seta-asia.com.vn)
     * Date: 21/01/2015
	 */
	public function listMemberAjax($page, $limit){
		$total = $this->find()->count();
		
		if($page <= $total){
			$result=Yii::$app->db->createCommand('SELECT * FROM '.$this->tableName().' limit '.$page.','.$limit.'')->queryAll();
		    
			return $result;
		}
	}
	
	/**
	 * description: order by list member by ajax
	 * Author: Ha Huu Don(donhh6551@seta-asia.com.vn)
     * Date: 22/01/2015
	 */
	public function orderByMember($data=[], $limit){
		
		$result=Yii::$app->db->createCommand('SELECT * FROM '.$this->tableName().' limit 0,'.$data['start'].'')->queryAll();
		
		return $result;
	}
}
