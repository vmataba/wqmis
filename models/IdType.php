<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "id_type".
 *
 * @property int $id_type_id
 * @property string $id_type_name
 * @property string $id_type_code
 * @property Vendor[] $vendors
 */
class IdType extends \yii\db\ActiveRecord {

    const TYPE_NATIONAL_ID = 'NATIONAL_ID';
    const TYPE_DRIVING_LICENSE = 'DRIVING_LICENSE';
    const TYPE_VOTERS_ID = 'VOTERS_ID';

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'id_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['id_type_code', 'id_type_name'], 'required'],
            [['id_type_name'], 'string', 'max' => 255],
            [['id_type_code'], 'string', 'max' => 50],
            [['id_type_code'], 'unique']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id_type_id' => 'Id Type ID',
            'add id_type_code' => 'Id Type Code',
            'id_type_name' => 'Id Type Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVendors() {
        return $this->hasMany(Vendor::className(), ['vendor_id_type' => 'id_type_id']);
    }

    public static function getIdTypes() {
        return ArrayHelper::map(self::find()->all(), 'id_type_id', 'id_type_name');
    }

}
