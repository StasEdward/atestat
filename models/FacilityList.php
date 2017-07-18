<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "FACILITY_LIST".
 *
 * @property string $facility_name
 * @property string $external_ip
 * @property string $internal_ip
 * @property string $description
 */
class FacilityList extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'FACILITY_LIST';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db_atemain');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['facility_name', 'external_ip', 'internal_ip'], 'required'],
            [['facility_name', 'external_ip', 'internal_ip'], 'string', 'max' => 25],
            [['description'], 'string', 'max' => 100],
            [['facility_name'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'facility_name' => 'Facility Name',
            'external_ip' => 'External Ip',
            'internal_ip' => 'Internal Ip',
            'description' => 'Description',
        ];
    }
}
