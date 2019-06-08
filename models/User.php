<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $userid
 * @property string $username
 * @property string $password
 * @property string $access_token
 * @property string $auth_key
 * @property string $last_login
 * @property string $created_at
 * @property string $updated_at
 * @property int $created_by
 * @property int $updated_by
 * @property int $user_type
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface {

    const DEFAULT_PASSWORD = '12345';

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['username', 'created_by'], 'required'],
            [['last_login', 'created_at', 'updated_at'], 'safe'],
            [['created_by', 'updated_by', 'user_type'], 'integer'],
            [['username', 'password'], 'string', 'max' => 255],
            [['password'],'string', 'min' => 5],
            ['username', 'unique', 'message' => 'This username is in use!'],
            [['access_token', 'auth_key'], 'string', 'max' => 256],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'userid' => 'Userid',
            'username' => 'Username',
            'password' => 'Password',
            'access_token' => 'Access Token',
            'auth_key' => 'Auth Key',
            'last_login' => 'Last Login',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'user_type' => 'User Type',
        ];
    }

    public function getAuthKey(): string {
        return $this->auth_key;
    }

    public function getId() {
        return $this->userid;
    }

    public function validateAuthKey($authKey): bool {
        return $this->auth_key === $authKey;
    }

    public static function findIdentity($id): IdentityInterface {
        return self::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null): IdentityInterface {
        return self::findOne(['access_token' => $token]);
    }

    public static function findByUsername($username) {
        return self::findOne(['username' => $username]);
    }

    public function validatePassword($password): bool {
        return Yii::$app->getSecurity()->validatePassword($password, $this->password);
    }

    public function getFullName(): string {
        $profile = UserProfile::findOne(['userid' => $this->userid]);
        return "{$profile->first_name} {$profile->last_name}";
    }

    public function getProfile(): UserProfile {
        return UserProfile::findOne(['userid' => $this->userid]);
    }

    public function getUserType(): UserType {
        return UserType::findOne($this->user_type);
    }

}
