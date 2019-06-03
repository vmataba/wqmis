<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "id_type".
 *
 * @property int $id_type_id
 * @property string $id_type_name
 *
 * @property Vendor[] $vendors
 */
class IdType extends \yii\db\ActiveRecord {

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
            [['id_type_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id_type_id' => 'Id Type ID',
            'id_type_name' => 'Id Type Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVendors() {
        return $this->hasMany(Vendor::className(), ['vendor_id_type' => 'id_type_id']);
    }
    
    public static function getIdTypes(){
        return ArrayHelper::map(self::find()->all(), 'id_type_id', 'id_type_name');
    }

}
