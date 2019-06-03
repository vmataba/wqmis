<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "user_type".
 *
 * @property int $user_type_id
 * @property string $user_type_code
 * @property string $user_type_description
 * @property string $created_at
 * @property string $updated_at
 * @property int $created_by
 */
class UserType extends \yii\db\ActiveRecord {

    const TYPE_ADMIN = 'TYPE_ADMIN';
    const TYPE_LAB_TECHNICIAN = 'TYPE_TECHNICIAN';

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'user_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['user_type_code', 'user_type_description', 'created_by'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['created_by'], 'integer'],
            [['user_type_description'], 'string', 'max' => 50],
            [['user_type_code'], 'string', 'max' => 16],
            [['user_type_description', 'user_type_code'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'user_type_id' => 'User Type ID',
            'user_type_code' => 'User Type Code',
            'user_type_description' => 'User Type Description',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
        ];
    }

    public static function getUserTypes() {
        return ArrayHelper::map(self::find()->all(), 'user_type_id', 'user_type_description');
    }

}
