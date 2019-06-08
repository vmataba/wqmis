<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "quality".
 *
 * @property int $id
 * @property string $vending_machine_id
 * @property string $conductivity
 * @property string $pH
 * @property string $turbidity
 * @property string $temperature
 * @property string $recieved_at
 * @property string $status
 *
 * @property VendingMachine $vendingMachine
 */
class Quality extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'quality';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['vending_machine_id'], 'required'],
            [['conductivity', 'pH', 'turbidity', 'temperature'], 'number'],
            [['recieved_at'], 'safe'],
            [['vending_machine_id'], 'string', 'max' => 255],
            [['status'], 'string', 'max' => 30],
            [['vending_machine_id'], 'exist', 'skipOnError' => true, 'targetClass' => VendingMachine::className(), 'targetAttribute' => ['vending_machine_id' => 'vending_machine_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'vending_machine_id' => 'Vending Machine ID',
            'conductivity' => 'Conductivity',
            'pH' => 'P H',
            'turbidity' => 'Turbidity',
            'temperature' => 'Temperature',
            'recieved_at' => 'Recieved At',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVendingMachine() {
        return $this->hasOne(VendingMachine::className(), ['vending_machine_id' => 'vending_machine_id']);
    }

    public static function getQualityMeasures($vendingMachineId) {
        $statuses = self::find()->where(['vending_machine_id' => $vendingMachineId])->select('status')->all(); 
        $measures = [
            'vendingMachineId' => $vendingMachineId,
            'conductivity' => [],
            'ph' => [],
            'turbidity' => [],
            'temperature' => [],
            'time' => [],
            'status' => '',
            'vendor' => Vendor::findOne(['vending_machine_id' => $vendingMachineId])
        ];
        $allMeasures = self::find()
                ->where(['vending_machine_id' => $vendingMachineId])
                ->limit(4)
                ->orderBy(['recieved_at' => SORT_DESC])
                ->all();

        foreach ($allMeasures as $measure) {
            array_push($measures['conductivity'], (double) $measure->conductivity);
            array_push($measures['ph'], (double) $measure->pH);
            array_push($measures['turbidity'], (double) $measure->turbidity);
            array_push($measures['temperature'], (double) $measure->temperature);
            array_push($measures['time'], $measure->recieved_at);
        }


        return [
            'vendingMachineId' => $vendingMachineId,
            'conductivity' => array_reverse($measures['conductivity']),
            'ph' => array_reverse($measures['ph']),
            'turbidity' => array_reverse($measures['turbidity']),
            'temperature' => array_reverse($measures['temperature']),
            'time' => array_reverse($measures['time']),
            'status' => $statuses[sizeof($statuses) -1]->status,
            'vendor' => $measures['vendor']
        ];
    }

    public static function getVendingMachineIds() {
        return ArrayHelper::map(self::find()->all(), 'vending_machine_id', 'vending_machine_id');
    }

    public static function getDefaultVendingMachineId() {
        return self::findOne(['recieved_at' => self::find()->max('recieved_at')])->vending_machine_id;
    }

    public function computeStatus() {
        //Temporary Implementation
        $phCondition = $this->pH >= 6.5 && $this->pH <= 8.5;

        $conductivityCondition = $this->conductivity > 0 && $this->conductivity <= 400;

        $turbidityCondition = $this->turbidity >= 5 && $this->turbidity <= 25;

        return $phCondition && $conductivityCondition && $turbidityCondition ? 'Good' : 'Bad';
    }

}
