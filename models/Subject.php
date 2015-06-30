<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "subject".
 *
 * @property integer $id
 * @property string $subject_name
 *
 * @property SubjectHasFile[] $subjectHasFiles
 * @property SubjectHasUser[] $subjectHasUsers
 */
class Subject extends \yii\db\ActiveRecord
{
    public $user_id;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'subject';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['subject_name'], 'required'],
            [['subject_name'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'subject_name' => 'Название предмета',
        ];
    }
    public static function getSubjectUser(){
        $res = yii\helpers\ArrayHelper::map(Subject::find()->joinWith('subjectHasUsers')->where(['subject_has_user.user_id'=>Yii::$app->user->getId()])->all(), 'id', 'subject_name');
        return $res;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubjectHasFiles()
    {
        return $this->hasMany(SubjectHasFile::className(), ['subject_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubjectHasUsers()
    {
        return $this->hasMany(SubjectHasUser::className(), ['id' => 'id']);
    }
}
