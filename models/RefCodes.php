<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ref_codes".
 *
 * @property integer $id
 * @property string $type
 * @property string $name
 * @property string $value
 */
class RefCodes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ref_codes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type'], 'string', 'max' => 45],
            [['name', 'value'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'name' => 'Name',
            'value' => 'Value',
        ];
    }
}
