<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vendor".
 *
 * @property int $vendor_id
 * @property int $vendor_id_type
 * @property string $vending_machine_id
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property int $region_id
 * @property int $district_id
 * @property string $street
 * @property string $phone_number
 * @property string $created_at
 * @property string $updated_at
 * @property int $updated_by
 *
 * @property VendingMachine $vendingMachine
 * @property IdType $vendorIdType
 */
class Vendor extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'vendor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['vendor_id', 'first_name', 'last_name', 'region_id', 'district_id', 'street'], 'required'],
            [['vendor_id', 'vendor_id_type', 'district_id', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['vending_machine_id', 'first_name', 'middle_name', 'last_name', 'street'], 'string', 'max' => 255],
            [['phone_number'], 'string', 'max' => 16],
            [['phone_number'], 'unique'],
            [['phone_number'], 'udokmeci\yii2PhoneValidator\PhoneValidator', 'country' => 'TZ'],
            [['vendor_id'], 'unique'],
            [['vending_machine_id'], 'exist', 'skipOnError' => true, 'targetClass' => VendingMachine::className(), 'targetAttribute' => ['vending_machine_id' => 'vending_machine_id']],
            [['vendor_id_type'], 'exist', 'skipOnError' => true, 'targetClass' => IdType::className(), 'targetAttribute' => ['vendor_id_type' => 'id_type_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'vendor_id' => 'Vendor ID',
            'vendor_id_type' => 'Vendor ID Type',
            'vending_machine_id' => 'Vending Machine ID',
            'first_name' => 'First Name',
            'middle_name' => 'Middle Name',
            'last_name' => 'Last Name',
            'region_id' => 'Region',
            'district_id' => 'District',
            'street' => 'Street',
            'phone_number' => 'Phone Number',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVendingMachine() {
        return $this->hasOne(VendingMachine::className(), ['vending_machine_id' => 'vending_machine_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVendorIdType() {
        return $this->hasOne(IdType::className(), ['vendor_id_type' => 'id_type_id']);
    }

    public function validateVendorId(): bool {
        $this->addError('vendor_id', 'Custom Error Message');
        return false;
    }

    public function getFullName() {
        return "{$this->first_name} {$this->middle_name} {$this->last_name}";
    }

}
