<?php

namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use common\components\MyActiveRecord;

/**
 * This is the model class for table "staff".
 *
 * @property integer $staff_id
 * @property string $account
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property integer $del_flg
 * @property string $first_name
 * @property string $last_name
 * @property integer $created_at
 * @property integer $updated_at
 */
class Staff extends MyActiveRecord implements IdentityInterface
{
	const STATUS_DELETED = 1;
    const STATUS_ACTIVE = 0;
    //const ROLE_USER = 10;
	public $password;
	
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%staff}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['account', 'auth_key', 'password_hash', 'email', 'created_at', 'updated_at'], 'required'],
            [['del_flg', 'created_at', 'updated_at'], 'integer'],
            [['account', 'password_hash', 'password_reset_token', 'email', 'first_name', 'last_name'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'staff_id' => 'Staff ID',
            'account' => 'Account',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'del_flg' => 'Del Flg',
			'first_name' => Yii::t('staff', 'First Name'),
            'last_name' => Yii::t('staff', 'Last Name'),
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
	
	public function getGroup()
    {
        return $this->hasOne(TblGroup::className(), ['group_id' => 'group_id']);
    }
	
	public function getFullname() {
        return $this->first_name.' '.$this->last_name;
    }
    
    public function toString() {
        return $this->getFullname();        
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['staff_id' => $id, 'del_flg' => self::STATUS_ACTIVE]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['account' => $username, 'del_flg' => self::STATUS_ACTIVE]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'del_flg' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return boolean
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        $parts = explode('_', $token);
        $timestamp = (int) end($parts);
        return $timestamp + $expire >= time();
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }
}
