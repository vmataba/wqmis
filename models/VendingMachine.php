<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "vending_machine".
 *
 * @property string $vending_machine_id
 * @property string $gsm_number
 * @property integer $is_assigned
 * @property ControlSignal[] $controlSignals
 * @property Quality[] $qualities
 * @property Vendor[] $vendors
 */
class VendingMachine extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'vending_machine';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['vending_machine_id'], 'required'],
            [['gsm_number'], 'string', 'max' => 16],
            [['vending_machine_id'], 'string', 'min' => 4, 'max' => 4],
            [['vending_machine_id'], 'unique', 'message' => 'This vending machine Id is in use!'],
            [['gsm_number'], 'unique', 'message' => 'GSM number is already in use!'],
            [['gsm_number'], 'udokmeci\yii2PhoneValidator\PhoneValidator', 'country' => 'TZ'],
            [['is_assigned'], 'safe']
        ];
    }

    public function beforeValidate() {
        if (parent::beforeValidate()) {

            //$this->addError('gsm_number','Testing error message');
            return true;
        }
        return false;
    }

    private function valiateGsmNumber(): bool {
        $this->gsm_number = str_replace('+255', '0', $this->gsm_number);
        $this->gsm_number = str_replace('+255', '0', $this->gsm_number);
    }

    private function getFormattedGsmNumber(): string {
        $phone = $this->gsm_number;
        $counter = 1;
        $newPhone = '';

        if ($phone[0] == '0') {
            $phoneCharacters = str_split(substr($phone, 1, strlen($phone)));

            foreach ($phoneCharacters as $character) {
                $newPhone .= $character;

                if ($counter % 3 == 0) {
                    $newPhone .= ' ';
                }

                $counter++;
            }
            return '+255 ' . $newPhone;
        }
        return str_replace(' ', $phone, '');
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'vending_machine_id' => 'Vending Machine ID',
            'gsm_number' => 'Gsm Number',
            'is_assigned' => 'Is Assigned'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getControlSignals() {
        return $this->hasMany(ControlSignal::className(), ['vendor_machine_id' => 'vending_machine_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQualities() {
        return $this->hasMany(Quality::className(), ['vending_machine_id' => 'vending_machine_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVendors() {
        return $this->hasMany(Vendor::className(), ['vending_machine_id' => 'vending_machine_id']);
    }

    public static function getIds() {
        return ArrayHelper::map(self::find()->all(), 'vending_machine_id', 'vending_machine_id');
    }

    public static function getFreeVendingMachines() {
        return ArrayHelper::map(self::find()->where(['is_assigned' => 0])->all(), 'vending_machine_id', 'vending_machine_id');
    }

    public static function getNonFreeVendingMachines() {
        return ArrayHelper::map(self::find()->where(['is_assigned' => 1])->all(), 'vending_machine_id', 'vending_machine_id');
    }

}
