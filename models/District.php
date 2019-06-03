<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "district".
 *
 * @property int $district_id
 * @property string $region_id
 * @property string $districtName
 *
 * @property Region $region
 * @property Vendor[] $vendors
 */
class District extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'district';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['region_id', 'districtName'], 'required'],
            ['district_id', 'safe'],
            [['region_id', 'districtName'], 'string', 'max' => 255],
            [['district_id'], 'unique'],
            [['region_id'], 'exist', 'skipOnError' => true, 'targetClass' => Region::className(), 'targetAttribute' => ['region_id' => 'regionID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'district_id' => 'District ID',
            'region_id' => 'Region',
            'districtName' => 'District Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegion() {
        return $this->hasOne(Region::className(), ['regionID' => 'region_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVendors() {
        return $this->hasMany(Vendor::className(), ['district_id' => 'district_id']);
    }

    public static function getDistricts($region_id) {
        return ArrayHelper::map(self::find()->where(['region_id' => $region_id])->all(), 'district_id', 'districtName');
    }

}
