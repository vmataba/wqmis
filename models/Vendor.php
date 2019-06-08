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
            [['vendor_id_type', 'district_id', 'updated_by'], 'integer'],
            [['vendor_id'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['vending_machine_id', 'first_name', 'middle_name', 'last_name', 'street'], 'string', 'max' => 255],
            [['phone_number'], 'string', 'max' => 16],
            [['phone_number'], 'unique'],
            [['phone_number'], 'udokmeci\yii2PhoneValidator\PhoneValidator', 'country' => 'TZ'],
            [['vendor_id'], 'unique'],
            [['vending_machine_id'], 'exist', 'skipOnError' => true, 'targetClass' => VendingMachine::className(), 'targetAttribute' => ['vending_machine_id' => 'vending_machine_id']],
            [['vendor_id_type'], 'exist', 'skipOnError' => true, 'targetClass' => IdType::className(), 'targetAttribute' => ['vendor_id_type' => 'id_type_id']],
            [['vendor_id'], 'validateVendorId']
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

    public function validateVendorId() {
        $idTypeCode = IdType::findOne([$this->vendor_id_type])->id_type_code;
        if (!empty($idTypeCode)) {
            switch ($idTypeCode) {
                case IdType::TYPE_NATIONAL_ID:

                    
                    if (!(preg_match("/(\d{8})-(\d{5})-(\d{5})-(\d{2})/", $this->vendor_id) && strlen($this->vendor_id) === IdType::TYPE_NATIONAL_ID_SIZE)) {
                        $this->addError('vendor_id', 'Invalid National Id number');
                    }
                    return;
                case IdType::TYPE_DRIVING_LICENSE:
                   if (!(preg_match("/(\d{10})/", $this->vendor_id) && strlen($this->vendor_id) === IdType::TYPE_DRIVING_LICENSEL_ID_SIZE)) {
                        $this->addError('vendor_id', 'Invalid Driving License Id number');
                    }
                    return;
                case IdType::TYPE_VOTERS_ID:
                     if (!(preg_match("/T-(\d{4})-(\d{4})-(\d{3})-\d/", $this->vendor_id) && strlen($this->vendor_id) === IdType::TYPE_VOTERS_ID_SIZE)) {
                        $this->addError('vendor_id', "Invalid Voter's Id number");
                    }
                    return;
            }
        }
        return true;
    }

    public function getFullName() {
        return "{$this->first_name} {$this->middle_name} {$this->last_name}";
    }

}
