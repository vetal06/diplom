<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "subject_has_user".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $user_department_id
 *
 * @property Subject $id0
 * @property User $user
 */
class SubjectHasUser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'subject_has_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'user_department_id'], 'required'],
            [['user_id', 'user_department_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'user_department_id' => 'User Department ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(Subject::className(), ['id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id', 'department_id' => 'user_department_id']);
    }
}
