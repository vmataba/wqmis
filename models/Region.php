<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "region".
 *
 * @property string $regionID
 * @property string $regionName
 * @property string $created_at
 * @property string $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property District[] $districts
 */
class Region extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'region';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['regionName', 'created_by'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['created_by', 'updated_by'], 'integer'],
            [['regionName'], 'string', 'max' => 255],
            [['regionID'], 'number'],
            [['regionName'], 'unique', 'message' => 'This Region already exists'],
            [['regionID'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'regionID' => 'Region ID',
            'regionName' => 'Region Name',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDistricts() {
        return $this->hasMany(District::className(), ['region_id' => 'regionID']);
    }

    public static function getRegions() {
        $models = self::find()->all();
        $regions = [];
        foreach ($models as $model) {
            $regions[$model->regionID] = $model->regionName;
        }
        return $regions;
    }

}
