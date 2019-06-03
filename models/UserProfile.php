<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_profile".
 *
 * @property int $user_profile_id
 * @property int $userid
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property string $phone_number
 * @property string $email
 * @property string $created_at
 * @property string $updated_at
 * @property string $profile_picture
 */
class UserProfile extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'user_profile';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['userid', 'first_name', 'last_name', 'phone_number'], 'required'],
            [['userid'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['first_name', 'middle_name', 'last_name', 'email'], 'string', 'max' => 128],
            [['phone_number'], 'string', 'max' => 16],
            [['profile_picture'], 'string', 'max' => 1024],
            [['phone_number'], 'unique'],
            [['phone_number'], 'udokmeci\yii2PhoneValidator\PhoneValidator', 'country' => 'TZ'],
            [['email'], 'email'],
            [['email'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'user_profile_id' => 'User Profile ID',
            'userid' => 'Userid',
            'first_name' => 'First Name',
            'middle_name' => 'Middle Name',
            'last_name' => 'Last Name',
            'phone_number' => 'Phone Number',
            'email' => 'Email',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'profile_picture' => 'Profile Picture',
        ];
    }

    public function getFullName() {
        return "{$this->first_name} {$this->last_name}";
    }

    public function getProfilePicture() {
        if (isset($this->profile_picture)) {
            return $this->profile_picture;
        }
        return 'uploads/profile-pictures/default-user-icon.jpg';
    }

}
